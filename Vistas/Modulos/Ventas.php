<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card" >
                        <div class="card-header pt-2 pb-0">
                        <div class="row">
                            <select id="buscar_estado" class="col-md-3 form-control" name="" id="">
                                <option value="1">Cotizado</option>
                                <option value="0">Cancelado</option>
                                <option value="2">Realizado</option>
                            </select>
                        </div>
                        </div>

                        <div class="card-body ">
                            <table id="TablaDeVentas_001" class="table table-bordered table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Codigo</th>
                                        <th>Cliente</th>
                                        <th>Vendedor</th>
                                        <th>Forma de pago</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>                                           
                                        <th></th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="modal_detalle_venta" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <div class="modal-content">
            <div class="modal-header" style="background:#3c8dbc; color:white">
                <h5 class="modal-title">Detalle de la Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">            
                <div class="card">
                    <div class="card-header">
                        <table width="100%" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Cliente</th>
                                    <th>Vendedor</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Metodo</th>
                                    <th>Tipo</th>
                                </tr>
                                <tr>
                                    <td id="prov_codigo"></td>
                                    <td id="prov_cliente"></td>
                                    <td id="prov_vendedor"></td>
                                    <td id="prov_fecha"></td>
                                    <td id="prov_estado"></td>
                                    <td id="prov_metodo"></td>
                                    <td id="prov_tipo"></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm" id="detalle_venta_ver">
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>



<script>


// $(function () {
//   $('[data-toggle="popover"]').popover({
//      trigger:"hover",
//      placement:"bottom",
//      animation:true
//   }

//     )
// })
</script>