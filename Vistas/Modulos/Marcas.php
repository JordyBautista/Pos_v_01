
<div class="content-wrapper ">

    <section class="content-header pt-7 pb-1 ">
        <div class="container-fluid   ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark font-weight-bolde">Marcas</h4>
                </div>
                <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li> 
                        <li class="breadcrumb-item"><a href="Personal">Almacen</a></li>
                        <li class="breadcrumb-item active text-dark">Marcas</li>
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
                                <button type="button" class="btn btn-sm bg-primary " data-toggle="modal" data-target="#RegistroDeMarca"><i class="fas fa-plus-circle"></i> Nueva Marca
                                </button>
                            </div> 

                        </div>
                        <div class="card-body">

                            <table class="table  table-hover table-bordered table-striped dt-responsive TablaDeDatos table-sm"  width="100%">
                                <thead>

                                    <tr>
                                        <th scope="col" >#</th>
                                        <th scope="col" >Codigo</th>
                                        <th scope="col" > Marca</th>
                                        <th scope="col" >Abreviatura</th>
                                        <th scope="col" >Estado</th>
                                        <th scope="col" style="width: 10%">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $item = null;
                                    $valor = null;
                                    $Marcas = MarcasControlador::ctrMostrarMarcas($item, $valor);

                                    foreach ($Marcas as $key => $value) {

                                        echo '<tr>
                    <td scope="row">' . ($key + 1) . '</td>
                    <td>' . $value["Codigo"] . '</td>
                    <td>' . $value["Marca"] . '</td>
                    <td>' . $value['Marca_Corto'] . '</td>
                    <td> ';
                                        if ($value["Estado"] == "01") {

                                            echo'<button class="btn btn-success btn-xs">Activo </button>';
                                        } elseif ($value["Estado"] == "02") {

                                            echo'  <button class="btn btn-danger btn-xs">Cesado </button>  ';
                                        }
                                        echo' </td>
                    <td>
                        <button class="btn btn-sm bg-warning btnEditarMarca" data-toggle="modal" data-target="#ModalEditarMarca" idMarca="' . $value["Codigo"] . '" ><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm bg-danger btnEliminarMarca" idMarca="' . $value["Codigo"] . '" ><i class="fas fa-trash-alt"></i></button>
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
=            Modal Registro Marcas         =
======================================-->

<div class="modal fade" id="RegistroDeMarca" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Nueva Marca</h5>
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
                            <input type="text" class="form-control" placeholder="Ingresar Marca" name="IngresoMarca" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresar Nombre Corto " name="IngresoMarcaCorto" required>
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


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $IngresoMarca = new MarcasControlador();
                $IngresoMarca->ctrCrearMarca();
                ?>
            </form>
        </div>
    </div>
</div>

<!--====  End Modal Registro Marcas  ====-->



<!--=====================================
=            Modal Editar Marcas           =
======================================-->

<div class="modal fade" id="ModalEditarMarca" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">


                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Editar Marca</h5>
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
                            <input type="text" class="form-control"id="EditarMarca" name="EditarMarca" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="EditarNombreCorto" name="EditarNombreCorto" required>
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


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

                <?php
                $EditarMarca = new MarcasControlador();
                $EditarMarca->ctrEditarMarca();
                ?>
            </form>
        </div>
    </div>
</div>



<!--====  End Modal Editar Personal  ====-->
<?php
$EliminarMarca = new MarcasControlador();
$EliminarMarca->ctrEliminarMarca();
?>