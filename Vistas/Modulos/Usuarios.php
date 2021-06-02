
<div class="content-wrapper ">

    <section class="content-header pt-7 pb-1 ">
        <div class="container-fluid   ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark font-weight-bolde">Usuarios
                    </h4>
                </div>
                <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li> 
                        <li class="breadcrumb-item"><a href="Personal">Gestion Personal</a></li>
                        <li class="breadcrumb-item active text-dark">Usuarios
                        </li>
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
                                <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#RegistroDeUsuarios"><i class="fas fa-plus-circle"></i> Nuevo Usuario</button>
                            </div> 
                        </div>
                        <div class="card-body">

                            <table class="table  table-hover table-bordered table-striped table-sm TablaUsuarios"  style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Codigo</th>
                                        <th>Personal</th>
                                        <th>Perfil</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
                                        <th>Fecha registro</th>
                                        <th style="width: 10%">Accion</th>
                                    </tr>
                                </thead>
                                
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
=           MODAL REGISTRO DE USUARIOS =
======================================-->

<div class="modal fade" id="RegistroDeUsuarios" data-backdrop="static">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" id="registrar_usuario_form">
                <input type="hidden" name="registrar_usuario" value="registrausuario">

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Nuevo Usuarios
                    </h5>
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
                            <select class="form-control input-sm" id="IngresoPersonal" name="IngresoPersonal" required>
                                <option value="">Selecionar Personal</option>
                                <?php
                                $item = null;
                                $valor = null;

                                $Personal = PersonalControlador::ctrMostrarPersonalSinUsuario($item, $valor);

                                foreach ($Personal as $key => $value) {

                                    echo '<option value="' . $value["idPersonal"] . '">' . $value["Nombres"] . '  ' . $value["Apellidos"] . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <select class="form-control input-sm" id="IngresoPerfil" name="IngresoPerfil" required>
                                <option value="">Selecionar Perfil</option>
                                <?php
                                $item = null;
                                $valor = null;
                                $orden="idPerfil";

                                $Perfil = PerfilControlador::ctrMostrarPerfil($item, $valor,$orden);

                                foreach ($Perfil as $key => $value) {

                                    echo '<option value="' . $value["idPerfil"] . '">' . $value["Perfil"] . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresar Usuario" name="IngresoUsuario" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Ingresar Contraseña " name="IngresoPassword" required>
                        </div>
                    </div>

              </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $IngUsuarios = new UsuariosControlador();
                $IngUsuarios->ctrCrearUsuario();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Usuarios
  ====-->



<!--=====================================
=            Modal Editar Usuarios
           =
======================================-->

<div class="modal fade" id="ModalEditarUsuario" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Editar Usuarios
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="input-group">
                            <input type="hidden" id="idUsuario" name="idUsuario">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="EditarUsuario" name="EditarUsuario" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <select class="form-control input-sm" id="EditarPerfil" name="EditarPerfil" required>
                                <option value="">Selecionar Perfil</option>
                                <?php
                                $item = null;
                                $valor = null;
                                $orden="idPerfil";

                                $Perfil = PerfilControlador::ctrMostrarPerfil($item, $valor,$orden);

                                foreach ($Perfil as $key => $value) {

                                    echo '<option value="' . $value["idPerfil"] . '">' . $value["Perfil"] . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <select required class="form-control input-sm" name="EditarEstado" id="EditarEstado">
                                <option value="1">Activo</option>
                                <option value="0">Bloqueado</option>

                            </select>

                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $EditarUsuarios = new UsuariosControlador();
                $EditarUsuarios->ctrEditarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>



<!--====  End Modal Editar Personal  ====-->
<?php
$EliminarUsuarios = new UsuariosControlador();
$EliminarUsuarios->ctrEliminarUsuario();
?>