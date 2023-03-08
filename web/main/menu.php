<?php

/**
 * @author KEVAO18
 * 
 * @return void
 */
function menu(){

    ?>
    <section>
        <article>
            <div class="row py-4">
                <div class="col-sm-6">
                    <h1 class="display-4 text-center">Contabilidad</h1>
                    <div class="card border-secondary">
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>ingresos" class="btn btn-outline-dark">Tabla de Ingresos</a>
                        </div>
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>egresos" class="btn btn-outline-dark">Tabla de Egresos</a>
                        </div>
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>totales" class="btn btn-outline-dark">Tabla de Totales</a>
                        </div>
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>insertar/ingreso" class="btn btn-outline-dark">Ingreso nuevo (Ingresos ó Egresos)</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h1 class="display-4 text-center">Control de Inventario</h1>
                    <div class="card border-secondary">
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>entradas" class="btn btn-outline-dark">Tabla de Productos Ingresados</a>
                        </div>
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>stock" class="btn btn-outline-dark">Tabla de Stock</a>
                        </div>
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>insertar/producto" class="btn btn-outline-dark">Nuevo Producto</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-4">
                <div class="col-sm-6">
                    <h1 class="display-4 text-center">Facturacion</h1>
                    <div class="card border-secondary">
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>facturas" class="btn btn-outline-dark">Facturas</a>
                        </div>
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>ventas" class="btn btn-outline-dark">Ventas Diarias</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h1 class="display-4 text-center">Registro de Clientes</h1>
                    <div class="card border-secondary">
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>clientes" class="btn btn-outline-dark">Tabla de clientes</a>
                        </div>
                        <div class="d-grid gap-4 py-2 px-4">
                            <a href="<?=$_ENV['PAGE_SERVE']?>insertar/cliente" class="btn btn-outline-dark">Nuevo Cliente</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <?php
}

?>