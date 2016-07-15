<?php
$products = new Products;

$id = urldecode($_GET['pd']);
$products->remove($id);

?>