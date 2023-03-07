<?php

require_once ('facturas.php');



/**
 * 
 * @KEVAO18
 * 
 */

$factura = new facturas();

$fecha = date('Y-m-d');
$hora = date('H') - 6;
$time = $fecha." ".$hora.":".date('i:s');

//header("Location: ../../stock");
?>