<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function ingresos(){
    
    require_once('../handlers/totales/ingresos.php');

    $ingresos = new ingresos();

    $datos = $ingresos->allIngresos();

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
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar/ingreso" class="btn btn-outline-dark">Añadir Ingreso</a>
            </div>
        </article>
    </section>

    <?php
}

?>