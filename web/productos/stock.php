<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function stock(){
    
    require_once('../handlers/productos/productos.php');

    $productos = new productos();

    $datos = $productos->allColums();

    $suma = 0;
    
    $i=0;

    ?>

    <section>
        <article>
            <div class="d-grid gap-4 py-4" id="add">
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar/producto" class="btn btn-outline-dark">Añadir Producto</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="id">#</th>
                        <th scope="codigo">Codigo</th>
                        <th scope="nombre">Nombre</th>
                        <th scope="unidad">Precio Unidad</th>
                        <th scope="stock">Stock</th>
                        <th scope="actions"></th>
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
                        <td>
                            <a href="<?=$_ENV['PAGE_SERVE']?>actualizar/producto/<?=$data['id']?>" class="btn btn-outline-info">Actualizar</a>
                            <a href="<?=$_ENV['PAGE_SERVE']?>handlers/productos/eliminar.php?id=<?=$data['id']?>" class="btn btn-outline-danger">Eliminar</a>
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