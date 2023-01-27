<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function actualizar($id){
    
    require_once('../handlers/productos/productos.php');

    $productos = new productos();

    $datos = $productos->onlyOne($id);

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/productos/actualizar.php" method="post">
                <input type="hidden" name="lastId" value="<?=$id?>">
                <?php
                foreach ($datos as $d) {
                ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nombreLabel">Nombre</span>
                            <input type="text" class="form-control" maxlength="100" id="nombre" aria-describedby="nombreLabel" name="nombre" value="<?=$d['nombre']?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="precioLabel">Precio</span>
                            <input type="text" class="form-control" maxlength="8" id="precio" aria-describedby="precioLabel" name="precio" value="<?=$d['precio']?>">
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Actualizar producto</button>
                </div>
            </form>
        </article>
    </section>

    <?php
}

?>