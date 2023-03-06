<?php

try {
    @require_once ('../controllers/sqlController.php');
} catch (\Throwable $th) {
    try {
        @require_once ('../controllers/sqlController.php');
    } catch (\Throwable $th) {
        @require_once ('../../../controllers/sqlController.php');
    }
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

    public function insertarDatos($id, $nombre, $precio, $stock){
        $this->datos->insert(
            'productos', 
            'id, nombre, precio, stock', 
            "'".$id."', '".$nombre."', ".$precio.", ".$stock
        );
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