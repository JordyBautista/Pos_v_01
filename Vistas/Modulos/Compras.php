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
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">VIGENTES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">ANULADAS</a>
                    </li>
                    
                </ul>
            </div>
            <div class="card-body   pr-1 pl-1 pt-0">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active " id="custom-tabs-four-home" 
                         role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                        <div class="card" >
                            <div class="card-header pt-2 pb-0">
                                <div class="form-group pb-0">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-default float-right daterange-btn ">
                                            <i class="far fa-calendar-alt"></i> Rango de fechas
                                            <i class="fas fa-caret-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body ">
                                <table class="table table-bordered table-striped TablaDeDatos table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Codigo</th>
                                            <th>Cliente</th>
                                            <th>Sub total</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                            <th>Vendedor</th>
                                            <th style="width: 5%">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>F0001</td>
                                            <td>Francisco Albino YAURI</td>
                                            <td>S/.400</td>
                                            <td>S/.4000</td>
                                            <td>28-04-2020</td>
                                            <td>ANDREA ANDREA</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="popover" data-content="Anular venta"><i class="fas fa-trash-alt"></i></button>
                                                    <button type="button" class="btn btn-success" data-toggle="popover" data-content="Ver detalle de la venta"><i class="far fa-list-alt"></i></button>
                                                    <button type="button" class="btn btn-warning" data-toggle="popover" data-content="Ver comprobante"><i class="fas fa-file-invoice"></i></button>
                                                    <button type="button" class="btn btn-info" data-toggle="popover" data-content=" Imprimir comprobante"><i class="fas fa-print"></i></button>
 </div>

                                            </td>
                                        </tr>
                                    </tbody>  
                                </table>
                            </div>

                        </div>







                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" 
                         role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                         
                        <div class="card" >
                            <div class="card-header pt-2 pb-0">
                                <div class="form-group pb-0">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-default float-right daterange-btn ">
                                            <i class="far fa-calendar-alt"></i> Rango de fechas
                                            <i class="fas fa-caret-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body ">
                                <table class="table table-bordered table-striped TablaDeDatos table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Codigo</th>
                                            <th>Cliente</th>
                                            <th>Sub total</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                            <th>Vendedor</th>
                                            <th style="width: 5%">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>F0001</td>
                                            <td>Francisco Albino YAURI</td>
                                            <td>S/.400</td>
                                            <td>S/.4000</td>
                                            <td>28-04-2020</td>
                                            <td>ANDREA ANDREA</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="popover" data-content="Anular venta"><i class="fas fa-trash-alt"></i></button>
                                                    <button type="button" class="btn btn-success" data-toggle="popover" data-content="Ver detalle de la venta"><i class="far fa-list-alt"></i></button>
                                                    <button type="button" class="btn btn-warning" data-toggle="popover" data-content="Ver comprobante"><i class="fas fa-file-invoice"></i></button>
                                                    <button type="button" class="btn btn-info" data-toggle="popover" data-content=" Imprimir comprobante"><i class="fas fa-print"></i></button>
 </div>

                                            </td>
                                        </tr>
                                    </tbody>  
                                </table>
                            </div>

                        </div>

                    </div>
                    
                </div>
            </div>

        </div>





    </section>

</div>



