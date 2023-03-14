<?php

require("../../serve.php");

ob_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$_ENV['APP_NAME']?></title>
	<!-- Bootstrap -->
	<link href="<?=$_ENV['PAGE_SERVE']?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$_ENV['PAGE_SERVE']?>assets/css/mainStyles.css" rel="stylesheet" type="text/css">
</head>
<body>

	
	<main class="container py-4">
    <?php

        // llamado a los handlers
        require_once('../facturas/facturas.php');
        require_once('../facturas/ventas/ventas.php');
        require_once('../productos/productos.php');

        // declaracion de objetos de las claces handler
        $facturas = new facturas();

        $ventas = new ventas();

        $productos = new productos();

        // manipulando la base de datos mediante los handlers
        $datos = $ventas->innerJoinP($_GET['id']); // manejo de ventas uniendo las tablas ventas, productos y facturas

        $cliente_facturado = $facturas->innerJoinF($_GET['id']); // manejo de facturas uniendo las tablas facturas y clientes

        $producto = $productos->allColums(); // manejo de la tabla productos

        // variables de control
        $cont = 0; // contador de productos facturados
        $acum = 0; // acumulador del total de productos comprados

        ?>

        <section>
            <article class="card p-4">
                <?php
                // bucle de la factura
                foreach ($cliente_facturado as $cf ) {

                    $tipoPago = ($cf['tipoPago'] == 0) ? "Contado" : "Credito" ; // tipos de pago

                    ?>
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="<?=$_ENV['FOLDER_IMAGES']?>/logo.png" class="logo" alt="logo">
                        </div>
                    </div>

                    <hr>

                    <div class="row pt-2">

                        <!-- datos del cliente -->
                        <div class="col-md-7 card">
                            <br>
                            <table class="w-100">
                                <tr class="">
                                    <td>Documento</td>
                                    <td class="py-2"><?=$cf['cliente']?></td>
                                </tr>
                                <tr class="">
                                    <td>Nombre</td>
                                    <td class="py-2"><?=$cf['nombre']?></td>
                                </tr>
                                <tr class="">
                                    <td>Direccion</td>
                                    <td class="py-2"><?=$cf['direccion']?></td>
                                </tr>
                                <tr class="">
                                    <td>Telefono</td>
                                    <td class="py-2"><?=$cf['telefono']?></td>
                                </tr>
                            </table>
                        </div>

                        <!-- separador -->
                        <div class="col-md-1"></div>

                        <!-- datos de la factura -->
                        <div class="col-md-4 card">
                            <p class="display-factura text-center"><span><?=$cf['id']?></span></p>
                            <hr>
                            <table class="w-100">
                                <tr class="">
                                    <td>Fecha de entrega</td>
                                    <td class="text-end py-2"><?=$cf['fechaEntrega']?></td>
                                </tr>
                                <tr class="">
                                    <td>Fecha de vencimiento</td>
                                    <td class="text-end py-2"><?=$cf['fechaVencimiento']?></td>
                                </tr>
                                <tr class="">
                                    <td>Tipo de pago</td>
                                    <td class="text-end py-2"><?=$tipoPago?></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <hr>

                    <!-- productos facturados -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Producto</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                //bucle de la lista de productos
                foreach ($datos as $d) {

                    $precioTot = $d['precio'] * $d['unidades']; //precio total = precio a pagar * total de unidades por cada referencia de producto

                    $cont += 1; // contador de productos facturados
                    $acum += $d['unidades'];
                            ?>

                            <tr>
                                <td><?=$cont?></td>
                                <td><?=$d['codigoP']?></td>
                                <td><?=$d['producto']?></td>
                                <td><?=$d['unidades']?></td>
                                <td><?=$d['precio']?></td>
                                <td><?=$precioTot?></td>
                            </tr>
                            <?php
                }
                            ?>
                        </tbody>
                    </table>

                    <hr>
                    
                    <div class="row py-2">
                        <div class="col-md-12 card display-factura pt-2">
                            <div class="">
                                <h5 class="text-center">Observaciones</h5>
                                <p class="text-center"><?=$cf['observaciones']?></p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- otros datos -->
                    <div class="row pt-2">
                        
                        <!-- datos del envio -->
                        <div class="col-md-6 card">
                            <br>
                            <table class="w-100 text-center">
                                <tr class="">
                                    <td class="py-2">Enviada por: </td>
                                </tr>
                                <tr class="">
                                    <td class="py-2"><?=$_ENV['NEGOCIO_NIT']?></td>
                                </tr>
                                <tr class="">
                                    <td class="py-2"><?=$_ENV['NEGOCIO_NAME']?></td>
                                </tr>
                                <tr class="">
                                    <td class="py-2"><?=$_ENV['NEGOCIO_DIRECCION']?></td>
                                </tr>
                                <tr class="">
                                    <td class="py-2"><?=$_ENV['NEGOCIO_TELEFONO']?></td>
                                </tr>
                            </table>
                        </div>

                        <!-- separador -->
                        <div class="col-md-1"></div>

                        <!-- datos del pago -->
                        <div class="col-md-5 card justify-content-end">
                            <table class="w-100">
                                <tr class="">
                                    <td class="display-factura">Total de productos</td>
                                    <td class="text-end display-factura py-2"><?=$acum?> unid.</td>
                                </tr>
                                <tr class="">
                                    <td class="display-6">Total</td>
                                    <td class="text-end py-2 display-6">$<?=$cf['total']?></td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                    
                    <?php
                }// final del bucle de la factura
                ?>
            </article>
        </section>
	</main>


	<!-- ajax -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <!-- JQuery -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<!-- Bootstra -->
	<script src="<?=$_ENV['PAGE_SERVE']?>vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>

<?php

    $datosFactura = ob_get_clean();

    ob_clean();

    require ("../../vendor/autoload.php");

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->Output();

    // $dir = "../../assets/docs/pdf/";
    
    // if (!file_exists($dir)) {
    //     mkdir($dir);
    //     $file = fopen($dir.'factura'.$_GET['id'].".pdf", 'a');
    //     fwrite($file, $datosFactura);
    // }else{
    //     $file = fopen($dir.'factura'.$_GET['id'].".pdf", 'a');
    //     fwrite($file, $datosFactura);
    // }
    // header("Location: ".$dir."factura".$_GET['id'].".pdf");
    
?>