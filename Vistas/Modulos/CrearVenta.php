<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>Nueva venta</h5>
                    <button class="btn btn-primary" onclick="probando()">Probando</button>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Ventas</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Nueva venta</a></li>

                    </ol>


                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row invoice">

                <div class="col-md-7">
                    <form method="post" class="formularioVenta" enctype="multipart/form-data">
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
                                            <h5 class="description-header ">Codigo de la Venta</h5>
                                            <span class="description-text" name="codigoVenta" id="codigoVenta">00000</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row  pl-0 pt-2 pb-0">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-success btn-sm" data-target="#ModalSeleccionarCliente" data-toggle="modal">Seleccionar Cliente</button>

                                                </div>
                                                <input type="text" class="form-control" value="" id="DatosDelCliente" name="DatosDelCliente" readonly>
                                                <input type="hidden"  value="" id="idCliente" name="idCliente">

                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-success btn-sm" data-target="#RegistroDeCliente" data-toggle="modal">Registar Cliente</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-1 pl-2 pr-2">

                            <div class="row ">
                                <div class="col-12">
                                    <table class=" mr-0 table table-striped table-bordered table-sm TablaProductosAddVentas" width="100%">
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
                                            <td><span id="subTotal"></span>
                                                <input type="hidden" name="SubTotal" id="SubTotal">
                                            </td>

                                        </tr>
                                        <tr>
                                            <th>IGV (18%)</th>
                                            <td><span id="igv"></span></td>
                                        <input type="hidden"  name='IGV' id='IGV'>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td><span id="total"></span></td>
                                        <input  type="hidden" name='Total' id='Total'>
                                        </tr>
                                        <tr>
                                            <th>Dscto. %</th>
                                            <td><input style="    border: none;" disabled="disabled" type="number" min="0" max="100" id="dscto" name='dscto' value="0"></td>
                                        </tr>
                                        <tr>
                                            <th>Total Final:</th>
                                            <td><span id="totalFinal"></span></td>
                                        <input type="hidden" name='TotalFinal' id='TotalFinal'>
                                        </tr>
                                        <tr><th></th><td></td></tr>
                                    </table>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <button type="button" class="btn btn-success float-right btnGuardarVenta" data-toggle="modal" data-target="#ModalPagosCompras"><i class="far fa-credit-card"></i> Guardar
                                    </button>

                                </div>
                            </div>


                        </div>
                    </form>
                </div>





                <div class="col-md-5">
                    <div class="card card-outline card-primary pt-2  pl-2 pr-2">
                        <table class="table table-bordered table-hover TablaProductosVenta table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 7%;">Imagen</th>
                                    <th>Producto</th>
                                    <th style="width: 17%">Precio</th>
                                    <th style="width: 15%;">Stock</th>
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









<div class="modal fade" id="ModalPagosCompras" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form method="post" enctype="multipart/form-data" id="ModalVenta">
            <div class="modal-content">
                <div class="modal-header pt-3 pb-2">
                    <h5 class="modal-title"><span class="fas fa-plus-square" id="TituloModal"> Facturar Venta</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times-circle" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-normal">Seleccione metodo de pago</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" required=>
                                    <option selected>Seleccionar</option>
                                    <option>Efectivo</option>
                                    <option>Tarjeta de Credito</option>
                                    <option>Tarjeta de Debito</option>

                                </select>  
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="font-weight-normal">Seleccione comprobante de Venta</label>
                            <div class="input-group">
                                <select class="form-control form-control-sm" required>
                                    <option selected>Seleccionar</option>
                                    <option>Factura</option>
                                    <option>Boleta</option>
                                    <option>Baucher</option>

                                </select>  
                            </div>
                        </div>
                    </div>


                    <div class="form-row">                       
                        <div class="form-group col-md-4">
                            <label class="font-weight-normal">A pagar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="MontoPagar" id="MontoPagar" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-normal">Efectivo recibido</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span>
                                </div>
                                <input type="number" class="form-control form-control-sm EfectivoRecibido" id="EfectivoRecibido" name="EfectivoRecibido">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-normal">Cambio</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="Cambio" name="Cambio" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">                                             
                        <div class="form-group col-md-12">
                            <label class="font-weight-normal">Codigo de transaccion</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="CodigoTransaccion" name="CodigoTransaccion">
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Venta</button>
                    </div>




                </div>
            </div>

            <?php
            $ventas = new VentasControlador();
            $ventas->ctrCrearVenta();
            ?>
        </form>
    </div>
</div>


























<!--=======================================
=            MODAL ADD CLIENTE            =
========================================-->
<div class="modal fade" id="RegistroDeCliente" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Nuevo Cliente</h5>
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
                                    <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Codigo" name="IngresoCodigo" required>
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Nombres</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ingresar nombres" name="IngresoNombre" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>DNI</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ingresar DNI"name="IngresoDni" required>
                            </div>
                        </div>



                        <div class="form-group col-md-8">
                            <label>Direccion</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ingresar direccion" name="IngresoDireccion" required>
                            </div>
                        </div>



                    </div>
                    <div class="form-row">         

                        <div class="form-group col-md-4">
                            <label>Fecha Nacimiento</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Ingresar Fecha nacimiento" name="IngresoFechaNacimiento" required>
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Correo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Ingresar correo" name="IngresoCorreo" required>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label>Celular</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'mask':'(+99) 999-999-999'" data-mask placeholder="Ingresar celular" name="IngresoCelular" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Telefono</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'mask':'(99) 999-99-99'" data-mask placeholder="Ingresar telefono" name="IngresoTelefono" required>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>


            </div>

            <?php
            $IngresoCliente = new ClientesControlador();
            $IngresoCliente->ctrCrearCliente();
            ?>
        </form>

    </div>
</div>

<!--====  End of MODAL ADD CLIENTE  ====-->




<!--=========================================
=            SELECCIONAR CLIENTE            =
==========================================-->

<div class="modal fade ModalSeleccionarCliente" id="ModalSeleccionarCliente" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccionar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table  table-bordered table-striped  table-hover TablaSeleccionarCliente table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>DNI</th>  
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

<!--====  End of SELECCIONAR CLIENTE  ====-->
