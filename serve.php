<?php

/**
 * 
 * @KEVAO18
 * 
 */

   require('vendor/autoload.php');

   $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
   $dotenv->load();

   require('controllers/routesController.php');

   $ruta = new routesController();