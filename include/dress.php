<?php
$D = new jureDate();

$year=$D->today("yearFull");
$month=$D->today("month");
$calendarSx1 = $D->getCalendarMonth($month,$year);
$query_agenda="SELECT DATE_FORMAT(t1.data,'%e'),DATE_FORMAT(t1.data,'%H:%i'),DATE_FORMAT(t1.data,'%d-%m-%Y'),t1.nome,t4.nome FROM ";
$query_agenda.="mephit_sessione AS t1,";
$query_agenda.="mephit_avventura AS t2,";
$query_agenda.="mephit_campagna AS t3,";
$query_agenda.="mephit_gruppo AS t4 ";
$query_agenda.="WHERE ";
$query_agenda.="t1.fk_avventura=t2.id_avventura AND ";
$query_agenda.="t2.fk_campagna=t3.id_campagna AND ";
$query_agenda.="t3.fk_gruppo=t4.id_gruppo AND ";
$query_agenda.="t1.data LIKE '____".$month."________'";
$query_agenda.=" ORDER BY t1.data";
//echo $query_agenda;
$result_agenda=mysql_query($query_agenda);
$agenda=array();
while(list($g,$h,$data,$nome,$gruppo)=mysql_fetch_array($result_agenda)){
	if(!isset($agenda[$g]))$agenda[$g]=array();
	if($D->hasExpired($data))$agenda[$g][]="[".$h."] Sessione ''".str_replace("\"","''",$nome)."'' del gruppo ''".str_replace("\"","''",$gruppo)."''";
	else $agenda[$g][]="[".$h."] Sessione del gruppo ''".str_replace("\"","''",$gruppo)."''";
}
for($week=0;$week<count($calendarSx1);$week++){
	for($g=0;$g<count($calendarSx1[$week]);$g++){
		$t=$calendarSx1[$week][$g];
		if(in_array($t,array_keys($agenda))){
			$calendarSx1[$week][$g]="<a href=\"#\" title=\"".implode("\n",$agenda[$t])."\">".$t."</a>";
		}
	}
}
$calendarSx1 = $D->drawCalendarMonth($calendarSx1,$D->today("day"),$month,$year);

### INIZIO CONTROLLI VARIABILI GET ###

//navigazione

$found=false;
$gruppi="<select name=gruppo style=\"margin-left:10px;\" onchange=\"navGo(this.name);\">";
$gruppi.="<option value=\"\">".$_LANG["select_a_group"];
$query="SELECT id_gruppo,nome FROM mephit_gruppo ORDER BY nome";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	$gruppi.="<option value=\"".$row["id_gruppo"]."\"";
	if(isset($_GET["gruppo"]) && $row["id_gruppo"]==$_GET["gruppo"]){
		$gruppi.=" selected";
		$found=true;
	}
	$gruppi.=">".$row["nome"];
}
$gruppi.="</select>";
$gruppi_options="";
if($found){
	if(!isset($_GET["sez"]))$_GET["sez"]="home";
	if($_GET["sez"]=="diario"||$_GET["sez"]=="home"){
		$gruppi_options.="<select name=\"sez\" style=\"margin-left:10px;\" onchange=\"navGo(this.name);\">";
		$gruppi_options.="<option value=\"home\"".((strpos($_SERVER["PHP_SELF"],"gruppo.php")!==false)?" selected":"").">Homepage";
		$gruppi_options.="<option value=\"diario\"".((strpos($_SERVER["PHP_SELF"],"diario.php")!==false)?" selected":"").">".$_LANG["journal"];
		$gruppi_options.="</select>";
	}else unset($_GET["sez"]);
}else unset($_GET["sez"]);

//campagna e avventura
if(isset($_GET["gruppo"])){
	if(isset($_GET["campagna"])){
		$campagna=$_GET["campagna"];
	}else{
		$query="SELECT id_campagna FROM mephit_campagna WHERE fk_gruppo=".$_GET["gruppo"]." ORDER BY data DESC LIMIT 0,1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			$campagna=$row[0];
		}
	}
	
	$query="SELECT id_avventura FROM mephit_avventura WHERE fk_campagna=".$campagna." ORDER BY data DESC LIMIT 0,1";
	$result=mysql_query($query);
	while($row=mysql_fetch_array($result)){
		$avventura=$row[0];
	}
	
	if(mysql_num_rows($result)!=0){
		$query="SELECT t1.fk_master,t2.nick,t1.id_avventura FROM mephit_avventura AS t1,mephit_giocatore AS t2 WHERE t1.fk_master=t2.id_giocatore AND t1.id_avventura=".$avventura." ORDER BY t1.data DESC LIMIT 0,1";
		$result=mysql_query($query);
		while($row=mysql_fetch_array($result)){
			//echo"<a href=giocatori.php?id=".$row[0]." class=header>".$row[1]."</a>";
			$master=$row[0];
			if(isset($_GET["avventura"]))$avventura=$_GET["avventura"];
			else $avventura=$row["id_avventura"];
		}
	}
}

### FINE CONTROLLI VARIABILI GET ###

$smarty->assign('mephit_dir',$_MEPHIT[WWW_ROOT]);
$smarty->assign('theme_dir',$_COOKIE["mephit_theme"]);
$smarty->assign('website_title',$_MEPHIT["website_title"]);

$smarty->assign('calendarSx1',$calendarSx1);
$smarty->assign('gruppi',$gruppi);
$smarty->assign('gruppi_options',$gruppi_options);
?>