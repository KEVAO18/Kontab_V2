<?php

require_once ('clientes.php');



/**
 * 
 * @KEVAO18
 * 
 */

$clientes = new clientes();

$clientes->eliminarDatos('id', $_GET['id']);

header("Location: ../../clientes");