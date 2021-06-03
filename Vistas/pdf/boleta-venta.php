<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Abastecimiento</title>
    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        header{
            position: fixed;
            top: -110px;
            left: 0px;
            right: 0px;
            height: 55px;
        }
        @page {
            margin: 150px 25px;
        }
        main{
            
        }
        footer{
            position: fixed;
            left: 0px;
            right: 0px;
            height: 50px;
        }
        h1,h3,h4,h5,h6,p,span,div { 
            font-family: DejaVu Sans; 
            font-size:10px;
            font-weight: normal;
        }
        h2{
            font-weight: normal;
        }
        th,td { 
            font-family: DejaVu Sans; 
            font-size:10px;
        }
        .flex{
            display: flex;
        }
        .col-6{
            width: 50%;
        }
        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .panel-default {
            border-color: #ddd;
        }
        .panel-body {
            padding: 15px;
        }
        table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 0px;
            border-spacing: 0;
            border-collapse: collapse;
            background-color: transparent;
        }
        thead  {
            text-align: left;
            display: table-header-group;
            vertical-align: middle;
        }
        th, td  {
            border: 1px solid #ddd;
            padding: 6px;
        }
        .well {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        }
    </style>
</head>

<body>
    <header>
        <div style="position:absolute; left:0pt; width:250pt;">
            <!-- <img class="img-rounded" height="40px" src="{{URL::asset('/assets/images/logo-dark.png')}}"> -->
        </div>
        <div style="margin-left:300pt;">
            <b>Fecha Actual: </b> fdfdfdh<br />
            <b>Codigo #: </b> dfhfdh
            <br />
        </div>
        <br />
        <h2>Codigo: <b>dfhfdhdh</b></h2>
    </header>
    <main>
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:250pt;">
                <h4>Detalle:</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                        Propietario: asdasd<br>
                        Estado: asdascsac
                        <br>
                        Fecha de Entrega Requerida: dfgdfg<br>
                        Fecha de Registro: dfgdfg
                    </div>
                </div>
            </div>
            <div style="margin-left: 300pt;">
                <h4>Fechas Adicionales:</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                       asdacasccsdgsdg
                       asdasf
                       asdacasccsdgsdg
                    </div>
                </div>
            </div>
        </div>

        <h4>Items:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Categoria / Modelo</th>
                    <th>Grupo</th>
                    <th>Vez(ces)</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
        <div style="clear:both; position:relative;">
            <div style="position:absolute; left:0pt; width:250pt;">
                <!-- <h4>Business Details:</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                        info
                    </div>
                </div> -->
            </div>
            <div style="margin-left: 300pt;">
                 <!-- <h4>Customer Details:</h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                       anothe info
                    </div>
                </div> -->
            </div>
        </div>
        <br /><br />

        <div style="clear:both; position:relative;" class="well"></div>

        </div>
    </main>

    <script type="text/php">
        if (isset($pdf)) {
            $pageText = "{PAGE_NUM} de {PAGE_COUNT}";
            $pdf->page_text(($pdf->get_width()/2) - (strlen($pageText) / 2), $pdf->get_height()-20, $pageText, $fontMetrics->get_font("DejaVu Sans, Arial, Helvetica, sans-serif", "normal"), 7, array(0,0,0));
        }
    </script>
</body>

</html>
