<?php
$products = new Products;
$id = urldecode($_GET['pd']);
$data = $products->list_products($id);


if(count($_POST) !== 0){
	
		$dir = dirname(__DIR__) . '/public/uploads/';

		
		$name        = escape_input($_POST['product_name']);
		$description = escape_input($_POST['product_description']);
		$price       = escape_input($_POST['product_price']);
		$active      = escape_input($_POST['ativo']);

		if(file_exists($dir.$_FILES['product_images']['name'])){
			$image = $data[0]['images'];
		}else{
			$up_img = upload_images(dirname(__DIR__) . '/public/uploads/', $_FILES, md5($name) );
			$image = $up_img;
		}
		
		try {
			$products->edit($id,$name, $description, $price, $active, $image);
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	
}

include dirname(__DIR__) . '/views/edit_products.php';

?>