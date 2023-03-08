<?php

require_once ('ventas.php');

require_once("../../productos/productos.php");

require_once("../facturas.php");


/**
 * 
 * @KEVAO18
 * 
 */

if ($_POST['cantidad'] > 0) {

    //declaracion de objetos
    $producto = new productos();

    $ventas = new ventas();

    $factura = new facturas();

    //sustraccion de la tabla productos
    $split = explode("-", $_POST['prod']);

    $stock = 0;

    $total = 0;

    foreach ($producto->onlyOne($split[1]) as $s) {

        //condicion para controlar la resta de productos del stock
        $stock = $s['stock'];

        if ($stock >= $_POST['cantidad']) {
            
            foreach ($factura->onlyOne($_POST['idFactura']) as $fa) {

                $total = $_POST['cantidad'] * $s['precio'];
    
                $total += $fa['total'];
    
            }
    
            //actualizacion del total y el subtotal
            $factura->actualizarDatos("total", $_POST['idFactura'], $total);
            $factura->actualizarDatos("subtotal", $_POST['idFactura'], $total);

            $stock -= $_POST['cantidad'];

            //actualizacion del stock
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