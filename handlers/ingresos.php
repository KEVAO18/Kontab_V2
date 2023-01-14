<?php

require_once ('../controllers/sqlController.php');

/**
 * 
 * @KEVAO18
 * 
 */
class ingresos extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('ingresos');
    }

}




?>