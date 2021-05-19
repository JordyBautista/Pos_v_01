<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>Nueva orden de Compra</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Nueva orden de Compra</a></li>
                    </ol>


                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
           
                <div class="row invoice">
                    <div class="col-md-6">
                         <form role="form" method="post" class="formularioCompra">
                        <div class="card card-outline card-primary">


                            <div class="card-header pl-2 pb-0 m-0">

                                <div class="row border-bottom pt-0">
                                    <div class="col-sm-4 border-right ">
                                        <div class="description-block ">
                                            <h5 class="description-header ">Usuario</h5>
                                            <span class="description-text"> <?php echo $_SESSION["Nombres"] . ' ' . $_SESSION["Apellidos"]; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header ">Caja</h5>
                                            <span class="description-text">CA0001</span>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header ">Codigo De La Compra</h5>
                                            <span class="description-text">N.0000001</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  pl-0 pt-2 pb-0">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-success btn-sm" data-target="#SeleccionarProveedor" data-toggle="modal">Seleccionar Proveedor</button>

                                                </div>
                                                <input type="text" class="form-control" value="" id="RazonSocial" name="RazonSocial" readonly>
                                                <input type="hidden"  value="" id="idProveedor" name="idProveedor">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                                                    <button type="button" class="btn btn-success btn-sm" data-target="#RegistroProveedor" data-toggle="modal">Registar</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="card-body pt-0 pl-2 pr-2">

                                <div class="row ">
                                    <div class="col-12">
                                        <table class=" mr-0 table table-striped table-bordered table-sm TablaCompras-Productos" width="100%">

                                            <thead>
                                                <tr>
                                                    <th></th>                                                                                                  
                                                    <th>Descripcion del Producto</th>
                                                    <th>Precio Unit.</th>
                                                    <th style="width: 3%">Cantidad</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                    <div class="col-12 ">
                                        <table class="table  table-sm col-4 ml-auto">
                                            <tr>
                                                <th>Subtotal:</th>
                                                <td>$250.333.30</td>
                                            </tr>
                                            <tr>
                                                <th>IGV (18%)</th>
                                                <td>$10.34</td>
                                            </tr>
                                            <tr>
                                                <th>Descuento:</th>
                                                <td>$5.80</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>$26.599.924.35</td>
                                            </tr>
                                            <tr><th></th><td></td></tr>
                                        </table>

                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-12">

                                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#ModalPagosCompras"><i class="far fa-credit-card"></i> Guardar
                                        </button>

                                    </div>
                                </div>
                            </div>




                        </div>
                    


                    </form>
                </div>

                    <div class="col-md-6">
                        <div class="card card-outline card-primary pt-2  pl-2 pr-2">


                            <table id="TablaCompras-ProductosGeneral" class="table table-bordered table-hover TablaCompras-ProductosGeneral table-sm" style="width:100%">
                                <thead>
                                    <tr>

                                        <th style="width: 7%;">Imagen</th>
                                        <th>Descripcion</th>
                                        <th style="width: 5%">Precio Compra</th>
                                        <th style="width: 5%;">Stock</th>
                                        <th style="width: 4%;">Accion</th>
                                    </tr>
                                </thead>

                            </table>
                           


                        </div>
                    </div>


                </div>
            
        </div>
    </section>

</div>



<div class="modal fade ModalProveedor" id="SeleccionarProveedor" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header pt-3 pb-2">
                <h5 class="modal-title"><span class="fas fa-plus-square" id="TituloModal"> Proveedores</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle" aria-hidden="true"></i>
                </button>
            </div>

            <div class="modal-body">
                <table class="table  table-bordered table-striped  table-hover TablaProveedoresCompra table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Razon Social</th>
                            <th>Ruc</th>  
                            <th style="width:2%;">Accion</th>
                        </tr>
                    </thead>

                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>


