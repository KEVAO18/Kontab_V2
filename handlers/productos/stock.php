<?php

try {
    require_once ('../controllers/sqlController.php');
} catch (\Throwable $th) {
    require_once ('../../controllers/sqlController.php');
}

/**
 * 
 * @KEVAO18
 * 
 */
class productos extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('productos');
    }

    public function insertarDatos($tipo, $concepto, $monto){
        $this->datos->insert('productos', 'id, tipo, fecha, concepto, monto', "NULL, ".$tipo.", NULL, '".$concepto."', ".$monto);
    }

    public function allOfOneType($type){
        return $this->datos->where('productos', 'tipo', $type);
    }

    public function actualizarDatos($columna, $id, $val, $oper = '='){
        $this->datos->update('productos', $columna, $id, $val, $oper);
    }

    public function eliminarDatos($columna, $val, $oper = '='){
        $this->datos->delete('productos', $columna, $val, $oper);
    }

    public function onlyOne($id){
        return $this->datos->where('productos', 'id', $id);
    }

}




?>