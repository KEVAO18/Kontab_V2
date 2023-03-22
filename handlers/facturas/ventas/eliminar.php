<?php

require_once ('ventas.php');

require_once("../../productos/productos.php");

require_once("../facturas.php");



/**
 * 
 * @KEVAO18
 * 
 */

//declaracion de objetos
$producto = new productos();

$ventas = new ventas();

$factura = new facturas();

//sumar el producto en el stock
foreach ($ventas->onlyOne($_GET['id']) as $venta) {

    foreach ($producto->onlyOne($venta['codigoP']) as $prod) {

        $stock = $venta['unidades'] + $prod['stock'];

        //actualizacion del stock
        $producto->actualizarDatos('stock', "'".$venta['codigoP']."'", $stock);

        //actualizar el precio final
        foreach ($factura->onlyOne($venta['codigoF']) as $fact) {

            $tot = $fact['total'] - ($prod['precio'] * $venta['unidades']);

            //actualizacion del total y el subtotal
            $factura->actualizarDatos("total", $venta['codigoF'], $tot);
            $factura->actualizarDatos("subtotal", $venta['codigoF'], $tot);

        }

    }

}

//eliminar la fila de la tabla ventas
$ventas->eliminarDatos('id', $_GET['id']);

//volver a la factura
header("Location: ../../../factura/".$_GET['idFactura']."#prodsTable");