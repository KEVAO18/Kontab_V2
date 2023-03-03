<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function factura($id){
    require_once('../handlers/facturas/facturas.php');
    require_once('../handlers/facturas/ventas.php');

    $facturas = new facturas();

    $ventas = new ventas();

    $datos = $ventas->innerJoinP($id);

    $cliente_facturado = $facturas->innerJoinF($id);

    $acum = 0;

    ?>

    <section>
        <article class="card p-4">
            <?php
            
            foreach ($cliente_facturado as $cf ) {

                $tipoPago = ($cf['tipoPago'] == 0) ? "Contado" : "Credito" ;

                ?>
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="<?=$_ENV['FOLDER_IMAGES']?>/logo.png" class="logo" alt="logo">
                    </div>
                </div>
                <hr>
                <div class="row pt-2">
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
                    <div class="col-md-1"></div>
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
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Producto</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            foreach ($datos as $d) {
                $precioTot = $d['precio'] * $d['unidades'];
                $acum += $precioTot;
                        ?>
                        <tr>
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
                
                <hr>
                <div class="row pt-2">
                    <div class="col-md-7 card">
                        <br>
                        <table class="w-100 text-center">
                            <tr class="">
                                <td class="py-2">Enviar a</td>
                            </tr>
                            <tr class="">
                                <td class="py-2"><?=$cf['cliente']?></td>
                            </tr>
                            <tr class="">
                                <td class="py-2"><?=$cf['nombre']?></td>
                            </tr>
                            <tr class="">
                                <td class="py-2"><?=$cf['direccion']?></td>
                            </tr>
                            <tr class="">
                                <td class="py-2"><?=$cf['telefono']?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4 card justify-content-center">
                        <table class="w-100 justify-content-center">
                            <tr class="">
                                <td class="display-6">Total</td>
                                <td class="text-end py-2 display-6"><?=$acum?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <?php
            }

            ?>
        </article>
    </section>
    <?php
}

?>