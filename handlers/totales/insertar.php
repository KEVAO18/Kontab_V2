<?php

require_once ('totales.php');



/**
 * 
 * @KEVAO18
 * 
 */

if ($_POST['tipos'] == 0 || $_POST['tipos'] == 1) {
    $totales = new totales();

    $totales->insertarDatos($_POST['tipos'], $_POST['concepto'], $_POST['monto']);
}else{
    ?>
    <script>
        alert("Error datos erroneos");
    </script>
    <?php
}

header("Location: ../../totales");
?>