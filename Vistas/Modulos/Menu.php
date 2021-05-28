<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Logo -->  
    <a href="Inicio" class="brand-link logo-switch">

        <?php
        $item = null;
        $valor = null;
        $Empresa = EmpresaControlador::ctrMostrarEmpresa($item, $valor);
        foreach ($Empresa as $key => $value) {
            if ($value['LogoCorto'] != "") {
                echo" <img src='" . $value["LogoCorto"] . "'  class='brand-image-xl logo-xs' style='left: 10px'>";
            } else {
                echo" <img src='Vistas/img/Empresa/Default/Logo-corto.png'  class='brand-image-xl logo-xs'>";
            }

            if ($value['Logo'] != "") {
                echo"<img src='" . $value["Logo"] . "' class='brand-image-xs logo-xl' style='left: 45px'>";
            } else {
                echo"<img src='Vistas/img/Empresa/Default/logo-largo.png' class='brand-image-xs logo-xl' style='left: 45px'>";
            }
        }
        ?>

    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open ">
                    <a href="Inicio" class="nav-link active bg-gradient-blue">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users-cog  nav-icon"></i>
                        <p>
                            Gestion Personal
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Personal" class="nav-link">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>Personal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Usuarios" class="nav-link">
                                <i class="fa fa-user-friends nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Contactos" class="nav-link">
                                <i class="fas fa-id-badge nav-icon"></i>
                                <p>Contactos</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cart-plus"></i>
                        <p>
                            Compras
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="CrearCompra" class="nav-link">
                                <p>Realizar Compras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Compras" class="nav-link">
                                <p>Administrar Compras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Proveedores" class="nav-link">
                                <p>Proveedores</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Almacen
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Productos" class="nav-link">
                                <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Categorias" class="nav-link">
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Presentacion" class="nav-link">
                                <p>Presentacion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Marcas" class="nav-link">
                                <p>Marcas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="StockProductos" class="nav-link">
                                <p>Stock Productos</p>
                            </a>
                        </li>


                    </ul>
                </li>





                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-truck"></i>
                        <p>
                            Servicios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                       
                        <li class="nav-item">
                            <a href="ProductosAlquiler" class="nav-link">
                                <p>Detalle de Maquinarias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="DetalleAlquiler" class="nav-link">
                                <p>Detalle Alquiler</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Stock de Maquinarias</p>
                            </a>
                        </li> -->


                         <li class="nav-item">
                            <a href="AlquilarMaquinaria" class="nav-link">
                                <p>Alquiler de maquinarias </p>
                            </a>
                        </li>

                         <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Orden de salida de los equipos </p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Recepcion de los equipos</p>
                            </a>
                        </li> -->

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Ventas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Ventas" class="nav-link">
                                <p>administrar ventas</p>
                            </a>
                        </li>
                        <li class="nav-item CrearVenta" value="CrearVenta">
                            <a href="CrearVenta" class="nav-link">
                                <p>Crear Ventas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Clientes" class="nav-link">
                                <p>Clientes</p>
                            </a>
                        </li>

                    </ul>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Reportes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="fa fa-credit-card nav-icon"></i>
                                <p>Facturas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link">
                                <i class="fa fa-credit-card nav-icon"></i>
                                <p>Reportes de Ventas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link">
                                <i class="fa fa-cart-plus nav-icon"></i>
                                <p>Reporte de Compras</p>
                            </a>
                        </li>

                    </ul>
                </li>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas  fa-cogs"></i>
                        <p>
                            Configuracion
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="Empresa" class="nav-link">
                                <i class="fa fa-credit-card nav-icon"></i>
                                <p>Empresa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa fa-cart-plus nav-icon"></i>
                                <p>Factura</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="Perfil" class="nav-link">
                                <i class="fa fa-cart-plus nav-icon"></i>
                                <p>Perfil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fa fa-cart-plus nav-icon"></i>
                                <p>Permisos</p>
                            </a>
                        </li>






                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>