<?php

try {
    @require_once ('../controllers/sqlController.php');
} catch (\Throwable $th) {
    @require_once ('../../../controllers/sqlController.php');
}

/**
 * 
 * @KEVAO18
 * 
 */
class ventas extends sqlController{

    private $datos;

    public function __construct() {
        $this->datos = new sqlController();
    }

    public function allColums(){
        return $this->datos->All('ventas');
    }

    public function insertarDatos($id, $codigoF, $codigoP, $prod, $unidades){
        $this->datos->insert(
            'ventas', 
            'id, codigoF, codigoP, producto, unidades', 
            $id.", '".$codigoF."', '".$codigoP."', '".$prod."', ".$unidades
        );
    }

    public function actualizarDatos($columna, $id, $val, $oper = '='){
        $this->datos->update('ventas', $columna, $id, $val, $oper);
    }

    public function eliminarDatos($columna, $val, $oper = '='){
        $this->datos->delete('ventas', $columna, $val, $oper);
    }

    public function onlyOne($id){
        return $this->datos->where('ventas', 'id', $id);
    }

    public function innerJoinP($id){
        return $this->datos->innerJoinConDoble(
            "ventas", 
            "
            ventas.id, 
            ventas.codigoP, 
            ventas.producto, 
            ventas.unidades, 
            productos.precio
            ", 
            "productos", 
            "facturas",
            "ventas.codigoP", 
            "ventas.codigoF",
            "productos.id",
            "facturas.id",
            "facturas.id", 
            $id
        );
    }

}




?>