<?php
$user_max_pc=$_MEPHIT[user][permission][$_SESSION[user_type]][max_pc];

if($user_max_pc<0){
	$continue=true;
}else{
	$query="SELECT * FROM mephit_personaggio WHERE autore=".$_SESSION[user_id];
	$result=mysql_query($query);
	$continue=mysql_num_rows($result)<$user_max_pc;
}

if(!$continue){
	$BODY.=$_LANG[too_many_pc];
}else{
	
	if(isset($_POST[ripeti])){
		mysql_query("DELETE FROM mephit_crea_personaggio WHERE fk_giocatore=".$_SESSION[user_id]);
	}
	
	$_SESSION[metodo]="";
	$_SESSION[metodo_punti]=0;
	
	switch($_POST[metodo]){
		case"mephit":case"free":case"standard":
		case"elite":case"rilancio":case"organici":
		case"medi_personalizzati":case"medi_casuali":case"potenziati":
			$_SESSION[metodo]=$_POST[metodo];
		break;
		case"acquisto":
			$_SESSION[metodo]=$_POST[metodo];
			$_SESSION[metodo_punti]=(int) $_POST["punti"];
		break;
		case"acquisto_standard":
			$_SESSION[metodo]=$_POST[metodo];
			$_SESSION[metodo_punti]=25;
		break;
		case"acquisto_non_standard":
			$_SESSION[metodo]=$_POST[metodo];
			switch($_POST["tipo_campagna"]){
				case"low":		$_SESSION[metodo_punti]=15;	break;
				case"binding":	$_SESSION[metodo_punti]=22;	break;
				case"hard":		$_SESSION[metodo_punti]=28;	break;
				case"high":		$_SESSION[metodo_punti]=32;	break;
			}
		break;
		default:
			
		break;
	}
	
	$query_roll="SELECT * FROM mephit_crea_personaggio WHERE fk_giocatore=".$_SESSION[user_id];
	$result_roll=mysql_query($query_roll);
	if(mysql_num_rows($result_roll)==0){
		$punti_residui=0;
		switch($_SESSION["metodo"]){
			case"mephit":
				function mephitRollMethod(){
					$x=array();
					$x[]=mephit_roll();
					$x[]=mephit_roll();
					$x[]=mephit_roll();
					$x[]=mephit_roll();
					$x[]=mephit_roll();
					$x[]=mephit_roll();
					return $x;
				}
				$r=mephitRollMethod();
				while(array_sum($r)<5){
					$r=mephitRollMethod();
				}
				$for=$r[0];
				$des=$r[1];
				$cos=$r[2];
				$int=$r[3];
				$sag=$r[4];
				$car=$r[5];
			break;
			case"free":
				$for=10;
				$des=10;
				$cos=10;
				$int=10;
				$sag=10;
				$car=10;
			break;
			case"standard":
				$for=rollAndDiscardLower("4d6",1);
				$des=rollAndDiscardLower("4d6",1);
				$cos=rollAndDiscardLower("4d6",1);
				$int=rollAndDiscardLower("4d6",1);
				$sag=rollAndDiscardLower("4d6",1);
				$car=rollAndDiscardLower("4d6",1);
			break;
			case"acquisto":
			case"acquisto_standard":
			case"acquisto_non_standard":
				$for=8;
				$des=8;
				$cos=8;
				$int=8;
				$sag=8;
				$car=8;
				$punti_residui=$_SESSION[metodo_punti];
			break;
			case"elite":
				$for=15;
				$des=14;
				$cos=13;
				$int=12;
				$sag=10;
				$car=8;
			break;
			case"rilancio":
				$for=roll("4d6");
				$des=roll("4d6");
				$cos=roll("4d6");
				$int=roll("4d6");
				$sag=roll("4d6");
				$car=roll("4d6");
			break;
			case"organici":
				$for=rollAndDiscardLower("4d6",1);
				$des=rollAndDiscardLower("4d6",1);
				$cos=rollAndDiscardLower("4d6",1);
				$int=rollAndDiscardLower("4d6",1);
				$sag=rollAndDiscardLower("4d6",1);
				$car=rollAndDiscardLower("4d6",1);
			break;
			case"medi_personalizzati":
				$for=array_sum(roll("3d6"));
				$des=array_sum(roll("3d6"));
				$cos=array_sum(roll("3d6"));
				$int=array_sum(roll("3d6"));
				$sag=array_sum(roll("3d6"));
				$car=array_sum(roll("3d6"));
			break;
			case"medi_casuali":
				$for=array_sum(roll("3d6"));
				$des=array_sum(roll("3d6"));
				$cos=array_sum(roll("3d6"));
				$int=array_sum(roll("3d6"));
				$sag=array_sum(roll("3d6"));
				$car=array_sum(roll("3d6"));
			break;
			case"potenziati":
				$for=rollAndDiscardLower("5d6",2);
				$des=rollAndDiscardLower("5d6",2);
				$cos=rollAndDiscardLower("5d6",2);
				$int=rollAndDiscardLower("5d6",2);
				$sag=rollAndDiscardLower("5d6",2);
				$car=rollAndDiscardLower("5d6",2);
			break;
		}
	/* <force> * /
		if($_POST[metodo]=="rilancio"){
			$query_roll_ins="INSERT INTO mephit_crea_personaggio (fk_giocatore,metodo,pt,step,lanci) VALUES (".$_SESSION[user_id].",'".$_POST["metodo"]."',".$punti_residui.",".$_GET["step"].",'".implode(",",$for).",".implode(",",$des).",".implode(",",$cos).",".implode(",",$int).",".implode(",",$sag).",".implode(",",$car)."')";
		}else{
			$query_roll_ins="INSERT INTO mephit_crea_personaggio (fk_giocatore,metodo,pt,step,_for,_des,_cos,_int,_sag,_car) VALUES (".$_SESSION[user_id].",'".$_POST["metodo"]."',".$punti_residui.",".$_GET["step"].",".$for.",".$des.",".$cos.",".$int.",".$sag.",".$car.")";
		}
		$result_roll_ins=mysql_query($query_roll_ins);
	/ * </force> */
	}else{
		if($_SESSION[metodo]=="rilancio"){
			while($row=mysql_fetch_array($result_roll)){
				$t=split(",",$row[lanci]);
				$punti_residui=$row[pt];
				$for=array($t[0],$t[1],$t[2],$t[3]);
				$des=array($t[4],$t[5],$t[6],$t[7]);
				$cos=array($t[8],$t[9],$t[10],$t[11]);
				$int=array($t[12],$t[13],$t[14],$t[15]);
				$sag=array($t[16],$t[17],$t[18],$t[19]);
				$car=array($t[20],$t[21],$t[22],$t[23]);
			}
		}else{
			while($row=mysql_fetch_array($result_roll)){
				$punti_residui=$row[pt];
				$for=$row[_for];
				$des=$row[_des];
				$cos=$row[_cos];
				$int=$row[_int];
				$sag=$row[_sag];
				$car=$row[_car];
			}
		}
	}
	
	switch($_SESSION["metodo"]){
		case"mephit":
		case"elite":
		case"free":
			require(dirname(__FILE__)."/dndcharsgen35_tpl_top.php");
			require(dirname(__FILE__)."/dndcharsgen35_2_".$_SESSION[metodo].".php");
			require(dirname(__FILE__)."/dndcharsgen35_tpl_bottom.php");
		break;
		case"acquisto":
		case"acquisto_standard":
		case"acquisto_non_standard":
			require(dirname(__FILE__)."/dndcharsgen35_tpl_top.php");
			require(dirname(__FILE__)."/dndcharsgen35_2_acquisto.php");
			require(dirname(__FILE__)."/dndcharsgen35_tpl_bottom.php");
		break;
		case"rilancio":
		case"organici":
		case"medi_personalizzati":
		case"medi_casuali":
		case"potenziati":
		case"standard":
			require(dirname(__FILE__)."/dndcharsgen35_2_".$_SESSION[metodo].".php");
		break;
	}
	
	/*
	$BODY.="for:".$for."<br>";
	$BODY.="des:".$des."<br>";
	$BODY.="cos:".$cos."<br>";
	$BODY.="int:".$int."<br>";
	$BODY.="sag:".$sag."<br>";
	$BODY.="car:".$car."<br>";
	*/
	
}
?>