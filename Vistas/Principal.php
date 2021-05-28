<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema Pos</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--=============================================
                       PLUGUINS CSS        
        ============================================= -->
        <!-- CSS personalizado -->
        <link rel="stylesheet" href="Vistas/css/Principal.css">        

        <!-- Font Awesome -->
        <link rel="stylesheet" href="Vistas/Librerias/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="Vistas/Librerias/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- daterange picker -->
        <link rel="stylesheet" href="Vistas/Librerias/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="Vistas/Librerias/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="Vistas/Librerias/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="Vistas/Librerias/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="Vistas/Librerias/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="Vistas/Librerias/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

        <!--=============================================
                       PLUGUINS JAVASCRIPT       
        ============================================= -->

        <!-- jQuery -->
        <script src="Vistas/Librerias/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="Vistas/Librerias/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="Vistas/Librerias/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="Vistas/Librerias/dist/js/demo.js"></script>
        <!-- DataTables -->
        <script src="Vistas/Librerias/plugins/datatables/jquery.dataTables.js"></script>
        <script src="Vistas/Librerias/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <script src="Vistas/Librerias/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="Vistas/Librerias/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- ChartJS -->
        <script src="Vistas/Librerias/plugins/chart.js/Chart.min.js"></script>
        <!-- sweetalert2 -->
        <!-- <script src="Vistas/Librerias/plugins/sweetalert2/sweetalert2.all.js"></script> -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- InputMask -->
        <script src="Vistas/Librerias/plugins/moment/moment.min.js"></script>
        <script src="Vistas/Librerias/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
        <!-- date-range-picker -->
        <script src="Vistas/Librerias/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="Vistas/Librerias/plugins/datetimepicker/js/moment-with-locales.min.js"></script>
        <script src="Vistas/Librerias/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="Vistas/Librerias/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    </head>


    <!-- hold-transition  login-page sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed-->


    <body class="hold-transition sidebar-mini login-page layout-fixed layout-footer-fixed layout-navbar-fixed sidebar-collapse">
        <!-- Site wrapper -->
        <?php
        if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {


            echo '<div class="wrapper  container-fluid ">';

            /* =============================================
              CABEZOTE
              ============================================= */

            include 'Modulos/Cabezote.php';

            /* =============================================
              MENU
              ============================================= */

            include 'Modulos/Menu.php';

            /* =============================================
              CONTENIDO
              ============================================= */

            if (isset($_GET["Ruta"])) {

                if ($_GET["Ruta"] == "Inicio" ||
                        $_GET["Ruta"] == "Marcas" ||
                        $_GET["Ruta"] == "Personal" ||
                        $_GET["Ruta"] == "Usuarios" ||
                        $_GET["Ruta"] == "Productos" ||
                        $_GET["Ruta"] == "Contactos" ||
                        $_GET["Ruta"] == "Presentacion" ||
                        $_GET["Ruta"] == "Categorias" ||
                        $_GET["Ruta"] == "Proveedores" ||
                        $_GET["Ruta"] == "Perfil" ||
                        $_GET["Ruta"] == "Usuarios" ||
                        $_GET["Ruta"] == "StockProductos" ||
                        $_GET["Ruta"] == "Clientes" ||
                        $_GET["Ruta"] == "Ventas" ||
                        $_GET["Ruta"] == "CrearVenta" ||
                        $_GET["Ruta"] == "Compras" ||
                        $_GET["Ruta"] == "CrearCompra" ||
                        $_GET["Ruta"] == "Empresa" ||
                        $_GET["Ruta"] == "OrdenDeCompra" ||
                        $_GET["Ruta"] == "HistorialDePrecios" ||
                             $_GET["Ruta"] == "ProductosAlquiler" ||
                             $_GET["Ruta"] == "AlquilarMaquinaria" ||
                             $_GET["Ruta"] == "DetalleAlquiler" ||
                        $_GET["Ruta"] == "AdministrarOrdenesDeCompra" ||
                        $_GET["Ruta"] == "Salir") {
                          
                    include "Vistas/Modulos/" . $_GET["Ruta"] . ".php";
                } else {

                    include "Modulos/404.php";
                }
            } else {

                include 'Modulos/Inicio.php';
            }

            /* =============================================
              FOOTER
              ============================================= */

            include 'Modulos/Footer.php';

            echo '</div>';
        } else {

            include "Modulos/Login.php";
        }
        ?>




        <!--=============================================
                     JAVASCRIPT  personalizado     
        ============================================= -->
        <script src="Vistas/js/Principal.js" ></script>
        <script src="Vistas/js/Personal.js" ></script>
        <script src="Vistas/js/Contactos.js" ></script>
        <script src="Vistas/js/Marcas.js" ></script>
        <script src="Vistas/js/Presentacion.js" ></script>
        <script src="Vistas/js/Categorias.js" ></script>
        <script src="Vistas/js/Proveedores.js" ></script>
        <script src="Vistas/js/Productos.js" ></script>
        <script src="Vistas/js/Perfil.js" ></script>
        <script src="Vistas/js/Usuarios.js"></script>
        <script src="Vistas/js/Clientes.js"></script>
        
        
        <script src="Vistas/js/Empresa.js"></script>
         
        <script src="Vistas/js/Ventas.js"></script>
        <?php  if (isset($_GET["Ruta"])) {?>
          <?php   if ($_GET["Ruta"] == "Compras"){ ?>

            <script src="Vistas/js/Compras.js"></script>
          <?php } ?>
          <?php   if ($_GET["Ruta"] == "ProductosAlquiler"){ ?>

            <script src="Vistas/js/ProductosAlquiler.js"></script>
          <?php } ?>
          <?php   if ($_GET["Ruta"] == "CrearVenta"){ ?>
            <script src="Vistas/js/CrearVentas.js"></script>
          <?php } ?>
          <?php   if ($_GET["Ruta"] == "CrearCompra"){ ?>
            <script src="Vistas/js/CrearCompra.js"></script>
          <?php } ?>
          <?php   if ($_GET["Ruta"] == "AlquilarMaquinaria"){ ?>
            <script src="Vistas/js/AlquilarMaquinaria.js"></script>
          <?php } ?>
          <?php   if ($_GET["Ruta"] == "DetalleAlquiler"){ ?>
            <script src="Vistas/js/DetalleAlquiler.js"></script>
          <?php } ?>
        <?php } ?>

</html>
