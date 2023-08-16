<?php

require("../../serve.php");

ob_start();

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=$_ENV['PAGE_SERVE']?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$_ENV['PAGE_SERVE']?>assets/css/mainStyles.css" rel="stylesheet" type="text/css">
    <title>Factura</title>
</head>
<body>

<?php

foreach ($cliente_facturado as $cf ) {

    $tipoPago = ($cf['tipoPago'] == 0) ? "Contado" : "Credito" ; // tipos de pago

    print('<div id="imprimible">');
    print('<div style="text-transform: uppercase">');
    print($_ENV['NEGOCIO_NIT'].'<br>');
    print($_ENV['NEGOCIO_NAME'].'<br>');
    print($_ENV['NEGOCIO_DIRECCION'].'<br>');
    print($_ENV['NEGOCIO_TELEFONO'].'<br>');
    print($_ENV['NEGOCIO_REGIMEN'].'<br>');
    print("<br>");
    ?>
    <table class="">
        <tr class="">
            <td>Codigo de factura: </td>
            <td class=""><span><?=$cf['id']?></span></td>
        </tr>
        <tr class="">
            <td>Fecha de entrega: </td>
            <td class=""><?=$cf['fechaEntrega']?></td>
        </tr>
        <tr class="">
            <td>Fecha de vencimiento: </td>
            <td class=""><?=$cf['fechaVencimiento']?></td>
        </tr>
    </table>
    <?php
    
    print("<br>");
    print("________________________________________________________");
    print("<br>");
    print("Datos del cliente <br>");
    print("________________________________________________________");
    
    ?>
    <table class="">
        <tr class="">
            <td>Documento: </td>
            <td class=""><span><?=$cf['cliente']?></span></td>
        </tr>
        <tr class="">
            <td>Nombre: </td>
            <td class=""><?=$cf['nombre']?></td>
        </tr>
        <tr class="">
            <td>Direccion: </td>
            <td class=""><?=$cf['direccion']?></td>
        </tr>
        <tr class="">
            <td>Telefono: </td>
            <td class=""><?=$cf['telefono']?></td>
        </tr>
    </table>
    <?php

    //Datos del cliente

    print("<br>");
    print("________________________________________________________");
    print("<br>");
    print("Detalles de factura");
    print("<br>");
    print("________________________________________________________");
    print("<br>");
    
    ?>

    <!-- productos facturados -->
    <table class="">
        <tbody>
            <?php

            //bucle de la lista de productos
            foreach ($datos as $d) {

                $precioTot = $d['precio'] * $d['unidades']; //precio total = precio a pagar * total de unidades por cada referencia de producto

                $cont += 1; // contador de productos facturados
                $acum += $d['unidades'];
                        ?>

                        <tr>
                            <td class=""><?=$d['id']?></td>
                            <td class=""><?=$d['producto']?></td>
                            <td class="">*<?=$d['unidades']?></td>
                        </tr>
                        <tr>
                            <td class=""><?=$d['unidades']?></td>
                            <td class=""> X <?=$d['precio']?></td>
                            <td class="">$<?=$precioTot?></td>
                        </tr>
                        <?php
            }

            ?>

        </tbody>
    </table>

    <?php
    
    print("________________________________________________________ <br><br>");
    
    ?>
        <!-- datos del pago -->
        <div class="">
            <table class="">
                <tr class="">
                    <td>Tipo de pago: </td>
                    <td class=""><?=$tipoPago?></td>
                </tr>
                <tr class="">
                    <td class="">productos: </td>
                    <td class=""><?=$acum?> unid.</td>
                </tr>
                <tr class="">
                    <td class="">Total: </td>
                    <td class="">$<?=$cf['total']?></td>
                </tr>
            </table>
        </div>
        
    <?php

    print("<br>");
    print('Conserve su tirilla para reclamos <br>');
    print('Desarrollado por '.$_ENV['APP_AUTHOR'].'<br>');
    print('Version de aplicacion '.$_ENV['APP_VERSION'].'<br>');
    print("<br>");
    print("</div>");
    print("</div>");

}// final del bucle de la factura

    // $datosFactura = ob_get_clean();

    // ob_clean();

    // require_once('../../vendor/dompdf/dompdf/src/Dompdf.php');

    // use Dompdf\Dompdf;
    // use DompdfDompdf;

    // $dpdf = new Dompdf();
    // $dpdf->loadHtml($datosFactura);
    // $dpdf->render();

    // $dpdf->stream("factura".$_GET['id'].".pdf");

    // header("Location: ../../factura/".$_GET['id']);

?>
<div class="my-4 mx-4">
    <button id="btnImprimir" class="btn btn-outline-dark">Imprimir</button>
</div>

<script>
    function impEle(elemento) {
        var ventana = window.open('', 'PRINT', 'height=720,width=1080');
        ventana.document.write('<html><head><title>' + document.title + '</title>');
        ventana.document.write('<link rel="stylesheet" href="imprimir.css">'); //Cargamos otra hoja, no la normal
        ventana.document.write('</head><body >');
        ventana.document.write(elemento.innerHTML);
        ventana.document.write('</body></html>');
        ventana.document.close();
        ventana.focus();
        ventana.onload = function() {
            ventana.print();
            ventana.close();
        };
        return true;
    }

    document.querySelector("#btnImprimir").addEventListener("click", function() {
        var div = document.querySelector("#imprimible");
        impEle(div);
        
        setTimeout(function() {
            window.location.href = "<?=$_ENV['PAGE_SERVE'].'factura/100001'?>";
    }, 1000);
    });


</script>

</body>

</html>
<?php

