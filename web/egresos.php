<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function egresos(){
    
    require_once('../handlers/egresos.php');

    $egresos = new egresos();

    $datos = $egresos->allEgresos();

    $suma = 0;

    ?>

    <section>
        <article>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Saldo</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                ?>
                    <tr>
                        <td><?=$data['fecha']?></td>
                        <td><?=$data['concepto']?></td>
                        <td><?=$data['monto']?></td>
                    </tr>
                <?php
                        $suma += $data['monto'];
                    }
                ?>
                <tr>
                    <td>total</td>
                    <td></td>
                    <td><?=$suma?></td>
                </tr>
                </tbody>
            </table>
            <div class="d-grid gap-4">
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar" class="btn btn-outline-dark">Añadir Egreso</a>
            </div>
        </article>
    </section>

    <?php
}

?>