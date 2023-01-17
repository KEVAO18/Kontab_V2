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

    public function actualizarDatos($columna, $id, $val, $oper = '='){
        $this->datos->update('totales', $columna, $id, $val, $oper);
    }

    public function eliminarDatos($columna, $val, $oper = '='){
        $this->datos->delete('totales', $columna, $val, $oper);
    }

    public function onlyOne($id){
        return $this->datos->where('totales', 'id', $id);
    }

}




?>