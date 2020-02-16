<?php
class SENE_Uploader {
	public function Upload($loc,$ident,$id){
		include(SENELIB.'/wideimage/WideImage.php');
		if(isset($_FILES[$ident])){
			if($_FILES[$ident]['error'] > 0){
				//exit('File error');
				return 0;
			}else{

				$filename = $_FILES[$ident]['name'];
				$extension = explode(".",$filename);
				$extension = end($extension);
				// $img_name = strtolower($id.'.'.$extension);
				$acak     = rand(000000,999999);
				$img_name = strtolower($acak.'.'.$extension);

				if ($_FILES[$ident]["error"] > 0){
					//exit("Error : " . $_FILES["thumb"]["error"] . "<br>");
					return 0;
				}else{

					$path = $loc."/".$img_name;
					if (file_exists($path)){
						$res = unlink($path);
						//var_dump($res);
						//die('kedelete bos');
					}

					move_uploaded_file($_FILES[$ident]["tmp_name"],$path);

					if(strtolower($extension) != "jpg"){

						$base = WideImage::load($path);
						$acak     = rand(000000,999999);
						// $img_name = $id.'.jpg';
						$img_name = $acak.'.jpg';

						$base->saveToFile($loc."/".$img_name);

					}else{
						//die('extension jpg g usah didelet');
					}
					return strtolower($img_name);
				}
			}
		}else{
			return 0;
		}
	}
	public function Delete(){
		if (condition) {
			# code...
		}else {
			return 0;
		}
	}
}
