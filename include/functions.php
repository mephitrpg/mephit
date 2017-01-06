<?php
/*
+--------------------------------------------------+
| Author: Allan Irvine <ai@ayrsoft.com> |
+--------------------------------------------------+
| Date: WED 11 DEC 2002 |
+--------------------------------------------------+
| Origin: Scotland, United kingdom |
+--------------------------------------------------+
| Script: browser_types.php |
+--------------------------------------------------+
| No License |
| free to use for personal and commercial purposes |
+--------------------------------------------------+
*/

function GetBrowserAgent(){

if (eregi("opera",$_SERVER['HTTP_USER_AGENT'])){
$val = explode(" ",stristr($_SERVER['HTTP_USER_AGENT'],"opera"));
$bd['browser'] = $val[0];
$bd['version'] = $val[1];
}elseif(eregi("msie",$_SERVER['HTTP_USER_AGENT']) && !eregi("opera",$_SERVER['HTTP_USER_AGENT']) ){
$val = explode(" ",stristr($_SERVER['HTTP_USER_AGENT'],"msie"));
$bd['browser'] = $val[0];
$bd['version'] = $val[1];
}elseif(eregi("galeon",$_SERVER['HTTP_USER_AGENT'])){
$val = explode(" ",stristr($_SERVER['HTTP_USER_AGENT'],"galeon"));
$val = explode("/",$val[0]);
$bd['browser'] = $val[0];
$bd['version'] = $val[1];
}elseif(eregi("Konqueror",$_SERVER['HTTP_USER_AGENT'])){
$val = explode(" ",stristr($_SERVER['HTTP_USER_AGENT'],"Konqueror"));
$val = explode("/",$val[0]);
$bd['browser'] = $val[0];
$bd['version'] = $val[1];
}elseif(eregi("icab",$_SERVER['HTTP_USER_AGENT'])){
$val = explode(" ",stristr($_SERVER['HTTP_USER_AGENT'],"icab"));
$bd['browser'] = $val[0];
$bd['version'] = $val[1];
}elseif(eregi("mozilla",$_SERVER['HTTP_USER_AGENT']) && eregi("rv:[0-9]\.[0-9]\.[0-9]",$_SERVER['HTTP_USER_AGENT']) && !eregi("netscape",$_SERVER['HTTP_USER_AGENT'])){
$bd['browser'] = "Mozilla";
eregi("rv:[0-9]\.[0-9]\.[0-9]",$_SERVER['HTTP_USER_AGENT'],$val);
$bd['version'] = str_replace("rv:","",$val[0]);
}elseif(eregi("netscape",$_SERVER['HTTP_USER_AGENT'])){
$val = explode(" ",stristr($_SERVER['HTTP_USER_AGENT'],"netscape"));
$val = explode("/",$val[0]);
$bd['browser'] = $val[0];
$bd['version'] = $val[1];
}elseif(eregi("mozilla",$_SERVER['HTTP_USER_AGENT']) && !eregi("rv:[0-9]\.[0-9]\.[0-9]",$_SERVER['HTTP_USER_AGENT'])){
$val = explode(" ",stristr($_SERVER['HTTP_USER_AGENT'],"mozilla"));
$val = explode("/",$val[0]);
$bd['browser'] = "Netscape";
$bd['version'] = $val[1];
}

$bd['version'] = str_replace(";","",$bd['version']);
return($bd);
}

function dateFormat($str,$short=true){
	$time=strtotime($str);
	$day=$GLOBALS[_LANG][dayName][date("w",$time)];
	$month=$GLOBALS[_LANG][monthName][date("n",$time)-1];
	if($short){
		$day=substr($day,0,3);
		$month=substr($month,0,3);
	}
	return $day.", ".date("j",$time)." ".$month." ".date("Y, H:i:s",$time);
}

function replace_extension($filename, $new_extension) {
	return substr($filename,0,strrpos($filename,".")).".".$new_extension;
}

/****************************************
*****************************
* YOU CAN REMOVE THIS CODE BELOW, ITS ONLY AN EXAMPLE OF USAGE
****************************************
******************************/
/*

$agent[0]= "Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.0 [en] \n";
$agent[1]= "Mozilla/4.0 (compatible; MSIE 5.5; Windows 95)\n";
$agent[2]= "Mozilla/5.0 Galeon/1.2.0 (X11; Linux i686; U Gecko/20020326\n";
$agent[3]= "Mozilla/5.0 (compatible; Konqueror/2.1.1; X11)\n";
$agent[4]= "Mozilla/4.5 (compatible; iCab 2.7.1; Macintosh; I; PPC)\n";
$agent[5]= "Mozilla/5.0 (X11; U; Linux 2.4.3-20mdk i586; en-US; rv:0.9.1) Gecko/20010611\n";
$agent[6]= "Mozilla/5.0 (Windows; U; WinNT4.0; en-CA; rv:0.9.4) Gecko/20011128 Netscape6/6.2.1\n";
$agent[7]= "Mozilla/4.76 [en] (WinNT; U)\n";

echo "<form action=".$_SERVER['PHP_SELF']." method=post><input type=\"hidden\" name=\"PHPSESSID\" value=\"568a94362faa0cd712b24ae91e90bd74\" /><select name=bn onChange=\"this.form.submit()\">\n";
while(list($key,$val)=each($agent)){
$SEL = ($val==$_POST['bn'])? " SELECTED ": "";
echo "<option $SEL value=\"".$val."\">$val\n";
}
echo "</select></form>\n";

if ($_POST['bn']){
$_SERVER['HTTP_USER_AGENT'] = $_POST['bn'];
}

$bd = GetBrowserAgent();

echo "<table border=1 bgcolor=\"#000000\" cellspacing=0 cellpadding=2><td>\n";
echo "<table border=1 bgcolor=\"#000000\" cellspacing=1 cellpadding=3>\n";
echo "<tr BGCOLOR=silver><th colspan=2>Browser Agent Details</th></tr>\n";
echo "<tr bgcolor=\"#F0F0F0\"><th>Browser</th><td>".$bd['browser']."</td></tr>\n";
echo "<tr bgcolor=\"#F0F0F0\"><th>Version</th><td>".$bd['version']."</td></tr>\n";
echo "<tr bgcolor=\"#F0F0F0\"><th>ID String</th><td>";
echo str_replace($bd['browser'],"<font color=red><b>".$bd['browser']."</b></font>",$_SERVER['HTTP_USER_AGENT'])."</td></tr>\n";
echo "</table></td></table>\n";

*/

function mysql_select($q){
	$result=mysql_query($q);
	if($result){
		if(mysql_num_rows($result)>0){
			$arr=array();
			while($row=mysql_fetch_array($result)){
				$t=array();
				foreach($row as $k=>$v){
					if(!is_numeric($k))$t[$k]=htmlspecialchars($v);
				}
				if(count($t)>0)$arr[]=$t;
			}
		}
		return $arr;
	}else{
		echo mysql_error();
		return false;
	}
}

function formatStatus($q){
	switch($q){
		case 0:	// died
			return "<span title=\"morto\" class=help>†</span>";
		break;
		case 1:	// alive, playing
			return "<span title=\"vivo, sta giocando\" class=help>+</span>";
		break;
		case 2:	// alive, mastering
			return "<span title=\"vivo, il giocatore sta facendo il master\" class=help>||</span>";
		break;
		case 3:	// alive, not playing
			return "<span title=\"vivo, ma non sta giocando\" class=help>±</span>";
		break;
	}
}

function formatClasses($q){
	for($i=0;$i<count($q);$i++){
		switch($q[$i][0]){
			case"Barbaro":		$c="Bbr";		break;
			case"Bardo":		$c="Brd";		break;
			case"Chierico":		$c="Chr";		break;
			case"Mago":			$c="Mag";		break;
			case"Guerriero":	$c="Grr";		break;
			case"Stregone":		$c="Str";		break;
			case"Ladro":		$c="Ldr";		break;
			case"Druido":		$c="Drd";		break;
			case"Monaco":		$c="Mnc";		break;
			case"Paladino":		$c="Pal";		break;
			case"Ranger":		$c="Rgr";		break;
			default:			$c=$q[$i][0];	break;
		}
		$q[$i]=$c." ".$q[$i][1];
	}
	return implode("/",$q);
}

function formatSize(){
	$id=func_get_arg(0);
	if(func_num_args()>1)$gender=func_get_arg(1);
	switch($id){
		case 8:	return ($gender=="M")?"Colossale":"Colossale";			break;
		case 7:	return ($gender=="M")?"Mastodontico":"Mastodontica";	break;
		case 6:	return ($gender=="M")?"Enorme":"Enorme";				break;
		case 5:	return ($gender=="M")?"Grande":"Grande";				break;
		case 4:	return ($gender=="M")?"Medio":"Media";					break;
		case 3:	return ($gender=="M")?"Piccolo":"Piccola";				break;
		case 2:	return ($gender=="M")?"Minuscolo":"Minuscola";			break;
		case 1:	return ($gender=="M")?"Minuto":"Minuta";				break;
		case 0:	return ($gender=="M")?"Piccolissimo":"Piccolissima";	break;
	}
	return implode("/",$q);
}

function formatRace($id){
	switch($id*1){
		case 0:	return "Elfo";			break;
		case 1:	return "Halfling";		break;
		case 2:	return "Gnomo";			break;
		case 3:	return "Mezzelfo";		break;
		case 4:	return "Mezzorco";		break;
		case 5:	return "Nano";			break;
		case 6:	return "Umano";			break;
		default:
			return "Razza sconosciuta";
		break;
	}
}

/*
** Date modified: 1st October 2004 20:09 GMT
*
** PHP implementation of the Secure Hash Algorithm ( SHA-1 )
*
** This code is available under the GNU Lesser General Public License:
** http://www.gnu.org/licenses/lgpl.txt
*
** Based on the PHP implementation by Marcus Campbell
** http://www.tecknik.net/sha-1/
*
** This is a slightly modified version by me Jerome Clarke ( sinatosk@gmail.com )
** because I feel more comfortable with this
*/

if(!function_exists('sha1')){
	function sha1_str2blks_SHA1($str)
	{
	   $strlen_str = strlen($str);
	  
	   $nblk = (($strlen_str + 8) >> 6) + 1;
	  
	   for ($i=0; $i < $nblk * 16; $i++) $blks[$i] = 0;
	  
	   for ($i=0; $i < $strlen_str; $i++)
	   {
	       $blks[$i >> 2] |= ord(substr($str, $i, 1)) << (24 - ($i % 4) * 8);
	   }
	  
	   $blks[$i >> 2] |= 0x80 << (24 - ($i % 4) * 8);
	   $blks[$nblk * 16 - 1] = $strlen_str * 8;
	  
	   return $blks;
	}
	
	function sha1_safe_add($x, $y)
	{
	   $lsw = ($x & 0xFFFF) + ($y & 0xFFFF);
	   $msw = ($x >> 16) + ($y >> 16) + ($lsw >> 16);
	  
	   return ($msw << 16) | ($lsw & 0xFFFF);
	}
	
	function sha1_rol($num, $cnt)
	{
	   return ($num << $cnt) | sha1_zeroFill($num, 32 - $cnt);   
	}
	
	function sha1_zeroFill($a, $b)
	{
	   $bin = decbin($a);
	  
	   $strlen_bin = strlen($bin);
	  
	   $bin = $strlen_bin < $b ? 0 : substr($bin, 0, $strlen_bin - $b);
	  
	   for ($i=0; $i < $b; $i++) $bin = '0'.$bin;
	  
	   return bindec($bin);
	}
	
	function sha1_ft($t, $b, $c, $d)
	{
	   if ($t < 20) return ($b & $c) | ((~$b) & $d);
	   if ($t < 40) return $b ^ $c ^ $d;
	   if ($t < 60) return ($b & $c) | ($b & $d) | ($c & $d);
	  
	   return $b ^ $c ^ $d;
	}
	
	function sha1_kt($t)
	{
	   if ($t < 20) return 1518500249;
	   if ($t < 40) return 1859775393;
	   if ($t < 60) return -1894007588;
	  
	   return -899497514;
	}
	
	function sha1($str, $raw_output=FALSE)
	{
	   if ( $raw_output === TRUE ) return pack('H*', sha1($str, FALSE));
	  
	   $x = sha1_str2blks_SHA1($str);
	   $a =  1732584193;
	   $b = -271733879;
	   $c = -1732584194;
	   $d =  271733878;
	   $e = -1009589776;
	  
	   $x_count = count($x);
	  
	   for ($i = 0; $i < $x_count; $i += 16)
	   {
	       $olda = $a;
	       $oldb = $b;
	       $oldc = $c;
	       $oldd = $d;
	       $olde = $e;
	      
	       for ($j = 0; $j < 80; $j++)
	       {
	           $w[$j] = ($j < 16) ? $x[$i + $j] : sha1_rol($w[$j - 3] ^ $w[$j - 8] ^ $w[$j - 14] ^ $w[$j - 16], 1);
	          
	           $t = sha1_safe_add(sha1_safe_add(sha1_rol($a, 5), sha1_ft($j, $b, $c, $d)), sha1_safe_add(sha1_safe_add($e, $w[$j]), sha1_kt($j)));
	           $e = $d;
	           $d = $c;
	           $c = sha1_rol($b, 30);
	           $b = $a;
	           $a = $t;
	       }
	      
	       $a = sha1_safe_add($a, $olda);
	       $b = sha1_safe_add($b, $oldb);
	       $c = sha1_safe_add($c, $oldc);
	       $d = sha1_safe_add($d, $oldd);
	       $e = sha1_safe_add($e, $olde);
	   }
	  
	   return sprintf('%08x%08x%08x%08x%08x', $a, $b, $c, $d, $e);
	}
}

function dropShadow($image,$dropShadow_height,$dropShadow_color){
	$t='';
	$t.='<table border=0 cellpadding=0 cellspacing=0 align=right><tr valign=top>';
	$t.='<td>'.$image.'</td>';
	$t.='<td bgcolor="'.$dropShadow_color.'"><img src="'.$GLOBALS[_MEPHIT][HTDOCS].'/themes/'.$_COOKIE[mephit_theme].'/images/s.gif" width='.$dropShadow_height.' height='.$dropShadow_height.' style="background-color:#ffffff;"></td>';
	$t.='</tr>';
	$t.='<tr><td colspan=2 bgcolor="'.$dropShadow_color.'"><img src="'.$GLOBALS[_MEPHIT][HTDOCS].'/themes/'.$_COOKIE[mephit_theme].'/images/s.gif" width='.$dropShadow_height.' height='.$dropShadow_height.' style="background-color:#ffffff;"></td></tr>';
	$t.='</table>';
	return $t;
}

function xmp($q){
	echo"<xmp>";
		if(is_array($q))print_r($q);
		else if(!is_string($q))var_dump($q);
		else echo $q;
	echo"</xmp>";
}

function implode_single(){
	$a=(is_array(func_get_arg(0)))?func_get_arg(0):func_get_args();
	if(count($a)==0)return "";
	foreach($a as $k=>$v)$a[$k]=addslashes($v);
	return "'".implode("','",$a)."'";
}
function implode_double(){
	$a=(is_array(func_get_arg(0)))?func_get_arg(0):func_get_args();
	if(count($a)==0)return "";
	foreach($a as $k=>$v)$a[$k]=addslashes($v);
	return '"'.implode('","',$a).'"';
}
function implode_grave(){
	$a=(is_array(func_get_arg(0)))?func_get_arg(0):func_get_args();
	if(count($a)==0)return "";
	$result=array();
	foreach($a as $k=>$v){
		if(strpos($v,"`")!==false){
			$result[]=$v;
		}else if(strpos($v,".")!==false){
			$result[]="`".implode("`.`",explode(".",$v))."`";
		}else if(strpos($v,"(")!==false){
			$vv=explode("(",$v);
			$vv=explode(")",$vv[1]);
			$vv=$vv[0];
			$result[]=implode_grave($vv);
		}else{
			$result[]="`".$v."`";
		}
	}
	return implode(",",$result);
}

function query($q){
	$q=trim($q);
	if(func_num_args()>0){
		switch(strtoupper(func_get_arg(0))){
			case"NUM":		$type=MYSQL_NUM;	break;
			case"BOTH":		$type=MYSQL_BOTH;	break;
			case"ASSOC":
			default:		$type=MYSQL_ASSOC;	break;
		}
	}else{
		$type=MYSQL_ASSOC;
	}
	
	$res=mysql_query($q);
	
	$return=array(
		"query"=>$q,
		"error"=>mysql_error(),
		"errno"=>mysql_errno(),
	);
	
	if($res){
		switch(substr($q,0,6)){
			case "SELECT":
				$return["num"]=mysql_num_rows($res);
				$return["rows"]=array();
				if($return["num"]>0){
					$i=0;
					while($r=mysql_fetch_array($res,$type)){
						foreach($r as $k=>$v){
							if(strpos($k,"(")!==false){
								$kk=$k;
								$kk=explode("(",$kk);$kk=$kk[1];
								$kk=explode(",",$kk);$kk=$kk[0];
								if(strpos($kk,".")!==false){
									$kk=explode(".",$kk);$kk=$kk[1];
								}
								$kk=str_replace("`","",$kk);
								$return["rows"][$i][$kk]=$v;
							}else{
								$return["rows"][$i][$k]=$v;
							}
						}
						$i++;
					}
					@mysql_data_seek($res,0);
				}
			break;
			case "UPDATE":
				echo var_dump($res);
				$return["num"]=mysql_affected_rows($res);
			break;
			case "DELETE":
				$return["num"]=mysql_affected_rows($res);
			break;
		}
	}
	
	$return["resource"]=$res;
	
	return $return;
}


function formatTime($time){
	$x=$time;			$mod=1/60/60/24/365;	$y=floor($x*$mod);
	$x=$x-$y/$mod;		$mod=1/60/60/24/30;		$m=floor($x*$mod);
	$x=$x-$m/$mod;		$mod=1/60/60/24;		$d=floor($x*$mod);
	$x=$x-$d/$mod;		$mod=1/60/60;			$h=floor($x*$mod);
	$x=$x-$h/$mod;		$mod=1/60;				$i=floor($x*$mod);
	$x=$x-$i/$mod;		$mod=1;					$s=floor($x*$mod);
	
	$tempo_tmp=array("a"=>$y,"m"=>$m,"g"=>$d,"h"=>$h,"i"=>$i,"s"=>$s);
	$tempo=array();
	if(array_sum($tempo_tmp)!=0){
		$foundGreaterThanZero=false;
		foreach($tempo_tmp as $k=>$t){
			$foundGreaterThanZero = $t!=0 || $foundGreaterThanZero ;
			if($foundGreaterThanZero)$tempo[]=$t.$k;
		}
	}else{
		$tempo[]="0s";
	}
	
	return implode(", ",$tempo);
}

function navButton($value,$href){
	return '<input type="button" class="btn" onclick="location.href=\''.addslashes($href).'\'" onkeypress="this.onclick();" value="'.htmlspecialchars($value).'">';
}

function subButton($value,$href){
	return '<input type="submit" class="btn" value="'.htmlspecialchars($value).'">';
}

function compareRecords($generated,$stored){
	$multidimensional=is_array($generated)&&is_array($stored);
	if(!$multidimensional){
		return array(
			"insert"=>array_diff($generated,$stored),
			"delete"=>array_diff($stored,$generated),
			"unchanged"=>array_intersect($generated,$stored)
		);
	}else{
		$key=func_num_args()>2?trim(func_get_arg(2)):"";
		
		$arr=array_merge($generated,$stored);
		$all=array_intersect_key($arr,array_unique(array_map('serialize',$arr)));
		
		$insert=array();$update=array();$unchanged=array();$delete=$stored;
		if($key!=""&&is_string($key)){
			// ciclo generated controllando se trovo in stored
			// se trovo identici non faccio nulla e passo al prossimo
			// se sì, elimino l'elemento da entrambi e metto in update l'elemento di generated
			// se no, metto l'elemento in insert
			// poi metto stored in delete
			foreach($generated as $g=>$G){
				$ins=true;
				foreach($delete as $s=>$S){
					if($G[$key]==$S[$key]){
						if($G==$S){
							$unchanged[]=$G;
						}else{
							$update[]=$G;
						}
						unset($delete[$s]);
						$ins=false;
						break;
					}
				}
				if($ins)$insert[]=$G;
			}
		}
		
		return array(
			"insert"=>$insert,
			"delete"=>$delete,
			"unchanged"=>$unchanged,
			"update"=>$update
		);
	}
}

function attr(){
	$a=mum_get_args();$i=func_num_args();
	while($i--){
		$prev=$i-1;
		if(isset($a[$prev])){
			$key=$a[$prev];
			$value=$a[$i];
			if(!is_null($value)){
				$a[$prev]=$key.'="'.$value.'"';
			}
			array_splice($a,$i,1);
			$i=$prev;
		}
	}
	return implode(" ",$a);
}
?>