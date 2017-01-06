<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?php
include"../config.php";

$query="SHOW FIELDS FROM mephit_personaggio";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	
	echo"<xmp>";
	if($row["Null"])echo $row["Field"]." is <i>NULL</i>";
	//print_r($row);
	echo"</xmp>";
}
?>


</body>
</html>
