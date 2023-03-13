<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function insertar(){
    
    require_once('../handlers/clientes/clientes.php');

    $clientes = new clientes();

    $datos = $clientes->allColums();

    $i = 0;

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/clientes/insertar.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="documentoLabel">Documento</span>
                            <input type="text" class="form-control" maxlength="13" id="documento" aria-describedby="documentoLabel" name="documento">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nombreLabel">Nombre</span>
                            <input type="text" class="form-control" maxlength="100" id="nombre" aria-describedby="nombreLabel" name="nombre">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="direccionLabel">Direccion</span>
                            <input type="text" class="form-control" maxlength="100" id="direccion" aria-describedby="direccionLabel" name="direccion">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="ciudadLabel">Ciudad</span>
                            <input type="text" class="form-control" maxlength="80" id="ciudad" aria-describedby="ciudadLabel" name="ciudad">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="telefonoLabel">Telefono</span>
                            <input type="text" class="form-control" maxlength="50" id="telefono" aria-describedby="telefonoLabel" name="telefono">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="correoLabel">Correo</span>
                            <input type="text" class="form-control" maxlength="100" id="correo" aria-describedby="correoLabel" name="correo">
                        </div>
                    </div>
                </div>
                <select class="form-select" aria-label="estado" name="estado">
                    <option selected>Estado</option>
                    <option value="0">Sin pendientes</option>
                    <option value="1">Con pendientes</option>
                </select>
                <hr>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Añadir Nuevo Cliente</button>
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
                        <th scope="estado">Estado</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                    $i +=1; 
                ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$data['documento']?></td>
                        <td><?=$data['nombre']?></td>
                        <td><?=$data['direccion']?></td>
                        <td><?=$data['ciudad']?></td>
                        <td><?=$data['telefono']?></td>
                        <td><?=$data['correo']?></td>
                        <?php
                        switch ($data['estado']) {
                            case '0':
                                echo "<td>Sin Pendientes</td>";
                                break;
                            case '1':
                                echo "<td>Pendiente</td>";
                                break;
                        }
                        ?>
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