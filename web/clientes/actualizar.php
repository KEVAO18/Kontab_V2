<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function actualizar($id){
    
    require_once('../handlers/clientes/clientes.php');

    $clientes = new clientes();

    $datos = $clientes->onlyOne($id);

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/clientes/actualizar.php" method="post">
                <input type="hidden" name="id" value="<?=$id?>">
                <?php
                foreach ($datos as $d) {
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="documentoLabel">Documento</span>
                            <input type="text" class="form-control" maxlength="13" id="documento" aria-describedby="documentoLabel" name="documento" value="<?=$d['documento']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nombreLabel">Nombre</span>
                            <input type="text" class="form-control" maxlength="100" id="nombre" aria-describedby="nombreLabel" name="nombre" value="<?=$d['nombre']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="direccionLabel">Direccion</span>
                            <input type="text" class="form-control" maxlength="100" id="direccion" aria-describedby="direccionLabel" name="direccion" value="<?=$d['direccion']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="ciudadLabel">Ciudad</span>
                            <input type="text" class="form-control" maxlength="80" id="ciudad" aria-describedby="ciudadLabel" name="ciudad" value="<?=$d['ciudad']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="telefonoLabel">Telefono</span>
                            <input type="text" class="form-control" maxlength="50" id="telefono" aria-describedby="telefonoLabel" name="telefono" value="<?=$d['telefono']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="correoLabel">Correo</span>
                            <input type="text" class="form-control" maxlength="100" id="correo" aria-describedby="correoLabel" name="correo" value="<?=$d['correo']?>">
                        </div>
                    </div>
                </div>
                <select class="form-select" aria-label="estado" name="estado">
                    <?php
                    if($d['estado'] == 0){
                        ?>
                    <option value="0" selected>Sin pendientes</option>
                    <option value="1">Con pendientes</option>
                        <?php
                    }elseif ($d['estado'] == 1) {
                        ?>
                    <option value="0">Sin pendientes</option>
                    <option value="1" selected>Con pendientes</option>
                        <?php
                    }
                    ?>
                </select>
            <?php
                }
            ?>
            <br>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Añadir Ingreso Ó Egreso</button>
                </div>
            </form>
        </article>
    </section>

    <?php
}

?>