<?php

function upload_images($dir = null, $image = array(), $newName = null)
{
	// $dir = "public/uploads/";
	// var_dump($image);
	if($image["product_images"]['error'] == 0){
		$imageName = $dir . basename($image["product_images"]["name"]); 
		$imageTmp = $image["product_images"]["tmp_name"]; 
		$imageType = $image["product_images"]["type"]; 
		$imageSize = $image["product_images"]["size"]; 
		$imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
		$newImage = $dir . $newName . '.' . $imageExt;

			if($imageType != "image/jpg" && $imageType != "image/png" && $imageType != "image/jpeg" ) {

			    echo "A imagem do produto precisa ser um dos tipos: jpg, jpeg ou png. Cadastro nao enviado!";
			    return false;

			}else{

				if ($imageSize > 500000) {

				    echo "A imagem enviada é muito grande, o tamanho permitdo é de até 2mb.";
				    return false;

				}else{
					
						$img = move_uploaded_file($imageTmp, $newImage);
					    if ($img) {
					        return $newImage;
					    } else {
					       return false;
						}
					
				}

			}
		
	
	}
}

function escape_input($input = null){
	return strip_tags(addslashes($input));
}

?>