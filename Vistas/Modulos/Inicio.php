<div class="content-wrapper ">

    <section class="content-header pt-7 pb-1 ">
        <div class="container-fluid   ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark font-weight-bolde">Bienvenido al sistema</h4>
                </div>
                <div class="col-sm-6 ">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="Inicio"><i class="nav-icon fas fa-home pr-1 text-dark "></i>Inicio</a></li>
                        <li class="breadcrumb-item active text-dark">Bienvenido</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">

        <div class="container-fluid">

            <div class="row ">

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <span class="info-box-text"> <h3> s/. 
                            <?php $res = InicioModelo::mdlSumaVenta(); echo round($res['suma_venta'],2) ?>
                            </h3></span>
                            <span class="info-box-number"><p>Ventas</p></span>
                        </div>
                        <div class="icon info-box-icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <span class="info-box-text"> <h3> s/.
                            <?php $res = InicioModelo::mdlSumaCompra(); echo round($res['suma_compra'],2) ?>
                            </h3></span>
                            <span class="info-box-number"><p>Compras</p></span>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <span class="info-box-text"> <h3> <?php $res = InicioModelo::mdlCantidadPersonal(); echo $res['cont_personal'] ?></h3></span>
                            <span class="info-box-number"><p>Personal</p></span>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-md-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <span class="info-box-text"> <h3><?php $res = InicioModelo::mdlCantidadProducto(); echo $res['cont_producto'] ?></h3></span>
                            <span class="info-box-number"><p>Productos</p></span>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>

        </div>

    </section>

</div>










<script type="text/javascript">


    $(function () {
        'use strict'

        var ticksStyle = {
            fontColor: 'black',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var $salesChart = $('#sales-chart')
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [
                    {
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: [1000, 2000, 3000, 2500, 2700, 2500, 3000, 3000, 2500, 2700, 2500, 3000]
                    },
                    {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: [700, 1700, 2700, 2000, 1800, 1500, 2000, 3000, 2500, 2700, 2500, 3000]
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,

                                // Include a dollar sign in the ticks
                                callback: function (value, index, values) {
                                    if (value >= 1000) {
                                        value /= 1000
                                        value += 'k'
                                    }
                                    return '$' + value
                                }
                            }, ticksStyle)
                        }],
                    xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                }
            }
        })

        var $visitorsChart = $('#visitors-chart')
        var visitorsChart = new Chart($visitorsChart, {
            data: {
                labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
                datasets: [{
                        type: 'line',
                        data: [100, 120, 170, 167, 180, 177, 160],
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill: false
                                // pointHoverBackgroundColor: '#007bff',
                                // pointHoverBorderColor    : '#007bff'
                    },
                    {
                        type: 'line',
                        data: [60, 80, 70, 67, 80, 77, 100],
                        backgroundColor: 'tansparent',
                        borderColor: '#ced4da',
                        pointBorderColor: '#ced4da',
                        pointBackgroundColor: '#ced4da',
                        fill: false
                                // pointHoverBackgroundColor: '#ced4da',
                                // pointHoverBorderColor    : '#ced4da'
                    }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 200
                            }, ticksStyle)
                        }],
                    xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                }
            }
        })
    })








</script>