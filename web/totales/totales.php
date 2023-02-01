<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function totales(){
    
    require_once('../handlers/totales/totales.php');

    $totales = new totales();

    $datos = $totales->allColums();

    $suma = 0;
    
    $i=0;

    ?>

    <section>
        <article>
            <div class="d-grid gap-4 py-4">
                <a href="<?=$_ENV['PAGE_SERVE']?>insertar/ingreso" class="btn btn-outline-dark">Añadir Ingreso Ó Egreso</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="Id">#</th>
                        <th scope="fecha">Fecha</th>
                        <th scope="concepto">Concepto</th>
                        <th scope="saldo">Saldo</th>
                        <th scope="tipo">Tipo</th>
                        <th scope="acciones">acciones</th>
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
                        <td>
                            <a href="<?=$_ENV['PAGE_SERVE']?>actualizar/ingreso/<?=$data['id']?>" class="btn btn-outline-info">Actualizar</a>
                            <a href="<?=$_ENV['PAGE_SERVE']?>handlers/totales/eliminar.php?id=<?=$data['id']?>" class="btn btn-outline-danger">Eliminar</a>
                        </td>
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
                    <td></td>
                </tr>
                </tbody>
            </table>
        </article>
    </section>

    <?php
}

?>