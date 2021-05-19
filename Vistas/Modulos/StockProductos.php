<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>STOCK DE PRODUCTOS</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Stock Productos</a></li>
                    </ol>


                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">                        
                        <div class="card-body">

                            <table class="table  table-hover table-bordered table-striped table-sm TablaStockProductos"  style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Codigo</th>
                                        <th>Producto</th>
                                        <th>Stock Minimo</th>
                                        <th>Stock Maximo</th>
                                        <th>Stock</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th style="width: 5%">Accion</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </section>
</div>







<!--=====================================
=           MODAL REGISTRO PRODUCTO           =
======================================-->

<div class="modal fade" id="ModalEditarStockProducto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Nuevo Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Codigo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" id="StockCodigo" name="StockCodigo" readonly=>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <label>Nombre del Producto</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="StockNombreProducto" name="StockNombreProducto" readonly>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Stock</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                </div>
                                <input type="text" class="form-control" id="StockProducto" name="StockProducto">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Stock Minimo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-arrow-alt-circle-down"></i></span>
                                </div>
                                <input type="text" class="form-control" id="StockMinimo" name="StockMinimo">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Stock Maximo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-arrow-alt-circle-up"></i></span>
                                </div>
                                <input type="text" class="form-control" id="StockMaximo" name="StockMaximo">
                            </div>
                        </div>


                    </div>



                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Precio de Compra</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="text" class="form-control" id="StockPrecioCompra" name="StockPrecioCompra">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Porcentaje de venta</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <input  type="checkbox" class="PorcentajeVenta">
                                    </span>
                                </div>
                                <input type="text" class="form-control nuevoPorcentaje" >
                                <div class="input-group-append">
                                    <div class="input-group-text"><i class="fas fa-percent"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Precio de venta</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="text" class="form-control" id="StockPrecioVenta" name="StockPrecioVenta">
                            </div>
                        </div>


                    </div>




                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Modificar</button>
                </div>

                <?php
                $ActualizarStockProductos = new ProductosControlador();
                $ActualizarStockProductos->ctrActualizarStockProductos();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Personal  ====-->
