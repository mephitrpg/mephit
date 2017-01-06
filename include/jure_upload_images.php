<?php
// NOTE: required PHP 4.2.0 cause of $_FILES[x][error] handling;

class jure_upload{
	var $k,$files,$method,$gd;
	function jure_upload(/* [,noreplace] [,replace] [,rename] [,unique] */){
		$this->gd=function_exists('gd_info') && function_exists('imagesize');
		if(func_num_args()>0){
			for($i=0;$i<func_num_args();$i++){
				switch(func_get_arg($i)){
					case"noreplace":
					case"replace":
					case"rename":
					case"unique":
						$this->method=func_get_arg($i);
					break;
					default:
						$this->method="rename";
					break;
				}
				break;	//temporary break, remove if add new parameters
			}
		}else{
			$this->method="rename";
		}
		$this->files=array();
		$this->k=0;
	}
	function allow($q){
		if(!isset($this->files[$this->k][allow]))$this->files[$this->k][allow]=array();
		for($i=0;$i<count($q);$i++){
			switch($q){
				case"images_all":
					$this->files[$this->k][allow][]="bmp";	$this->files[$this->k][allow][]="tif";
					$this->files[$this->k][allow][]="tga";	$this->files[$this->k][allow][]="jpeg";
				case"images":
					$this->files[$this->k][allow][]="gif";	$this->files[$this->k][allow][]="jpg";
					$this->files[$this->k][allow][]="jpe";	$this->files[$this->k][allow][]="png";
				break;
				case"docs_all":
					$this->files[$this->k][allow][]="htm";	$this->files[$this->k][allow][]="html";
				case"docs":
					$this->files[$this->k][allow][]="doc";	$this->files[$this->k][allow][]="xls";
					$this->files[$this->k][allow][]="ppt";	$this->files[$this->k][allow][]="pdf";
					$this->files[$this->k][allow][]="rtf";	$this->files[$this->k][allow][]="txt";
				break;
				case"archives_all":
					$this->files[$this->k][allow][]="tar";	$this->files[$this->k][allow][]="gz";
					$this->files[$this->k][allow][]="sit";
				case"archives":
					$this->files[$this->k][allow][]="zip";	$this->files[$this->k][allow][]="rar";
					$this->files[$this->k][allow][]="lha";
				break;
				case"video_all":
					$this->files[$this->k][allow][]="swf";
				case"video":
					$this->files[$this->k][allow][]="rm";	$this->files[$this->k][allow][]="avi";
					$this->files[$this->k][allow][]="mov";	$this->files[$this->k][allow][]="mpg";
					$this->files[$this->k][allow][]="wmv";
				break;
				case"audio_all":
					$this->files[$this->k][allow][]="wav";
				case"audio":
					$this->files[$this->k][allow][]="mp3";	$this->files[$this->k][allow][]="ra";
					$this->files[$this->k][allow][]="wma";
				break;
				default:
					$this->files[$this->k][allow][]=$q;
				break;
			}
		}
		$this->files[$this->k][allow]=array_unique($this->files[$this->k][allow]);
	}
	function getSupportedImageTypes(){
		$aSupportedTypes = array();
		$aPossibleImageTypeBits = array("IMG_GIF","IMG_JPG","IMG_PNG", "IMG_WBMP");
		foreach ($aPossibleImageTypeBits as $iIndex => $sImageTypeBits) {
			$sEval  = "if (";
			$sEval .= "imagetypes() & " . $sImageTypeBits . "";
			$sEval .= ") { return TRUE; } else { return FALSE; }";
			if (eval($sEval)) {
				$aSupportedTypes[] = str_replace("IMG_", "", $sImageTypeBits);
			}
		}
		return $aSupportedTypes;
	}
	function addFile($fieldName,$uploadPath/*[, allow] [, empty_error]*/){
		// if you're using the "array name" trick to have all posted files in an array, add only the "array name"
		// Example: if you're using <input type="file" name="userfile[]">, use addFile("userfile",$uploadPath)
		// If the option "empty_error" is not provided, the UPLOAD_ERR_NO_FILE (#4) error is not considered an error.
		$args=func_get_args();
		if( isset($_FILES[$fieldName]) ){
			$allow_empty=!in_array("empty_error",$args);
			if(is_array($_FILES[$fieldName][name])){
				for($i=0;$i<count($_FILES[$fieldName][name]);$i++){
					$allow_empty=!( ($_FILES[$fieldName][error][$i]==4) && $allow_empty );
					if( $allow_empty || $_FILES[$fieldName][error][$i]==0 ){
						$size=($this->gd)?getimagesize($_FILES[$fieldName][tmp_name][$i]):array(0,0,0,"");
						$this->files[$this->k]=array(
							"name"=>stripslashes($_FILES[$fieldName][name][$i]),
							"type"=>(function_exists('image_type_to_extension'))?image_type_to_extension($size[2]):$this->getExt($_FILES[$fieldName][name][$i]),
							"mime"=>$_FILES[$fieldName][type][$i],
							"size"=>$_FILES[$fieldName][size][$i],
							"tmp_name"=>$_FILES[$fieldName][tmp_name][$i],
							"error"=>$_FILES[$fieldName][error][$i],
							"upPath"=>$uploadPath,
							"upped"=>false,
							"uppedName"=>"",
							"upMessage"=>"",
							"ignore_empty"=>false,
							"width"=>$size[0],
							"height"=>$size[1]
						);
						if(func_num_args()>2){
							for($j=2;$j<func_num_args();$j++){
								switch(func_get_arg($j)){
									case"ignore_empty":
										$this->files[$this->k][ignore_empty]=true;
									break;
									default:
										$this->allow(func_get_arg(2));
									break;
								}
							}
						}
						$this->k++;
					}
				}
			}else{
				$allow_empty=!( ($_FILES[$fieldName][error]==4) && $allow_empty );
				if( $allow_empty || $_FILES[$fieldName][error]==0 ){
					$this->files[$this->k]=$_FILES[$fieldName];
					if(ini_get('magic_quotes_gpc'))$this->files[$this->k][name]=stripslashes($this->files[$this->k][name]);
					$this->files[$this->k]=array_merge(
						$this->files[$this->k],
						array(
							"upPath"=>$uploadPath,
							"upped"=>false,
							"upMessage"=>"",
							"ignore_empty"=>false,
							"x"=>$size[0],
							"y"=>$size[1]
						)
					);
					if(func_num_args()>2){
						for($j=2;$j<func_num_args();$j++){
							switch(func_get_arg($j)){
								case"ignore_empty":
									$this->files[$this->k][ignore_empty]=true;
								break;
								default:
									$this->allow(func_get_arg(2));
								break;
							}
						}
					}
					$this->k++;
				}
			}
		}else{
			echo"<p>ERRORE: la variabile \$_FILES[".$fieldName."] non è definita.<xmp>".print_r($_FILES)."</xmp></p>";
		}
	}
	function getExt($q){
		if(trim($q)!="")return strtolower(substr($q,strrpos($q,".")+1,strlen($q)-strrpos($q,".")-1));
		return "";
	}
	function upload(){
		for($i=0;$i<count($this->files);$i++){
			// $_FILES[x][error] added in PHP 4.2.0
			if($this->files[$i][error]==0){
				if(is_uploaded_file($this->files[$i][tmp_name])){

					$ext=$this->getExt($this->files[$i][name]);
					if((isset($this->files[$i][allow]))?$valid=in_array($ext,$this->files[$i][allow]):true){
						$file=$this->files[$i][upPath]."/".$this->files[$i][name];
						$renamed=(file_exists($file)&&$this->method=="rename");
						if(!file_exists($file)){
							switch($this->method){
								case"unique":
									$valid=true;
									$handle=opendir($this->files[$i][upPath]);
									while($f = readdir($handle)){if(!is_dir($f)){
										$perms=substr(sprintf('%o', fileperms($this->files[$i][upPath]."/".$f)), -4);
										if($perms!="0777"){
											chmod($this->files[$i][upPath]."/".$f,0777);
										}
										unlink($this->files[$i][upPath]."/".$f);
									}}
								break;
								default:
									$valid=true;
								break;
							}
						}else{
							switch($this->method){
								case"unique":
									$valid=true;
									$handle=opendir($this->files[$i][upPath]);
									while($f = readdir($handle)){if(!is_dir($f)){
										$perms=substr(sprintf('%o', fileperms($this->files[$i][upPath]."/".$f)), -4);
										if($perms!="0777"){
											chmod($this->files[$i][upPath]."/".$f,0777);
										}
										unlink($this->files[$i][upPath]."/".$f);
									}}
								break;
								case"replace":
									$valid=true;
									@chmod($file,0777);
									@unlink($file);
								break;
								case"noreplace":
									$valid=false;
									$this->files[$i][upMessage]="ERRORE: Esiste già un file con lo stesso nome.";
								break;
								case"rename":
									$valid=true;
									$j=0;
									while(file_exists($file)){
										$file=explode(".",$file);
										preg_match_all('/\(\d+\)$/',$file[count($file)-2],$matches);
										if(count($matches[0])>0){
											$t=str_replace("(","",$matches[0][0]);
											$t=str_replace(")","",$t);
											$t++;
											$file[count($file)-2]=preg_replace('/\(\d+\)$/','('.$t.')',$file[count($file)-2]);
											$file=implode(".",$file);
										}else{
											$file[count($file)-2].="(1)";
											$file=implode(".",$file);
										}
									}
								break;
							}
						}
						if($valid){
							if(move_uploaded_file($this->files[$i][tmp_name],$file)){
								@chmod($file,0777);
								$this->files[$i][upMessage]="Upload eseguito con successo.";
								if($renamed)$this->files[$i][upMessage].=" Il file &#34;".basename($this->files[$i][name])."&#34; è stato salvato come &#34;".basename($file)."&#34;";
								$this->files[$i][upped]=true;
								$this->files[$i][uppedName]=$file;
							}else $this->files[$i][upMessage]="ERRORE: Copia del file nel server non riuscita.";
						}// there's no ELSE because it's managed in the "$valid" definition
					}else $this->files[$i][upMessage]="ERRORE: E' permesso soltanto l'upload dei seguenti tipi di file: ".implode(", ",$this->files[$i][allow]);
				}else $this->files[$i][upMessage]="ERRORE: Cambiare il nome del file.";
			}else{
				// added in PHP 4.2.0
				switch($this->files[$i][error]){
					case 1:
						// UPLOAD_ERR_INI_SIZE
						// The uploaded file exceeds the upload_max_filesize directive in php.ini.
						$this->files[$i][upMessage]="ERRORE: Il server accetta files di dimensione massima pari a ".ini_get("upload_max_filesize")."";
					break;
					case 2:
						// UPLOAD_ERR_FORM_SIZE
						// The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.
						$this->files[$i][upMessage]="ERRORE: La dimensione massima del file è ".$_POST["MAX_FILE_SIZE"]."";
					break;
					case 3:
						// UPLOAD_ERR_PARTIAL
						// The uploaded file was only partially uploaded
						$this->files[$i][upMessage]="ERRORE: Upload eseguito parzialmente.";
					break;
					case 4:
						// UPLOAD_ERR_NO_FILE
						// No file was uploaded
						$this->files[$i][upMessage]="ERRORE: Nessun file selezionato.";
					break;
					case 4:
						// UPLOAD_ERR_NO_TMP_DIR
						// Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3. 
						$this->files[$i][upMessage]="ERRORE: Il server non dispone di una cartella temporanea.";
					break;
					default:
						
						$this->files[$i][upMessage]="ERRORE: Errore generico.";
					break;
				}
			}
		}
	}
	function isValid(){
		if(count($this->files)==0)return false;
		foreach($this->files as $f){
			if(!$f[upped]){
				return false;
			}
		}
		return true;
	}
	function showResult(){
		if($this->isValid())return "Upload eseguito con successo.";
		else return "ERRORE: Si sono verificati degli errori durante l'upload.";
	}
	function showResultDetails(/* [, errors] [, valids] */){
		if(count($this->files)>0){
			$result="<ol>\n";
			if(func_num_args>0){
				switch(func_get_arg(0)){
					case"errors":
						foreach($this->files as $f){
							if(!$f[upped])$result.="<li>".$f[upMessage]."</li>\n";
							else $result.="<li style=\"display:none;\" />\n";
						}
					break;
					case"valids":
						foreach($this->files as $f){
							if($f[upped])$result.="<li>".$f[upMessage]."</li>\n";
							else $result.="<li style=\"display:none;\" />\n";
						}
					break;
					default:
						foreach($this->files as $f)$result.="<li>".$f[upMessage]."</li>\n";
					break;
				}
			}else{
				foreach($this->files as $f)$result.="<li>".$f[upMessage]."</li>\n";
			}
			$result.="</ol>\n";
		}
		return $result;
	}
	function printFiled($q){
		switch($q){
			case"MAX_FILE_SIZE":
				if(func_num_args()>1){
					$maxSize=htmlspecialchars(addslashes(strtoupper(trim(func_get_arg(1)))));
					if(!preg_match('/^\d+[KMG]{0,1}$/',$maxSize))$maxSize=strtoupper(ini_get("upload_max_filesize"));
				}else{
					$maxSize=strtoupper(ini_get("upload_max_filesize"));
				}
				$maxSize=$this->convert2bytes($maxSize);
				return '<input type="hidden" name="MAX_FILE_SIZE" value="'.$maxSize.'" />';
			break;
		}
	}
	function convert2bytes($q){
		if(strpos($q,"K")!==false){
			$q=str_replace("K","",$q);
			$q*=1024;
		}else if(strpos($q,"M")!==false){
			$q=str_replace("M","",$q);
			$q*=1024*1024;
		}else if(strpos($q,"G")!==false){
			$q=str_replace("G","",$q);
			$q*=1024*1024*1024;
		}
		return $q;
	}
}
?>