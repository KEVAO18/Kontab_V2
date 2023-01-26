<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function insertar(){
    
    require_once('../handlers/productos/productos.php');

    $productos = new productos();

    $datos = $productos->allColums();

    $i = 0;

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/productos/insertar.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="idLabel" for="id">Codigo de producto</span>
                            <input type="text" class="form-control" maxlength="100" id="id" aria-describedby="idLabel" name="id">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="precioLabel">Precio</span>
                            <input type="text" class="form-control" maxlength="8" id="precio" aria-describedby="precioLabel" name="precio">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="nombreLabel">Nombre</span>
                            <input type="text" class="form-control" maxlength="100" id="nombre" aria-describedby="nombreLabel" name="nombre">
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Añadir Ingreso Ó Egreso</button>
                </div>
            </form>
        </article>
        <hr>
        <article class="py-2" id="total-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="id">#</th>
                        <th scope="codigo">Codigo</th>
                        <th scope="nombre">Nombre</th>
                        <th scope="unidad">Precio Unidad</th>
                        <th scope="stock">Stock</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                    $i +=1; 
                ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$data['id']?></td>
                        <td><?=$data['nombre']?></td>
                        <td><?=$data['precio']?></td>
                        <td><?=$data['stock']?></td>
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