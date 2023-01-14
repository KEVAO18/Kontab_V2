<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function egresos(){
    
    require_once('../handlers/egresos.php');

    $egresos = new egresos();

    $datos = $egresos->allColums();

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
                        <th scope="col"></th>
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
                        <td>1</td>
                    </tr>
                <?php
                        $suma += $data['monto'];
                    }
                ?>
                <tr>
                    <td>total</td>
                    <td></td>
                    <td><?=$suma?></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <div class="d-grid gap-4">
                <a href="" class="btn btn-outline-dark">Añadir Ingreso</a>
            </div>
        </article>
    </section>

    <?php
}

?>