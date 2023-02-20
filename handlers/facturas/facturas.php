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
class facturas extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('facturas');
    }

    public function insertarDatos($id, $nombre, $precio, $stock){
        $this->datos->insert(
            'facturas', 
            'id, nombre, precio, stock', 
            "'".$id."', '".$nombre."', ".$precio.", ".$stock
        );
    }

    public function actualizarDatos($columna, $id, $val, $oper = '='){
        $this->datos->update('facturas', $columna, $id, $val, $oper);
    }

    public function eliminarDatos($columna, $val, $oper = '='){
        $this->datos->delete('facturas', $columna, $val, $oper);
    }

    public function onlyOne($id){
        return $this->datos->where('facturas', 'id', $id);
    }

    //facturas.id, facturas.cliente, clientes.nombre, clientes.direccion, clientes.ciudad, clientes.telefono, clientes.correo

}




?>