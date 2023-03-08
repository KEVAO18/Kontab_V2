<?php

try {
    @require_once ('../controllers/sqlController.php');
} catch (\Throwable $th) {
    try {
        @require_once ('../../controllers/sqlController.php');
    } catch (\Throwable $th) {
        @require_once ('../../../controllers/sqlController.php');
    }
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

    public function insertarDatos($id, $cliente, $fechaE, $fechaV, $tipo, $subT, $total, $obser, $estado){
        $this->datos->insert(
            'facturas', 
            'id, cliente, fechaEntrega, fechaVencimiento, tipoPago, subtotal, total, observaciones, estado', 
            "'".$id."', '".$cliente."', '".$fechaE."', '".$fechaV."', ".$tipo.", ".$subT.", ".$total.", '".$obser."', ".$estado
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

    public function innerJoinF($id){
        return $this->datos->innerJoinConWhere(
            "facturas", 
            "
                facturas.id, 
                facturas.fechaEntrega, 
                facturas.fechaVencimiento, 
                facturas.tipoPago, 
                facturas.subtotal, 
                facturas.total, 
                facturas.observaciones, 
                facturas.estado, 
                facturas.cliente, 
                clientes.nombre, 
                clientes.direccion, 
                clientes.ciudad, 
                clientes.telefono, 
                clientes.correo
            ", 
            "clientes", 
            "facturas.cliente", 
            "clientes.documento",
            "facturas.id", 
            $id
        );
    }

    public function ultimaFactura($ordenamiento, $columnas){
        return $this->datos->LastRow(
            'facturas',
            $ordenamiento,
            $columnas
        );
    }

}




?>