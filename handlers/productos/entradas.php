<?php

try {
    @require_once ('../controllers/sqlController.php');
} catch (\Throwable $th) {
    @require_once ('../../controllers/sqlController.php');
}

/**
 * 
 * @KEVAO18
 * 
 */
class entradas extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('entradas');
    }

    public function insertarDatos($id, $nombre, $cant){
        $this->datos->insert('entradas', 'id, nombre, fecha, cantidad', "'".$id."', ".$nombre.", NULL, ".$cant);
    }

    public function actualizarDatos($columna, $id, $val, $oper = '='){
        $this->datos->update('entradas', $columna, $id, $val, $oper);
    }

    public function eliminarDatos($columna, $val, $oper = '='){
        $this->datos->delete('entradas', $columna, $val, $oper);
    }

    public function onlyOne($id){
        return $this->datos->where('entradas', 'id', $id);
    }

}




?>