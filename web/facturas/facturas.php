<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function facturas(){
    
    require_once('../handlers/facturas/facturas.php');
    require_once('../handlers/clientes/clientes.php');

    $facturas = new facturas();

    $clientes = new clientes();

    $datos = $facturas->allColums();

    $datosClientes = $clientes->allColums();

    $newId = 100001;

    ?>

    <section>
        <article class="card p-4">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/facturas/insertar.php" method="post">
                <?php
                
                foreach ($facturas->ultimaFactura('id', 'id') as $lastF) {
                    $newId = $lastF['id']+1;
                }
                ?>
                <input type="hidden" value="<?=$newId?>" name="idF">

                <div class="row">
                    <div class="col-md-6">
                        <select class="form-select" aria-label="estado" name="cliente">
                <?php
                    foreach ($datosClientes as $cliente) {
                ?>
                            <option value="<?=$cliente['documento']?>"><?=$cliente['nombre']?> - <?=$cliente['documento']?></option>
                <?php
                    }
                ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select" aria-label="estado" name="tipo">
                            <option value="0">Contado</option>
                            <option value="1">A Credito</option>
                        </select>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                        <select class="form-select" aria-label="estado" name="fechaV">
                            <option value="0">Sin plazos</option>
                            <option value="15">A 15 Dias</option>
                            <option value="30">A 30 Dias</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="observacionLabel" for="observacion">Observaciones</span>
                            <input type="text" class="form-control" maxlength="150" id="observacion" aria-describedby="observacionLabel" name="observacion" placeholder="Maximo de caracteres: 150">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Ingresar nueva factura</button>
                </div>
            </form>
        </article>
        <hr>
        <article class="py-2" id="total-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="id" class="text-center">#</th>
                        <th scope="documento" class="text-center">Documento</th>
                        <th scope="generacion" class="text-center">Generacion</th>
                        <th scope="vencimiento" class="text-center">Finalizacion del pago</th>
                        <th scope="tipo" class="text-center">Tipo de pago</th>
                        <th scope="subtotal" class="text-center">Sub-Total</th>
                        <th scope="total" class="text-center">Total</th>
                        <th scope="observaciones" class="text-center">Observaciones</th>
                        <th scope="acciones" class="text-center">Acciones</th>
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