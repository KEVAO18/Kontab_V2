<?php

/**
 * @KEVAO18
 */
class routesController{

	function __construct(){

	}

	public function outRoute(){

        $ruta = array();

        if (isset($_GET["p"])) {
            $p = $_GET["p"];
            $ruta = explode("/", $p);
        }

        switch ($ruta[0]) {

            case "ingresos":
                include_once '../web/totales/'.$ruta[0].'.php';
                ingresos();
                break;

            case "egresos":
                include_once '../web/totales/'.$ruta[0].'.php';
                egresos();
                break;

            case "totales":
                include_once '../web/totales/'.$ruta[0].'.php';
                totales();
                break;

            case "insertar":
                switch ($ruta[1]) {
                    case 'ingreso':
                        include_once '../web/totales/'.$ruta[0].'.php';
                        insertar();
                        break;
                    
                    case 'cliente':
                        include_once '../web/clientes/'.$ruta[0].'.php';
                        insertar();
                        break;
                    
                    case 'producto':
                        include_once '../web/productos/'.$ruta[0].'.php';
                        insertar();
                        break;
                }
                break;

            case "actualizar":
                switch ($ruta[1]) {
                    case 'ingreso':
                        include_once '../web/totales/'.$ruta[0].'.php';
                        actualizar($ruta[2]);
                        break;
                    
                    case 'clientes':
                        include_once '../web/clientes/'.$ruta[0].'.php';
                        actualizar($ruta[2]);
                        break;
                    
                    case 'producto':
                        include_once '../web/productos/'.$ruta[0].'.php';
                        actualizar($ruta[2]);
                        break;
                }
                break;
                    
                
            case "clientes":
                include_once '../web/clientes/'.$ruta[0].'.php';
                clientes();
                break;

            case "stock":
                include_once '../web/productos/'.$ruta[0].'.php';
                stock();
                break;

            case "entradas":
                include_once '../web/productos/'.$ruta[0].'.php';
                entradas();
                break;

            case "menu":
                include_once '../web/main/'.$ruta[0].'.php';
                menu();
                break;

            case 'facturas':
                include_once '../web/facturas/'.$ruta[0].'.php';
                facturas();
                break;

            case 'factura':
                include_once '../web/facturas/'.$ruta[0].'.php';
                factura($ruta[1]);
                break;

            case 'ventas':
                include_once '../web/facturas/'.$ruta[0].'.php';
                ventas();
                break;

            case "e403":
                echo $ruta[0];
                break;

            case "e404":
                echo $ruta[0];
                break;

            default:
                echo "Por defecto";
        }
	}
}
?>