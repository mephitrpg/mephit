<?php /*
#**********************************************************#
#                jure's Library - Date() v0.10             #
#   Script sviluppato da jure - Script developed by jure   #
#                      jure@freehtml.it                    #
#**********************************************************#

-----------------------------
jureLib_date.php - Che cos'è?
-----------------------------
Questo file è una classe che contiene alcuni metodi utili per facilitare controlli e operazioni riguardanti le date. In genere, quando riceve delle date come argomenti, esse sono stringhe in formato "gg-mm-aaaa" (es. "01-01-2004").

La jure's Library è pensata per gli sviluppatori italiani e NON VUOLE essere uno script utilizzabile da tutto il mondo. Tanto ne esistono a decine... che almeno una sia dedicata a noi!

---------
getLang()
---------
Restituisce il linguaggio corrente.

------------
setLang(str)
------------
Setta il linguaggio corrente.
    - "it" (default)
	- "en"

----------------
setFirstDay(num)
----------------
Setta il primo giorno della settimana. 
    - 0: Domenica
	- 1: Lunedì (default)
	- 2: Martedì
	- 3: Mercoledì
	- 4: Giovedì
	- 5: Venerdì
	- 6: Sabato

-----------
adjust(num)
-----------
Aggiunge secondi all'ora corrente della classe.
Ad esempio, quando il server riporta un'ora sbagliata, aggiungendo o togliendo secondi si ottiene quella giusta.
Esempio: $D->adjust(120); echo $d->now(); // porta avanti l'ora di 2 minuti.
         $D->adjust(-60*60*24); echo $d->today(); // porta indietro la data di 1 giorno.
NOTA: Una volta modificata l'ora, tutti i metodi della classe subiscono la modifica, ma le normali funzioni PHP e MySQL continuano ad usare l'ora non modificata.

---------------------------------
getLangElement( str, num [,num] )
---------------------------------
Restituisce il nome di un giorno o mese nella lingua corrente.
Il 1° parametro indica la formattazione:
    - dayName: giorno della settimana, esteso (es: Lunedì)
    - dayNameSmall: giorno della settimana, contratto (es: Lun)
    - dayNameChar: giorno della settimana, prima lettera (es: L)
    - monthName: mese, esteso (es: Gennaio)
    - monthNameSmall mese, contratto (es: Gen)
    - monthNameChar mese, prima lettera (es: G)
Il 2° parametro indica quale giorno della settimana (da 0 a 6) o mese dell'anno da (1 a 12) restituire.
Il 3° parametro (facoltativo) indica il 1° giorno della settimana.
Esempio: $D->getLangElement("dayName",6) restituisce "Domenica"
         $D->getLangElement("monthNameSmall",6) restituisce "Giu"

--------------
today( [str] )
--------------
Se non viene indicato nessun argomento, restituisce la data in formato "gg-mm-aaaa" nella lingua corrente.
Se invece viene indicato uno dei seguenti parametri, viene restito il risultato corrispondente.
    - day: il giorno del mese, zerofill (es: "08");
	- dayName: giorno della settimana, esteso (es: Lunedì)
    - dayNameSmall: giorno della settimana, contratto (es: Lun)
    - dayNameChar: giorno della settimana, prima lettera (es: L)
	- dayNum: il giorno della settimana, numero (es: 1)
    - month: il mese, zerofill (es: "09");
    - monthName: mese, esteso (es: Gennaio)
    - monthNameSmall mese, contratto (es: Gen)
    - monthNameChar mese, prima lettera (es: G)
	- year: anno, 2 cifre zerofill (es: "06")
	- yearFull: anno, 4 cifre zerofill (es: "2006")

-----
now()
-----
Restituisce l'ora corrente in formato "hh:ii:ss".

--------------
data2date(str)
--------------
Restituisce un oggetto "date()" ricavandolo da una data in formato "gg-mm-aaaa";

-------------------
timestamp2date(str)
-------------------
Restituisce un oggetto "date()" ricavandolo da una data in formato "aaaammgghhiiss";

------------
reverse(str)
------------
Restituisce la data indicata trasformandone il formato da "gg-mm-aaaa" a "aaaa-mm-gg" e viceversa.
Accetta qualsiasi separatore.

-------------
diff(str,str)
-------------
Restituisce il numero di giorni tra la prima data e la seconda.
Esempio: $D->diff("01-11-2004","11-04-2004") restituisce 10

------------
add(str,num)
------------
Somma ad una data un numero di giorni. Restituisce la data risultante.
Esempio: $D->add("29-11-2004",2) restituisce "01-12-2004"

--------------
addMonths(str)
--------------
Somma ad una data un numero di mesi. Restituisce la data risultante.
Esempio: $D->addMonths("31-12-2004",2) restituisce "28-02-2005"

------------
sub(str,num)
------------
Sottrae ad una data un numero di giorni. Restituisce la data risultante.
Esempio: $D->sub("01-11-2004",2) restituisce "30-10-2004"

--------------
subMonths(str)
--------------
Sottrae ad una data un numero di mesi. Restituisce la data risultante.
Esempio: $D->subMonths("31-12-2004",2) restituisce "30-11-2004"

---------------
hasExpired(str)
---------------
Restituisce TRUE se la data è già passata, FALSE se non è ancora passata oppure è oggi.

-----------
exists(str)
-----------
Controlla se la data esiste.

-------------------------
getCalendarMonth(num,num)
-------------------------
Accetta i due argomenti "mese" ed "anno".
Restituisce un array corrispondente al calendario diviso per settimane del mese indicato.

-------------------------------
drawCalendarMonth( arr [,num] )
-------------------------------
Accetta i due argomenti "calendario mese" e "giorno selezionato".
"calendario mese" è il risultato del metodo getCalendarMonth().
"giorno selezionato" è facoltativo ed indica il giorno selezionato, solitamente il giorno corrente.
Il calendario è personalizzabile tramite CSS.
*/

class jureDate{
//******************************************************************************************************************************************
var $now,$modifier;
var $lang=array(
	"current"=>"it",
	"firstDay"=>"1",
	"it"=>array(
		"dayName"=>array("Domenica","Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato"),
		"dayNameSmall"=>array("Dom","Lun","Mar","Mer","Gio","Ven","Sab"),
		"dayNameChar"=>array("D","L","M","M","G","V","S"),
		"monthName"=>array("Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"),
		"monthNameSmall"=>array("Gen","Feb","Mar","Apr","Mag","Giu","Lug","Ago","Set","Ott","Nov","Dic"),
		"monthNameChar"=>array("G","F","M","A","M","G","L","A","S","O","N","D")
	),
	"en"=>array(
		"dayName"=>array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"),
		"dayNameSmall"=>array("Sun","Mon","Tue","Wed","Thu","Fri","Sat"),
		"dayNameChar"=>array("S","M","T","W","T","F","S"),
		"monthName"=>array("January","February","March","April","May","June","July","Agust","September","October","November","December"),
		"monthNameSmall"=>array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"),
		"monthNameChar"=>array("J","F","M","A","M","J","J","A","S","O","N","D")
	)
);

//******************************************************************************************************************************************

function jureDate(){
	$this->now=mktime( date("H"), date("i"), date("s"), date("m"), date("d"), date("Y") );
	$this->lang[firstDay]*=1;
	$this->modifier=0;
}

//******************************************************************************************************************************************

function getLang(){
	return $this->lang["current"];
}

function setLang($a){
	$this->lang["current"]=$a;
}

//******************************************************************************************************************************************
/*
function setFirstDay($a){
	foreach(array_keys($this->lang) as $k){if($k!="current"){
		$t1=array();
		$t2=array();
		$t3=array();
		for($i=0,$j=$a-1;$i<7;$i++,$j++){
			if($j>6){
				$j=0;
			}
			$t1[]=$this->lang[$k][dayName][$j];
			$t2[]=$this->lang[$k][dayNameSmall][$j];
			$t3[]=$this->lang[$k][dayNameChar][$j];
		}
		$this->lang[$k][dayName]=$t1;
		$this->lang[$k][dayNameSmall]=$t2;
		$this->lang[$k][dayNameChar]=$t3;
	}}
}
*/
function setFirstDay($a){
	if(is_numeric($a)){
		while($a>=7)$a-=7;
		while($a<=-7)$a+=7;
		$this->lang[firstDay]=$a;
	}else return false;
}
//******************************************************************************************************************************************

function getLangElement(){
	$lang=$this->lang["current"];
	$args=func_get_args();
	$format=$args[0];
	if(substr($format,0,3)=="day"){
		$i=$args[1]+($this->lang["firstDay"])+((func_num_args()>2)?$args[2]:0);
		while($i>=7)$i-=7;
		while($i<=-7)$i+=7;
	}else{
		$i=$args[1]-1;
		while($i>=12)$i-=12;
		while($i<=-12)$i+=12;
	}
	return $this->lang[$lang][$format][$i];
}

//******************************************************************************************************************************************

function today(){
	$args=func_get_args();
	if(func_num_args()>0){
		if(!is_numeric($args[0])){
			switch($args[0]){
				case"dayName":
				case"dayNameSmall":
				case"dayNameChar":
					return $this->lang[$this->lang["current"]][$args[0]][date("w",$this->now)];
				break;
				case"monthName":
				case"monthNameSmall":
				case"monthNameChar":
					return $this->lang[$this->lang["current"]][$args[0]][date("n",$this->now)];
				break;
				case"dayNum":	return date("w",$this->now);	break;
				case"day":		return date("d",$this->now);	break;
				case"month":	return date("m",$this->now);	break;
				case"year":		return date("y",$this->now);	break;
				case"yearFull":	return date("Y",$this->now);	break;
				default:		return false;					break;
			}
		}else{
			return $this->lang[$this->lang["current"]][$args[0]][date("w",$this->now)];
		}
	}else{
		switch($this->lang["current"]){
			case"en":	return date("Y-m-d",$this->now);	break;
			case"it":
			default:
				return date("d-m-Y",$this->now);
			break;
		}
	}
}

//******************************************************************************************************************************************

function now(){
	$args=func_get_args();
	switch($args[0]){
		case"en":	return date("H:i:s",$this->now);	break;
		case"it":
		default:
			return date("H:i:s",$this->now);
		break;
	}
}

//******************************************************************************************************************************************

function data2date($a){
	if(strlen($a)!=10){
		echo"ERRORE: Formato data errato";
	}else{
		return mktime(0,0,0,substr($a,3,2),substr($a,0,2),substr($a,6,4));
	}
}

//******************************************************************************************************************************************

function timestamp2date($a){
	if(strlen($a)!=14){
		echo"ERRORE: Formato data errato";
	}else{
		return mktime(substr($a,8,2),substr($a,10,2),substr($a,12,2),substr($a,4,2),substr($a,6,2),substr($a,0,4));
	}
}

//*************************************************************************************************************************

function reverse($a){
	for($i=0;$i<strlen($a);$i++){
		$t=substr($a,$i,1);
		if(!is_numeric($t)){
			$i=$t;
			break;
		}
	}
	if(is_numeric($i)){
		echo"Separatore non trovato";
	}else{
		$result=explode($i,$a);
		if(count($result)!=3){
			echo"Errore nei separatori";
		}else{
			$result=implode($i,array_reverse(explode($i,$a)));
			return $result;
		}
	}
}

//*************************************************************************************************************************

function diff($a,$b){
	$a=explode("-",$a);
	$b=explode("-",$b);
	if( checkdate($a[1],$a[0],$a[2]) && checkdate($b[1],$b[0],$b[2]) ){
		$a=mktime(0,0,0,$a[1],$a[0],$a[2]);
		$b=mktime(0,0,0,$b[1],$b[0],$b[2]);
		return ceil(($b-$a)/86400);
	}else{
		echo"ERRORE: Data inesistente";
	}
}

//*************************************************************************************************************************

function add($a,$b){
	$a=explode("-",$a);
	if( checkdate($a[1],$a[0],$a[2]) ){
		$c=strftime("%d-%m-%Y", strtotime($a[2]."-".$a[1]."-".$a[0]." ".(($b>=0)?"+":"")."$b days"));
		return $c;
	}else{
		echo"ERRORE: Data inesistente";
	}
}

//*************************************************************************************************************************

function sub($a,$b){
	return $this->add($a,$b*-1);
}

//*************************************************************************************************************************

function hasExpired($a){
	$a=explode("-",$a);
	if( checkdate($a[1]*1,$a[0]*1,$a[2]) ){
		$a=implode("",array_reverse($a))*1;
		$b=date("Ymd")*1;
		if($a<$b)return true;
		else return false;
	}
}

//*************************************************************************************************************************

function exists($a){
	$a=explode("-",$a);
	if( checkdate($a[1]*1,$a[0]*1,$a[2]) )return true;
	else return false;
}

//*************************************************************************************************************************

function getCalendarMonth($a,$b){
	$result=array();
	$paz=mktime(0,0,0,$a,1,$b);
	$gg=date("t",$paz);
	$start=false;
	$g=1;
	$firstDay=date("w",mktime(0,0,0,$a,1,$b));
	$firstDay=$firstDay-$this->lang["firstDay"];
	while($firstDay>=7)$firstDay-=7;
	while($firstDay<0)$firstDay+=7;
	for($week=0;$week<6;$week++){
		for($i=0;$i<7;$i++){
			if ( $firstDay == $i && $week==0 )$start=true;
			if ($start && $g<=$gg){
				$result[$week][]=$g;
				$g++;
			}else{
				$result[$week][]="";
			}
		}
		if($g>$gg)break;
	}
	return $result;
}

//*************************************************************************************************************************

function drawCalendarMonth(){
	$args=func_get_args();
	$calendarMonth=$args[0];
	if(isset($args[1]))$selected=$args[1]*1;
	if(isset($args[2]))$month=$args[2]*1;
	if(isset($args[3]))$year=$args[3]*1;
	$c="<table border=0 cellpadding=2 cellspacing=0 id=\"monthCalendar\">\n";
	if(isset($month)){
		$c.="<tr><th colspan=\"7\" class=\"month\">";
		$c.=$this->lang[$this->lang["current"]]["monthName"][$month-1];
		if(isset($year))$c.=" ".$year;
		$c.="</th></tr>";
	}
	$c.="<tr>";
	$firstDay=($this->lang["firstDay"]>0)?$this->lang["firstDay"]:7;
	for($i=0;$i<7;$i++){
		$j=$firstDay+$i;
		if($j>=7)$j-=7;
		$c.="<th>".($this->lang[$this->lang["current"]]["dayNameChar"][$j])."</th>";
	}
	$c.="</tr>\n";
	foreach($calendarMonth as $row){
		$c.="<tr align=\"center\">";
		foreach($row as $cell){
			$day=strip_tags($cell);
			if($cell==""){
				$c.="<td class=\"empty\">&nbsp;</td>";
			}else{
				$c.="<td";
				if($day==$selected){
					if(is_numeric($cell))$c.=" id=\"sel\"";
					else $c.=" id=\"linksel\"";
				}else if(!is_numeric($cell))$c.=" id=\"link\"";
				$c.=">".$cell."</td>";
			}
		}
		$c.="</tr>\n";
	}
	$c.="</table>";
	return $c;
}

//*************************************************************************************************************************

function zerofill($a){
	$args=func_get_arg();
	if(func_num_args()>1){
		$result=sprintf("%0".$args[1]."d",$a*1);
	}else{
		$result=sprintf("%02d",$a*1);
	}
	return $result;
}

//*************************************************************************************************************************

function nums2str($a,$b,$c){
	$result=sprintf("%02d",$a)."-".sprintf("%02d",$b)."-".sprintf("%04d",$c);
	return $result;
}

//*************************************************************************************************************************

function str2nums($a){
	$result=explode("-",$a);
	$result[0]=$this->sprintf("%02d",$result[0]*1);
	$result[1]=$this->sprintf("%02d",$result[1]*1);
	$result[2]=$this->sprintf("%04d",$result[2]*1);
	return $result;
}

//*************************************************************************************************************************

function addMonths($date,$q){
	$date=split("-",$date);
	$y=$date[2];
	$m=$date[1]+$q;
	$d=$date[0];
	while($m>12){
		$m-=12;
		$y++;
	}
	while($m<1){
		$m+=12;
		$y--;
	}
	$t=mktime(0,0,0,$m,$d,$y);
	while( date("m",$t)>$m ){
		$t=$this->sub(date("d-m-Y",$t),1);
		$date=split("-",$t);
		$yy=$date[2];
		$mm=$date[1];
		$dd=$date[0];
		$t=mktime(0,0,0,$mm,$dd,$yy);
	}
	return date("d-m-Y",$t);
}

//*************************************************************************************************************************

function subMonths($date,$q){
	return $this->addMonths($date,$q*-1);
}

//*************************************************************************************************************************

function drawSelect($type,$selectedValue,$properties){
	$result="<select".(($properties!="")?" ".$properties:"").">\n";
	switch($type){
		case"dayName":// giorno della settimana, esteso (es: Lunedì)
		case"dayNameSmall":// giorno della settimana, contratto (es: Lun)
		case"dayNameChar":// giorno della settimana, prima lettera (es: L)
			$texts=$this->lang[$this->lang["current"]]["dayNameChar"];
			$values=array(0,1,2,3,4,5,6);
			if($selectedValue=="")$selectedValue=$this->today("dayNum");
		break;
		case"monthName":// mese, esteso (es: Gennaio)
		case"monthNameSmall":// mese, contratto (es: Gen)
		case"monthNameChar":// mese, prima lettera (es: G)
			$texts=$this->lang[$this->lang["current"]][$type];
			$values=array("01","02","03","04","05","06","07","08","09","10","11","12");
			if($selectedValue=="")$selectedValue=$this->today("month");
		break;
		case"day":// giorno, numero zerofill (es: "01")
			$texts=array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
			$values=$texts;
			if($selectedValue=="")$selectedValue=$this->today("day");
		break;
		case"month":// mese, numero zerofill (es: "01")
			$texts=array("01","02","03","04","05","06","07","08","09","10","11","12");
			$values=$texts;
			if($selectedValue=="")$selectedValue=$this->today("month");
		break;
		case"year":// anno, 2 cifre zerofill (es: "06")
			if($selectedValue=="")$selectedValue=$this->today("year");
		case"yearFull":// anno, 4 cifre zerofill (es: "2006")
			if($selectedValue=="")$selectedValue=$this->today("yearFull");
			$texts=array();
			$values=array();
			if($type=="year"){
				$y=$this->today("year");
				$f="%02d";
			}else{
				$y=$this->today("yearFull");
				$f="%04d";
			}
			for($i=$y-50;$i<$y+50;$i++){
				$j=$i;
				if($type=="year"){
					while( $j < 0 )$j+=100;
					while( $j >= 100 )$j-=100;
				}
				$texts[]=sprintf($f,$j);
				$values[]=sprintf($f,$j);
			}
		break;
		case 1:case 2:case 3:case 4:case 5:case 6:case 7:case 8:case 9:case 10:case 11:case 12:
			$values=array();
			$texts=array();
			$d=mktime(0,0,0,$type,1,2000);
			$d=date("t",$d);
			if($d<29)$d=29;
			for($i=1;$i<=$d;$i++){
				$texts[]=$i;
				$values[]=$i;
			}
		break;
		case "H":
			if($selectedValue=="")$selectedValue=date($type,$this->now);
			$values=array();
			for($i=0;$i<24;$i++){
				$values[]=sprintf("%02d",$i);
			}
			$texts=$values;
		break;
		case "i":case "s":
			if($selectedValue=="")$selectedValue=date($type,$this->now);
			$values=array();
			for($i=0;$i<60;$i++){
				$values[]=sprintf("%02d",$i);
			}
			$texts=$values;
		break;
	}
	$t=count($values);
	if($selectedValue=="")$selectedValue=$this->today($type);
	for($i=0;$i<$t;$i++){
		$result.="<option value=\"".$values[$i]."\"".(($values[$i]==$selectedValue)?" selected":"").">".$texts[$i]."\n";
	}
	$result.="</select>";
	return $result;
}

//*************************************************************************************************************************

function adjust($q){
	$this->now+=$q;
}

//*************************************************************************************************************************

}

//$D=new jureDate();
//$D->adjust(60*60*24);
//echo $D->addMonths("31-12-2004",2);
//$D->today();
//$D->setFirstDay(0);
//$D->setLang("en");
//echo $D->getLangElement("dayName",6);
//echo"<br />";
//echo $D->getLangElement("monthName",6);
//echo"<br />";
//echo"<xmp>";
//print_r($D->getCalendarMonth(9,2004));
//echo"</xmp>";
//echo $D->drawSelect("day","","");
//echo $D->drawCalendarMonth($D->getCalendarMonth(8,2004),5);
//echo $D->add("30-10-2004",5);
//echo"<br>";
//echo "30-03-2004 - 5 = ".$D->sub("30-03-2004",5);
//echo"<br>";
//echo "15-08-2004 - 5 = ".$D->sub("15-08-2004",5);
//echo"<br>";
//echo "04-11-2004 - 5 = ".$D->sub("04-11-2004",5);
?>