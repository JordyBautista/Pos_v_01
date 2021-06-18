<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>Alquilar Maquinaria</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Alquilar Maquinaria</a></li>
                    </ol>


                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row invoice">
                <div class="col-md-6">
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
                                        <span class="description-text" id="codigoAlquiler">00000</span>

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
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Total: <b>s/. <span id="total">0.00</span></b></h5>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group col-md-4">
                                <label>Buscar por Marca:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    </div>
                                    <select id="buscarMarca" class="form-control select2bs4">
                                        <option value="">Seleccione</option>
                                        <?php

                                        $Marca = MarcasControlador::ctrMostrarMarcas(null, null);

                                        foreach ($Marca as $key => $value) {

                                            echo '<option value="' . $value["Codigo"] . '" >' . $value["Marca"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                            <label>Serie</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <select class="form-control" id="buscarSerie">
                                    <option value="">Seleccionar</option>
                                    <option value="Volquete">Volquete</option>
                                    <option value="Retroescavadora">Retroescavadora</option>
                                    <option value="CargadorFrontal">Cargador Frontal</option>
      
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                                <table id="productosAlquiler" class=" mr-0 table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Placa</th>
                                            <th>Descripcion</th>
                                            <th>Serie</th>
                                            <th>Marca</th>
                                            <th>Precio</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body pt-1 pl-2 pr-2">
                        <div class="row">
                            <div class="col-md-5" id="widget_parent">
                                Seleccionar Fecha Salida:
                                <div class="input-group date" id="datetimepicker">
                                    <input id="datetimepicker_input" readonly type="text" value="" class="form-control" placeholder="DD/NN/YYYY HH:mm"/>
                                    <label for="datetimepicker_input" class="input-group-text btn btn-secondary docs-datepicker-trigger">
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5" id="widget_parent_devolu">
                                Seleccionar Fecha Devolucion:
                                <div class="input-group date" id="datetimepicker_devolucion">
                                    <input id="datetimepicker_input_devolucion" readonly type="text" value="" class="form-control" placeholder="DD/NN/YYYY HH:mm"/>
                                    <label for="datetimepicker_input_devolucion" class="input-group-text btn btn-secondary docs-datepicker-trigger">
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                            
                                <button class=" btn btn-success" onclick="guardar()">Registrar</button>
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-12">
                                <table class=" mr-0 table table-striped table-bordered table-sm TablaProductosAddAlquiler" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Placa</th>
                                            <th>Precio</th>
                                            <th>F. Salida</th>
                                            <th>F. Devolucion</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>


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