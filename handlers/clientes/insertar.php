<?php

require_once ('clientes.php');



/**
 * 
 * @KEVAO18
 * 
 */

if ($_POST['estado'] == 0 || $_POST['estado'] == 1) {
    $clientes = new clientes();

    $clientes->insertarDatos($_POST['documento'], $_POST['nombre'], $_POST['direccion'], $_POST['ciudad'], $_POST['telefono'], $_POST['correo'], $_POST['estado']);
}else{
    ?>
    <script>
        alert("Error datos erroneos");
    </script>
    <?php
}

header("Location: ../../clientes");
?>