<?php
/*
$jSQL = new jure_mysql(boo)
---------------------------
Crea una nuova istanza dell'oggetto. se "boo=true" la tabella è "alfabetica".

$jSQL -> getSelectResults($QUERY_UNLIMITED [,n° item [,n° pag mostrate nel menu] ] )
------------------------------------------------------------------------------------

$jSQL -> dressMenu( $m , parametri get da appendere al link )
-------------------------------------------------------------

$jSQL -> dressMenuWithButtons( $m , parametri get da appendere al link )
------------------------------------------------------------------------

$jSQL -> dressHeaders()
-----------------------

$jSQL -> addTableIndex($tit)
----------------------------
Aggiunge un'indice alla tabella.
Per "indice" si intende una colonna per la quale si possono ordinare i valori della tabella.

$jSQL -> addTableHeader($tit)
-----------------------------
Aggiunge un'intestazione alla tabella.

$jSQL -> getNumCols()
---------------------
Ritorna il numero di colonne della tabella

*/
class jure_mysql{
	var $alphabeticalMenu,$positionElements,$table_headers,$isAlphabetic;
	function jure_mysql(){
		$this->isAlphabetic=false;
		if(func_num_args()>0){
			$this->isAlphabetic=true;
			$this->alphabeticField=func_get_arg(0)===true?"t1.nome":func_get_arg(0);
		}
		$this->positionElements=array();
		$this->table_headers=array();
		if(isset($_GET[pag]))$this->positionElements[pag]=$_GET[pag]*1;
		if(isset($_GET[orderby]))$this->positionElements[orderby]=$_GET[orderby]*1;
		if(isset($_GET[letter]))$this->positionElements[letter]=$_GET[letter];
		for($i=65;$i<=90;$i++){
			$this->alphabeticalMenu[chr($i)]='<a href="'.$_SERVER[PHP_SELF].'?letter='.chr($i).'">'.chr($i).'</a>';
		}
		$this->alphabeticalMenu['.']='<a href="'.$_SERVER[PHP_SELF].'?letter=.">&#8230</a>';
	}
	function getSelectResults($QUERY_UNLIMITED /* [,n° item [,n° pag mostrate nel menu] ] */){
		$admin_viewPerPag=(func_num_args()>1)?func_get_arg(1):20;
		$admin_viewMenuPag=(func_num_args()>2)?func_get_arg(2):5;
		$return=array("error"=>false,"error_messages"=>array(),"rows"=>array(),"empty"=>true,"menu"=>array("first"=>1,"last"=>1,"next"=>false,"prev"=>false,"current"=>1,"pages"=>array()));
		
		$result=mysql_query($QUERY_UNLIMITED);
		if($result){
		
			$quante_view=mysql_num_rows($result);
			if($quante_view==0)$quante_view=1;
			$quante_pag=ceil($quante_view/$admin_viewPerPag);
			if(!isset($_GET[pag])||!is_numeric($_GET[pag])||$_GET[pag]<1)$pag=1;
			else $pag=($_GET[pag]<=$quante_pag)?$_GET[pag]:$quante_pag;
			$first_view=$admin_viewPerPag*($pag-1);
			$gruppo_pag=floor(($pag-1)/$admin_viewMenuPag);
			$QUERY_LIMITED=$QUERY_UNLIMITED;
			if($this->isAlphabetic){
				$QUERY_LIMITED.=( strpos($QUERY_LIMITED," WHERE ")!==false || strpos($QUERY_LIMITED," where ")!==false )?" AND ":" WHERE ";
				$l=(isset($this->positionElements[letter]))?$this->positionElements[letter]:'A';
				if($l=="."){
					$QUERY_LIMITED.="( ASCII(LEFT(".$this->alphabeticField.",1))<65 OR (ASCII(LEFT(".$this->alphabeticField.",1))>90 AND ASCII(LEFT(".$this->alphabeticField.",1))<97) OR ASCII(LEFT(".$this->alphabeticField.",1))>122 )";
				}else{
					$QUERY_LIMITED.=$this->alphabeticField." LIKE '".$l."%'";
				}
			}
			$TH=array();
			$TH_first=array();
			for($i=0,$j=1;$i<count($this->table_headers);$i++,$j++){
				if($this->table_headers[$i][1]==1){
					$arr=array_slice($this->table_headers[$i],2,count($this->table_headers[$i])-2);
					$param=$arr[0][0];
					if( abs($this->positionElements[orderby])==$j && count($param)!=0 ){
						$param=$param.(( $this->positionElements[orderby] > 0 )?" ASC":" DESC");	// stranezza: usando {$arr[0].=} mi dà errore! o_O
					}
					if(count($TH_first)==0)$TH_first[]=$param;
					else $TH[]=$param;
				}
			}
			if(count($TH_first)!=0){
				$QUERY_LIMITED.=" ORDER BY ".$TH_first[0];
				if(count($TH)!=0)$QUERY_LIMITED.=",".implode(",",$TH);
			}else{
				if(count($TH)!=0)$QUERY_LIMITED.=" ORDER BY ".implode(",",$TH);
			}
			$QUERY_LIMITED.=" LIMIT ".$first_view.",".$admin_viewPerPag;
//				echo "<p>".$QUERY_LIMITED."</p>";
			$result2=mysql_query($QUERY_LIMITED);
			if($result2){
				while($row=mysql_fetch_assoc($result2)){	// returns only fieldName keys
					$return["empty"]=false;
					$return[rows][]=$row;
				}
				$return[menu][first]=1+$gruppo_pag*$admin_viewMenuPag;
				$return[menu][last]=$return[menu][first]+$admin_viewMenuPag-1;
				$return[menu]["current"]=$pag;
				$return[menu]["prev"]=($pag>1)?($pag-1):false;
				$return[menu][quantepag]=$quante_pag;
				for($i=$return[menu][first];$i<=$return[menu][last];$i++){
					if($i>$quante_pag)break;
					$return[menu][pages][]=$i;
				}
				$return[menu]["next"]=($pag<$quante_pag)?($pag+1):false;
			}else{
				$return[error]=true;
				$return[error_messages][]=mysql_error();
				$return[query_unlimited]=$QUERY_UNLIMITED;
				$return[query_limited]=$QUERY_LIMITED;
			}
		}else{
			$return[error]=true;
			$return[error_messages][]=mysql_error();
			$return[query_unlimited]=$QUERY_UNLIMITED;
			$return[query_limited]=$QUERY_LIMITED;
		}
		return $return;
	}
	function dressMenu($m /*, parametri get da appendere al link */ ){
		$paramsGET=$_GET;
		if(isset($paramsGET[pag]))unset($paramsGET[pag]);
		if(isset($this->positionElements[letter]))$paramsGET[letter]=$this->positionElements[letter];
		if(isset($this->positionElements[orderby]))$paramsGET[orderby]=$this->positionElements[orderby];
		if(func_num_args()>1){
			parse_str(func_get_arg(1),$paramsARGS);
			if(is_array($paramsARGS)){
				if(count($paramsARGS)>0)$paramsGET=array_merge($paramsARGS,paramsGET);
			}
		}
		$paramsGET=(count($paramsGET)>0)?"&".http_build_query($paramsGET):"";
		$menu=array();
		$params=$_GET;
		$menu[]=($m["prev"]!==false)?'<a href="'.$_SERVER[PHP_SELF].'?pag='.'1'.$paramsGET.'">|&lt;</a>':'&laquo;';
		$menu[]=($m["prev"]!==false)?'<a href="'.$_SERVER[PHP_SELF].'?pag='.$m["prev"].$paramsGET.'">&lt;</a>':'&laquo;';
		foreach($m["pages"] as $p){
			if($p==$m["current"])$menu[]='<a href="'.$_SERVER[PHP_SELF].'?pag='.$p.$paramsGET.'" class="pagSel">'.$p.'</a>';
			else $menu[]='<a href="'.$_SERVER[PHP_SELF].'?pag='.$p.$paramsGET.'">'.$p.'</a>';
		}
		$menu[]=($m["next"]!==false)?'<a href="'.$_SERVER[PHP_SELF].'?pag='.$m["next"].$paramsGET.'">&gt;</a>':'&raquo;';
		$menu[]=($m["next"]!==false)?'<a href="'.$_SERVER[PHP_SELF].'?pag='.$m["quantepag"].$paramsGET.'">&gt;|</a>':'&raquo;';
		return '<div class="paginazione">'.implode("&nbsp;&nbsp;",$menu).'</div>';
	}
	function dressMenuWithButtons($m /*, parametri get da appendere al link */ ){
		$paramsGET=$_GET;
		if(isset($paramsGET[pag]))unset($paramsGET[pag]);
		if(isset($this->positionElements[letter]))$paramsGET[letter]=$this->positionElements[letter];
		if(isset($this->positionElements[orderby]))$paramsGET[orderby]=$this->positionElements[orderby];
		if(func_num_args()>1){
			parse_str(func_get_arg(1),$paramsARGS);
			if(is_array($paramsARGS)){
				if(count($paramsARGS)>0)$paramsGET=array_merge($paramsARGS,paramsGET);
			}
		}
		$paramsGET=(count($paramsGET)>0)?"&".http_build_query($paramsGET):"";
		$menu=array();
		$menu[]='<input type="button" class="btn" value="|&lt;" onclick="location.href=\''.$_SERVER[PHP_SELF].'?pag='.'1'.$paramsGET.'\'"'.(($m["prev"]===false)?' disabled':'').'>';
		$menu[]='<input type="button" class="btn" value="&lt;" onclick="location.href=\''.$_SERVER[PHP_SELF].'?pag='.$m["prev"].$paramsGET.'\'"'.(($m["prev"]===false)?' disabled':'').'>';
		foreach($m["pages"] as $p){
			$menu[]='<input type="button" class="'.(($p==$m["current"])?'btn-pagSel':'btn').'" value="'.$p.'" onclick="location.href=\''.$_SERVER[PHP_SELF].'?pag='.$p.$paramsGET.'\'">';
		}
		$menu[]='<input type="button" class="btn" value="&gt;" onclick="location.href=\''.$_SERVER[PHP_SELF].'?pag='.$m["next"].$paramsGET.'\'"'.(($m["next"]===false)?' disabled':'').'>';
		$menu[]='<input type="button" class="btn" value="&gt;|" onclick="location.href=\''.$_SERVER[PHP_SELF].'?pag='.$m["quantepag"].$paramsGET.'\'"'.(($m["next"]===false)?' disabled':'').'>';
		return '<div class="paginazione"><form>'.implode("&nbsp;&nbsp;",$menu).'</form></div>';
	}
	function dressHeaders(){
		$result="";
		if($this->isAlphabetic){
			$result.='<tr>';
			$result.='<th colspan="'.count($this->table_headers).'" style="border-right-width:0;padding:0px;">';
			$result.='<table summary="." border="0" cellpadding="0" cellspacing="0" width="100%" class="alphabetMenu"><tr>';
			foreach($this->alphabeticalMenu as $k=>$L){
				$result.='<th width="'.round(100/count($this->alphabeticalMenu),1).'%;"';
				if($k==$l)$result.=' class="alphabetSel"';
				$result.='>';
				$result.=$L;
				$result.='</th>';
			}
			$result.='</tr></table>';
		
			$result.='</th>';
			$result.='</tr>';
		}
		if(count($this->table_headers)>0){
			$i=0;
			$result.="<tr>";
			foreach($this->table_headers as $a){
				$i++;
				if($a[1]){
					$result.='<th><a href="';
					$result.=$_SERVER[PHP_SELF];
					$result.='?orderby=';
					$result.=( $this->positionElements[orderby]==-$i || ( !isset($this->positionElements[orderby])&&$i==1 ) )?$i:-$i;
					if(isset($this->positionElements[letter]))$result.='&letter='.$this->positionElements[letter];
					$result.='">'.$a[0].'</a>';
					if( $this->positionElements[orderby]==-$i || !isset($this->positionElements[orderby])&&$i==1 ) $result.=' <small>[+]</small>';
					else if( $this->positionElements[orderby]==$i ) $result.=' <small>[-]</small>';
					$result.='</th>';
				}else $result.='<th>'.$a[0].'</th>';
			}
			$result.="</tr>";
		}
		return $result;
	}
	function addTableIndex($tit){
		$arr=func_get_args();
		$arr=array_slice($arr,1,count($arr)-1);
		$this->table_headers[]=array($tit,1,$arr);
	}
	function addTableHeader($tit){
		$this->table_headers[]=array($tit,0);
	}
	function getNumCols(){
		return count($this->table_headers);
	}
	function getPositionElements(){
		return implode("&",$this->positionElements);
	}
}
?>
