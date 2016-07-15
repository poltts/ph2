<?php

 require_once '/controller/products.class.php'; 
 require_once 'functions.php';

$page   = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['actions']) ? $_GET['action'] : 'view';

if ($page == 'home') {
	
	include 'model/home.php';

}elseif ($page == 'editar') {
	include 'model/edit.php';
}
 else {
	include 'model/add.php';		
}



?>