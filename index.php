<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Produtos - Ph2 test</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="Demo project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/stylesheet/layout.css">
	<!-- <script type="text/javascript" src="public/js/form_actions.js" /> -->
	
</head>
<body>
	<div class="container-fluid">
		<main>
			<div class="row">
				<div class="col-xs-12">
					<header>
						<nav class="navbar  ">
					        <ul class="nav nav-pills">
							  <li role="presentation" class="active"><a href="index.php">Home</a></li>
							  <li role="presentation"><a href="index.php?page=add&amp;action=add">Adicionar Produto</a></li>
							  <!-- <li role="presentation"><a href="#">Galeria Produtos</a></li> -->
							</ul>
					      </nav> 
					</header>
				</div>
			</div>
			<?php include 'routes.php'; ?>	
		</main>
	</div>
	
</body>
</html>