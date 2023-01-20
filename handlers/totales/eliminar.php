<?php

require_once ('totales.php');



/**
 * 
 * @KEVAO18
 * 
 */

  $totales = new totales();

  $totales->eliminarDatos('id', $_GET['id']);

  header("Location: ../../totales");