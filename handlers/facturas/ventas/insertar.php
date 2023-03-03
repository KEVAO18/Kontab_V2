<?php

require_once ('ventas.php');



/**
 * 
 * @KEVAO18
 * 
 */

if ($_POST['cantidad'] > 0) {
    $ventas = new ventas();

    

    echo $_POST['idFactura'].", ".$_POST['prod']."";

    // $ventas->insertarDatos
}else{
    ?>
    <script>
        alert("Error: Cantidad menor a 0");
    </script>
    <?php
}

// header("Location: ../../factura".$_POST['id']);
?>