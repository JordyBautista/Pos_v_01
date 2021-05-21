-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2021 a las 21:54:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

-- CREATE TABLE `alquiler` (
--   `idAlquiler` int(11) NOT NULL,
--   `idProductoAlquiler` int(11) NOT NULL,
--   `idCliente` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `FechaAlquiler` date NOT NULL,
--   `FechaDevolucion` date NOT NULL,
--   `PrecioAlquiler` float NOT NULL,
--   `Cantidad` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

-- CREATE TABLE `categorias` (
--   `Codigo` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Estado` char(5) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

-- INSERT INTO `categorias` (`Codigo`, `Categoria`, `Estado`) VALUES
-- ('3', 'ARENA', '01'),
-- ('5', 'PIEDRA', '01'),
-- ('6', 'HORMIGON', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

-- CREATE TABLE `clientes` (
--   `idCliente` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Dni` char(12) COLLATE utf8_spanish_ci NOT NULL,
--   `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Telefono` char(17) COLLATE utf8_spanish_ci NOT NULL,
--   `Celular` char(17) COLLATE utf8_spanish_ci NOT NULL,
--   `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `FechaNacimiento` date NOT NULL,
--   `Compras` int(11) NOT NULL,
--   `UltimaCompra` datetime NOT NULL,
--   `FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

-- INSERT INTO `clientes` (`idCliente`, `Nombres`, `Dni`, `Correo`, `Telefono`, `Celular`, `Direccion`, `FechaNacimiento`, `Compras`, `UltimaCompra`, `FechaRegistro`) VALUES
-- ('0001', 'pedro', '78945612', 'pedrito@gmail.com', '(01) 654-78-99', '(+51) 987-456-123', 'ate', '2020-05-08', 0, '0000-00-00 00:00:00', '2021-05-08 22:07:57'),
-- ('0024', 'Maria ElenaAAAA', '78945623', 'ASD@gamil.com', '(01) 222-22-22', '(+99) 999-999-999', 'fortaleza', '0000-00-00', 0, '0000-00-00 00:00:00', '2020-08-22 07:01:30'),
-- ('1', 'CARLOS ALBERTO LESCANO AQUISE', '09401632', 'yadigoco@yahoo.com', '(01)-067-3072', '993-629-886', 'G Av. Ampliaci?n Mz P1 Lt 16 Urb Marisca Caceres SJL', '1969-10-04', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('10', 'RUTH MARIA ALVAREZ CANO MANDUJANO', '29654207', 'iphe2010@hotmail.com', '(01)-067-2841', '993-629-895', 'Av. San Juan de 635 San Luis ', '1955-07-22', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('11', 'GABY MILAGROS SIFUENTES CENTENO', '09895407', 'psictlaso@gmail.com', '(01)-067-2842', '993-629-896', 'Jr. Trujillo 574 Rimac', '1988-06-06', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('12', 'GILBERT ALEJANDRO MOY GALARZA', '16719401', 'rosalva.garces@meduca.gob.pa', '(01)-067-2843', '993-629-897', 'UVV 59 Lote 20 Zona D Huaycan', '1955-01-02', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('13', 'JUAN FRANCISCO CARDENAS CASTILLO', '08667684', 'leonidas.martinez@meduca.gob.pa', '(01)-067-2844', '993-629-898', 'Av. Angamos 1510-3er mispo Surquillo', '1957-04-18', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('14', 'EVA ROXANA ALIAGA ALIAGA', '23840417', 'militza.aguero@meduca.gob.pa', '(01)-067-2845', '993-629-899', 'Jr. Bernardino Romero 832 Zona D SJM ', '1991-08-31', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('15', 'LUIS ERNESTO QUINTANA MUNIVE', '06242702', 'palomaguarachi@hotmail.com', '(01)-067-2846', '993-629-900', 'Mz U2 Lte 14 Irb. EL Pinar Comas', '1966-04-17', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('16', 'JULIO CESAR SAN MIGUEL LLOSA', '08740795', 'depneemec@gmail.com', '(01)-067-2847', '993-629-901', 'Urb. Zarate San Juan de Lurigancho', '1988-04-05', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('17', 'DAVID ALFONSO BAYRO DELGADO', '23952579', 'mirleycita@hotmail.com', '(01)-067-2852', '993-629-902', 'G Jr. Los Terrazos 2621 Urb. San Carlos SJL ', '1959-12-03', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('18', 'PAUL JOSEPH YUPANQUI HUAQUI', '23828823', 'aguevara@idiomas.udea.edu.co', '(01)-067-2849', '993-629-903', 'Jr. Las Gravas Mz E Lte 34 San Juan de Lurigancho ', '1932-08-27', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('19', 'BLANCA ALICIA ASENJO BRAVO', '25428977', 'andresiocarga@hotmail.com', '(01)-067-2850', '993-629-904', 'Av. Iquitos 1247 La Victoria ', '1963-04-04', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('2', 'SERGIO ENRIQUE FERNANDEZ QUISPE', '06627514', 'infracnovi_hn@yahoo.com', '(01)-067-2866', '993-629-887', 'Jr. Cuzco 1532 Cercado', '1996-04-22', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('20', 'GLADYS ELIZABETH ROMERO VIZURRAGA', '06138853', 'm.fdez_87@hotmail.com', '(01)-067-2853', '989-676-787', 'Av. Tupac Amaru 3591 Carabayllo', '1954-12-20', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('21', 'GIANCARLO BAHAMONDE MISPIRETA', '09488272', 'julianaparis@hotmail.com', '(01)-067-2855', '999-856-759', 'Av. San Jos? 1032 990160935 ', '1979-07-03', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('22', 'GIOVANNI INGA LEAN WILLIAM', '40196704', 'helenkeller@gmail.com   ', '(01)-067-2856', '997-890-173', 'Psj. Libertad Mz 91 Lte 20 Independencia ', '1955-02-27', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('23', 'MIGUEL ANGEL ALARCON CASAFRANCA', '25798355', 'geraldina.gonzalez@infomed.sld.cu', '(01)-067-2831', '980-878-892', 'Sector 2 Grupo 26 Mz H Lote 17', '1977-09-09', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('24', 'MELISSA DENISS SANCHEZ DIAZ OBREGON', '16764678', 'cultura@anci.cu', '(01)-067-3072', '993-629-886', 'Av. San Juan 635 San Luis', '1958-03-21', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('25', 'LIZETH FIORELLA SOTO TRILLO', '17432914', 'YOVIRROSANIA@HOTMAIL.COM', '(01)-067-2866', '993-629-887', 'Jr. Ica 441 Cercado 2787596 ', '1994-11-05', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('26', 'SAUL MORAN RELAIZA', '17805205', 'ASOCIEGOSMANABI@HOTMAIL.COM', '(01)-067-2839', '993-629-888', 'Ca. Pacllon 375 Coop policial SMP', '1983-11-12', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('27', 'WILFREDO VICTOR VALENCIA KOC-LEM', '06724388', 'crio@isri.gob.sv', '(01)-067-2833', '993-629-889', 'Mz B Lot 6 Flor de Amancaes', '1972-11-08', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('28', 'MAGALY SUSAN MANRIQUE HARO', '07183354', 'patty-c.p@hotmail.com', '(01)-067-2834', '993-629-890', 'Gregorio Bisa 196 Tungasuca Carabayllo', '1974-11-30', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('29', 'ALDO AMERICO LOZANO ROJAS', '20665545', 'albran@mineduc.gob.gt', '(01)-067-2836', '993-629-891', 'Av. Jerusal?n Mz C lote 03 Villa Toledo, Cieneguilla.', '1968-11-23', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('3', 'JAVIER LUIS SHINTANI GRANADOS', '22703191', 'monica.destellosdeluz@gmail.com', '(01) 067-28-39', '(+99) 362-988-8__', 'Jr. Juana Rio Frio 177 ', '1952-06-04', 0, '0000-00-00 00:00:00', '2020-06-03 08:59:39'),
-- ('30', 'ERICK VLADIMIR PAULET MONTEAGUDO', '10149156', 'braso.lissette@gmail.com', '(01)-067-2837', '993-629-892', 'Jr. Meliton Carbajal 161 Ate', '1968-11-24', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('31', 'CYNTHIA ELIZABETH CANGRE ZEGARRA', '07920583', 'yadigoco@yahoo.com', '(01)-067-2838', '993-629-893', 'Jr. Rufino Torrico 145 Cercado de Lima', '1968-11-25', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('32', 'MIGUEL ANGEL SALVATIERRA CUEVA', '10189500', 'infracnovi_hn@yahoo.com', '(01)-067-2840', '993-629-894', 'Jr. Las Gravas Mz E Lte 34 San Juan de Lurigancho ', '1968-11-25', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('4', 'JOSEPH FIAT ANDRADE GARTNER', '06100264', 'mayra_sierra@ceiac.org', '(01)-067-2833', '993-629-889', 'Urb Pando San Miguel ', '1988-02-09', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('5', 'CARLA PAOLA QUINTANILLA RUTI', '29418696', 'psicologia@vercontigo.com.mx', '(01)-067-2834', '993-629-890', 'Jr. Julio Morales N? 619 La Victoria', '1999-04-21', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('6', 'JOSE EMILIANO HERNANDEZ CHUJUTALLI', '45828330', 'luzciego@yahoo.es', '(01)-067-2836', '993-629-891', 'Los Chancas Mz B lt 15 Santa Anita', '1982-10-18', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('7', 'JUAN ALBERTO CHACON GUTIERREZ', '16798990', 'noeldita@gmail.com', '(01)-067-2837', '993-629-892', ' Psicologa G Ca. La Paz 117 El Parral Comas ', '1980-09-10', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('8', 'LUIS ERNESTO SEMINARIO SEMINARIO', '10146102', 'iphe2010@hotmail.com', '(01)-067-2838', '993-629-893', 'Jr. Los Charquis 695 Urb Zarate SJL ', '1966-10-25', 0, '0000-00-00 00:00:00', '2020-06-03 08:57:58'),
-- ('9', 'HEINZ ALEXANDER BOHME GONZALES', '77457595', 'nedelsy@yahoo.com', '(01) 067-28-40', '(+99) 362-989-4__', 'Jr. Faustino Sanchez Carrion 421 Independencia', '1965-10-23', 0, '0000-00-00 00:00:00', '2020-06-03 09:02:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

-- CREATE TABLE `contactos` (
--   `Codigo` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `DNI` char(12) COLLATE utf8_spanish_ci NOT NULL,
--   `Celular` char(17) COLLATE utf8_spanish_ci NOT NULL,
--   `Telefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
--   `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Empresa` varchar(100) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contactos`
-- --

-- INSERT INTO `contactos` (`Codigo`, `Nombres`, `Apellidos`, `DNI`, `Celular`, `Telefono`, `Direccion`, `Correo`, `Empresa`) VALUES
-- ('2', 'JAIMITO', 'LUJAN PEREZ', '78569587', '(+51) 987-897-897', '(01) 546-54-56', 'ATE', 'JAIMITO100@GMAIL.COM', 'SISTEMAS INTELIGENTES'),
-- ('3', 'SERAFINA', 'UNPA UNPA', '78945621', '(+58) 198-798-798', '(01) 684-54-56', 'SANTA ANITA', 'SERAFINA200@HOTMAIL.COM', 'TEMPUS'),
-- ('4', 'juan', 'BARTOLO TEOREM', '78945612', '(+51) 987-879-874', '(01) 564-98-48', 'chosica', 'JUANBARTOLO@gmail.com', 'TEMPUTRONIC'),
-- ('5', 'LUCERO', 'VILCA TEMPO', '78965432', '(+51) 987-654-321', '(01) 987-65-46', 'lima', 'lucero.vilkca@hotmail.com', 'AUTRONIC'),
-- ('6', 'Fernando', 'suarez fernandez', '70289415', '(+51) 987-654-123', '(01) 856-89-79', 'molina', 'suares.fernandez@gmail.com', '01'),
-- ('7', 'Maria Elena', 'hurtado panfilo', '9876545123', '(+51) 987-455-612', '(01) 586-54-23', 'fortaleza', 'maria.hurtado@gmail.com', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

-- CREATE TABLE `detalleventa` (
--   `idVentaDV` int(11) NOT NULL,
--   `idProductoDV` char(10) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

-- INSERT INTO `detalleventa` (`idVentaDV`, `idProductoDV`) VALUES
-- (1, '001'),
-- (1, '003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

-- CREATE TABLE `empresa` (
--   `idEmpresa` int(11) NOT NULL,
--   `RazonSocial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Ruc` char(11) COLLATE utf8_spanish_ci NOT NULL,
--   `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Telefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
--   `Celular` char(17) COLLATE utf8_spanish_ci NOT NULL,
--   `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `idMoneda` int(11) NOT NULL,
--   `IGV` float NOT NULL,
--   `Logo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `LogoCorto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `LogoLogin` varchar(100) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

-- INSERT INTO `empresa` (`idEmpresa`, `RazonSocial`, `Ruc`, `Direccion`, `Telefono`, `Celular`, `Correo`, `idMoneda`, `IGV`, `Logo`, `LogoCorto`, `LogoLogin`) VALUES
-- (2, 'TU EMPRESA SA', '20369852147', 'sol de vitarte', '1321323141', '987632541', 'TUEMPRESA@HOTMAIL.COM', 1, 18, 'Vistas/img/Empresa/Empresa/20369852147664.png', 'Vistas/img/Empresa/Empresa/20369852147250.png', 'Vistas/img/Empresa/Empresa/20369852147433.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

-- CREATE TABLE `estados` (
--   `idEstado` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `NombreEstado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Tabla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Estado` char(2) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

-- INSERT INTO `estados` (`idEstado`, `NombreEstado`, `Tabla`, `Estado`) VALUES
-- ('01', 'Activo', 'Personal', '01'),
-- ('02', 'Cesado', 'Personal', '01'),
-- ('03', 'Activo', 'Productos', '01'),
-- ('04', 'Agotado', 'Productos', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

-- CREATE TABLE `marcas` (
--   `Codigo` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Marca_Corto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Estado` char(2) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

-- INSERT INTO `marcas` (`Codigo`, `Marca`, `Marca_Corto`, `Estado`) VALUES
-- ('1', 'KOMATZU', 'KMT', '01'),
-- ('2', 'CATEPILLAR', 'CAT', '01'),
-- ('8', 'Servicios Generales Robladillo', 'RD', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

-- CREATE TABLE `moneda` (
--   `idMoneda` int(11) NOT NULL,
--   `Pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `UnidadMonetaria` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
--   `Simbolo` char(5) COLLATE utf8_spanish_ci NOT NULL,
--   `CodigoISO` char(10) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `moneda`
--

-- INSERT INTO `moneda` (`idMoneda`, `Pais`, `UnidadMonetaria`, `Simbolo`, `CodigoISO`) VALUES
-- (1, 'Peru', 'Nuevo Sol', 'S/', 'PEN'),
-- (2, 'Estados Unidos', 'Dolar', '$', 'USD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

-- CREATE TABLE `perfil` (
--   `idPerfil` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Perfil` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

-- INSERT INTO `perfil` (`idPerfil`, `Perfil`, `Descripcion`) VALUES
-- ('001', 'Administrador', 'Acceso Completo del Sistema'),
-- ('002', 'Usuarios', 'Este perfil podrá gestionar las ventas  y stock de la empresa'),
-- ('003', 'Clientes', 'Visualizar maquinas y material disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

-- CREATE TABLE `personal` (
--   `idPersonal` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Dni` char(12) COLLATE utf8_spanish_ci NOT NULL,
--   `Fecha_Nacimiento` date NOT NULL,
--   `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Telefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
--   `Celular` char(17) COLLATE utf8_spanish_ci NOT NULL,
--   `Foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Estado` char(10) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

-- INSERT INTO `personal` (`idPersonal`, `Nombres`, `Apellidos`, `Dni`, `Fecha_Nacimiento`, `Direccion`, `Correo`, `Telefono`, `Celular`, `Foto`, `Estado`) VALUES
-- ('1', 'RONALD ELOY', 'ALEGRE PECEROS', '29696513', '1974-06-17', 'G Av. Ampliaci?n Mz P1 Lt 16 Urb Marisca Caceres SJL', 'lili_12812@hotmail.com', '(01) 067-30-72', '(+99) 362-988-6__', 'Vistas/img/Personal/1/212.png', '02'),
-- ('10', 'MARIELA JUSTINA', 'FIESTAS RIVAS', '9718565', '1972-02-07', 'Av. San Juan de 635 San Luis ', 'YOVIRROSANIA@HOTMAIL.COM', '(01)-067-2841', '993-629-895', '', '1'),
-- ('11', 'VICTOR RAUL', 'FLORES CHIVIGORRI', '8056632', '1957-12-31', 'Jr. Trujillo 574 Rimac', 'ASOCIEGOSMANABI@HOTMAIL.COM', '(01)-067-2842', '993-629-896', '', '1'),
-- ('12', 'CESAR AUGUSTO', 'AQUISE OPORTO', '9263190', '1957-03-02', 'UVV 59 Lote 20 Zona D Huaycan', 'crio@isri.gob.sv', '(01)-067-2843', '993-629-897', '', '1'),
-- ('13', 'JORGE JAVIER', 'ARAOZ CHAVEZ', '19188085', '1968-01-03', 'Av. Angamos 1510-3er mispo Surquillo', 'patty-c.p@hotmail.com', '(01)-067-2844', '993-629-898', '', '1'),
-- ('14', 'LUZ MARINA', 'AREVALO RUIZ', '21480805', '1970-02-08', 'Jr. Bernardino Romero 832 Zona D SJM ', 'albran@mineduc.gob.gt', '(01)-067-2845', '993-629-899', '', '1'),
-- ('15', 'SEGUNDO CASINALDO', 'AREVALO VARGAS VDA DE FARFAN', '8484088', '1956-12-26', 'Mz U2 Lte 14 Irb. EL Pinar Comas', 'braso.lissette@gmail.com', '(01)-067-2846', '993-629-900', '', '1'),
-- ('16', 'LUZ ESTHER', 'ARIAS CABALLERO', '23960982', '1974-03-03', 'Urb. Zarate San Juan de Lurigancho', 'yadigoco@yahoo.com', '(01)-067-2847', '993-629-901', '', '1'),
-- ('17', 'WALTER ANTONIO', 'ARROYO CONTRERAS', '16688023', '1969-12-31', 'G Jr. Los Terrazos 2621 Urb. San Carlos SJL ', 'infracnovi_hn@yahoo.com', '(01)-067-2852', '993-629-902', '', '1'),
-- ('18', 'CESAR LUIS', 'ASTUCURI SULCA', '11911', '1957-03-25', 'Jr. Las Gravas Mz E Lte 34 San Juan de Lurigancho ', 'monica.destellosdeluz@gmail.com', '(01)-067-2849', '993-629-903', '', '1'),
-- ('19', 'ISABEL', 'AYVAR FLORES', '8640462', '1965-02-01', 'Av. Iquitos 1247 La Victoria ', 'mayra_sierra@ceiac.org', '(01)-067-2850', '993-629-904', '', '1'),
-- ('2', 'EDWIN ANDRES', 'ALEMAN ABAD', '29529129', '1966-12-10', 'Jr. Cuzco 1532 Cercado', 'elleinabonfante@hotmail.com ', '(01)-067-2866', '993-629-887', '', '1'),
-- ('20', 'MARILU', 'BAZAN RAMOS', '20115025', '1978-02-16', 'Av. Tupac Amaru 3591 Carabayllo', 'psicologia@vercontigo.com.mx', '(01)-067-2853', '989-676-787', '', '1'),
-- ('21', 'GABRIEL JESUS', 'BENDEZU CHONTA', '7155414', '1962-05-28', 'Av. San Jos? 1032 990160935 ', 'luzciego@yahoo.es', '(01)-067-2855', '999-856-759', '', '1'),
-- ('22', 'VIOLETA', 'BERROCAL ORTEGA', '7380213', '1958-05-24', 'Psj. Libertad Mz 91 Lte 20 Independencia ', 'noeldita@gmail.com', '(01)-067-2856', '997-890-173', '', '1'),
-- ('23', 'WALDO', 'BERROCAL ZEVALLOS', '8126037', '1961-10-03', 'Sector 2 Grupo 26 Mz H Lote 17', 'iphe2010@hotmail.com', '(01)-067-2831', '980-878-892', '', '1'),
-- ('3', 'JOSE ANTONIO', 'ESTELA ARBAIZA', '8061419', '1953-03-20', 'Jr. Juana R?o Frio 177 ', 'stella_nino@hotmail.com', '(01)-067-2839', '993-629-888', '', '1'),
-- ('4', 'CARMEN ENRIQUETA', 'ESTRADA AGUILAR', '6797372', '1953-07-15', 'Urb Pando San Miguel ', 'crac.colombia@etb.net.co', '(01)-067-2833', '993-629-889', '', '1'),
-- ('5', 'IVONNI ISABEL', 'FAZIO AGUILAR', '20050531', '1973-11-29', 'Jr. Julio Morales N? 619 La Victoria', 'alexanderaguirre53hotmail.com ', '(01)-067-2834', '993-629-890', '', '1'),
-- ('6', 'JESUS ESTHER', 'FERNANDEZ AHLLON', '29504647', '1955-04-17', 'Los Chancas Mz B lt 15 Santa Anita', 'sama1_2@yahoo.es ', '(01)-067-2836', '993-629-891', '', '1'),
-- ('6666', 'kevin', 'ricalde', '0', '1997-05-09', 'asdasdasd@htromail.com', 'asdasdasd@htromail.com', '(99) 999-99-99', '(+99) 999-999-999', 'Vistas/img/Personal/Default/Usuario.png', '01'),
-- ('7', 'CESAR MANUEL', 'FERNANDEZ CHERO', '30768374', '1960-05-12', ' Psicologa G Ca. La Paz 117 El Parral Comas ', 'helenkeller@gmail.com   ', '(01)-067-2837', '993-629-892', '', '1'),
-- ('8', 'JORGE ENRIQUE', 'FERNANDEZ ROJAS', '2653154', '1963-12-11', 'Jr. Los Charquis 695 Urb Zarate SJL ', 'geraldina.gonzalez@infomed.sld.cu', '(01)-067-2838', '993-629-893', '', '1'),
-- ('9', 'PERCY ALFREDO', 'FIDEL ANGULO', '17823406', '1958-06-17', 'Jr. Faustino Sanchez Carri?n 421 Independencia', 'cultura@anci.cu', '(01)-067-2840', '993-629-894', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

-- CREATE TABLE `presentacion` (
--   `Codigo` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Presentacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Estado` char(5) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

-- INSERT INTO `presentacion` (`Codigo`, `Presentacion`, `Descripcion`, `Estado`) VALUES
-- ('1', 'cubos', 'metros cúbicos', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

-- CREATE TABLE `productos` (
--   `idProducto` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `CodigoProveedor` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `NombreProducto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
--   `Descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `CodigoMarca` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `CodigoPresentacion` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `CodigoCategoria` char(10) COLLATE utf8_spanish_ci NOT NULL,
--   `Fotografia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
--   `Stock` int(11) NOT NULL,
--   `StockMaximo` int(11) NOT NULL,
--   `StockMinimo` int(11) NOT NULL,
--   `PrecioCompra` float NOT NULL,
--   `PrecioVenta` float NOT NULL,
--   `VentasProducto` int(11) NOT NULL,
--   `FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
--   `Estado` char(5) COLLATE utf8_spanish_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

-- INSERT INTO `productos` (`idProducto`, `CodigoProveedor`, `NombreProducto`, `Descripcion`, `CodigoMarca`, `CodigoPresentacion`, `CodigoCategoria`, `Fotografia`, `Stock`, `StockMaximo`, `StockMinimo`, `PrecioCompra`, `PrecioVenta`, `VentasProducto`, `FechaRegistro`, `Estado`) VALUES
-- ('0000', '1', 'prueba', 'prueba', '1', '1', '3', 'Vistas/img/Productos/Default/DefaultProducto.png', 100, 150, 50, 90, 100, 0, '2021-05-18 19:30:02', ''),
-- ('001', '1', 'Arena Fina', 'La arena fina es el conjunto de partículas que es resultado de la desintegración natural de las roca', '8', '1', '3', 'Vistas/img/Productos/001/535.jpg', 100, 200, 30, 90, 110, 0, '2020-06-03 09:57:34', ''),
-- ('002', '1', 'Arena Gruesa', 'La arena gruesa es el conjunto de partículas que es resultado de la desintegración natural de las ro', '8', '1', '3', 'Vistas/img/Productos/002/892.jpg', 100, 200, 30, 70, 90, 0, '2020-06-03 10:02:04', ''),
-- ('003', '1', 'Arena de Rio', 'La arena es un conjunto de fragmentos sueltos de rocas o minerales de pequeño tamaño. En geología se', '8', '1', '3', 'Vistas/img/Productos/003/250.jpg', 50, 100, 10, 60, 80, 0, '2020-06-03 10:04:57', ''),
-- ('004', '1', 'Piedra Chancada', 'Piedra Chancada. Es de roca ígnea (andesita), formada por el enfriamiento y solidificación de materi', '8', '1', '5', 'Vistas/img/Productos/004/807.jpg', 100, 150, 30, 70, 90, 0, '2020-06-03 10:07:53', ''),
-- ('005', '1', 'Piedra de Zanja', 'Son piedras que tienen forma angulosa o redondeada y que se añaden al concreto de los cimientos. Pue', '8', '1', '5', 'Vistas/img/Productos/005/101.jpg', 50, 80, 25, 30, 40, 0, '2020-06-03 10:10:53', ''),
-- ('006', '1', 'Confitillo', 'Confitillo. Es un agregado que se obtiene por trituración artificial de rocas o gravas y en tamaño, ', '8', '1', '5', 'Vistas/img/Productos/006/198.jpg', 50, 100, 25, 40, 60, 0, '2020-06-03 10:14:26', ''),
-- ('007', '1', 'Hormigon', 'Definición de hormigón. El hormigón es un material que se utiliza en la construcción. Suele elaborar', '8', '1', '6', 'Vistas/img/Productos/007/672.jpg', 50, 100, 15, 30, 50, 0, '2020-06-03 10:17:40', ''),
-- ('008', '1', 'Arena Negra', 'onjunto de granos minúsculos que se desprenden de las rocas a causa de la erosión del viento o el ag', '8', '1', '3', 'Vistas/img/Productos/008/636.jpg', 50, 100, 10, 70, 80, 0, '2021-05-18 19:27:29', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosalquiler`
--

CREATE TABLE `productosalquiler` (
  `idProductoAlquiler` int(11) NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idMarca` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `Serie` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Placa` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `Ubicacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Observaciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `PrecioAlquiler` float NOT NULL,
  `Fotografia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Estado` char(13) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productosalquiler`
--

INSERT INTO `productosalquiler` (`idProductoAlquiler`, `Descripcion`, `idMarca`, `Serie`, `Placa`, `Ubicacion`, `Observaciones`, `PrecioAlquiler`, `Fotografia`, `FechaRegistro`, `Estado`) VALUES
(1, 'Prueba', '1', 'Volquete', 'PE-5464', 'LOS ANGLES', ' SIN OBSEVACION', 1200, 'Vistas/img/Productos/Default/DefaultProducto.png', '2020-08-27', 'Disponible'),
(2, 'PRUEBA 2', '8', 'Cargador Frontal', 'PE-5465', 'LOS ANGLES', ' SIN OBSERBACION', 1243, 'Vistas/img/Productos/Default/DefaultProducto.png', '2020-08-27', 'Mantenimiento'),
(3, 'geishas', '2', 'Volquete', 'PE-6545', 'SANTA ANITA', ' LAS GESIHAS', 500, 'Vistas/img/Productos/Default/DefaultProducto.png', '2020-08-27', 'Disponible'),
(4, 'ninguna', '1', 'Volquete', 'PE-5485', 'ATE', ' NINguna', 200, 'Vistas/img/Productos/Default/DefaultProducto.png', '2021-05-18', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Codigo` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `RazonSocial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Ruc` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `Celular` char(17) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Codigo`, `RazonSocial`, `Ruc`, `Direccion`, `Telefono`, `Celular`, `Correo`) VALUES
('1', 'tempus', '23658963254', 'Ate Vitarte', '(01) 369-58-74', '(+51) 987-563-256', 'tempus.sa@gmail.com'),
('2', 'ceros arequipa', '20365899658', 'lima', '(01) 654-98-78', '(+51) 987-654-321', 'cerosarequipa@hotmail.com'),
('8', 'PERU PERU ', '7153434343', 'ASDASDSAD', '(12) 121-21-21', '(+12) 112-121-212', 'sskdjfjsdhf@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `idPerfil` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(10) NOT NULL DEFAULT 1,
  `FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `idPerfil`, `Usuario`, `Password`, `Estado`, `FechaRegistro`) VALUES
('1', '001', 'admin', 'admin', 1, '2020-06-04 21:24:02'),
('10', '001', 'BAUTISTA', '$2a$07$asxx54ahjppf45sd87a5aulOBC7NjfuOUQX9sPtuiy0', 1, '2020-08-13 19:59:46'),
('12', '002', 'kevin', '$2a$07$asxx54ahjppf45sd87a5au2fXYgiBckPHlskyXf9ZPV', 1, '2021-04-27 03:53:32'),
('13', '001', 'jordy', '$2a$07$asxx54ahjppf45sd87a5auzsJ2Sepgao6xW2/KS7cZK', 1, '2021-05-18 00:22:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `Codigo` char(20) COLLATE utf8_spanish_ci NOT NULL,
  `idCliente` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `idVendedor` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `Impuesto` float NOT NULL,
  `Neto` float NOT NULL,
  `Descuento` float NOT NULL,
  `Total` float NOT NULL,
  `MetodoPago` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `Codigo`, `idCliente`, `idVendedor`, `Impuesto`, `Neto`, `Descuento`, `Total`, `MetodoPago`, `Fecha`, `Estado`) VALUES
(1, '0001', '1', '1', 18, 100, 0, 118, 'Efectivo', '2020-06-03 10:53:01', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`idAlquiler`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD KEY `detalleventa_Producto` (`idProductoDV`),
  ADD KEY `detalleventa_Ventas` (`idVentaDV`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `idMoneda` (`idMoneda`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `moneda`
--
ALTER TABLE `moneda`
  ADD PRIMARY KEY (`idMoneda`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idPersonal`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `productos_categoria` (`CodigoCategoria`),
  ADD KEY `productos_marca` (`CodigoMarca`),
  ADD KEY `productos_presentacion` (`CodigoPresentacion`),
  ADD KEY `productos_proveedor` (`CodigoProveedor`);

--
-- Indices de la tabla `productosalquiler`
--
ALTER TABLE `productosalquiler`
  ADD PRIMARY KEY (`idProductoAlquiler`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `usuarios_perfil` (`idPerfil`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `ventas_Cliente` (`idCliente`),
  ADD KEY `ventas_Personal` (`idVendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `idAlquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `moneda`
--
ALTER TABLE `moneda`
  MODIFY `idMoneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productosalquiler`
--
ALTER TABLE `productosalquiler`
  MODIFY `idProductoAlquiler` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_Producto` FOREIGN KEY (`idProductoDV`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `detalleventa_Ventas` FOREIGN KEY (`idVentaDV`) REFERENCES `ventas` (`idVenta`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`idMoneda`) REFERENCES `moneda` (`idMoneda`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria` FOREIGN KEY (`CodigoCategoria`) REFERENCES `categorias` (`Codigo`),
  ADD CONSTRAINT `productos_marca` FOREIGN KEY (`CodigoMarca`) REFERENCES `marcas` (`Codigo`),
  ADD CONSTRAINT `productos_presentacion` FOREIGN KEY (`CodigoPresentacion`) REFERENCES `presentacion` (`Codigo`),
  ADD CONSTRAINT `productos_proveedor` FOREIGN KEY (`CodigoProveedor`) REFERENCES `proveedor` (`Codigo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_perfil` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`),
  ADD CONSTRAINT `usuarios_personal` FOREIGN KEY (`idUsuario`) REFERENCES `personal` (`idPersonal`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_Cliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`),
  ADD CONSTRAINT `ventas_Personal` FOREIGN KEY (`idVendedor`) REFERENCES `personal` (`idPersonal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
