<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function entradas(){
    
    require_once('../handlers/entradas/entradas.php');

    require_once('../handlers/productos/productos.php');

    $productos = new productos();

    $entradas = new entradas();

    $prods = $productos->allColums();
    
    $datos = $entradas->allColums();

    $i = 0;

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/entradas/insertar.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="id" name="id">
                                <?php
                            foreach ($prods as $p) {
                                ?>
                            <option value="<?=$p['id']?>"><?=$p['nombre']." - ".$p['id']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="cantidadLabel">Cantidad</span>
                        <input type="number" class="form-control" maxlength="10" id="cantidad" aria-describedby="cantidadLabel" name="cantidad" value="0">
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
                        <th scope="fechas">Fechas</th>
                        <th scope="cantidad">Cantidad</th>
                        <th scope="stock"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                    $i +=1;
                ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$data['indice']?></td>
                        <td><?=$data['nombre']?></td>
                        <td><?=$data['fecha']?></td>
                        <td><?=$data['cantidad']?></td>
                        <td>
                            <a href="<?=$_ENV['PAGE_SERVE']?>handlers/entradas/eliminar.php?id=<?=$data['id']?>&code=<?=$data['indice']?>" class="btn btn-outline-danger">Eliminar</a>
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