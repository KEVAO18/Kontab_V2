<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function insertar(){
    
    require_once('../handlers/clientes/clientes.php');

    require_once('../handlers/productos/productos.php');

    require_once('../handlers/facturas/facturas.php');

    $clientes = new clientes();

    $productos = new productos();

    $facturas = new facturas();

    $cleinte = $clientes->allColums();

    $producto = $productos->allColums();

    $factura = $facturas->allColums();

    $i = 0;

    ?>



    <?php
}

?>