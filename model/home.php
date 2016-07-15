<?php
$products = new Products;

if($action !== 'delete'){
	$products->$action();
}else{
  $id = urldecode($_GET['pd']);
  $products->delete($id);
}
?>