<div class="content-wrapper">

    <section class="content-header pt-1 pb-0 ">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h5>Administar ventas</h5>
                </div>
                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-sm "><a href="Inicio" class=" text-dark"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li>
                        <li class="breadcrumb-item text-sm "><a class=" text-dark">Ventas</a></li>
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
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">VENTAS AL CONTADO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">VENTAS AL CREDITO</a>
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
                                <table class="table table-bordered table-striped TablaDeVentas_001 table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Codigo</th>
                                            <th>Cliente</th>
                                            <th>Vendedor</th>
                                            <th>Forma de pago</th>
                                            <th>Neto</th>
                                            <th>Impuesto</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>                                           
                                            <th style="width: 5%">Accion</th>
                                        </tr>
                                    </thead>
                                     
                                </table>
                            </div>

                        </div>







                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" 
                         role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam. 
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" 
                         role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" 
                         role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
                    </div>
                </div>
            </div>

        </div>





    </section>

</div>



<script>


$(function () {
  $('[data-toggle="popover"]').popover({
     trigger:"hover",
     placement:"bottom",
     animation:true
  }

    )
})
</script>