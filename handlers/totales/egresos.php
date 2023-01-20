<?php

require_once ('../controllers/sqlController.php');

/**
 * 
 * @KEVAO18
 * 
 */
class egresos extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allEgresos(){
        return $this->datos->where('totales', 'tipo', 1);
    }

}




?>