
<div class="content-wrapper ">

    <section class="content-header pt-7 pb-1 ">
        <div class="container-fluid   ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark font-weight-bolde">Personal</h4>
                </div>
                <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li> 
                        <li class="breadcrumb-item"><a href="#">Gestion de personal</a></li>
                        <li class="breadcrumb-item active text-dark">Personal</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-sm bg-primary" data-toggle="modal" data-target="#ModalPersonal"><i class="fas fa-plus-circle"></i>          
                                Agregar Personal
                            </button>

                        </div>
                        <div class="card-body">

                            <table class="table  table-bordered table-striped dt-responsive TablaDeDatos  table-hover table-sm"  width="100%">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Codigo</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>DNI</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Direccion</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $Personal = PersonalControlador::ctrMostrarPersonal($item, $valor);

                                    foreach ($Personal as $key => $value) {

                                        echo '<tr>
                    <td>' . ($key + 1) . '</td>
                    <td><img src="' . $value["Foto"] . ' " class="img-thumbnail" width="40px"></td>
                    <td>' . $value["idPersonal"] . '</td>
                    <td>' . $value["Nombres"] . '</td>
                    <td>' . $value['Apellidos'] . '</td>
                    <td>' . $value['Dni'] . '</td>
                    <td>' . $value['Fecha_Nacimiento'] . '</td>
                    <td>' . $value['Direccion'] . '</td>
                    <td>' . $value['Correo'] . '</td>
                    <td>' . $value['Telefono'] . '</td>
                    <td>' . $value['Celular'] . '</td>
                    <td> ';
                                        if ($value["Estado"] == "01") {

                                            echo'<button class="btn btn-success btn-xs">Activo </button>';
                                        } elseif ($value["Estado"] == "02") {

                                            echo'  <button class="btn btn-danger btn-xs">Cesado </button>  ';
                                        }
                                        echo' </td>
                    <td>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-warning btnEditarPersonal" data-toggle="modal" data-target="#ModalEditarPersonal" idPersonal="' . $value["idPersonal"] . '" ><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger btnEliminarPersonal" idPersonal="' . $value["idPersonal"] . '"  fotoPersonal="' . $value["Foto"] . '" ><i class="fas fa-trash-alt"></i></button>
                    </div>
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
=            Modal Registro Personal           =
======================================-->

<div class="modal fade" id="ModalPersonal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Agregar Personal</h5>
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
                            <input type="text" class="form-control" placeholder="Ingresar nombre" name="IngresoNombre" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresar Apellidos" name="IngresoApellidos" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresar DNI"name="IngresoDni" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask placeholder="Ingresar fecha de nacimiento" name="IngresoFechaNacimiento">
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

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <select class="form-control input-sm" name="IngresoEstado">
                                <option value="">Selecionar Estado</option>
                                <option value="01">Activo</option>
                                <option value="02">Cesado</option>

                            </select>

                        </div>
                    </div>

                    <!-- ENTRADA PARA SUBIR FOTO -->

                    <div class="form-group">
                        <div class="input-group">
                            <div class="panel">SUBIR FOTO</div>
                        </div>
                        <div   class="input-group">
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                        </div>
                        <div   class="input-group">
                            <img src="Vistas/img/Personal/Default/Usuario.png" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $IngresoPersonal = new PersonalControlador();
                $IngresoPersonal->ctrCrearPersonal();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Personal  ====-->



<!--=====================================
=            Modal Editar Personal           =
======================================-->


<!--=====================================
=            Modal Registro Personal           =
======================================-->

<div class="modal fade" id="ModalEditarPersonal" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <input type="text" class="form-control"id="EditarNombres" name="EditarNombres" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="EditarApellidos" name="EditarApellidos" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="EditarDni" name="EditarDni" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask id="EditarFechaNacimiento"name="EditarFechaNacimiento">
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

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <select class="form-control input-sm" name="EditarEstado">
                                <option value="" id="EditarEstado"></option>
                                <option value="01">Activo</option>
                                <option value="02">Cesado</option>

                            </select>

                        </div>
                    </div>

                    <!-- ENTRADA PARA SUBIR FOTO -->

                    <div class="form-group">
                        <div class="input-group">
                            <div class="panel">SUBIR FOTO</div>
                        </div>
                        <div   class="input-group">
                            <input type="file" class="nuevaFoto" name="EditarFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                        </div>
                        <div   class="input-group">
                            <img src="Vistas/img/Personal/Default/Usuario.png" class="img-thumbnail previsualizar previsualizarEditar" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>
                    </div>



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $EditarPersonal = new PersonalControlador();
                $EditarPersonal->ctrEditarPersonal();
                ?>
            </form>
        </div>
    </div>
</div>



<!--====  End Modal Editar Personal  ====-->
<?php
$EliminarPersonal = new PersonalControlador();
$EliminarPersonal->ctrEliminarPersonal();
?>