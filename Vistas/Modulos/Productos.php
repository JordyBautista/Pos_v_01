
<div class="content-wrapper ">

    <section class="content-header pt-7 pb-1 ">
        <div class="container-fluid   ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark font-weight-bolde">Productos</h4>
                </div>
                <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li> 
                        <li class="breadcrumb-item"><a href="#">Gestion de personal</a></li>
                        <li class="breadcrumb-item active text-dark">Productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#ModalNuevoProducto">         
                                Agregar Producto
                            </button>

                        </div>
                        <div class="card-body">

                            <table class="table  table-bordered table-striped TablaProductos table-hover table-sm"  width="100%">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Codigo</th>
                                        <th>Nombres</th>
                                        <th>Descripcion</th>
                                        <th>Presentacion</th>
                                        <th>Categoria</th>
                                        <th>Marca</th>
                                        <th>Proveedor</th>
                                        <th>F.Registro</th>
                                        <th>Accion</th>
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

<div class="modal fade" id="ModalNuevoProducto" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
<!-- id="producto_form" action="Ajax/Productos.Ajax.php"-->
            <form  id="producto_form" method="post" enctype="multipart/form-data">

            
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Nuevo Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="hidden" value="guardar" name="type">
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Codigo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IngresoCodigo">
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Proveedor</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select class="form-control select2bs4" name="IngresoProveedor">
                                    <option value="">Seleccionar</option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $proveedor = ProveedoresControlador::ctrMostrarProveedores($item, $valor);

                                    foreach ($proveedor as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '">' . $value["RazonSocial"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>




                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Marca</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select class="form-control select2bs4" name="IngresoMarca">
                                    <option value="">Seleccionar</option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $Marca = MarcasControlador::ctrMostrarMarcas($item, $valor);

                                    foreach ($Marca as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '">' . $value["Marca"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Categoria</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select class="form-control select2bs4" name="IngresoCategoria">
                                    <option value="">Seleccionar</option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $Cat = CategoriasControlador::ctrMostrarCategorias($item, $valor);

                                    foreach ($Cat as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '">' . $value["Categoria"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <label>Presentacion</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select class="form-control select2bs4" name="IngresoPresentacion">
                                    <option value="">Seleccionar</option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $Presentacion = PresentacionControlador::ctrMostrarPresentacion($item, $valor);

                                    foreach ($Presentacion as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '">' . $value["Presentacion"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <label>Nombre del Producto:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            </div>
                            <input type="text" class="form-control" name="IngresoProducto" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            </div>
                            <textarea type="text" class="form-control" name="IngresoDescripcion" ></textarea>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Stock </label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IngresoStock">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Stock Minimo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IngresoStockMinimo">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Stock Maximo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IngresoStockMaximo">
                            </div>
                        </div>






                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Precio de compra </label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IngresoPrecioCompra">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Precio de venta</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" name="IngresoPrecioVenta">
                            </div>
                        </div>

                    </div>


                    <!-- ENTRADA PARA SUBIR FOTO -->
                    <div class="form-row">

                        <div class="form-group col-md-6 ">
                            <div class="input-group">
                                <label>Subir imagen del Producto</label>
                            </div>
                            <div   class="input-group input-group-sm ">
                                <input type="file" class="nuevaFoto" name="nuevaFoto">                       
                            </div>
                            <div   class="input-group input-group-sm">                          
                                <p class="help-block">Peso máximo de la foto 2MB</p>
                            </div>

                        </div>

                        <div class="form-group col-md-6 ">
                            <div   class="input-group">
                                <img src="Vistas/img/Productos/Default/DefaultProducto.png" class="img-thumbnail previsualizar" width="100px">
                            </div>
                        </div>
                    </div>





                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $IngresoProductos = new ProductosControlador();
                $IngresoProductos->ctrCrearProductos();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Personal  ====-->



<!--=====================================
=            MODAL EDITTAR PRODUCTO           =
======================================-->

<div class="modal fade" id="ModalEditarProducto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Editar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="hidden" value="modificar" name="type">
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label>Codigo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" name="EditarCodigo" id="EditarCodigo" readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Proveedor</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select id="EditarProveedor" class="form-control select2bs4" name="EditarProveedor">
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $proveedor = ProveedoresControlador::ctrMostrarProveedores($item, $valor);

                                    foreach ($proveedor as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '"  >' . $value["RazonSocial"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>




                    </div>


                    <div class="form-row">



                        <div class="form-group col-md-4">
                            <label>Marca</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select id="EditarMarca" class="form-control select2bs4" name="EditarMarca"  >

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $Marca = MarcasControlador::ctrMostrarMarcas($item, $valor);

                                    foreach ($Marca as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '" >' . $value["Marca"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <label>Categoria</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select id="EditarCategoria" class="form-control select2bs4" name="EditarCategoria" >

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $Cat = CategoriasControlador::ctrMostrarCategorias($item, $valor);

                                    foreach ($Cat as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '" >' . $value["Categoria"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <label>Presentacion</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select  id="EditarPresentacion" class="form-control select2bs4" name="EditarPresentacion">

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $Presentacion = PresentacionControlador::ctrMostrarPresentacion($item, $valor);

                                    foreach ($Presentacion as $key => $value) {

                                        echo '<option value="' . $value["Codigo"] . '">' . $value["Presentacion"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <label>Nombre del Producto:</label>
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            </div>
                            <input type="text" class="form-control" name="EditarProducto" id="EditarProducto" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                            </div>
                            <textarea type="text" class="form-control" name="EditarDescripcion" id="EditarDescripcion" ></textarea>
                        </div>
                    </div>



                    <!-- ENTRADA PARA SUBIR FOTO -->
                    <div class="form-row">

                        <div class="form-group col-md-6 ">
                            <div class="input-group">
                                <label>Subir imagen del Producto</label>
                            </div>
                            <div   class="input-group input-group-sm ">
                                <input type="file" class="nuevaFoto" name="EditarFoto">                       
                            </div>
                            <div   class="input-group input-group-sm">                          
                                <p class="help-block">Peso máximo de la foto 2MB</p>
                            </div>

                        </div>

                        <div class="form-group col-md-6 ">
                            <div   class="input-group">
                                <img src="Vistas/img/Productos/Default/DefaultProducto.png" class="img-thumbnail previsualizar previsualizarEditar" width="100px">
                                <input type="hidden" name="fotoActual" id="fotoActual">
                            </div>
                        </div>
                    </div>





                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $EditarProductos = new ProductosControlador();
                $EditarProductos->ctrEditarProducto();
                ?>
            </form>
        </div>
    </div>
</div>



<!--====  End Modal Editar Personal  ====-->
<?php
$EliminarProducto = new ProductosControlador();
$EliminarProducto->ctrEliminarProductos();
?>