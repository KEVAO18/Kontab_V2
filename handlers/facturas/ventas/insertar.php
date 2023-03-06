<?php

require_once ('ventas.php');

require_once("../../productos/productos.php");


/**
 * 
 * @KEVAO18
 * 
 */

if ($_POST['cantidad'] > 0) {

    //declaracion de objetos
    $producto = new productos();

    $ventas = new ventas();

    //sustraccion de la tabla productos
    $split = explode("-", $_POST['prod']);

    $stock = 0;

    foreach ($producto->onlyOne($split[1]) as $s) {
        $stock = $s['stock'];
        if ($stock >= $_POST['cantidad']) {
            $stock -= $_POST['cantidad'];

            $producto->actualizarDatos('stock', "'".$split[1]."'", $stock);
            
            //proceso de insercion en la tabla ventas
            $ventas->insertarDatos($_POST['idFactura'], $split[1], $split[0], $_POST['cantidad']);
        } else {
            ?>
            <script>
                alert("Error: Cantidad de producto en stock menor al de la compra");
            </script>
            <?php
        }
        
    }

}else{
    ?>
    <script>
        alert("Error: Cantidad menor a 1");
    </script>
    <?php
}

header("Location: ../../../factura/".$_POST['idFactura']);
?>