<?php  
require_once 'Controlador/PrincipalControlador.php';
require_once 'Controlador/PersonalControlador.php';
require_once 'Controlador/ContactosControlador.php';
require_once 'Controlador/MarcasControlador.php';
require_once 'Controlador/PresentacionControlador.php';
require_once 'Controlador/CategoriasControlador.php';
require_once 'Controlador/ProveedoresControlador.php';
require_once 'Controlador/ProductosControlador.php';
require_once 'Controlador/EstadosControlador.php';
require_once 'Controlador/UsuariosControlador.php';
require_once 'Controlador/PerfilControlador.php';
require_once 'Controlador/VentasControlador.php';
require_once 'Controlador/ClientesControlador.php';
require_once 'Controlador/EmpresaControlador.php';
require_once 'Controlador/ProductosAlquilerControlador.php';
require_once "Controlador/IndicadorControlador.php";





require_once 'Modelos/PersonalModelos.php';
require_once 'Modelos/ContactosModelo.php';
require_once 'Modelos/MarcasModelo.php';
require_once 'Modelos/PresentacionModelo.php';
require_once 'Modelos/CategoriasModelo.php';
require_once 'Modelos/ProveedoresModelo.php';
require_once 'Modelos/ProductosModelo.php';
require_once 'Modelos/EstadosModelo.php';
require_once 'Modelos/UsuariosModelo.php';
require_once 'Modelos/PerfilModelo.php';
require_once 'Modelos/VentasModelo.php';
require_once 'Modelos/ClientesModelo.php';
require_once 'Modelos/EmpresaModelo.php';
require_once 'Modelos/ProductosAlquilerModelo.php';
require_once "Modelos/IndicadorModelo.php";



$Principal=new PrincipalControlador();
$Principal->Principal();
