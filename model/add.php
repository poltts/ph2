<?php
ini_set('file_uploads', 'on');

$products = new Products;


if(count($_POST) !== 0){
	if(count($_FILES !== 0)){
		
		$name        = serialize(escape_input($_POST['product_name']));
		$description = serialize(escape_input($_POST['product_description']));
		$price       = escape_input($_POST['product_price']);
		$active      = escape_input($_POST['ativo']);
		$image      = upload_images(dirname(__DIR__) . '/public/uploads/', $_FILES, md5($name) );
 
		
		try {
			$products->add($name, $description, $price, $active, $image);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
}


include dirname(__DIR__) . '/views/add_products.php';

?>