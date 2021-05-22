<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>Administar Compras</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Compras</a></li>
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
                    <!-- <div class="input-group">
                        <button type="button" class="btn btn-default float-right daterange-btn ">
                            <i class="far fa-calendar-alt"></i> Rango de fechas
                            <i class="fas fa-caret-down"></i>
                        </button>
                    </div> -->
                
            </div>

            <div class="card-body ">
                <table id="tabla_Compras" class="table table-bordered table-striped table-sm" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Proveedor</th>
                            <th>Sub total</th>
                            <th>IGV</th>
                            <th>Dscto</th>
                            <th>Total</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>


    </section>

</div>

<div class="modal fade" id="modal_detalle_compra" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <h5 class="modal-title">Detalle de la Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                    <th>Proveedor</th>
                                    <th>Fecha Registro</th>
                                    <th>Estado</th>
                                </tr>
                                <tr>
                                    <td id="prov_codigo"></td>
                                    <td id="prov_proveedor"></td>
                                    <td id="prov_fecha"></td>
                                    <td id="prov_estado"></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm" id="detalle_compra_ver">
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

