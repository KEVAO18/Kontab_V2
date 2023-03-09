<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function ventas(){
    
    // llamado a los handlers
    require_once('../handlers/facturas/ventas/ventas.php');

    // declaracion de objetos de las claces handler
    $ventas = new ventas();

    // manipulando la base de datos mediante los handlers
    $datos = $ventas->allColums(); // manejo de ventas uniendo las tablas ventas, productos y facturas

    $i = 0;

    $tot = 0;

    ?>

    <section>
        <article>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="id">Id</th>
                        <th scope="codigoF">Codigo de Factura</th>
                        <th scope="codigoP">Codigo de Producto</th>
                        <th scope="producto">Producto</th>
                        <th scope="unidades">Unidades</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {

                    $i +=1; 
                ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><a title="ir a la factura" class="text-success text-decoration-none" href="<?=$_ENV['PAGE_SERVE']?>factura/<?=$data['codigoF']?>"><?=$data['codigoF']?></a></td>
                        <td><?=$data['codigoP']?></td>
                        <td><?=$data['producto']?></td>
                        <td><?=$data['unidades']?></td>
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