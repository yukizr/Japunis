<?php
class SENE_Uploader_Wide_Image {
	public function upload($loc,$ident,$id){
		include(SENELIB.'/wideimage/WideImage.php');
		if($_FILES[$ident]['error'] > 0){
			//exit('File error');
			return 0;
		}else{

			$file_name = $_FILES[$ident]['name'];
			$extension = explode(".",$file_name);
			$extension = end($extension);
			$img_name = strtolower($id.'.'.$extension);

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

				move_uploaded_file($_FILES[$ident]["assets"],$path);

				if(strtolower($extension) != "jpg"){

					$base = WideImage::load($path);
					$img_name = $id.'.jpg';

					$base->saveToFile($loc."/".$img_name);

					if (file_exists($path)){
						//die($path);
						$res = unlink($path);
						//var_dump($res);

					}
				}else{
					//die('extension jpg g usah didelet');
				}
				return strtolower($img_name);
			}
		}
	}
}
