<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function stock(){
    
    require_once('../handlers/productos/stock.php');

    $productos = new productos();

    $datos = $productos->allColums();

    $suma = 0;
    
    $i=0;

    ?>

    <section>
        <article>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="id">#</th>
                        <th scope="documento">Codigo</th>
                        <th scope="nombre">Nombre</th>
                        <th scope="direccion">Precio Unidad</th>
                        <th scope="ciudad">Entradas</th>
                        <th scope="telefono">Salidas</th>
                        <th scope="correo">Stock</th>
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
                        <td><?=$data['entradas']?></td>
                        <td><?=$data['salidas']?></td>
                        <td><?=$data['stock']?></td>
                        <td>
                            <a href="<?=$_ENV['PAGE_SERVE']?>actualizar/clientes/<?=$data['id']?>" class="btn btn-outline-info">Actualizra</a>
                            <a href="<?=$_ENV['PAGE_SERVE']?>handlers/clientes/eliminar.php?id=<?=$data['id']?>" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <div class="d-grid gap-4">
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar/cliente" class="btn btn-outline-dark">Añadir Producto</a>
            </div>
        </article>
    </section>

    <?php
}

?>