
<div class="content-wrapper ">

<section class="content-header pt-7 pb-1 ">
    <div class="container-fluid   ">
        <div class="row mb-2 ">
            <div class="col-sm-6">
                <h4 class="m-0 text-dark font-weight-bolde">Indicadores</h4>
            </div>
            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark"></i>Inicio</a></li> 
                    <li class="breadcrumb-item active text-dark">Indicadores</li>
                </ol>
            </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="anios">
                                    <option value>Seleccione</option>
                                    <?php
                                   
                                    $years = IndicadorControlador::ctrYears();

                                    foreach ($years as $key => $value) {

                                        echo '<option value="' . $value["year"] . '" >' . $value["year"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" id="productoIndicadores">
                                    <option value>Seleccione</option>
                                    <?php
                                    $Productos = ProductosControlador::ctrMostrarProductos(null, null);

                                    foreach ($Productos as $key => $value) {

                                        echo '<option value="' . $value["idProducto"] . '" >' . $value["NombreProducto"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="chartIndicadorUno" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="chartIndicadorTres" width="400" height="400"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="aniosAlquiler">
                                    <option value>Seleccione</option>
                                    <?php
                                   
                                    $years = IndicadorControlador::ctrYearsAlquiler();

                                    foreach ($years as $key => $value) {

                                        echo '<option value="' . $value["year"] . '" >' . $value["year"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" id="alquilerIndicadores">
                                    <option value>Seleccione</option>
                                    <?php
                                    $alq = ProductosAlquilerControlador::ctrMostrarProductosAlquiler(null, null);

                                    foreach ($alq as $key => $value) {

                                        echo '<option value="' . $value["idProductoAlquiler"] . '" >' . $value["Placa"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="chartIndicadorDos" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>