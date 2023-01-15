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
                include_once '../web/'.$ruta[0].'.php';
                ingresos();
                break;

            case "egresos":
                include_once '../web/'.$ruta[0].'.php';
                egresos();
                break;

            case "totales":
                include_once '../web/'.$ruta[0].'.php';
                totales();
                break;

            case "insertar":
                include_once '../web/'.$ruta[0].'.php';
                insertar();
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