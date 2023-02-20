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
        <article class="card p-4" id="insert-form">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="codigoLabel">Codigo de factura</span>
                            <input type="text" class="form-control" maxlength="6" id="codigo" aria-describedby="codigoLabel" name="codigo">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Buscar factura</button>
                </div>
            </form>
        </article>
        <hr>
        <article class="py-2" id="total-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="id">#</th>
                        <th scope="documento">Documento</th>
                        <th scope="nombre">Nombre</th>
                        <th scope="direccion">Direccion</th>
                        <th scope="ciudad">Ciudad</th>
                        <th scope="telefono">Telefono</th>
                        <th scope="correo">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($datos as $d) {
                            ?>
                    <tr>
                        <td><?=$d['id']?></td>
                        <td><?=$d['cliente']?></td>
                        <td></td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
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