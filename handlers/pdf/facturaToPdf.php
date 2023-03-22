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
    <style>
        
        .w-100{
            width: 100%;
        }

        .py-1{
            padding-top: 1vh;
            padding-bottom: 1vh;
        }

        .py-2{
            padding-top: 2vh;
            padding-bottom: 2vh;
        }

        .py-3{
            padding-top: 3vh;
            padding-bottom: 3vh;
        }

        .py-4{
            padding-top: 4vh;
            padding-bottom: 4vh;
        }

        .p-1{
            padding: 1rem;
        }

        .p-2{
            padding: 2rem;
        }

        .p-3{
            padding: 3rem;
        }

        .p-4{
            padding: 4rem;
        }

        .card{
            width: 100%;
            border-radius: 12px;
            border-style: solid;
            border-width: 1px;
            border-color: rgba(0, 0, 0, 0.2);
        }

        .shadow{
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
        }

        .boton-flotante{
            position: fixed;
            bottom: 1rem;
            right: 2rem;
        }

        .display-factura{
            font-size: 1.5rem;
        }

        .display-1{
            font-size: 5rem;
        }

        .display-2{
            font-size: 4.5rem;
        }

        .display-3{
            font-size: 4rem;
        }

        .display-4{
            font-size: 3.5rem;
        }

        .display-5{
            font-size: 3rem;
        }

        .display-6{
            font-size: 2.5rem;
        }

        .text-center{
            text-align: center;
        }

        .text-end{
            text-align: right;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) * -.5);
            margin-left: calc(var(--bs-gutter-x) * -.5);
        }
        .row > * {
            box-sizing: border-box;
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y);
        }

        .col-md-1 {
            flex: 0 0 auto;
            width: 8.33333333%;
        }

        .col-md-2 {
            flex: 0 0 auto;
            width: 16.66666667%;
        }

        .col-md-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .col-md-4 {
            flex: 0 0 auto;
            width: 33.33333333%;
        }

        .col-md-5 {
            flex: 0 0 auto;
            width: 41.66666667%;
        }

        .col-md-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-md-7 {
            flex: 0 0 auto;
            width: 58.33333333%;
        }

        .col-md-8 {
            flex: 0 0 auto;
            width: 66.66666667%;
        }

        .col-md-9 {
            flex: 0 0 auto;
            width: 75%;
        }

        .col-md-10 {
            flex: 0 0 auto;
            width: 83.33333333%;
        }

        .col-md-11 {
            flex: 0 0 auto;
            width: 91.66666667%;
        }

        .col-md-12 {
            flex: 0 0 auto;
            width: 100%;
        }
        .container {
            width: 100%;
            padding-right: var(--bs-gutter-x, 0.75rem);
            padding-left: var(--bs-gutter-x, 0.75rem);
            margin-right: auto;
            margin-left: auto;
        }
        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }
        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }
        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }
        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }
        @media (min-width: 1400px) {
            .container {
                max-width: 1320px;
            }
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #212529;
            --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
            --bs-table-active-color: #212529;
            --bs-table-active-bg: rgba(0, 0, 0, 0.1);
            --bs-table-hover-color: #212529;
            --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-color: #dee2e6;
        }

        .table > tbody {
            vertical-align: inherit;
        }
        .table > thead {
            vertical-align: bottom;
        }

        table {
            caption-side: bottom;
            border-collapse: collapse;
        }
        th {
            text-align: inherit;
            text-align: -webkit-match-parent;
        }

        thead, tbody, tr, td, th {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        hr {
            margin: 1rem 0;
            color: inherit;
            background-color: currentColor;
            border: 0;
            opacity: 0.25;
        }
    </style>
</head>
<body>

	
	<main class="py-4">
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
            <article class="">
                <?php
                // bucle de la factura
                foreach ($cliente_facturado as $cf ) {

                    $tipoPago = ($cf['tipoPago'] == 0) ? "Contado" : "Credito" ; // tipos de pago

                    ?>

                    <div class="row">

                        <!-- datos del cliente -->
                        <div class="col-md-6">
                            <table class="w-100">
                                <tr class="">
                                    <td>Documento</td>
                                    <td class="py-2 text-end"><?=$cf['cliente']?></td>
                                </tr>
                                <tr class="">
                                    <td>Nombre</td>
                                    <td class="py-2 text-end"><?=$cf['nombre']?></td>
                                </tr>
                                <tr class="">
                                    <td>Direccion</td>
                                    <td class="py-2 text-end"><?=$cf['direccion']?></td>
                                </tr>
                                <tr class="">
                                    <td>Telefono</td>
                                    <td class="py-2 text-end"><?=$cf['telefono']?></td>
                                </tr>
                            </table>
                        </div>

                        <!-- datos de la factura -->
                        <div class="col-md-5 py-2">
                            <hr>
                            <table class="w-100">
                                <tr class="">
                                    <td>Codigo de factura</td>
                                    <td class="text-end py-2"><span><?=$cf['id']?></span></td>
                                </tr>
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
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th scope="col" class="">Codigo</th>
                                <th scope="col" class="">Producto</th>
                                <th scope="col" class="">cantidad</th>
                                <th scope="col" class="">Precio Unitario</th>
                                <th scope="col" class="">Precio Total</th>
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
                                <td class=""><?=$cont?></td>
                                <td class=""><?=$d['codigoP']?></td>
                                <td class=""><?=$d['producto']?></td>
                                <td class=""><?=$d['unidades']?></td>
                                <td class=""><?=$d['precio']?></td>
                                <td class=""><?=$precioTot?></td>
                            </tr>
                            <?php
                }
                            ?>
                        </tbody>
                    </table>

                    <hr>
                    
                    <div class="row py-2">
                        <div class="col-md-12 card display-factura">
                            <p class="text-center">Observaciones</p>
                            <p class="text-center"><?=$cf['observaciones']?></p>
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
                        <hr>
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

    // echo $datosFactura;

    require_once('../../vendor/dompdf/dompdf/src/Dompdf.php');

    use Dompdf\Dompdf;
    use DompdfDompdf;

    $dpdf = new Dompdf();
    $dpdf->loadHtml($datosFactura);
    $dpdf->render();

    $dpdf->stream("factura".$_GET['id'].".pdf");

    header("Location: ../../factura/".$_GET['id']);
    
?>