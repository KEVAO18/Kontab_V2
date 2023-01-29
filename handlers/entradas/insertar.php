<?php

require_once ('entradas.php');
require_once ('../productos/productos.php');



/**
 * 
 * @KEVAO18
 * 
 */

 if (isset($_POST['cantidad']) && $_POST['cantidad'] != 0) {

    $productos = new productos();
    
    $entradas = new entradas();
    
    $prods = $productos->onlyOne($_POST['id']);
    
    $nombre = "";

    $cant = 0;
    
    foreach ($prods as $prod) {

        $nombre = $prod['nombre'];

        $cant += $prod['stock']; 

    }

    $cant += $_POST['cantidad'];

    $productos->actualizarDatos('stock', "'".$_POST['id']."'", $cant);
    
    $nuevaEntrada = $entradas->insertarDatos($_POST['id'], $nombre, $_POST['cantidad']);
    
}else{

    echo "Adios";

}

    header("Location: ../../entradas");
?>