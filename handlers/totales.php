<?php

require_once ('../controllers/sqlController.php');

/**
 * 
 * @KEVAO18
 * 
 */
class totales extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('totales');
    }

    public function insertarDatos($tipo, $concepto, $monto){
        $this->datos->insert('totales', 'id, tipo, fecha, concepto, monto', "NULL, ".$tipo.", NULL, '".$concepto."', ".$monto);
    }

}




?>