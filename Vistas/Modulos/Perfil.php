
<div class="content-wrapper ">

    <section class="content-header pt-7 pb-1 ">
        <div class="container-fluid   ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark font-weight-bolde">Perfil</h4>
                </div>
                <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li> 
                        <li class="breadcrumb-item"><a href="Personal">Almacen</a></li>
                        <li class="breadcrumb-item active text-dark">Perfil</li>
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
                                <button type="button" class="btn btn-sm bg-primary " data-toggle="modal" data-target="#RegistroDePerfil"><i class="fas fa-plus-circle"></i> Nueva Perfil
                                </button>
                            </div> 

                        </div>
                        <div class="card-body">

                            <table class="table  table-hover table-bordered table-striped  TablaPerfil table-sm"  width="100%">
                                <thead>

                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" >Codigo</th>
                                        <th scope="col" >Perfil</th>
                                        <th scope="col" >Descripcion</th>
                                        <th scope="col" style="width: 10%">Accion</th>
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
=            Modal Registro Perfil         =
======================================-->

<div class="modal fade" id="RegistroDePerfil" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Nueva Perfil</h5>
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
                            <input type="text" class="form-control"  id="IngresoidPerfil"  name="IngresoidPerfil" placeholder="Ingreso codigo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control IngresoPerfil" placeholder="Ingresar Perfil" name="IngresoPerfil" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <textarea type="textarea" class="form-control" placeholder="Ingresar la descripcion " name="IngresoDescripcion" required></textarea> 
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $IngresoPerfil = new  PerfilControlador();
                $IngresoPerfil->ctrCrearPerfil();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Perfil  ====-->



<!--=====================================
=            Modal Editar Perfil           =
======================================-->

<div class="modal fade" id="ModalEditarPerfil" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Editar Perfil</h5>
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
                            <input type="text" class="form-control"  id="EditaridPerfil" name="EditaridPerfil" readonly="">
                            <input type="hidden" id="idPerfil" name="idPerfil">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control"id="EditarPerfil" name="EditarPerfil" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <textarea type="textarea" class="form-control" id="EditarDescripcion" name="EditarDescripcion" required></textarea>
                        </div>
                    </div>





                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $EditarPerfil = new PerfilControlador();
                $EditarPerfil->ctrEditarPerfil();
                ?>
            </form>
        </div>
    </div>
</div>



<!--====  End Modal Editar Personal  ====-->
<?php
$EliminarPerfil = new PerfilControlador();
$EliminarPerfil->ctrEliminarPerfil();
?>