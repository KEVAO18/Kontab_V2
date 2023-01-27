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

            case "salientes":
                include_once '../web/productos/'.$ruta[0].'.php';
                //salientes();
                break;

            case "ingresados":
                include_once '../web/productos/'.$ruta[0].'.php';
                //ingresados();
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