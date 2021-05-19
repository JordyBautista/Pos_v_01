
<div class="content-wrapper ">

    <section class="content-header pt-7 pb-1 ">
        <div class="container-fluid   ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark font-weight-bolde">Proveedores</h4>
                </div>
                <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li> 
                        <li class="breadcrumb-item"><a href="Personal">Gestion de personal</a></li>
                        <li class="breadcrumb-item active text-dark">Proveedores</li>
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
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm bg-primary " data-toggle="modal" data-target="#RegistroDeProveedor"><i class="fas fa-plus-circle"></i> Nuevo Proveedor

                            </div>
                            <div class="card-body">

                                <table class="table  table-bordered table-striped dt-responsive TablaDeDatos table-hover table-sm"  width="100%">
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Razon Social</th>
                                            <th>Ruc</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $Proveedores = ProveedoresControlador::ctrMostrarProveedores($item, $valor);

                                        foreach ($Proveedores as $key => $value) {

                                            echo '<tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $value["RazonSocial"] . '</td>
                    <td>' . $value['Ruc'] . '</td>
                    <td>' . $value['Direccion'] . '</td>
                    <td>' . $value['Correo'] . '</td>
                    <td>' . $value['Telefono'] . '</td>
                    <td>' . $value['Celular'] . '</td>
                   
                    <td>
                        <button class="btn btn-xs bg-warning btnEditarProveedor" data-toggle="modal" data-target="#ModalEditarProveedor" idProveedor="' . $value["Codigo"] . '" ><i class="fas fa-edit"></i></button>
                        <button class="btn btn-xs bg-danger btnEliminarProveedor" idProveedor="' . $value["Codigo"] . '" ><i class="fas fa-trash-alt"></i></button>
                    </td>
                    </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

    </section>

</div>






<!--=====================================
=            Modal Registro Proveedores         =
======================================-->

<div class="modal fade" id="RegistroDeProveedor" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Nuevo Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresar Codigo" name="IngresoCodigo" required>
                        </div>
                    </div>

                    <div class="form-group">
                        
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresar RazonSocial" name="IngresoRazonSocial" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Ingresar Ruc" name="IngresoRuc" >
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresar direccion" name="IngresoDireccion" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Ingresar correo" name="IngresoCorreo" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'mask':'(+99) 999-999-999'" data-mask placeholder="Ingresar celular" name="IngresoCelular" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'mask':'(99) 999-99-99'" data-mask placeholder="Ingresar telefono" name="IngresoTelefono" required>
                        </div>
                    </div>

                
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $IngresoProveedor = new ProveedoresControlador();
                $IngresoProveedor->ctrCrearProveedor();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Proveedores  ====-->



<!--=====================================
=            Modal Editar Proveedores           =
======================================-->

<div class="modal fade" id="ModalEditarProveedor" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Editar Personal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control"  id="EditarCodigo" name="EditarCodigo" readonly="">
                            <input type="hidden" id="idPersonal" name="idPersonal">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control"id="EditarRazonSocial" name="EditarRazonSocial" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="EditarRuc" name="EditarRuc" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="EditarDireccion" name="EditarDireccion" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="email" class="form-control" id="EditarCorreo" name="EditarCorreo" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'mask':'(+99) 999-999-999'" data-mask id="EditarCelular" name="EditarCelular" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'mask':'(99) 999-99-99'" data-mask id="EditarTelefono" name="EditarTelefono" required>
                        </div>
                    </div>




                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

<?php
$EditarProveedor = new ProveedoresControlador();
$EditarProveedor->ctrEditarProveedores();
?>
            </form>
        </div>
    </div>
</div>



<!--====  End Modal Editar Personal  ====-->
<?php
$EliminarProveedor = new ProveedoresControlador();
$EliminarProveedor->ctrEliminarProveedor();
?>