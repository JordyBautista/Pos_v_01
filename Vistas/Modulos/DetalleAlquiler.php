<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>Administar Alquiler</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Alquiler</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card" >
            <div class="card-header pt-2 pb-0">
                <div class="row">
                    <select id="buscar_estado" class="col-md-3 form-control" name="" id="">
                        <option value="1">Vigente</option>
                        <option value="0">Cancelado</option>
                        <option value="2">Realizado</option>
                    </select>
                </div>
                
            </div>

            <div class="card-body ">
                <table id="tabla_Alquiler" class="table table-bordered table-striped table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>


    </section>

</div>

<div class="modal fade" id="modal_detalle_alquiler" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">


        <div class="modal-dialog modal-lg">
            
            <div class="modal-content">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h5 class="modal-title">Detalle del Alquiler</h5>
                    <button onclick="limpiarDetalle()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">            
                    <div class="card">
                        <div class="card-header">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                    </tr>
                                    <tr>
                                        <td id="alq_codigo"></td>
                                        <td id="alq_cliente"></td>
                                        <td id="alq_fecha"></td>
                                        <td id="alq_total"></td>
                                        <td id="alq_Estado"></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Tipo Observacion: </label>
                                    <select id="tipo_observacion" class="form-control">
                                        <option value="correcto">Correcto</option>
                                        <option value="incorrecto">Incorrecto</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Observacion: </label>
                                    <textarea class="form-control" id="observacion"></textarea>
                                </div>
                            </div><br>
                            <table width="100%" class="table table-bordered table-striped table-sm" id="detalle_alquiler_ver">
                                <thead>
                                    <tr>
                                        <th>Placa</th>
                                        <th>Fecha Salida</th>
                                        <th>Fecha Devolucion</th>
                                        <th>Precio</th>
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

