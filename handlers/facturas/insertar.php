<?php

require_once ('facturas.php');



/**
 * 
 * @KEVAO18
 * 
 */

$factura = new facturas();

$fecha = date('Y-m-d');
$hora = date('H') - 6;
$fechaE =   $fecha." ".$hora.":".date('i:s');
$fechaV = date("Y-m-d",strtotime(date('Y-m-d')."+ ".$_POST['fechaV']." days"));

$estado = ($_POST['tipo'] == 0) ? 1 : 0 ;

$factura->insertarDatos(
    $_POST[
        'idF'
    ],
    $_POST[
        'cliente'
    ],
    $fechaE, 
    $fechaV, 
    $_POST[
        'tipo'
    ],
    0,
    0,
    $_POST[
        'observacion'
    ],
    $estado
);

header("Location: ../../facturas");
?>