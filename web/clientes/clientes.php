<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function clientes(){
    
    require_once('../handlers/clientes/clientes.php');

    $clientes = new clientes();

    $datos = $clientes->allColums();

    $suma = 0;
    
    $i=0;

    ?>

    <section>
        <article>
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
                        <th scope="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                    $i +=1; 
                    $estado = ($data['estado'] == 1) ? "<td>Sin Pendientes</td>" : "<td>Pendiente</td>" ;
                ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$data['documento']?></td>
                        <td><?=$data['nombre']?></td>
                        <td><?=$data['direccion']?></td>
                        <td><?=$data['ciudad']?></td>
                        <td><?=$data['telefono']?></td>
                        <td><?=$data['correo']?></td>
                        <td>
                            <a href="<?=$_ENV['PAGE_SERVE']?>actualizar/clientes/<?=$data['id']?>" class="btn btn-outline-info">Actualizar</a>
                            <a href="<?=$_ENV['PAGE_SERVE']?>handlers/clientes/eliminar.php?id=<?=$data['id']?>" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <div class="d-grid gap-4">
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar/cliente" class="btn btn-outline-dark">Añadir Cliente</a>
            </div>
        </article>
    </section>

    <?php

}

?>