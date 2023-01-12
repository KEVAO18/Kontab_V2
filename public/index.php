<?php

require("../serve.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contabilidad</title>
	<!-- Font Awesome -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="#"><?=$_ENV['APP_NAME']?></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Contabilidad
					</button>
					<ul class="dropdown-menu dropdown-menu-dark">
						<li><a class="dropdown-item" href="#">Ingresos</a></li>
						<li><a class="dropdown-item" href="#">Egresos</a></li>
						<li><a class="dropdown-item" href="#">Totales</a></li>
						<li><a class="dropdown-item" href="#">Cuentas por cobrar</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Control de Inventario
					</button>
					<ul class="dropdown-menu dropdown-menu-dark">
						<li><a class="dropdown-item" href="#">Ingresados</a></li>
						<li><a class="dropdown-item" href="#">Salientes</a></li>
						<li><a class="dropdown-item" href="#">En stock</a></li>	
					</ul>
				</li>
				<li class="nav-item dropdown">
					<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Factura
					</button>
					<ul class="dropdown-menu dropdown-menu-dark">
						<li><a class="dropdown-item" href="#">Nueva factura</a></li>
						<li><a class="dropdown-item" href="#">Ventas diarias</a></li>	
					</ul>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="#">Registro de Clientes</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
	
	<!-- ajax -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <!-- JQuery -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<!-- bootstra -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>