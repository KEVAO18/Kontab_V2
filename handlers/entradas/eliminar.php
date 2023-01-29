<?php

require_once ('entradas.php');

require_once ('../productos/productos.php');



/**
 * 
 * @KEVAO18
 * 
 */

$productos = new productos();

$entradas = new entradas();

$entrada = $entradas->onlyOne($_GET['id']);

$producto = $productos->onlyOne($_GET['code']);

$cant = 0;

foreach ($producto as $datosProducto) {
    
    $cant = $datosProducto['stock'];

}

foreach ($entrada as $datosEntrada) {

    $cant -= $datosEntrada['cantidad'];

}

$productos->actualizarDatos('stock', "'".$_GET['code']."'", $cant);

$entradas->eliminarDatos('id', $_GET['id']);

header("Location: ../../entradas");