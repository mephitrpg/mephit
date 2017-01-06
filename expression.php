<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
</head>

<body>
<?php
function xmp($q){
	echo'<xmp>';
	if(is_array($q))print_r($q);
	else if(is_bool($q))var_dump($q);
	else echo $q;
	echo'</xmp>';
}
function expression($s){
	$nobrachets=parseBrachets($s);
	if(is_array($nobrachets)&&array_key_exists('error',$nobrachets))return $nobrachets;
	return simpleExpression($nobrachets);
}
function parseBrachets($s){
	$expression=$s;
	$result=array();
	$debug=0;
	$lastOpenBrachet=strrpos($expression,"(");
	while($lastOpenBrachet!==false){
		$beforeLastOpenBrachet=substr($expression,0,$lastOpenBrachet);
		$afterLastOpenBrachet=substr($expression,$lastOpenBrachet+1,strlen($expression)-$lastOpenBrachet-1);
		$closeBrachet=strpos($afterLastOpenBrachet,")");
		
		if($closeBrachet===false)return array('error'=>'brachets does not match');
		$inLastBrachet=substr($afterLastOpenBrachet,0,$closeBrachet);
		$afterCloseBrachet=substr($afterLastOpenBrachet,$closeBrachet+1,strlen($afterLastOpenBrachet)-$closeBrachet);
		
		$times=is_numeric($beforeLastOpenBrachet[strlen($beforeLastOpenBrachet)-1])?"*":"";
		
		$expression=$beforeLastOpenBrachet.$times.simpleExpression($inLastBrachet).$afterCloseBrachet;
		
		$lastOpenBrachet=strrpos($expression,"(");
		$debug++;
		if($debug>=5)break;
	}
	return $expression;
}
function simpleExpression($s){
	
	$firstChar=substr($s,0,1);
	if($firstChar=="-")$s="0".$s;
	
	$s1=explode("+",$s);
	
	for($a=0;$a<count($s1);$a++){
		$s2=$s1[$a];
		if(!is_numeric($s2)){
			$s2=explode("-",$s2);
			for($b=0;$b<count($s2);$b++){
				$s3=$s2[$b];
				if(!is_numeric($s3)){
					$s3=explode("*",$s3);
					for($c=0;$c<count($s3);$c++){
						$s4=$s3[$c];
						if(!is_numeric($s4)){
							$s4=explode("/",$s4);
							
							$s3[$c]=$s4;
						}
					}
					$s2[$b]=$s3;
				}
			}
			$s1[$a]=$s2;
		}
	}
	
	// divisioni
	
	for($a=0;$a<count($s1);$a++){
		$s2=$s1[$a];
		if(!is_numeric($s2)){
			for($b=0;$b<count($s2);$b++){
				$s3=$s2[$b];
				if(!is_numeric($s3)){
					for($c=0;$c<count($s3);$c++){
						$s4=$s3[$c];
						if(!is_numeric($s4)){
							$result="start";
							for($d=0;$d<count($s4);$d++){
								$s5=$s4[$d];
								if($s5==0&&$result!=="start")return array('error'=>'divided by zero');
								if($result==="start")$result=$s5;
								else $result/=$s5;
							}
							if(isset($s1[$a][$b][$c]))$s1[$a][$b][$c]=$result;
						}
					}
				}
			}
		}
	}
	
	// moltiplicazioni
	
	for($a=0;$a<count($s1);$a++){
		$s2=$s1[$a];
		if(!is_numeric($s2)){
			for($b=0;$b<count($s2);$b++){
				$s3=$s2[$b];
				if(!is_numeric($s3)){
					$result="start";
					for($c=0;$c<count($s3);$c++){
						$s4=$s3[$c];
						if($result==="start")$result=$s4;
						else $result*=$s4;
						if(isset($s1[$a][$b]))$s1[$a][$b]=$result;
					}
				}
			}
		}
	}
	
	// sottrazioni
	
	for($a=0;$a<count($s1);$a++){
		$s2=$s1[$a];
		if(!is_numeric($s2)){
			$result="start";
			for($b=0;$b<count($s2);$b++){
				$s3=$s2[$b];
				if($result==="start")$result=$s3;
				else $result-=$s3;
				if(isset($s1[$a]))$s1[$a]=$result;
			}
		}
	}
	
	// addizzioni
	
	$result="start";
	for($a=0;$a<count($s1);$a++){
		$s2=$s1[$a];
		if($result==="start")$result=$s2;
		else $result+=$s2;
	}
	$s1=$result;
	
	// return
	
	return $s1;
	
}

$e="-3(2*5/(3+2))+((5/9-5/9)*8(5/6))+2";
echo "<div>Espressione: ".$e." = ".expression($e)."</div>";

?>

</body>
</html>
