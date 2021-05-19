 
<div class="content-wrapper ">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>CLIENTES</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Ventas</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Clientes</a></li>
                    </ol>


                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">
            
                    <div class="card">
                        <div class="card-header">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm bg-primary " data-toggle="modal" data-target="#RegistroDeCliente"><i class="fas fa-plus-circle"></i> Nuevo Cliente
                                </button>
                            </div> 

                        </div>
                        <div class="card-body">

                            <table class="table  table-bordered table-striped TablaClientes table-hover table-sm"  style="width:100%">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Nombres</th>
                                        <th>DNI</th>
                                         <th>F. Nacimiento</th>
                                        <th>Direccion</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Total Compras</th>
                                        <th>Ultima Compra</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>


                            </table>
                        </div>

                    </div>
                    
            
        </div>

    </section>

</div>






<!--=====================================
=            Modal Registro clientes        =
======================================-->

<div class="modal fade" id="RegistroDeCliente" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


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

                <?php
                $IngresoCliente = new ClientesControlador();
                $IngresoCliente->ctrCrearCliente();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Contactos  ====-->



<!--=====================================
=            Modal Editar clientes           =
======================================-->
<div class="modal fade" id="ModalEditarCliente" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Editar Cliente</h5>
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
                                <input type="text" class="form-control"  id="EditarCodigo" name="EditarCodigo"  readonly>
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Nombres</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="EditarNombre"  name="EditarNombre"required>
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
                                <input type="text" class="form-control" id="EditarDni" name="EditarDni" required>
                            </div>
                        </div>



                        <div class="form-group col-md-8">
                            <label>Direccion</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="EditarDireccion" name="EditarDireccion" required>
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
                                <input type="text" class="form-control"  id="EditarFechaNacimiento" name="EditarFechaNacimiento"  required>
                            </div>
                        </div>

                        <div class="form-group col-md-8">
                            <label>Correo</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>  
                                <input type="email" class="form-control"  id="EditarCorreo" name="EditarCorreo" required>
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
                                <input type="text" class="form-control" data-inputmask="'mask':'(+99) 999-999-999'" data-mask id="EditarCelular"name="EditarCelular"  required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Telefono</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'mask':'(99) 999-99-99'" data-mask  id="EditarTelefono"  name="EditarTelefono" required>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $EditarCliente = new ClientesControlador();
                $EditarCliente->ctrEditarClientes();
                ?>
            </form>
        </div>
    </div>
</div>


<!--====  End Modal Editar Personal  ====-->
<?php
$EliminarCliente = new ClientesControlador();
$EliminarCliente->ctrEliminarCliente();
?>