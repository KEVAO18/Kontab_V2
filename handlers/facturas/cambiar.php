<?php

require_once ('facturas.php');


require_once('../productos/productos.php');

require_once('../clientes/clientes.php');

/**
 * 
 * @KEVAO18
 * 
 */

$facturas = new facturas();

$productos = new productos();

$clientes = new clientes();

foreach ($facturas->allColums() as $d) {

    foreach ($clientes->allColums() as $c ) {

        $ifCondition1= ($d['estado'] == 0 && $d['id'] == $_GET['id'] && $c['documento'] == $_GET['doc']) ? True : False ;

        $ifCondition2 = ($d['estado'] == 1 && $d['id'] == $_GET['id'] && $c['documento'] == $_GET['doc']) ? True : False ;
    
        if ($ifCondition1) {
    
            $facturas->actualizarDatos('estado', "'".$_GET['id']."'", 1);
            
            break 2;
    
        }else if($ifCondition2){
    
            $facturas->actualizarDatos('estado', "'".$_GET['id']."'", 0);
    
            break 2;
    
        }

    }

}

header("Location: ../../facturas");