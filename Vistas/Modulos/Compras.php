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
                        </tr>
                    </thead>
                </table>
            </div>

        </div>


    </section>

</div>



