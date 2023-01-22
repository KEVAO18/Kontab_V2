<?php

require_once ('clientes.php');

/**
 * 
 * @KEVAO18
 * 
 */

    $clientes = new clientes();

    $clientes->actualizarDatos('documento ', $_POST['id'], $_POST['documento']);
    
    $clientes->actualizarDatos('nombre ', $_POST['id'], $_POST['nombre']);
    
    $clientes->actualizarDatos('direccion', $_POST['id'], $_POST['direccion']);
    
    $clientes->actualizarDatos('ciudad', $_POST['id'], $_POST['ciudad']);
    
    $clientes->actualizarDatos('telefono', $_POST['id'], $_POST['telefono']);
    
    $clientes->actualizarDatos('correo', $_POST['id'], $_POST['correo']);
    
    $clientes->actualizarDatos('estado', $_POST['id'], $_POST['estado']);

    header("Location: ../../clientes");


?>