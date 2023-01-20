<?php

require_once ('totales.php');



/**
 * 
 * @KEVAO18
 * 
 */

   $totales = new totales();

   $totales->actualizarDatos('concepto', $_POST['id'], $_POST['concepto']);

   $totales->actualizarDatos('monto', $_POST['id'], $_POST['monto']);

   header("Location: ../../totales");