<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function insertar(){
    
    require_once('../handlers/totales.php');

    $totales = new totales();

    $datos = $totales->allColums();

    $suma = 0;

    $i = 0;

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/insertar.php" method="post">
                <select class="form-select" aria-label="tipos" name="tipos">
                    <option selected>Ingreso ó Egreso</option>
                    <option value="0">Ingreso</option>
                    <option value="1">Egreso</option>
                </select>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="conceptoLabel">Concepto</span>
                            <input type="text" class="form-control" id="concepto" aria-describedby="conceptoLabel" name="concepto">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" aria-label="Monto a ingresar" name="monto">
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
                        <th scope="Id">#</th>
                        <th scope="fecha">Fecha</th>
                        <th scope="concepto">Concepto</th>
                        <th scope="saldo">Saldo</th>
                        <th scope="tipo">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($datos as $data) {
                    $i +=1; 
                ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$data['fecha']?></td>
                        <td><?=$data['concepto']?></td>
                        <td><?=$data['monto']?></td>
                        <?php
                        switch ($data['tipo']) {
                            case '0':
                                echo "<td>Ingreso</td>";
                                $suma += $data['monto'];
                                break;

                            case '1':
                                echo "<td>Egreso</td>";
                                $suma -= $data['monto'];
                                break;
                        }
                        ?>
                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td>total</td>
                    <td></td>
                    <td></td>
                    <td><?=$suma?></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </article>
    </section>

    <?php
}

?>