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
class clientes extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('clientes');
    }

    public function insertarDatos($doc, $name, $addres, $city, $telefono, $correo, $estado){
        $this->datos->insert(
            'clientes', // TABLA
            'id, documento, nombre, direccion, ciudad, telefono, correo, estado', // COLUMNA
            "NULL, '".$doc."', '".$name."', '".$addres."', '".$city."', '".$telefono."', '".$correo."', ".$estado // VALOR
        );
    }

    public function actualizarDatos($columna, $id, $val, $oper = '='){
        $this->datos->update('clientes', $columna, $id, $val, $oper);
    }

    public function eliminarDatos($columna, $val, $oper = '='){
        $this->datos->delete('clientes', $columna, $val, $oper);
    }

    public function onlyOne($id){
        return $this->datos->where('clientes', 'id', $id);
    }

}




?>