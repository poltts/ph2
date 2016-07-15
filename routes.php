<?php

 require_once 'controller/products.class.php'; 
 require_once 'functions.php';

$page   = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['actions']) ? $_GET['action'] : 'view';

	include 'model/'.$page.'.php';





?>