<?php

require("../serve.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$_ENV['APP_NAME']." - ".$_GET['p']?></title>
	<!-- Font Awesome -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.2/css/all.css'>
	<!-- Bootstrap -->
	<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?=$_ENV['PAGE_SERVE']?>menu"><?=$_ENV['APP_NAME']?></a>
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
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>ingresos">Ingresos</a></li>
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>egresos">Egresos</a></li>
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>totales">Totales</a></li>
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>cobros">Cuentas por cobrar</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Control de Inventario
						</button>
						<ul class="dropdown-menu dropdown-menu-dark">
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>entradas">Ingresados</a></li>
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>salientes">Salientes</a></li>
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>stock">En stock</a></li>	
						</ul>
					</li>
					<li class="nav-item dropdown">
						<button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							Factura
						</button>
						<ul class="dropdown-menu dropdown-menu-dark">
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>factura">Nueva factura</a></li>
							<li><a class="dropdown-item" href="<?=$_ENV['PAGE_SERVE']?>ventas">Ventas diarias</a></li>	
						</ul>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="<?=$_ENV['PAGE_SERVE']?>clientes">Registro de Clientes</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<main class="container py-4">
		<?=$ruta->outRoute()?>
	</main>


	<!-- ajax -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <!-- JQuery -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<!-- Bootstra -->
	<script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>