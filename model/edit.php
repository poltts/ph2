<?php
$products = new Products;
$id       = urldecode($_GET['pd']);
$data     = $products->list_products($id);


if(count($_POST) !== 0){ 
		
		$name        = serialize(escape_input($_POST['product_name']));
		$description = serialize(escape_input($_POST['product_description']));
		$price       = escape_input($_POST['product_price']);
		$active      = $_POST['ativo']; 
 
		if($_FILES['product_images']['name']){		
			unlink(dirname(__DIR__) . '/public/uploads/'.$data[0]['images']);	
			$up_img      = upload_images(dirname(__DIR__) . '/public/uploads/', $_FILES, md5($name) );
			$image       = $up_img;
		}else{
			$image       = $$data[0]['images'];
		}
		
		try {
			$products->edit($id,$name, $description, $price, $active, $image);
			$data     = $products->list_products($id);
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	
}

include dirname(__DIR__) . '/views/edit_products.php';

?>