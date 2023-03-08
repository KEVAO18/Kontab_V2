<?php

require_once ('facturas.php');

require_once('ventas/ventas.php');

require_once('../productos/productos.php');

/**
 * 
 * @KEVAO18
 * 
 */

$facturas = new facturas();

$ventas = new ventas();

$productos = new productos();

foreach ($ventas->allColums() as $d) {

    if ($d['codigoF'] == $_GET['id']) {
        foreach ($productos->allColums() as $prods) {
            if ($prods['id'] == $d['codigoP']) {
                $unidades = $prods['stock'] + $d['unidades'];
    
                $productos->actualizarDatos('stock', "'".$d['codigoP']."'", $unidades);
            }
    
        }
    }

}

$ventas->eliminarDatos('codigoF', $_GET['id']);

$facturas->eliminarDatos('id', $_GET['id']);

header("Location: ../../facturas");