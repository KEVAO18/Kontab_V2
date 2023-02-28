<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function facturas(){
    require_once('../handlers/facturas/facturas.php');

    $facturas = new facturas();

    $datos = $facturas->allColums();

    ?>

    <section>
        <article class="card p-4">
            <div class="d-grid gap-4 py-2 px-4">
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar/factura" class="btn btn-outline-dark">Nueva factura</a>
            </div>
        </article>
        <hr>
        <article class="py-2" id="total-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="id">#</th>
                        <th scope="documento">Documento</th>
                        <th scope="generacion">Generacion</th>
                        <th scope="vencimiento">Vencimiento</th>
                        <th scope="tipo">Tipo de pago</th>
                        <th scope="subtotal">Sub-Total</th>
                        <th scope="total">Total</th>
                        <th scope="observaciones">Observaciones</th>
                        <th scope="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($datos as $d) {
                            $color = ($d['estado'] == 1) ? "bg-success" : "bg-danger" ;
                            $tipoPago = ($d['tipoPago'] == 0) ? "Contado" : "Credito" ;
                    ?>
                    <tr>
                        <td class="<?=$color?> text-light"><?=$d['id']?></td>
                        <td><?=$d['cliente']?></td>
                        <td><?=$d['fechaEntrega']?></td>
                        <td><?=$d['fechaVencimiento']?></td>
                        <td><?=$tipoPago?></td>
                        <td><?=$d['subtotal']?></td>
                        <td><?=$d['total']?></td>
                        <td><?=$d['observaciones']?></td>
                        <td>
                            <a href="<?=$_ENV['PAGE_SERVE']?>factura/<?=$d['id']?>" class="btn btn-outline-info">Mas</a>
                            <a href="<?=$_ENV['PAGE_SERVE']?>handlers/facturas/eliminar.php?id=<?=$d['id']?>" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                    </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </article>
    </section>
    <?php
}

?>