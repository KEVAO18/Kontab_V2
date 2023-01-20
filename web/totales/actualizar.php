<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function actualizar($id){
    
    require_once('../handlers/totales/totales.php');

    $totales = new totales();

    $datos = $totales->onlyOne($id);

    $suma = 0;

    $i = 0;

    ?>

    <section>
        <article class="card p-4" id="insert-form">
            <form action="<?=$_ENV['PAGE_SERVE']?>handlers/totales/actualizar.php" method="post">
                <?php
            foreach ($datos as $d) {
                ?>
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="conceptoLabel">Concepto</span>
                            <input type="text" class="form-control" id="concepto" aria-describedby="conceptoLabel" name="concepto" value="<?=$d['concepto']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" aria-label="Monto a ingresar" name="monto" value="<?=$d['monto']?>">
                        </div>
                    </div>
                </div>
                <?php
            }
                ?>
                <div class="d-grid gap-4">
                    <button type="submit" class="btn btn-outline-dark">Actualizar</button>
                </div>
            </form>
        </article>
    </section>

    <?php
}

?>