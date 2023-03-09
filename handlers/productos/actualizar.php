<?php

require_once ('productos.php');

/**
 * 
 * @KEVAO18
 * 
 */

    $productos = new productos();
    
    $productos->actualizarDatos('id ', "'".$_POST['lastId']."'", $_POST['id']);

    $productos->actualizarDatos('nombre ', "'".$_POST['lastId']."'", $_POST['nombre']);
    
    $productos->actualizarDatos('precio', "'".$_POST['lastId']."'", $_POST['precio']);

    header("Location: ../../stock");


?>