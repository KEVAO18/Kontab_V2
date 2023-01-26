<?php

require_once ('productos.php');



/**
 * 
 * @KEVAO18
 * 
 */

if (isset($_POST['id']) && $_POST['id'] != '') {
    $productos = new productos();

    $productos->insertarDatos($_POST['id'], $_POST['nombre'], $_POST['precio'], 0);
}else{
    ?>
    <script>
        alert("Error: datos erroneos");
    </script>
    <?php
}

header("Location: ../../stock");
?>