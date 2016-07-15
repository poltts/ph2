<?php

$products = new Products;
if($action == "delete"){

	$id = urldecode($_GET['pd']);
	$products->remove($id);

}else{ 
	
	$products->$action();

}

?>