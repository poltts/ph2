<?php

function upload_images($dir = null, $image = array(), $newName = null)
{
	// var_dump($image);
	if($image["product_images"]['error'] == 0){
		$imageName = $dir . basename($image["product_images"]["name"]); 
		$imageTmp  = $image["product_images"]["tmp_name"]; 
		$imageType = $image["product_images"]["type"]; 
		$imageSize = $image["product_images"]["size"]; 
		$imageExt  = pathinfo($imageName, PATHINFO_EXTENSION);
		$newImage  = $dir . $newName . '.' . $imageExt;

			if($imageType != "image/jpg" && $imageType != "image/png" && $imageType != "image/jpeg" ) {

			    echo "A imagem do produto precisa ser um dos tipos: jpg, jpeg ou png. Cadastro nao enviado!";
			    return false;

			}else{

				if ($imageSize > 500000) {

				    echo "A imagem enviada é muito grande.";
				    return false;

				}else{
					 try {
						move_uploaded_file($imageTmp, $newImage);
					        return $newName . '.' . $imageExt;
							
						} catch (Exception $e) {
							echo $e->getMessage();
						}
					}
					
				}

			}
		
	
	
}

function escape_input($input = null){
	return strip_tags(addslashes($input));
}

?>