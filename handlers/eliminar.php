<?php

require_once ('../handlers/totales.php');



/**
 * 
 * @KEVAO18
 * 
 */

    $totales = new totales();

    $totales->eliminarDatos('id', $_GET['id']);

    header("Location: ../totales");