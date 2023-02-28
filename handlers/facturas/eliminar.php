<?php

require_once ('facturas.php');



/**
 * 
 * @KEVAO18
 * 
 */

$facturas = new facturas();

$facturas->eliminarDatos('id', $_GET['id']);

header("Location: ../../facturas");