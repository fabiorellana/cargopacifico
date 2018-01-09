-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-06-2017 a las 11:52:42
-- Versión del servidor: 5.5.34-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cargopac_sistcp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizaciones`
--

CREATE TABLE `autorizaciones` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(150) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_abono`
--

CREATE TABLE `cc_abono` (
  `Planilla` int(11) NOT NULL,
  `N_nota_credito` int(11) NOT NULL,
  `Tipo_abono` int(11) NOT NULL,
  `monto` varchar(15) CHARACTER SET latin1 NOT NULL,
  `autoriza_id` int(11) NOT NULL,
  `Observaciones` varchar(80) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_cheque_contabilidad`
--

CREATE TABLE `cc_cheque_contabilidad` (
  `planilla` int(11) NOT NULL,
  `N_cheque` int(11) NOT NULL,
  `Banco_id` int(11) NOT NULL,
  `Rut_cliente` varchar(11) CHARACTER SET latin1 NOT NULL,
  `Monto` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` varchar(50) CHARACTER SET latin1 NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_cheque_pendiente`
--

CREATE TABLE `cc_cheque_pendiente` (
  `id` int(11) NOT NULL,
  `planilla` int(11) NOT NULL,
  `N_cheque` int(11) NOT NULL,
  `Banco_id` int(20) NOT NULL,
  `cliente_id` varchar(11) CHARACTER SET latin1 NOT NULL,
  `concepto` int(11) NOT NULL,
  `Monto` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `observacion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_cobro`
--

CREATE TABLE `cc_cobro` (
  `planilla` int(11) NOT NULL,
  `N_factura` int(11) NOT NULL,
  `Cod_producto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Observacion` varchar(300) CHARACTER SET latin1 NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_gastos`
--

CREATE TABLE `cc_gastos` (
  `id` int(11) NOT NULL,
  `Planilla` int(11) NOT NULL,
  `Id_gasto` int(11) NOT NULL,
  `Monto` int(11) NOT NULL,
  `Observacion` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_history`
--

CREATE TABLE `cc_history` (
  `Planilla` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Centro` int(11) NOT NULL,
  `Corte` int(11) NOT NULL,
  `Cargas` int(11) NOT NULL,
  `Chofer` varchar(11) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Efectivo` int(11) NOT NULL,
  `Cheque` int(11) NOT NULL,
  `Promae` int(11) NOT NULL,
  `Total_ingreso_1` int(11) NOT NULL,
  `Gastos` int(11) NOT NULL,
  `Ch_pendiente` int(11) NOT NULL,
  `Ch_conta` int(11) NOT NULL,
  `Abono` int(11) NOT NULL,
  `Retiro` int(11) NOT NULL,
  `Total_ingreso` int(11) NOT NULL,
  `Cobros` int(11) NOT NULL,
  `Diferencias` int(11) NOT NULL,
  `Flete_porteo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_history`
--

INSERT INTO `cc_history` (`Planilla`, `Fecha`, `Centro`, `Corte`, `Cargas`, `Chofer`, `Valor`, `Efectivo`, `Cheque`, `Promae`, `Total_ingreso_1`, `Gastos`, `Ch_pendiente`, `Ch_conta`, `Abono`, `Retiro`, `Total_ingreso`, `Cobros`, `Diferencias`, `Flete_porteo`) VALUES
(20231493, '2017-06-16', 7, 0, 0, 'P. MONTECIN', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231494, '2017-06-16', 7, 0, 0, 'H MUÑOZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231495, '2017-06-16', 7, 0, 0, 'J.PINTO', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231496, '2017-06-16', 7, 0, 0, 'R. ALBORNOZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231497, '2017-06-16', 7, 0, 0, 'L.SEQUEIDA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231498, '2017-06-16', 7, 0, 0, 'D.VALDES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231499, '2017-06-16', 7, 0, 0, 'J.MARTINEZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231500, '2017-06-16', 7, 0, 0, 'S.BECERRA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231501, '2017-06-16', 7, 0, 0, 'C.AGUILERA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231502, '2017-06-16', 7, 0, 0, 'S.BECERRA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231503, '2017-06-16', 7, 0, 0, 'P ALBORNOZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231504, '2017-06-16', 7, 0, 0, 'M.AGUILAR', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231505, '2017-06-16', 7, 0, 0, 'G.CABRERA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231506, '2017-06-16', 7, 0, 0, 'P.ROJAS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231507, '2017-06-16', 7, 0, 0, 'J.VILLANUEV', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231508, '2017-06-16', 7, 0, 0, 'M.FELIU', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231510, '2017-06-16', 7, 0, 0, 'F.LOPEZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231511, '2017-06-16', 7, 0, 0, 'L.VALENZUEL', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231512, '2017-06-16', 7, 0, 0, 'M.URRA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231513, '2017-06-16', 7, 0, 0, 'C.GONZALEZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231514, '2017-06-16', 7, 0, 0, 'V.LIRA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231515, '2017-06-16', 7, 0, 0, 'J.CUEVAS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231516, '2017-06-16', 7, 0, 0, 'M.ARANGUIZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231517, '2017-06-16', 7, 0, 0, 'D.CUADRA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231518, '2017-06-16', 7, 0, 0, 'P.MARCHANT', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231519, '2017-06-16', 7, 0, 0, 'J.HENRIQUEZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231520, '2017-06-16', 7, 0, 0, 'H.MARQUEZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231521, '2017-06-16', 7, 0, 0, 'E.HERNANDEZ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231522, '2017-06-16', 7, 0, 0, 'A.LANTADILL', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231523, '2017-06-16', 7, 0, 0, 'M.OLIVARES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231524, '2017-06-16', 7, 0, 0, 'E.TORRES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231525, '2017-06-16', 7, 0, 0, 'F.BRAVO', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231526, '2017-06-16', 7, 0, 0, 'S. CORREA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231527, '2017-06-16', 7, 0, 0, 'J.CUEVAS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231528, '2017-06-16', 7, 0, 0, 'C.AGUIRRE', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231529, '2017-06-16', 7, 0, 0, 'J.CARRASCO', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231530, '2017-06-16', 7, 0, 0, 'J.CUEVAS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231531, '2017-06-16', 7, 0, 0, 'C.ZUÑIGA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231532, '2017-06-16', 7, 0, 0, 'J.CUEVAS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231533, '2017-06-16', 7, 0, 0, 'L.MIRANDA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231534, '2017-06-16', 7, 0, 0, 'J.ABURTO', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231535, '2017-06-16', 7, 0, 0, 'W.CANALES', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231536, '2017-06-16', 7, 0, 0, 'C.ZUÑIGA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20231537, '2017-06-16', 7, 0, 0, 'H.MOYA', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_abono`
--

CREATE TABLE `cc_is_abono` (
  `codigo` int(11) NOT NULL,
  `concepto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_is_abono`
--

INSERT INTO `cc_is_abono` (`codigo`, `concepto`) VALUES
(1, 'NOTA DE CREDITO RECIBIDA'),
(2, 'holalsldasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_banco`
--

CREATE TABLE `cc_is_banco` (
  `id` int(11) NOT NULL,
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_is_banco`
--

INSERT INTO `cc_is_banco` (`id`, `rut`, `nombre`) VALUES
(1, '97004000-5', 'Banco de chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_cheque`
--

CREATE TABLE `cc_is_cheque` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_is_cheque`
--

INSERT INTO `cc_is_cheque` (`codigo`, `descripcion`) VALUES
(1, 'POR FORMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_cliente`
--

CREATE TABLE `cc_is_cliente` (
  `id` int(11) NOT NULL,
  `rut` varchar(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `razon_social` varchar(80) NOT NULL,
  `direccion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_is_cliente`
--

INSERT INTO `cc_is_cliente` (`id`, `rut`, `Nombre`, `razon_social`, `direccion`) VALUES
(1, '18521960-7', 'claudio Riquelme', 'giro', 'por ahi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_concepto`
--

CREATE TABLE `cc_is_concepto` (
  `id` int(11) NOT NULL,
  `error_jajaja` int(11) NOT NULL,
  `concepto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_is_concepto`
--

INSERT INTO `cc_is_concepto` (`id`, `error_jajaja`, `concepto`) VALUES
(1, 0, 'Abono Cobro'),
(2, 0, 'Nota de Credito recibido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_gastos`
--

CREATE TABLE `cc_is_gastos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_is_gastos`
--

INSERT INTO `cc_is_gastos` (`id`, `descripcion`) VALUES
(1, 'PEAJE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_producto`
--

CREATE TABLE `cc_is_producto` (
  `Cod_ccu` int(11) NOT NULL,
  `Descripcion` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cc_is_producto`
--

INSERT INTO `cc_is_producto` (`Cod_ccu`, `Descripcion`) VALUES
(555, 'Bebida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_is_retiro`
--

CREATE TABLE `cc_is_retiro` (
  `Codigo` int(11) NOT NULL,
  `Retiro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_is_retiro`
--

INSERT INTO `cc_is_retiro` (`Codigo`, `Retiro`) VALUES
(2, 'JULIO ARAYA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_permisos_centros`
--

CREATE TABLE `cc_permisos_centros` (
  `id` int(11) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_permisos_centros`
--

INSERT INTO `cc_permisos_centros` (`id`, `Rut`, `centro`) VALUES
(21, '18521960-7', 7),
(22, '13548819-4', 1),
(23, '10004289-', 1000),
(24, '13548819-4', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_retiro`
--

CREATE TABLE `cc_retiro` (
  `planilla` int(11) NOT NULL,
  `motivo` varchar(500) NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_tipo_abono`
--

CREATE TABLE `cc_tipo_abono` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cc_valores`
--

CREATE TABLE `cc_valores` (
  `planilla` int(11) NOT NULL,
  `valor_pl` int(11) NOT NULL,
  `efectivo` int(11) NOT NULL,
  `cheque` int(11) NOT NULL,
  `promae` int(11) NOT NULL,
  `flete_porteo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cc_valores`
--

INSERT INTO `cc_valores` (`planilla`, `valor_pl`, `efectivo`, `cheque`, `promae`, `flete_porteo`) VALUES
(20231493, 0, 0, 0, 0, 0),
(20231494, 0, 0, 0, 0, 0),
(20231495, 0, 0, 0, 0, 0),
(20231496, 0, 0, 0, 0, 0),
(20231497, 0, 0, 0, 0, 0),
(20231498, 0, 0, 0, 0, 0),
(20231499, 0, 0, 0, 0, 0),
(20231500, 0, 0, 0, 0, 0),
(20231501, 0, 0, 0, 0, 0),
(20231502, 0, 0, 0, 0, 0),
(20231503, 0, 0, 0, 0, 0),
(20231504, 0, 0, 0, 0, 0),
(20231505, 0, 0, 0, 0, 0),
(20231506, 0, 0, 0, 0, 0),
(20231507, 0, 0, 0, 0, 0),
(20231508, 0, 0, 0, 0, 0),
(20231510, 0, 0, 0, 0, 0),
(20231511, 0, 0, 0, 0, 0),
(20231512, 0, 0, 0, 0, 0),
(20231513, 0, 0, 0, 0, 0),
(20231514, 0, 0, 0, 0, 0),
(20231515, 0, 0, 0, 0, 0),
(20231516, 0, 0, 0, 0, 0),
(20231517, 0, 0, 0, 0, 0),
(20231518, 0, 0, 0, 0, 0),
(20231519, 0, 0, 0, 0, 0),
(20231520, 0, 0, 0, 0, 0),
(20231521, 0, 0, 0, 0, 0),
(20231522, 0, 0, 0, 0, 0),
(20231523, 0, 0, 0, 0, 0),
(20231524, 0, 0, 0, 0, 0),
(20231525, 0, 0, 0, 0, 0),
(20231526, 0, 0, 0, 0, 0),
(20231527, 0, 0, 0, 0, 0),
(20231528, 0, 0, 0, 0, 0),
(20231529, 0, 0, 0, 0, 0),
(20231530, 0, 0, 0, 0, 0),
(20231531, 0, 0, 0, 0, 0),
(20231532, 0, 0, 0, 0, 0),
(20231533, 0, 0, 0, 0, 0),
(20231534, 0, 0, 0, 0, 0),
(20231535, 0, 0, 0, 0, 0),
(20231536, 0, 0, 0, 0, 0),
(20231537, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_centro_de_costos`
--

CREATE TABLE `ges_centro_de_costos` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(35) CHARACTER SET latin1 NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ges_centro_de_costos`
--

INSERT INTO `ges_centro_de_costos` (`id`, `Descripcion`, `Estado`) VALUES
(1, 'ADMINISTRACION', 1),
(2, 'BOTELLEROS RGUA.', 1),
(3, 'CURICO', 1),
(4, 'ILLAPEL', 1),
(5, 'LA VARA', 1),
(6, 'MELIPILLA', 1),
(7, 'RANCAGUA', 1),
(8, 'SAN ANTONIO', 1),
(9, 'SAN FERNANDO', 1),
(10, 'SANTIAGO', 1),
(11, 'SANTIAGO-ORIENTE', 1),
(12, 'TALCA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_empresa`
--

CREATE TABLE `ges_empresa` (
  `Id` int(11) NOT NULL,
  `Rut` varchar(11) CHARACTER SET latin1 NOT NULL,
  `Nombre` varchar(150) CHARACTER SET latin1 NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ges_empresa`
--

INSERT INTO `ges_empresa` (`Id`, `Rut`, `Nombre`, `Estado`) VALUES
(1, '22222222-2', 'EMPRENDEDORES SANTIAGO', 1),
(2, '11111111-1', 'HONORARIOS', 1),
(3, '52000846-2', 'JULIO LAUTARO ARAYA EIRL.', 0),
(4, '78877610-1', 'PRESTACION DE SERVICIOS CARGO PACÍFICO LTDA.', 1),
(5, '79505900-8', 'TRANSPORTES BRAVO CONTARDO LTDA.', 1),
(6, '76874720-2', 'TRANSPORTES CLAUDIO GONZALEZ VALENZUELA E.I.R.L.', 1),
(7, '78462150-2', 'TRANSPORTE CARGO PACIFICO LTDA.', 1),
(8, '77950440-9', 'TRANSPORTES Y SERVICIOS GONZALEZ Y GONZALEZ LTDA.', 1),
(9, '79839070-8', 'TRANSPORTES SAN ANDRES LTDA.', 1),
(10, '79581750-6', 'TRANSPORTES SIXTO GONZALEZ LTDA', 1),
(12, '55555555-7', 'prueba S.A', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_fallas`
--

CREATE TABLE `ges_fallas` (
  `Rut` varchar(11) CHARACTER SET latin1 NOT NULL,
  `Fecha` date NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ges_fallas`
--

INSERT INTO `ges_fallas` (`Rut`, `Fecha`, `tipo`) VALUES
('10004289-', '2017-06-15', 2),
('9962949-5', '2017-06-15', 2),
('10028178-3', '2017-06-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_honorarios`
--

CREATE TABLE `ges_honorarios` (
  `codigo` int(11) NOT NULL,
  `Rut` varchar(11) NOT NULL,
  `Nombres` varchar(150) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_programacion`
--

CREATE TABLE `ges_programacion` (
  `id` int(11) NOT NULL,
  `Planilla` int(11) NOT NULL,
  `Corte_ccu` varchar(5) CHARACTER SET latin1 NOT NULL,
  `Conductor` varchar(50) NOT NULL,
  `Total_cajas_preventa` int(11) NOT NULL,
  `N_cargas` int(11) NOT NULL,
  `N_cliente` int(11) NOT NULL,
  `Fecha_ccu` date NOT NULL,
  `cent_costo` int(11) NOT NULL,
  `ayu1` varchar(11) NOT NULL,
  `ayu2` varchar(11) NOT NULL,
  `ayu3` varchar(11) NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ges_programacion`
--

INSERT INTO `ges_programacion` (`id`, `Planilla`, `Corte_ccu`, `Conductor`, `Total_cajas_preventa`, `N_cargas`, `N_cliente`, `Fecha_ccu`, `cent_costo`, `ayu1`, `ayu2`, `ayu3`, `Estado`) VALUES
(417, 20231510, 'O02', 'F.LOPEZ', 263, 1, 27, '2017-06-16', 7, '9977976-4', '', '', 1),
(418, 20231523, 'O05', 'M.OLIVARES', 302, 1, 24, '2017-06-16', 7, '', '', '', 0),
(419, 20231519, 'O08', 'J.HENRIQUEZ', 312, 1, 31, '2017-06-16', 7, '', '', '', 0),
(420, 20231520, 'O09', 'H.MARQUEZ', 648, 1, 37, '2017-06-16', 7, '', '', '', 0),
(421, 20231517, 'O10', 'D.CUADRA', 472, 1, 27, '2017-06-16', 7, '', '', '', 0),
(422, 20231511, 'O11', 'L.VALENZUELA', 576, 1, 36, '2017-06-16', 7, '', '', '', 0),
(423, 20231513, 'O12', 'C.GONZALEZ', 223, 1, 1, '2017-06-16', 7, '', '', '', 0),
(424, 20231522, 'O14', 'A.LANTADILLA', 429, 1, 7, '2017-06-16', 7, '', '', '', 0),
(425, 20231514, 'O16', 'V.LIRA', 505, 1, 24, '2017-06-16', 7, '', '', '', 0),
(426, 20231526, 'O17', 'S. CORREA', 405, 1, 5, '2017-06-16', 7, '', '', '', 0),
(427, 20231525, 'O18', 'F.BRAVO', 413, 1, 29, '2017-06-16', 7, '', '', '', 0),
(428, 20231524, 'O19', 'E.TORRES', 349, 1, 33, '2017-06-16', 7, '', '', '', 0),
(429, 20231518, 'O20', 'P.MARCHANT', 479, 1, 25, '2017-06-16', 7, '', '', '', 0),
(430, 20231512, 'O21', 'M.URRA', 700, 1, 35, '2017-06-16', 7, '', '', '', 0),
(431, 20231516, 'O23', 'M.ARANGUIZ', 585, 1, 38, '2017-06-16', 7, '', '', '', 0),
(432, 20231515, 'O25', 'J.CUEVAS', 611, 1, 3, '2017-06-16', 7, '', '', '', 0),
(433, 20231527, 'O25', 'J.CUEVAS', 61, 2, 4, '2017-06-16', 7, '', '', '', 0),
(434, 20231532, 'O25', 'J.CUEVAS', 517, 3, 3, '2017-06-16', 7, '', '', '', 0),
(435, 20231530, 'O25', 'J.CUEVAS', 91, 4, 9, '2017-06-16', 7, '', '', '', 0),
(436, 20231536, 'O27', 'C.ZUÑIGA', 845, 1, 2, '2017-06-16', 7, '', '', '', 0),
(437, 20231531, 'O27', 'C.ZUÑIGA', 483, 2, 31, '2017-06-16', 7, '', '', '', 0),
(438, 20231534, 'O28', 'J.ABURTO', 751, 1, 38, '2017-06-16', 7, '', '', '', 0),
(439, 20231521, 'O29', 'E.HERNANDEZ', 381, 1, 34, '2017-06-16', 7, '', '', '', 0),
(440, 20231528, 'O30', 'C.AGUIRRE', 469, 1, 38, '2017-06-16', 7, '', '', '', 0),
(441, 20231529, 'O31', 'J.CARRASCO', 468, 1, 5, '2017-06-16', 7, '', '', '', 0),
(442, 20231533, 'O32', 'L.MIRANDA', 695, 1, 5, '2017-06-16', 7, '', '', '', 0),
(443, 20231537, 'O36', 'H.MOYA', 795, 1, 41, '2017-06-16', 7, '', '', '', 0),
(444, 20231535, 'O39', 'W.CANALES', 516, 1, 34, '2017-06-16', 7, '', '', '', 0),
(445, 20231501, 'O50', 'C.AGUILERA', 529, 1, 29, '2017-06-16', 7, '', '', '', 0),
(446, 20231496, 'O51', 'R. ALBORNOZ', 661, 1, 27, '2017-06-16', 7, '', '', '', 0),
(447, 20231494, 'O52', 'H MUÑOZ', 488, 1, 35, '2017-06-16', 7, '', '', '', 0),
(448, 20231498, 'O53', 'D.VALDES', 532, 1, 31, '2017-06-16', 7, '', '', '', 0),
(449, 20231493, 'O54', 'P. MONTECINOS', 655, 1, 26, '2017-06-16', 7, '', '', '', 0),
(450, 20231497, 'O55', 'L.SEQUEIDA', 298, 1, 25, '2017-06-16', 7, '', '', '', 0),
(451, 20231500, 'O56', 'S.BECERRA', 660, 1, 1, '2017-06-16', 7, '', '', '', 0),
(452, 20231502, 'O56', 'S.BECERRA', 584, 2, 28, '2017-06-16', 7, '', '', '', 0),
(453, 20231503, 'O58', 'P ALBORNOZ', 599, 1, 1, '2017-06-16', 7, '', '', '', 0),
(454, 20231499, 'O59', 'J.MARTINEZ', 728, 1, 16, '2017-06-16', 7, '', '', '', 0),
(455, 20231507, 'O60', 'J.VILLANUEVA', 591, 1, 32, '2017-06-16', 7, '', '', '', 0),
(456, 20231504, 'O64', 'M.AGUILAR', 416, 1, 29, '2017-06-16', 7, '', '', '', 0),
(457, 20231495, 'O66', 'J.PINTO', 395, 1, 21, '2017-06-16', 7, '', '', '', 0),
(458, 20231506, 'O67', 'P.ROJAS', 340, 1, 30, '2017-06-16', 7, '', '', '', 0),
(459, 20231505, 'O68', 'G.CABRERA', 711, 1, 19, '2017-06-16', 7, '', '', '', 0),
(460, 20231508, 'O69', 'M.FELIU', 527, 1, 31, '2017-06-16', 7, '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_program_ayu_y_cond`
--

CREATE TABLE `ges_program_ayu_y_cond` (
  `id` int(11) NOT NULL,
  `Planilla` int(11) NOT NULL,
  `ayu` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `N` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ges_program_ayu_y_cond`
--

INSERT INTO `ges_program_ayu_y_cond` (`id`, `Planilla`, `ayu`, `fecha`, `N`) VALUES
(2, 20231510, '10004289-', '2017-06-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_prog_camiones`
--

CREATE TABLE `ges_prog_camiones` (
  `Patente` varchar(6) NOT NULL,
  `Corte` varchar(4) NOT NULL,
  `centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_prog_camiones_centro`
--

CREATE TABLE `ges_prog_camiones_centro` (
  `patente` varchar(6) NOT NULL,
  `centro_id` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_rechazos_xls`
--

CREATE TABLE `ges_rechazos_xls` (
  `id` int(11) NOT NULL,
  `fecha_p` int(11) NOT NULL,
  `fecha_l` int(11) NOT NULL,
  `ubic_cd` int(11) NOT NULL,
  `cd_descrip` int(11) NOT NULL,
  `zona` int(11) NOT NULL,
  `FLTID` int(11) NOT NULL,
  `FLTTXT` int(11) NOT NULL,
  `CLICODRUC` int(11) NOT NULL,
  `camion` int(11) NOT NULL,
  `carga` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `fisico_facturado` int(11) NOT NULL,
  `fisico_entregado` int(11) NOT NULL,
  `fisico_rechazos` int(11) NOT NULL,
  `Equiv_facturado` int(11) NOT NULL,
  `Equiv_entregado` int(11) NOT NULL,
  `Equiv_rechazos` int(11) NOT NULL,
  `Cli_prog` int(11) NOT NULL,
  `Cli_ent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_sindicato`
--

CREATE TABLE `ges_sindicato` (
  `id` int(11) NOT NULL,
  `Rut` varchar(12) CHARACTER SET latin1 NOT NULL,
  `Nombre` varchar(35) CHARACTER SET latin1 NOT NULL,
  `Centro_id` int(11) NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_solicita_cambio`
--

CREATE TABLE `ges_solicita_cambio` (
  `id` int(11) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `mensaje` varchar(450) NOT NULL,
  `planilla` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ges_solicita_cambio`
--

INSERT INTO `ges_solicita_cambio` (`id`, `usuario`, `mensaje`, `planilla`, `estado`) VALUES
(48, '18521960-7', 'cambia ayudante 1', 20231510, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_tipo_contrato`
--

CREATE TABLE `ges_tipo_contrato` (
  `id` int(11) NOT NULL,
  `Tipo` varchar(11) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ges_tipo_contrato`
--

INSERT INTO `ges_tipo_contrato` (`id`, `Tipo`) VALUES
(1, 'A plazo'),
(2, 'Indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_tipo_falla`
--

CREATE TABLE `ges_tipo_falla` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ges_tipo_falla`
--

INSERT INTO `ges_tipo_falla` (`id`, `Descripcion`) VALUES
(1, 'FALLA'),
(2, 'PERMISO'),
(3, 'LICENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_trabajadores`
--

CREATE TABLE `ges_trabajadores` (
  `Rut` varchar(10) CHARACTER SET latin1 NOT NULL,
  `codigo_ayu` int(11) NOT NULL,
  `codigo_cond` int(11) NOT NULL,
  `Nombre` varchar(150) CHARACTER SET latin1 NOT NULL,
  `Cargo_id` int(11) NOT NULL,
  `Empresa_id` int(11) NOT NULL,
  `Centro_de_costo_id` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `id_grencia` int(11) NOT NULL,
  `id_dpto` int(11) NOT NULL,
  `Direccion` varchar(150) CHARACTER SET latin1 NOT NULL,
  `Celular` text CHARACTER SET latin1 NOT NULL,
  `Fecha_nac` date NOT NULL,
  `Ciudad` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Fecha_contrato` date NOT NULL,
  `Tipo_contrato_id` int(11) NOT NULL,
  `Fecha_termino_contrato` date NOT NULL,
  `Sindicato_id` int(11) NOT NULL,
  `N_contacto` text CHARACTER SET latin1 NOT NULL,
  `N_carga` int(11) NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ges_trabajadores`
--

INSERT INTO `ges_trabajadores` (`Rut`, `codigo_ayu`, `codigo_cond`, `Nombre`, `Cargo_id`, `Empresa_id`, `Centro_de_costo_id`, `id_permiso`, `id_grencia`, `id_dpto`, `Direccion`, `Celular`, `Fecha_nac`, `Ciudad`, `Fecha_contrato`, `Tipo_contrato_id`, `Fecha_termino_contrato`, `Sindicato_id`, `N_contacto`, `N_carga`, `Estado`) VALUES
('10002787-', 0, 0, 'BOLIVAR CARREÃ‘O SIMON PABLO', 0, 6, 2, 0, 0, 15, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10004289-', 0, 0, 'CANTILLANA GATICA MARCO AURELIO', 2, 4, 7, 23, 0, 12, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10006662-9', 0, 0, 'CAMPOS OSORIO JOSE AGUSTIN', 6, 7, 1, 0, 0, 12, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10007320-K', 0, 0, 'ALISTE TAPIA FRANCISCO ANTONIO', 15, 8, 7, 19, 0, 14, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10011490-', 0, 0, 'BERRIOS ARENAS FRANCKLIN MANUEL', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10013685-', 0, 0, 'LOPEZ ROJAS PEDRO ENRIQUE', 8, 8, 3, 0, 0, 15, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10018850-3', 0, 0, 'NUÑEZ HERNANDEZ ERALDO ULISES', 2, 2, 1, 0, 0, 12, 'sucasa', '', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10022577-8', 0, 0, 'VALDES DIAZ CLAUDIO ALBERTO', 8, 3, 2, 15, 0, 13, 'sucasa', '08-246696', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10028178-3', 0, 0, 'ACUÑA ALEGRIA LEANDRO FRANCISCO', 2, 2, 7, 0, 0, 17, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10028234-8', 0, 0, 'ESPINOZA GONZALEZ HUGO EUGENIO', 8, 3, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10041854-1', 0, 0, 'MICHEA GONZALEZ JOSE FRANCISCO', 22, 7, 2, 22, 0, 12, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10043154-', 0, 0, 'CASTRO MONSALVE EDUARDO A', 8, 8, 7, 20, 0, 13, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10054464-4', 0, 0, 'PEREIRA BARRIA CARLOS ENRIQUE', 8, 7, 7, 0, 0, 12, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10056903-5', 0, 0, 'MUÑOZ CORTES SERGIO ENRIQUE', 8, 2, 1, 0, 0, 0, 'sucasa', '96226612', '0000-00-00', 'ILLAPEL', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10066780-0', 0, 0, 'LOZANO CONCHA JAIME ESTEBAN', 8, 7, 4, 0, 0, 0, 'sucasa', '0', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10072356-', 0, 0, 'CACERES CORTES JUAN CARLOS', 7, 8, 7, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10074092-3', 0, 0, 'MUÑOZ PEREZ SAMUEL FRANCISCO', 8, 7, 1, 0, 0, 0, 'sucasa', '68467021', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10076891-7', 0, 0, 'QUEZADA ROMAN LUIS HERNAN', 8, 4, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10082679-8', 0, 0, 'NAVARRO VERDUGO HECTOR ROBERT', 13, 8, 7, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10084641-1', 0, 0, 'VILCHES QUINTERO JOSE ARTURO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10089269-', 0, 0, 'MORALES TOLEDO VICTOR SEG', 7, 8, 7, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10092600-8', 0, 0, 'YAÑEZ BASAURE MARCELO FILIDOR', 8, 1, 4, 0, 0, 0, 'sucasa', '74707087', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10094956-3', 0, 0, 'SARMIENTO ZAMORA MANUEL ALFREDO', 1, 7, 7, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10110755-8', 0, 0, 'MOLINA MOSCOSO SERGIO ENRIQUE', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10116869-7', 0, 0, 'PEÑALOZA NAVARRO BENEDICTO ALEXIS', 8, 7, 1, 0, 0, 0, 'sucasa', '06-8167363', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10125058-K', 0, 0, 'MONDACA MONDACA EDUARDO CEFERINO', 2, 7, 1, 0, 0, 0, 'sucasa', '78371989', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10139651-7', 0, 0, 'CANTILLANA GATICA JUAN', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10149988-K', 0, 0, 'VILLAR ESPINOZA JOHAN ALEJANDRO', 6, 7, 1, 0, 0, 0, 'sucasa', '0', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10157185-', 0, 0, 'YAÑEZ ORELLANA ANGEL ALEJ', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10159144-1', 0, 0, 'NORAMBUENA FLORES HECTOR', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10168323-0', 0, 0, 'CONTRERAS CASTRO HECTOR RAUL', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10176434-', 0, 0, 'GONZALEZ VASQUEZ JOSE MOD', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10200577-5', 0, 0, 'PEREIRA HERNANDEZ LUIS ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10207389-4', 0, 0, 'MUÑOZ POBLETE LUIS ENRIQUE ', 1, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'talca', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10207848-9', 0, 0, 'AGUAYO MERIÑO ALEJANDRO SEGUNDO', 8, 7, 1, 0, 0, 0, 'sucasa', '65742797', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10207912-4', 0, 0, 'ALBORNOZ FIGUEROA LUIS RAUL', 2, 7, 4, 0, 0, 0, 'sucasa', '971625863', '0000-00-00', 'RENCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10210556-7', 0, 0, 'DIAZ POBLETE CARLOS SEGUNDO', 8, 7, 1, 0, 0, 0, 'sucasa', '08-8941074', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10243293-2', 0, 0, 'ZAPATA CARO DANIEL RODRIGO', 8, 6, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10258777-', 0, 0, 'URIBE MANZO ERIX RAMON JESUS', 7, 8, 1, 0, 0, 0, 'sucasa', '09-87931057', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10260306-', 0, 0, 'ACEVEDO ARENAS ERWIN DEL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10267029-', 0, 0, 'PEYS BARRA CESAR OCTAVIO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10267277-1', 0, 0, 'VALENZUELA VALENZUELA BERNARDO ALEXIS', 7, 7, 1, 0, 0, 0, 'sucasa', '53655550', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10269597-6', 0, 0, 'CANALES NUÑEZ MARIANO DEL CARMEN', 2, 7, 1, 0, 0, 0, 'sucasa', '986801628', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10270028-7', 0, 0, 'URRUTIA VIDAL LUIS OSVALDO', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10277221-0', 0, 0, 'QUILODRAN HERNANDEZ PEDRO DANIEL', 8, 10, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10281658-7', 0, 0, 'ARANGUIZ FERNANDEZ PEDRO PABLO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10286672-K', 0, 0, 'LIZANA RUZ ANGEL RODRIGO', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAIPU', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10288840-', 0, 0, 'PINO CONTRERAS JORGE ANIBAL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10290140-1', 0, 0, 'PALMILLA VALDEZ JORGE', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10329773-7', 0, 0, 'OSORIO BELMAR ERIX EDUARDO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10342331-7', 0, 0, 'CUEVAS MADRIAGA JOSE ANGEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10348139-2', 0, 0, 'VILCHES PIZARRO JOSE ANTONIO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10349329-3', 0, 0, 'REINOSO JARA VICTOR MANUEL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10361883-', 0, 0, 'ABARCA DROGUETT MARCIAL O', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10383258-6', 0, 0, 'GONZALEZ RAMIREZ IVAN ANTONIO', 2, 7, 4, 0, 0, 0, 'sucasa', '952210080', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10384908-', 0, 0, 'BLANCO LAGOS', 16, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10389636-3', 0, 0, 'VERDUGO CAVIERES SANDRA CECILIA', 5, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10391976-2', 0, 0, 'NAVARRO VERGARA CARLOS ALBERTO', 8, 9, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10407198-8', 0, 0, 'DONOSO ROJAS LUIS FELIPE', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10423355-4', 0, 0, 'MEJIAS TORRES PATRICIO ENRIQUE', 1, 7, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10471292-4', 0, 0, 'BENAVIDES  LABRIN JUAN CARLOS', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10478149-7', 0, 0, 'SOTO DUQUE LUIS ALBERTO', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10479288-K', 0, 0, 'ARRIAGADA SOTO RICARDO HUMBERTO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10481382-8', 0, 0, 'PINTO  PONCE  JAIME FREDDY', 8, 7, 1, 0, 0, 0, 'sucasa', '61613512', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10483293-8', 0, 0, 'PARADA HENRIQUEZ ROMILIO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10486843-6', 0, 0, 'VILCHES  BRAVO FRANCISCO SEGUNDO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10498795-8', 0, 0, 'ALBIÑA FLORES EDISON', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10512136-9', 0, 0, 'ANDRADE LOIZA LUIS ALBERTO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10514476-8', 0, 0, 'LIRA LIRA MAURICIO', 8, 7, 2, 0, 0, 0, 'sucasa', '966170992', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10515549-2', 0, 0, 'SOTO ASTUDILLO RICARDO EUGENIO', 8, 7, 4, 0, 0, 0, 'sucasa', '85266975', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10517837-', 0, 0, 'ACEVEDO BAEZA CLAUDIO DEL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10520215-', 0, 0, 'POZO REBOLLEDO MARCO HERN', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10537242-6', 0, 0, 'CARRASCO CERDA MIGUEL', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10538235-', 0, 0, 'RAMIREZ LEON OSCAR ENRIQUE', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10541140-5', 0, 0, 'PAREDES PAREDES JOHN WILLIAMS', 2, 7, 1, 0, 0, 0, 'sucasa', '83585259', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10550252-4', 0, 0, 'PARRA NAVARRO ENRIQUE ALFONSO', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10552292-', 0, 0, 'VALDEBENITO DIAZ ANTONIO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10559407-0', 0, 0, 'MARISCAL ALBORNOZ RICARDO ALEJANDRO', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10559700-2', 0, 0, 'PAREJA SANCHEZ OSCAR FRANCISCO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10563563-K', 0, 0, 'RIQUELME ZUÑIGA MIGUEL ANANIAS', 2, 7, 4, 0, 0, 0, 'sucasa', '77254149', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10566408-7', 0, 0, 'BARRAZA YAÑEZ FERNANDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10567137-', 0, 0, 'MIRANDA URBINA ROBERTO LUIS', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10571940-', 0, 0, 'CONTALBA NAVARRO JAIME AN', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10577176-2', 0, 0, 'GONZALEZ GALLARDO SANDRO MIGUEL', 2, 7, 4, 0, 0, 0, 'sucasa', '979447892', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10582482-', 0, 0, 'ROJAS HENRIQUEZ JOSE ANIBAL', 17, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10593342-8', 0, 0, 'CASTRO VALDEBENITOS ERIC GASTON', 2, 2, 4, 0, 0, 0, 'sucasa', '065637036', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10594595-7', 0, 0, 'CARRASCO LUCERO LUIS ALBERTO', 2, 2, 1, 0, 0, 0, 'sucasa', '79414058', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10598104-K', 0, 0, 'ARIAS LIZANA CARMEN JACQUELINE', 1, 4, 1, 0, 0, 0, 'sucasa', '9-7700020', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10600109-', 0, 0, 'ALVAREZ SILVA MAURO ARNOL', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10604205-5', 0, 0, 'MORAGA PALAVECINOS JUAN ARTURO', 13, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAULE', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10606864-K', 0, 0, 'CARRASCO VASQUEZ ABEL RODRIGO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10607577-8', 0, 0, 'VENEGAS AHUMADA RENE MANUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'INDEPENDENCIA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10609416-0', 0, 0, 'JARA MARIQUEO JAIME ANTONIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10620283-', 0, 0, 'ENCINA SLATER BORIS EUGENIO', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10627615-', 0, 0, 'MOLINET JOFRE JUAN LUIS', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10631050-5', 0, 0, 'DONOSO SALAS AQUILES ANDRES', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10631640-6', 0, 0, 'DONOSO MATURANA ISAIAS RAMON', 2, 7, 4, 0, 0, 0, 'sucasa', '979496603', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10636577-6', 0, 0, 'LECAROS ESCALA RICARDO ANTONIO', 2, 7, 2, 0, 0, 0, 'sucasa', '84424617', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10637230-6', 0, 0, 'CORTES ROJAS CESAR ALEJANDRO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10638054-', 0, 0, 'AYALA REYES EDMUNDO EUGENIO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10640395-3', 0, 0, 'LEIVA REYES MIGUEL ANGEL', 8, 10, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10640598-0', 0, 0, 'CANCINO HIDALGO HUGO ALFONSO', 8, 1, 1, 0, 0, 0, 'sucasa', '91738010', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10658195-9', 0, 0, 'OPAZO BARRERA ROQUE SEBASTIAN', 8, 7, 1, 0, 0, 0, 'sucasa', '85693967', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10658947-K', 0, 0, 'FLORES MELLADO JOSE MIGUEL', 8, 7, 2, 0, 0, 0, 'sucasa', '86015729', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10671973-', 0, 0, 'AHUMADA AREVALO MAURICIO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10681822-', 0, 0, 'SAEZ FUENTE JOSE LUIS', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10698493-', 0, 0, 'YAÑEZ FIGUEROA SERGIO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10709403-2', 0, 0, 'GACITUA SANDOVAL LEANDRO ARNER', 2, 7, 4, 0, 0, 0, 'sucasa', '074446622', '0000-00-00', 'LA PINTANA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10714046-8', 0, 0, 'ACEVEDO VASQUEZ SERGIO ARTURO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10715093-5', 0, 0, 'CRUZ QUINTEROS RODRIGO ESTEBAN', 1, 7, 1, 0, 0, 0, 'sucasa', '53974203', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10716199-6', 0, 0, 'SALOM JIMENEZ CLAUDIO ALEJANDRO', 22, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10728108-8', 0, 0, 'MOYA CARRASCO SERGIO DANILO', 7, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10736445-5', 0, 0, 'CANCINO CARREÑO FRANCISCO FABIAN', 2, 7, 2, 0, 0, 0, 'sucasa', '86226307', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10737037-4', 0, 0, 'CONTRERAS MORALES JUAN BAUTISTA', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10739558-', 0, 0, 'MADRID VALENZUELA BERNABE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10752629-3', 0, 0, 'VALDES ARIAS LUZ ELIANA', 1, 7, 1, 0, 0, 0, 'sucasa', '93443370', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10755533-1', 0, 0, 'ROMAN MATUS OSCAR RODRIGO', 8, 8, 1, 0, 0, 0, 'sucasa', '09-9551395', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10758837-K', 0, 0, 'SERRANO GUAJARDO MANUEL ENRIQUE', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10759497-3', 0, 0, 'MONTEFINALE VALENZUELA PATRICIO ALEX', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10764614-0', 0, 0, 'OYARCE TAPIA RAUL ORLANDO', 8, 2, 1, 0, 0, 0, 'sucasa', '59381999', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10765781-9', 0, 0, 'GALAZ MOLINA  NELSON ENRIQUE', 2, 7, 1, 0, 0, 0, 'sucasa', '89715550', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10770946-0', 0, 0, 'PARRA RUBILAR EDUARDO GENARO', 13, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10783062-', 0, 0, 'CARRERA DURAN JUAN HUMBER', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10787281-7', 0, 0, 'CARMONA RIVERA LUIS HAROLDO', 7, 7, 1, 0, 0, 0, 'sucasa', '58200585', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10791841-8', 0, 0, 'NAVARRO VASQUEZ JOSE MANUEL', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10808645-9', 0, 0, 'CACERES ILABACA MARCELO GERARDO', 8, 7, 1, 0, 0, 0, 'sucasa', '82463163', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10815954-5', 0, 0, 'PAILAPAN MANCILLA SERGIO FERNANDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10825017-8', 0, 0, 'MATURANA PEREZ EMILIO', 8, 2, 4, 0, 0, 0, 'sucasa', '88136877', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10828459-5', 0, 0, 'LEIVA CASTRO RUBEN ALEJANDRO', 8, 7, 1, 0, 0, 0, 'sucasa', '50463978', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10831459-1', 0, 0, 'MOYA SERRANO ALEXIS  ANDRES', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10832458-9', 0, 0, 'MORENO DONAIRE ERICK ARIEL', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10833073-2', 0, 0, 'RIOS ORTEGA JOSE ALEJANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10834637-K', 0, 0, 'REY PEREZ FABIAN FRANCISCO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10841885-0', 0, 0, 'MIRANDA VENEGAS RAMON ROSALINO', 1, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10850053-0', 0, 0, 'LOPEZ ARCOS HERNAN PATRICIO', 8, 3, 2, 0, 0, 0, 'sucasa', '09-4737397', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10851617-8', 0, 0, 'GUTIERREZ FARIÑA HECTOR GUILLERMO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10858119-0', 0, 0, 'GONZALEZ PAVEZ DANIEL ALEJANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN JOAQUIN', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10876540-2', 0, 0, 'ESPIÑEIRA BRAVO CARLOS ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10880585-4', 0, 0, 'GONZALEZ APABLAZA  MARIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10895442-6', 0, 0, 'GUZMAN ROSAS CLAUDIO ENRIQUE', 2, 7, 1, 0, 0, 0, 'sucasa', '65184920', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10898632-', 0, 0, 'PEREZ ABARCA DAGO', 14, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10898658-', 0, 0, 'LEIVA NILO SANTIAGO ANTON', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10899109-', 0, 0, 'SOTO BLUD MAURICIO  ENRIQUE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10907771-', 0, 0, 'NUÑEZ VERDEJO FRANCISCO GASTON', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10908003-9', 0, 0, 'PADRON MOLINA LUIS ARMANDO', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10911279-8', 0, 0, 'BURGOS ESTRADA LEONIDAS  IVAN', 8, 7, 4, 0, 0, 0, 'sucasa', '50163315', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10932373-k', 0, 0, 'HERNANDEZ ACUÑA PABLO ARSENIO', 2, 2, 4, 0, 0, 0, 'sucasa', '071015955', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10932552-K', 0, 0, 'URRUTIA VIDAL JUAN PATRICIO', 8, 7, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10934387-0', 0, 0, 'ESPINOZA ESCOBAR EXEQUIEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10936265-4', 0, 0, 'ASTUDILLO FERNANDEZ MAURICIO', 1, 7, 1, 0, 0, 0, 'sucasa', '957746104', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10954744-1', 0, 0, 'VARGAS FUENTES JOSE ALFREDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('10957054-0', 0, 0, 'ARAYA HERRERA JULIO', 18, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('10957849-5', 0, 0, 'JARA CONTRERAS FERNANDO ESTEBAN', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11071351-7', 0, 0, 'CARREÑO LEIVA GERARDO LEONEL', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11112860-', 0, 0, 'LEON RODRIGUEZ JUAN DAVID', 4, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11134247-', 0, 0, 'PARADA MOLINA ROBERTO EUGENIO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11142371-7', 0, 0, 'RIVEROS CORREA LEONEL PATRICIO', 16, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11142578-7', 0, 0, 'VALDIVIA LATORRE SANDRO DANIEL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11142638-', 0, 0, 'MAULEN GONZALEZ ROBERTO AQUILES', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11145367-5', 0, 0, 'MUÑOZ CALQUIN HECTOR BERNARDO', 8, 7, 1, 0, 0, 0, 'sucasa', '08-4029464', '0000-00-00', 'CURICO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11160133-K', 0, 0, 'REYES PONCE VICTOR ALFREDO', 2, 7, 4, 0, 0, 0, 'sucasa', '984138999', '0000-00-00', 'RENCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11165919-2', 0, 0, 'MUÑOZ REQUENA LUIS ALBERTO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LA FLORIDA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11167213-K', 0, 0, 'QUIJADA SANCHEZ DANIEL MARCOS', 2, 7, 1, 0, 0, 0, 'sucasa', '91545884', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11174175-1', 0, 0, 'MICHEA LOPEZ PATRICIO ANTONIO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11232270-1', 0, 0, 'PARDO CONTRERAS CLAUDIO LENIN', 2, 7, 3, 0, 0, 0, 'sucasa', '88557900', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11239000-6', 0, 0, 'CUEVAS BASCUÑAN JOSE ALFREDO', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11275276-5', 0, 0, 'AGUILERA GORTARI GUILLERMO', 8, 3, 2, 0, 0, 0, 'sucasa', '07-7147130', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11275341-9', 0, 0, 'VALENZUELA MAGUIDA MANUEL JACOB', 2, 2, 1, 0, 0, 0, 'sucasa', 'RANCAGUA', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11275449-0', 0, 0, 'FLORES RAMIREZ CRISTIAN', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11275468-', 0, 0, 'RAMIREZ CESEK JORGE EDUARDO', 7, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11275575-6', 0, 0, 'JOFRE ARRIAZA JOSE ANTONIO', 7, 3, 2, 0, 0, 0, 'sucasa', '09-1646201', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11278881-6', 0, 0, 'YAÑEZ VILCHEZ RICARDO LUIS', 2, 3, 2, 0, 0, 0, 'sucasa', '08-5263384', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11279510-3', 0, 0, 'LETERIER CONTRERAS ROBINSON ESTEBAN', 7, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN  FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11281997-5', 0, 0, 'MELENDEZ CACERES BENJAMIN ANTONIO', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11283717-5', 0, 0, 'RAMIREZ GUTIERREZ JOSE LUIS', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11284274-', 0, 0, 'MERCADO BARROS FRANCISCO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11319282-', 0, 0, 'BURGOS MUÑOZ MAXIMO ALONSO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11319480-', 0, 0, 'TRONCOSO ROJAS JOSE MAURICIO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11332856-8', 0, 0, 'AGUILERA SAAVEDRA CHRITIAN MAURICIO', 2, 7, 4, 0, 0, 0, 'sucasa', '058420036', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11336885-3', 0, 0, 'AVILES TRIGO CLAUDIO ANDRES', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11364506-7', 0, 0, 'MARDONES MIRANDA MARCO AURELIO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11365014-', 0, 0, 'GUERRERO GOMEZ MANUEL ALEJANDRO', 15, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11365047-', 0, 0, 'SOTO CUADRA GERINEL STEVENS', 18, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11365080-', 0, 0, 'ARIAS CACERES MARIO SEGUNDO', 2, 3, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11365716-2', 0, 0, 'LEIVA TAPIA LUIS BERNARDINO', 2, 7, 1, 0, 0, 0, 'sucasa', '83048785', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11365722-7', 0, 0, 'NUÑEZ GUAJARDO  JORGE ENRIQUEZ', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11365905-K', 0, 0, 'MIRANDA RECABARREN LUIS HUMBERTO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11366009-0', 0, 0, 'CORNEJO MOLINA JOSE GUILLERMO', 2, 2, 1, 0, 0, 0, 'sucasa', '64623354', '0000-00-00', 'OLIVAR', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11366019-8', 0, 0, 'PIÑA VERA VERA SERGIO HERNAN', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11367052-5', 0, 0, 'ALVEAR CABEZAS ALFREDO DEL CARMEN', 8, 7, 1, 0, 0, 0, 'sucasa', '07-8913794', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11367101-7', 0, 0, 'FREDES ALIAGA ALEX CHRISTIAN', 7, 4, 1, 0, 0, 0, 'sucasa', '08-9501592', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11367630-2', 0, 0, 'PINTO GUTIERREZ RODRIGO FABIAN', 2, 7, 1, 0, 0, 0, 'sucasa', '95236115', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11373568-6', 0, 0, 'PEÑA LARA LUCIANO ANDRES', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11396539-8', 0, 0, 'CORNEJO LOPEZ LILIAN OTILIA', 1, 7, 1, 0, 0, 0, 'sucasa', '085807313', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11398067-2', 0, 0, 'MORAGA RIVERA CARLOS ENRIQUE', 7, 7, 1, 0, 0, 0, 'sucasa', '08-857006', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11398361-', 0, 0, 'SOTELO GONZALEZ MIGUEL ANGEL', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11439812-', 0, 0, 'LIRA ARAVENA VICTOR ANDES', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11444138-4', 0, 0, 'GODOY SEPULVEDA JOSE FRANCISCO', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'QUINTA DE TILCOCO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11446660-', 0, 0, 'BELLO SANCHEZ JOSE DAVID', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11450133-6', 0, 0, 'MARCHANT JOFRE HECTOR SAMUEL', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11457195-', 0, 0, 'HENRIQUEZ LOYOLA JAIME RE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11475739-K', 0, 0, 'FROST GALLEGUILLOS ADOLFO DAVID', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11486084-0', 0, 0, 'SOTO MORENO HECTOR', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11486336-k', 0, 0, 'REYES VERGARA MIGUEL SEGUNDO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11487047-1', 0, 0, 'MEDINA CONTRERAS  RICARDO DOMINGO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11513128-1', 0, 0, 'PIÑONES ARAYA EDWIN ANDRES', 8, 3, 1, 0, 0, 0, 'sucasa', '08-3056885', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11530073-3', 0, 0, 'RODRIGUEZ CHACON IVAN ALEJANDRO', 15, 7, 1, 0, 0, 0, 'sucasa', '95499036', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11530437-2', 0, 0, 'AGUILAR GONZALEZ MARCELO HERIBERTO', 8, 7, 1, 0, 0, 0, 'sucasa', '62258711', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11530484-4', 0, 0, 'LETELIER GUAJARDO EDUARDO ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11530880-7', 0, 0, 'JORQUERA  BOZA  ARIEL  FERNANDO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11532065-3', 0, 0, 'GATICA MUÑOZ RAMIRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11532144-7', 0, 0, 'GARCIA AGURTO ARTURO ANTONIO', 8, 4, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11533838-2', 0, 0, 'FLORES MORALES SERGIO DEL TRANSITO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'EL BOSQUE', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11534472-2', 0, 0, 'RODRIGUEZ ULLOA MIGUEL', 2, 2, 1, 0, 0, 0, 'sucasa', '56538324', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11534528-1', 0, 0, 'PUENTES MALVERDE GUIDO EUGENIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11543019-K', 0, 0, 'BAHAMONDES VELASQUEZ SERGIO EMILIO', 2, 7, 1, 0, 0, 0, 'sucasa', '78229385', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11553528-5', 0, 0, 'CASTRO YAÑEZ RAUL ALBERTO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11553531-5', 0, 0, 'HERNANDEZ AGUILAR PEDRO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11557780-8', 0, 0, 'PALACIO LUNA SEGUNDO RICARDO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11558089-2', 0, 0, 'AZOCAR ROJAS CARLOS ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '94879757', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11558998-9', 0, 0, 'GONZALEZ MUÑOZ MARCELO ALEJANDRO', 8, 7, 3, 0, 0, 0, 'sucasa', '091203111', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11564440-8', 0, 0, 'PARDO REBOLLEDO JOSE FERNANDO', 2, 7, 2, 0, 0, 0, 'sucasa', '91449490', '0000-00-00', 'LINARES', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11572697-8', 0, 0, 'SAN MARTIN JARA HECTOR', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11607765-5', 0, 0, 'FUENTES QUIROGA MARCO ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '088530117', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11607899-6', 0, 0, 'ZUÑIGA MUÑOZ SERGIO ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'QUINTA NORMAL', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11608312-4', 0, 0, 'TAPIA VIDAL MARIO ARTURO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'EL MONTE', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11615788-8', 0, 0, 'ZEPEDA GARCIA PAOLA LORENA', 1, 4, 1, 0, 0, 0, 'sucasa', '08-8373412', '0000-00-00', 'OLIVAR', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11618187-8', 0, 0, 'SEGOVIA GODOY CARLOS EDUARDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11646298-2', 0, 0, 'ANDRADE BRAVO MARCOS ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11647692-', 0, 0, 'ARAVENA OJEDA JULIO MARCO', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11653521-1', 0, 0, 'BARAHONA JARA FRANCISCO ERASMO', 8, 3, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11656167-0', 0, 0, 'PARRA ROJAS PEDRO PATRICIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11663726-K', 0, 0, 'CAÑETE MORALES ELADIO ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '72197279', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11666204-3', 0, 0, 'GONZALEZ ARANGUIZ JUAN HERIBERTO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LO ESPEJO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11668441-1', 0, 0, 'PULGAR GOMEZ CESAR GERARDO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11670247-9', 0, 0, 'CORNEJO RODRIGUEZ JUAN ANGEL', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11670569-', 0, 0, 'MELLA VASSE RENALDO ENRIQUE', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11670611-3', 0, 0, 'PEREZ MUÑOZ VICTOR', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11670743-8', 0, 0, 'CORNEJO FUENTES JOSE DANIEL', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11671046-', 0, 0, 'MORENO ALAMOS HECTOR GUSTAVO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11672457-', 0, 0, 'PADILLA LEITON PABLO ENRIQUE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11672536-0', 0, 0, 'AGUIRRE ZAMORANO CRISTIAN', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11672546-', 0, 0, 'AGUIRRE ZAMORANO CRISTIAN', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11673142-8', 0, 0, 'ROJAS CIFRAS ANGEL ANTONIO', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11674409-0', 0, 0, 'POBLETE GAJARDO RICHARD ANTONNY', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11674844-', 0, 0, 'RIQUELME MICHEA MANUEL ENRIQUE', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11675670-6', 0, 0, 'BASTIAS GONZALEZ HUGO OSVALDO', 8, 7, 2, 0, 0, 0, 'sucasa', '58854136', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11675707-9', 0, 0, 'PARADA DE LA HOZ BENEDICTO', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11676397-4', 0, 0, 'GAJARDO DIAZ ANDRES HUMBERTO', 8, 7, 2, 0, 0, 0, 'sucasa', '63129025', '0000-00-00', 'SAN CLEMENTE', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11676682-5', 0, 0, 'MORALES BUSTAMANTE RUPERTO ANTONIO', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11688315-5', 0, 0, 'AVACA ORMEÑO MARCELO ALEJANDRO', 8, 7, 2, 0, 0, 0, 'sucasa', '96596283', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11696579-8', 0, 0, 'MUÑOZ MARTINEZ PATRICIO ALEJANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '057852837', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11696662-k', 0, 0, 'FUENTES CORDOVA ROSENDO DEL CARMEN', 2, 2, 4, 0, 0, 0, 'sucasa', '085315404', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11696989-0', 0, 0, 'CONTRERAS OLIVARES EUSEBIO PATRICIO', 7, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11697270-0', 0, 0, 'MORALES MORALES VICTOR HUGO', 8, 7, 4, 0, 0, 0, 'sucasa', '96263501', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11697886-5', 0, 0, 'SOTO DIAZ MARCELO ARTURO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11737959-0', 0, 0, 'FUENZALIDA VELASQUEZ FRANCISCO ABEL', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11740888-4', 0, 0, 'TORO LEIVA MARCELO ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '88215131', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11740913-9', 0, 0, 'NARVAEZ BERNAL JORGE', 3, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11743462-1', 0, 0, 'LIRA VARGAS DAVID ANDRES', 7, 7, 1, 0, 0, 0, 'sucasa', '83747108', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11744254-3', 0, 0, 'YAÑEZ GUAJARDO MARCO AURELIO', 1, 7, 1, 0, 0, 0, 'sucasa', '64778363', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11744418-K', 0, 0, 'QUIROGA AGUAYO JUAN CARLOS', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11745523-8', 0, 0, 'ZUÑIGA VARELA RAUL', 2, 2, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LINARES', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11754026-', 0, 0, 'VALDIVIA ZUÑIGA ENZO ORLANDO', 6, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11756383-9', 0, 0, 'CHACON ESPINOZA RAFAEL DEL TRANSITO', 7, 3, 2, 0, 0, 0, 'sucasa', '09-7649405', '0000-00-00', 'CODEGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11758112-8', 0, 0, 'ACEVEDO CORREA MANUEL RAMIRO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11758532-', 0, 0, 'AYALA PEREZ MANUEL OSVALDO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11762411-', 0, 0, 'IBARRA LEYTON JOSE EULOGIO', 8, 8, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11763170-2', 0, 0, 'FARIAS RAMOS RICHARD BLAS', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11772203-1', 0, 0, 'ALVAREZ ORTEGA MARIO', 8, 2, 3, 0, 0, 0, 'sucasa', '97484324', '0000-00-00', 'CURICO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11781539-', 0, 0, 'SOTO JARA MAGALIER ALEXIS', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11784374-2', 0, 0, 'CONTRERAS LEYTON COSME JOHN', 2, 2, 4, 0, 0, 0, 'sucasa', '91810135', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11804210-0', 0, 0, '', 0, 2, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11804270-0', 0, 0, 'CAAMAÑO VERGARA ALEJANDRO ALEX', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RENCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11837571-8', 0, 0, 'ZAMORANO ROJAS FRANCISCO JAVIER', 2, 7, 1, 0, 0, 0, 'sucasa', '83858585', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11842483-2', 0, 0, 'VILLALOBOS  MOLINET  MIGUEL ANGEL', 8, 7, 1, 0, 0, 0, 'sucasa', '98448811', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11848159-3', 0, 0, 'RODRIGUEZ BENAVIDES ALBERTO GUSTAVO', 8, 7, 4, 0, 0, 0, 'sucasa', '90781096', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11855635-6', 0, 0, 'ROCCO TAPIA CRISTIAN ORLANDO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11869510-0', 0, 0, 'AGUILAR SALAZAR CESAR ANTONIO', 2, 7, 4, 0, 0, 0, 'sucasa', '995956115', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11879381-1', 0, 0, 'REYES GALDAMES LUIS FELIX', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11880660-3', 0, 0, 'YANQUIS BARRIENTOS MARIA TERESA', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11886442-5', 0, 0, 'URIBE PARRA MARCELO PATRICIO', 8, 7, 1, 0, 0, 0, 'sucasa', '71644233', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11887243-6', 0, 0, 'ACUÑA MOYA MARCELO PAULO', 2, 7, 4, 0, 0, 0, 'sucasa', '99250833', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11887814-0', 0, 0, 'MORENO VARGAS  FREDY MARCELO', 2, 4, 1, 0, 0, 0, 'sucasa', '58954764', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11888221-', 0, 0, 'TORO PACHECO RODRIGO ALEX', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11888375-6', 0, 0, 'GARRIDO ARENAS MARISOL MAGALY', 1, 7, 1, 0, 0, 0, 'sucasa', '996798035', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11888561-9', 0, 0, 'CONCHA AGUILERA MANUEL ALADINO', 2, 2, 1, 0, 0, 0, 'sucasa', '072-2970037', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11888835-9', 0, 0, 'CRUZ QUINTANA LUIS ALBERTO', 1, 7, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11889223-', 0, 0, 'FLORES RAMIREZ MARCO ANTONIO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11889394-8', 0, 0, 'PODESTA DIAZ GUILLERMO FRANCO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11889952-', 0, 0, 'BOZO SILVA MAXIMILIANO', 1, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11890518-0', 0, 0, 'NAVARRO URZUA MAURICIO ALEJANDRO', 8, 3, 2, 0, 0, 0, 'sucasa', '09-7094659', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11891135-', 0, 0, 'ROJAS NUÑEZ NARQUEZ ENRIQUE', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11892417-7', 0, 0, 'SAN MARTIN ROJAS RAFAEL ALFREDO', 8, 10, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11893029-0', 0, 0, 'ALVARADO ORELLANA MARCELO HERNAN', 1, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11893037-1', 0, 0, 'CARRERA MATUS LUIS OSVALDO', 8, 7, 2, 0, 0, 0, 'sucasa', '73673709', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11893507-1', 0, 0, 'ROJAS PEREZ JOSE ABEL', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11893694-9', 0, 0, 'OSSES DIAZ MAURICIO ENRIQUE', 13, 7, 2, 0, 0, 0, 'sucasa', '75341735', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11894037-7', 0, 0, 'MUÑOZ MUÑOZ JOSE HERIBERTO', 16, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11894387-2', 0, 0, 'VALENZUELA MONSALVE MARCELO ANTONIO', 2, 4, 2, 0, 0, 0, 'sucasa', '97356572', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11894542-5', 0, 0, 'DIAZ SILVA JUAN CARLOS', 8, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11894666-9', 0, 0, 'GONZALEZ HERNANDEZ PATRICIO ALEJANDRO', 8, 7, 2, 0, 0, 0, 'sucasa', '79025112', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11894763-0', 0, 0, 'MADARIAGA SAAVEDRA CRISTIAN EDUARDO', 13, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11894816-5', 0, 0, 'TAPIA DOTE CLAUDIO MARCELO', 18, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11912452-2', 0, 0, 'MERCADO RIQUELME JOSE ALFODIN', 2, 2, 1, 0, 0, 0, 'sucasa', '91931629', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11914793-K', 0, 0, 'JUANILLO MORA RIGOBERTO BRAULIO', 25, 7, 1, 0, 0, 0, 'sucasa', '08-9099623', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11918456-8', 0, 0, 'VALDIVIA TRUREO HERNAN', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11940450-9', 0, 0, 'MANQUE AGUILERA IVAN DEL ROSARIO', 8, 2, 1, 0, 0, 0, 'sucasa', '68176884', '0000-00-00', 'ILLAPEL', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11946518-4', 0, 0, 'SALINAS ORELLANA ABEL JESUS', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11949119-3', 0, 0, 'GRANDON VASQUEZ VICTOR JUAN', 2, 7, 1, 0, 0, 0, 'sucasa', '86233406', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11951020-', 0, 0, 'CONTRERAS LIZANA FERNANDA', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11951605-6', 0, 0, 'PEREZ CASTRO DAVID ELIAZAR', 7, 3, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11951977-2', 0, 0, 'MARTINEZ FLORES JUAN PATRICIO', 8, 7, 1, 0, 0, 0, 'sucasa', '90521551', '0000-00-00', 'SANTA CRUZ', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11953964-1', 0, 0, 'NAVARRETE SANDOVAL JUAN PATRICIO', 8, 3, 2, 0, 0, 0, 'sucasa', '08-7581479', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11954058-5', 0, 0, 'SALAZAR SILVA MARCELO ARTURO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11962993-4', 0, 0, 'MONTOYA TORRES ALFREDO RICHARD', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('11971979-8', 0, 0, 'CARREÑO PARRAGUEZ MARCELO IVAN', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11983842-', 0, 0, 'SEPULVEDA FERNANDEZ JOSE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11988615-5', 0, 0, 'MONTERO SEPULVEDA RODRIGO SAMUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'EL BOSQUE', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('11990013-1', 0, 0, 'CARRASCO PEREZ CLAUDIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12010871-9', 0, 0, 'Cuenta Corriente', 8, 8, 7, 0, 0, 12, 'su casa', '', '2017-05-15', 'rancagua', '2017-05-18', 1, '2017-05-16', 0, '', 0, 1),
('12044717-3', 0, 0, 'VARAS PEZOA JUAN CARLOS', 2, 2, 1, 0, 0, 0, 'sucasa', '988488123', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12069098-1', 0, 0, 'GODOY MANNI JUAN ALFREDO', 2, 2, 4, 0, 0, 0, 'sucasa', '61928047', '0000-00-00', 'LA PINTANA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1);
INSERT INTO `ges_trabajadores` (`Rut`, `codigo_ayu`, `codigo_cond`, `Nombre`, `Cargo_id`, `Empresa_id`, `Centro_de_costo_id`, `id_permiso`, `id_grencia`, `id_dpto`, `Direccion`, `Celular`, `Fecha_nac`, `Ciudad`, `Fecha_contrato`, `Tipo_contrato_id`, `Fecha_termino_contrato`, `Sindicato_id`, `N_contacto`, `N_carga`, `Estado`) VALUES
('12073170-K', 0, 0, 'RIVERA ROJAS  LUIS SEBASTIAN', 8, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12083552-', 0, 0, 'CORREA RIOS MARCIAL ANDRES', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12090637-', 0, 0, 'UBEDA CATALAN JULIO HUMBERTO', 3, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12160849-9', 0, 0, 'NIETO LAGOS MIGUEL ANGEL', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12174844-4', 0, 0, 'HERNANDEZ CHAIHUEQUE JUAN CARLOS', 2, 7, 4, 0, 0, 0, 'sucasa', '962680553', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12178918-3', 0, 0, 'OROZCO MORALES PEDRO ADAN', 2, 7, 1, 0, 0, 0, 'sucasa', '62872072', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12179083-1', 0, 0, 'VEGA GAMBOA FRANCISCO WALDINO', 8, 7, 1, 0, 0, 0, 'sucasa', '83516880', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12179779-6', 0, 0, 'GUTIERREZ RIQUELME VICTOR', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12205532-9', 0, 0, 'SOTO TOLEDO LEONEL MARCELO', 2, 7, 1, 0, 0, 0, 'sucasa', '65017022', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12233077-K', 0, 0, 'MORALES VELARDE CRISTIAN MANUEL', 10, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12235336-', 0, 0, 'PEÑA PEÑA RODRIGO SEGUNDO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12236381-3', 0, 0, 'BRITO URRA LUIS MARCELO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12243261-0', 0, 0, 'SANTANA REYES CARLOS ENRIQUE', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LA GRANJA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12253723-4', 0, 0, 'PAVEZ MONSALVE JUAN ENRIQUE', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12253724-2', 0, 0, 'PAVEZ MONSALVE HUGO ALEJANDRO', 8, 7, 4, 0, 0, 0, 'sucasa', '092065088', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12255904-1', 0, 0, 'BASAEZ FLORES IVONNE VERONICA', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12272017-9', 0, 0, 'CARRASCO LOBOS JORGE BAUDILIO', 8, 7, 2, 0, 0, 0, 'sucasa', '66724503', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12272969-9', 0, 0, 'DIAZ SILVA LUIS ALBERTO', 8, 7, 1, 0, 0, 0, 'sucasa', '92408494', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12275275-5', 0, 0, 'VELOZO CAVIERES FIDEL EDILIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12275954-7', 0, 0, 'CASTRO RIFO LEONARDO DANILO', 2, 7, 4, 0, 0, 0, 'sucasa', '64217181', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12277395-7', 0, 0, 'SESENQUE ARAYA ESTEBAN ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '52306648', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12280816-5', 0, 0, 'ROLDAN CONTRERAS FERNANDO SEBASTIAN', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PEÑAFLOR', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12287477-k', 0, 0, 'VERGARA SEPULVEDA JORGE ENRIQUE', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12287488-5', 0, 0, 'ALAMOS ZAPATA JORGE CARLOS', 2, 7, 4, 0, 0, 0, 'sucasa', '965790269', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12290316-8', 0, 0, 'MARCHANT DIAZ WILSON ALBINO', 2, 3, 2, 0, 0, 0, 'sucasa', '09-7685056', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12290860-', 0, 0, 'GUERRERO CARRILLO LUIS', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12291168-3', 0, 0, 'PINO BUSTAMANTE RODOLFO ALFREDO', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12291265-', 0, 0, 'SALINAS SOTO OSCAR RUBEN', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12291987-0', 0, 0, 'AVILA PALMA LUIS ALBERTO', 2, 2, 1, 0, 0, 0, 'sucasa', '949542104', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12292196-4', 0, 0, 'VILOS PORRAS ANTONIO AURELIO', 19, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12292257-k', 0, 0, 'PEREZ MUÑOZ CARLOS MANUEL', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12292310-', 0, 0, 'MEDINA PEREZ MIGUEL ANDRES', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12292453-', 0, 0, 'PIZARRO CORREA JOEL SANDRO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12293441-1', 0, 0, 'ARANGUIZ GONZALEZ MARCON ANTONIO', 2, 2, 1, 0, 0, 0, 'sucasa', '2251261', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12293476-4', 0, 0, 'MUÑOZ SOLIS SAUL AROON', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12295470-6', 0, 0, 'MONSALVE BRIONES JOSE LUIS', 8, 7, 2, 0, 0, 0, 'sucasa', '96734254', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12295492-7', 0, 0, 'VERGARA GARCIA JORGE MARCELO', 8, 7, 2, 0, 0, 0, 'sucasa', '079572095', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12295533-', 0, 0, 'RIQUELME MICHEA LUIS OSVALDO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12296012-9', 0, 0, 'CASTRO UGARTE MAURICIO IVAN', 8, 2, 2, 0, 0, 0, 'sucasa', '71263750', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12296935-5', 0, 0, 'SALAZAR MOYA VICTOR EDUARDO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12297208-9', 0, 0, 'GRANDY SUMONTE CARLOS MARCELO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12297341-7', 0, 0, 'RAMIREZ ESPINOZA MARIO PATRICIO', 8, 7, 2, 0, 0, 0, 'sucasa', '50989667', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12297543-6', 0, 0, 'TORRES SANCHEZ JUAN PEDRO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12297801-K', 0, 0, 'ARAVENA ABACA PATRICIO SANDRO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12298216-', 0, 0, 'CARRERA ASTUDILLO JAIME ANDRES', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12313103-7', 0, 0, 'MARCHANT RUBILAR ANGELLO HECTOR', 2, 7, 4, 0, 0, 0, 'sucasa', '988796013', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12330228-1', 0, 0, 'CHAMORRO LEPE MARIO ALONSO', 2, 7, 4, 0, 0, 0, 'sucasa', '96127379', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12351087-9', 0, 0, 'ASPE MONSALVE JOSÉ HERNAN', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12359219-0', 0, 0, 'ALLEN BERRIOS EDUARDO', 2, 4, 2, 0, 0, 0, 'sucasa', '975622394', '0000-00-00', 'SAN JAVIER', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12365707-1', 0, 0, 'IBARRA CASTRO ALEX ROGOBERTO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12374202-8', 0, 0, 'MARTIN JORQUERA ANGEL PATRICIO', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12374982-0', 0, 0, 'ESPINOZA TORRES PEDRO JUAN', 8, 7, 1, 0, 0, 0, 'sucasa', '65501351', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12398732-2', 0, 0, 'NUÑEZ CASTILLO JORGE ALEX', 2, 2, 4, 0, 0, 0, 'sucasa', '63322075', '0000-00-00', 'ILLAPEL', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12406564-K', 0, 0, 'HERNANDEZ CHIHUAIHUEN IVAN GERVASIO', 2, 7, 1, 0, 0, 0, 'sucasa', '85908937', '0000-00-00', 'TINTIRIRICA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12411452-7', 0, 0, 'JEREZ SILVA CRISTIAN ISRAEL', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12411950-2', 0, 0, 'FRIAS VALDOVINOS RAUL ANTONIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12413213-4', 0, 0, 'ARENAS MONTECINOS RAUL ANTONIO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12416433-8', 0, 0, 'LOIZA SEGURA RAFAEL AGUSTIN', 2, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12416729-9', 0, 0, 'DONOSO ROJAS VICTOR ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12417907-6', 0, 0, 'CONTRERAS MUÑOZ JULIO SEGUNDO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12418097-', 0, 0, 'ORELLANA SEPULVEDA PABLO ENRIQUE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12461117-2', 0, 0, 'GUAJARDO QUINTANILLA MARCO ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RECOLETA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12465185-9', 0, 0, 'DURAN MACIAS SERGIO ENRIQUE', 1, 7, 1, 0, 0, 0, 'sucasa', '92869017', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12477698-8', 0, 0, 'CARVAJAL PARRA CRISTIAN ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '980868995', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12488748-', 0, 0, 'CHIAPPA ALIAGA ADRIAN ENRIQUE', 7, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12498419-K', 0, 0, 'AGUILERA MATURANA CESAR AUGUSTO', 8, 7, 1, 0, 0, 0, 'sucasa', '08-4721367', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12508266-1', 0, 0, 'VELOSO DUQUE LEOPOLDO AUGUSTO', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12513079-8', 0, 0, 'TAPIA MONJE ANGELO ENRIQUE', 8, 7, 1, 0, 0, 0, 'sucasa', '95601640', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12514677-5', 0, 0, 'SANCHEZ FIGUEROA JUAN CARLOS', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12514763-1', 0, 0, 'CACERES ACEVEDO JOSE ALEJANDRO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12515065-9', 0, 0, 'CANALES ARENAS LUIS MANUEL', 8, 3, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12515626-', 0, 0, 'BRIONES SALAS MAURICIO ES', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12515669-K', 0, 0, 'GONZALEZ RUBIO CLAUDIA MARLETTE', 1, 7, 1, 0, 0, 0, 'sucasa', '98428519', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12516176-', 0, 0, 'CACERES CORTES JORGE ANTONIO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12516182-0', 0, 0, 'GUERRERO CARRILLO JACINTO ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12516207-K', 0, 0, 'BUSTAMANTE LEIVA NOE FERNANDO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12516917-', 0, 0, 'ALIAGA TORRES ENRIQUE ROBINSON', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12517363-2', 0, 0, 'PINTO ESTRADA JOSE ERASMO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12518248-', 0, 0, 'RODRIGUEZ GONZALEZ BERNARDO', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12519340-', 0, 0, 'ROJAS AMARO CESAR JULIO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12520197-0', 0, 0, 'DIAZ ORTIZ LEANDRO', 8, 7, 3, 0, 0, 0, 'sucasa', '96552736', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12520320-5', 0, 0, 'GONZALEZ MORALES FRANCISCO JAVIER', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12521100-3', 0, 0, 'ALARCON ROJAS CLAUDIO IVAN', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12521138-', 0, 0, 'ALISTE LAGOS JOSE LUIS', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12522504-7', 0, 0, 'LOPEZ ECHEVERRIA  RAFAEL ADAN', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12522914-K', 0, 0, 'OLIVARES VALENZUELA LUIS PATRICIO', 2, 4, 2, 0, 0, 0, 'sucasa', '976066002', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12542794-', 0, 0, 'VALENZUELA MENDOZA SERGIO', 2, 3, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12548270-', 0, 0, 'CID NORAMBUENA ALEJANDRO SAMUEL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12557510-2', 0, 0, 'VALLEJOS CASTRO RENE JORGE', 2, 7, 1, 0, 0, 0, 'sucasa', '54223155', '0000-00-00', 'SAN RAMON', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12587471-1', 0, 0, 'GONZALEZ RIOS JESUS SEGUNDO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12587882-2', 0, 0, 'RODRIGUEZ  ARAYA  MARCELO ALEJANDRO', 8, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12587888-1', 0, 0, 'FARIAS GAETE RIGOBERTO', 8, 2, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12588355-9', 0, 0, 'NUÑEZ SOTO ALVARO PATRICIO', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12588478-4', 0, 0, 'SANCHEZ BRIONES JAIME', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12589535-2', 0, 0, 'AVENDAÑO BOBADILLA PABLO', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12589941-2', 0, 0, 'LOPEZ RODRIGUEZ LUIS RENATO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12589943-', 0, 0, 'AVENDAÑO VALENZUELA ', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12590406-8', 0, 0, 'LASTRA ENCINA HECTOR', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12590408-', 0, 0, 'PALMA RAMIREZ ENRIQUE ALEJANDRO', 2, 7, 2, 0, 0, 0, 'sucasa', '966640844', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12594193-1', 0, 0, 'CATALAN CATALAN CLAUDIO ISAIAS', 2, 2, 4, 0, 0, 0, 'sucasa', '987500773', '0000-00-00', 'PEÑALOLEN', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12597865-7', 0, 0, 'BAEZ TAPIA CRISTIAN', 2, 2, 1, 0, 0, 0, 'sucasa', '078961180', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12597972-6', 0, 0, 'MANZANO RODRIGUEZ LUIS MANUEL', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12598116-k', 0, 0, 'RIVERA OLIVARES CLAUDIO HUMBERTO', 2, 7, 1, 0, 0, 0, 'sucasa', '089571204', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12598166-6', 0, 0, 'OLIVARES RIVERA CLAUDIO HUMBERTO', 2, 2, 1, 0, 0, 0, 'sucasa', '089571204', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12598244-1', 0, 0, 'NUÑEZ GUERRA HECTOR PATRICIO', 2, 2, 1, 0, 0, 0, 'sucasa', '84589390', '0000-00-00', 'ILLAPEL', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12598374-K', 0, 0, 'VEGA GONZALEZ LUIS ROBERTO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12605169-7', 0, 0, 'HERNANDEZ PALOMINOS RODRIGO', 1, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12605796-', 0, 0, 'YEVENES REBOLLEDO NELSON', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12606089-', 0, 0, 'HEVIA SAAVEDRA JUAN CARLOS', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12609777-8', 0, 0, 'MOLINA MIRANDA MAURICIO ANDRES', 8, 7, 2, 0, 0, 0, 'sucasa', '051894399', '0000-00-00', 'LINARES', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12640703-3', 0, 0, 'VEGA RIOS JAIME ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12663175-8', 0, 0, 'VALENZUELA AVILA JOSE MANUEL', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12664529-5', 0, 0, 'FUENTES RAMIREZ OSCAR HUMBERTO', 8, 7, 4, 0, 0, 0, 'sucasa', '985715792', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12671432-', 0, 0, 'SEPULVEDA URIBE JORGE ALBERTO', 8, 4, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12672237-0', 0, 0, 'GONZALEZ MONTECINOS MARCO ANTONIO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUDAHUEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12685627-', 0, 0, 'URBINA ALVEAR OSCAR ANTONIO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12687865-6', 0, 0, 'CALDERON LLANQUILAO SANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGOQ', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12687938-5', 0, 0, 'SAN MARTIN CAÑAS CRISTIAN', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12689965-3', 0, 0, 'SAEZ GONZALEZ CRISTIAN IVAN', 2, 2, 4, 0, 0, 0, 'sucasa', '5521881', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12690320-', 0, 0, 'ESPINOZA DURAN ALVARO PAT', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12690888-1', 0, 0, 'MENESES GALLEGOS EDUARDO ROBERTO', 2, 7, 1, 0, 0, 0, 'sucasa', '61988623', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12690975-6', 0, 0, 'GARCIA REYES ARCADIO CRISTIAN', 7, 3, 2, 0, 0, 0, 'sucasa', '08-8563060', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12691117-3', 0, 0, 'ARANGUIZ FERNANDEZ JOSE DAVID', 2, 2, 1, 0, 0, 0, 'sucasa', '974270300', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12691153-', 0, 0, 'MIRANDA URBINA MANUEL JESUS', 2, 2, 1, 0, 0, 0, 'sucasa', '09-5942981', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12691330-3', 0, 0, 'CAMPOS AVILA SAMUEL HUMBERTO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12691489-K', 0, 0, 'ARAVENA SANTANDER JORGE EDUARDO', 7, 7, 1, 0, 0, 0, 'sucasa', '63055649', '0000-00-00', 'CODEGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12691500-', 0, 0, 'VILLA MUÑOZ JOSE CLEMENTE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12691803-8', 0, 0, 'ARREDONDO GONZALEZ CRISTIAN ALEJANDRO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12692078-', 0, 0, 'CABEZAS BAHAMONDES FRANCISCO ERNESTO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12692153-5', 0, 0, 'ARCE PINCHEIRA MANUEL ANTONIO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12692766-5', 0, 0, 'FLORES REYES CRISTIAN RODRIGO', 2, 4, 1, 0, 0, 0, 'sucasa', '09-3401085', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12692938-2', 0, 0, 'PADILLA MEJIAS PABLO ANDRES', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12694065-3', 0, 0, 'MORENO TORRES LUIS NELSON', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12694163-3', 0, 0, 'VALLE GUAJARDO CESAR ENRIQUE', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12694732-1', 0, 0, 'VARAS LEYTON RODRIGO ANTONIO', 1, 7, 1, 0, 0, 0, 'sucasa', '54119699', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12695616-9', 0, 0, 'HERNANDEZ ZUÑIGA VICTOR MANUEL', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12707986-2', 0, 0, 'BARRA ALARCON DAVID SALVADOR', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12710110-8', 0, 0, 'MUÑOZ MALDONADO NINO JACOB', 2, 7, 2, 0, 0, 0, 'sucasa', '89169011', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12712801-4', 0, 0, 'JELDRES SALINAS GARY ALBERTO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12718439-9', 0, 0, 'CEPEDA ESPINOZA LUIS RAFAEL', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12726086-9', 0, 0, 'LIZANA CORNEJO PEDRO GABRIEL', 8, 2, 4, 0, 0, 0, 'sucasa', '76454285', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12726603-', 0, 0, 'CARRIZO ORDENES PEDRO ROZAMEL', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12726643-3', 0, 0, 'ORELLANA RUZ  JUAN FERNANDO', 7, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'NANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12728578-0', 0, 0, 'FUENTES TRONCOSO JUAN MIG', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN JAVIER', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12735535-5', 0, 0, 'VARELA CASTILLO JOSE MIGUEL', 7, 7, 1, 0, 0, 0, 'sucasa', '41444675', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12738482-7', 0, 0, 'DIAZ LEPIN SEGUNDO MARIO', 2, 7, 1, 0, 0, 0, 'sucasa', '954880263', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12740693-', 0, 0, 'ALARCON SEPULVEDA JUAN NO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12743147-7', 0, 0, 'RIFFO TORRES EDUARDO ANDRES', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12753784-4', 0, 0, 'FLORES MOYANO MARCO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12773082-2', 0, 0, 'NAVARRETE QUINTEROS FIDEL', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12779689-0', 0, 0, 'JIMENEZ ORTIZ CRISTIAN ENRIQUE', 14, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12779880-K', 0, 0, 'CARIZ DUARTE JOHNNY CHRISTIAN', 2, 7, 1, 0, 0, 0, 'sucasa', '08-6098604', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12779949-0', 0, 0, 'PARGA CACERES RODRIGO FRANCISCO', 12, 7, 1, 0, 0, 0, 'sucasa', '61276804', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12780036-7', 0, 0, 'CARREÑO MORENO ROBERTO ANDRES', 2, 7, 1, 0, 0, 0, 'sucasa', '77273816', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12780230-', 0, 0, 'MARIN SALAS CHRISTIAN ANTONIO', 2, 3, 2, 0, 0, 0, 'sucasa', '08-477286', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12780418-4', 0, 0, 'VIDAL RIVEROS JUAN CARLOS', 2, 7, 1, 0, 0, 0, 'sucasa', '68643102', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12780629-2', 0, 0, 'JORQUERA NUÑEZ INGRID DEL PILAR', 6, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12781009-5', 0, 0, 'BRAVO PIZARRO NELSON HERNAN', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12784836-K', 0, 0, 'LOPEZ LAGOS MARCO ESTEBAN', 2, 3, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12785069-0', 0, 0, 'GARAY DIAZ MAURICIO', 8, 2, 2, 0, 0, 0, 'sucasa', '965201475', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12787280-5', 0, 0, 'MANUEL JESUS MACHUCA FUENTES', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12787529-4', 0, 0, 'LEON LARA RICARDO ANTONIO', 6, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12787669-k', 0, 0, 'VERGARA GARRIDO JOSE', 8, 2, 2, 0, 0, 0, 'sucasa', '955929343', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12790461-8', 0, 0, 'ZENTENO GAJARDO CRISTIAN EUSEBIO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LINARES', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12790469-3', 0, 0, 'ESPINOZA PARADA JUAN MANUEL', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12790757-', 0, 0, 'CABELLO GUERRERO ROBERTO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12791001-4', 0, 0, 'VILLAR GANGA RENE ALEJANDRO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12791283-', 0, 0, 'BARRA LAGOS VICTOR', 2, 8, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12799706-3', 0, 0, 'MONTENEGRO ACOSTA DELFIN SEGUNDO', 2, 7, 1, 0, 0, 0, 'sucasa', '74210329', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12800158-1', 0, 0, 'OSORIO CAÑAS PAOLA ALEJANDRA', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12800299-5', 0, 0, 'MALVERDE SALVO JAIME DOMINGO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12810481-k', 0, 0, 'CID MUÑOZ VICTOR LEONARDO', 2, 2, 1, 0, 0, 0, 'sucasa', '946901229', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12810552-2', 0, 0, 'DIAZ LARA OSCAR', 8, 7, 2, 0, 0, 0, 'sucasa', '68971120', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12811516-1', 0, 0, 'BAEZA DIAZ WILSON JOHN', 8, 1, 4, 0, 0, 0, 'sucasa', '76825283', '0000-00-00', 'PEÑALOLEN', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12812308-3', 0, 0, 'DONOSO ESCOBAR CRISTIAN MANUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CARTAGENA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12812788-7', 0, 0, 'BARAHONA PIZARRO HECTOR EDUARDO', 2, 7, 4, 0, 0, 0, 'sucasa', '962338090', '0000-00-00', 'PUDAHUEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12819462-2', 0, 0, 'CARRASCO PEREZ ALEJANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12880928-7', 0, 0, 'VICENCIO MIRANDA ALEJANDRO HERNAN', 8, 7, 1, 0, 0, 0, 'sucasa', '86135716', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12885350-2', 0, 0, 'REYES SILVA JUAN CARLOS', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12901837-2', 0, 0, 'GARRIDO  HUENCHUÑIR JUAN PABLO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12902771-1', 0, 0, 'AHUMADA CAMPOS ANIBAL OSVALDO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12902965-K', 0, 0, 'CERDA GONZALEZ ALBERTO ANTONIO', 2, 2, 4, 0, 0, 0, 'sucasa', '979235343', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12903149-2', 0, 0, 'MADRID BELLO MIGUEL  ANTONIO', 8, 2, 1, 0, 0, 0, 'sucasa', '77011250', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12906100-6', 0, 0, 'ALVAREZ MUÑOZ PATRICIO ALEJANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12909526-1', 0, 0, 'JIMENEZ DUARTE HUGO EUGENIO', 8, 2, 4, 0, 0, 0, 'sucasa', '56153421', '0000-00-00', 'MAIPU', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12911436-3', 0, 0, 'LANDAETA GOMEZ JOSE ANTONIO', 2, 3, 2, 0, 0, 0, 'sucasa', '09-5974870', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12913163-', 0, 0, 'ARREDONDO GONZALEZ RICARDO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12913255-', 0, 0, 'LEIVA BECERRA JAVIER ANTONIO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12913767-', 0, 0, 'AGUIRRE SOLAR IVAN DARIO', 2, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12913784-3', 0, 0, 'SANCHEZ NOVOA CRISTIAN MARCELO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12914078-K', 0, 0, 'RIQUIEROS LORCA FRANCISCO JAVIER', 2, 7, 1, 0, 0, 0, 'sucasa', '93592239', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12914182-4', 0, 0, 'VERGARA ESPINOZA RAUL BENJAMIN', 2, 7, 1, 0, 0, 0, 'sucasa', '94665297', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12916046-', 0, 0, 'FERNANDEZ DROGUETT JAIME', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12916153-1', 0, 0, 'CARO CESPEDES  SANDRO RAFAEL', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12916450-6', 0, 0, 'OSSES VALDES JOSE EUGENIO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12916603-7', 0, 0, 'SOTO CARRASCO OSCAR MAURICIO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12944403-7', 0, 0, 'ALFARO ARAYA LEONARDO DANIEL', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12955413-4', 0, 0, 'ARANDA MOLINA JORGE ISMAEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12959624-4', 0, 0, 'ROJAS JORQUERA MANUEL MAURICIO', 2, 7, 1, 0, 0, 0, 'sucasa', '93473362', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12961604-0', 0, 0, 'LEIVA BECERRA PEDRO ESTEBAN', 16, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12961780-', 0, 0, 'VERGARA QUINTANILLA JOSE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('12963403-0', 0, 0, 'NAVARRETE FUENZALIDA ANTONIO GUILLERMO', 2, 7, 1, 0, 0, 0, 'sucasa', '87036454', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12964204-1', 0, 0, 'VILLARROEL HERMOCILLA JULIO ALEJANDRO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LINARES', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12964482-6', 0, 0, 'REYES CASTILLO GABRIEL REIMUNDO', 2, 7, 4, 0, 0, 0, 'sucasa', '966831140', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('12991385-1', 0, 0, 'CARIQUEO VERGARA MARIO CESAR', 1, 7, 1, 0, 0, 0, 'sucasa', '83942728', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13003281-', 0, 0, 'MOSCOSO CERDA JUAN ANTONIO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13003368-7', 0, 0, 'HIDALGO VALENZUELA ARIEL RUPERTO', 7, 7, 1, 0, 0, 0, 'sucasa', '78920774', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13003672-4', 0, 0, 'ARENAS LOPEZ ELIUD MANUEL', 2, 2, 1, 0, 0, 0, 'sucasa', '981548208', '0000-00-00', 'SAN FERNADNO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13003766-6', 0, 0, 'CARREÑO FLORES VICTOR ANTONIO', 7, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13004310-0', 0, 0, 'ACEVEDO  CABEZAS  MANUEL PEDRO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13018524-', 0, 0, 'ALVAREZ GALVEZ MAURICIO A', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13031734-0', 0, 0, 'LOBOS PEREZ BRAULIO CLAUDIO', 8, 1, 4, 0, 0, 0, 'sucasa', '82038985', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13032881-4', 0, 0, 'RUIZ BOLIVAR JUAN CARLOS', 8, 7, 4, 0, 0, 0, 'sucasa', '085342629', '0000-00-00', 'PUDAHUEL', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13041952-6', 0, 0, 'LOPEZ ORTIZ CLAUDIO MARCELO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13044006-1', 0, 0, 'CACERES ASCUETO RAUL ERNESTO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13045018-0', 0, 0, 'ABARCA ROJAS CRISTIAN ALEJANDRO', 8, 7, 4, 0, 0, 13, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13046028-3', 0, 0, 'BUSTAMANTE SUARES JAIME', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13049276-2', 0, 0, 'VALDEZ MENDEZ JOSE PATRICIO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13054446-0', 0, 0, 'TRONCOSO CORTES ROLANDO ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13054832-6', 0, 0, 'ZAVALA VILLABLANCA JUAN CARLOS', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RENCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13065111-9', 0, 0, 'VALENCIA HERNANDEZ CLAUDIO DAVID', 8, 7, 4, 0, 0, 0, 'sucasa', '73938076', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13071666-', 0, 0, 'CONEJEROS JABRE VICTOR MA', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13073236-4', 0, 0, 'GONZALEZ YAÑEZ FRANCISCO ENRIQUE', 8, 2, 1, 0, 0, 0, 'sucasa', '62882320', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13085793-0', 0, 0, 'MAULEN SANTOS LUIS ANTONIO', 8, 7, 1, 0, 0, 0, 'sucasa', '79198579', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13086829-0', 0, 0, 'MOYANO FLORES JUAN CARLOS', 2, 7, 1, 0, 0, 0, 'sucasa', '84830981', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13089194-2', 0, 0, 'COFRE COFRE ANIBAL ALEXIS', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13092912-5', 0, 0, 'TOLEDO MUÑOZ RICARDO MAURICIO', 2, 7, 1, 0, 0, 0, 'sucasa', '72637376', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13095602-5', 0, 0, 'VEAS NORAMBUENA RAUL ARIEL', 8, 7, 1, 0, 0, 0, 'sucasa', '90829173', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13095738-2', 0, 0, 'HERNANDEZ ORTEGA HERIBERTO BELARMINO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13095979-', 0, 0, 'LIZANA SOTO NICOLAS ANDRES', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13096006-5', 0, 0, 'VALLE GAJARDO CRISTIAN ALFREDO', 2, 2, 1, 0, 0, 0, 'sucasa', '92374166', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13096109-6', 0, 0, 'ALLENDE GARCIA FERNANDO M', 8, 3, 2, 0, 0, 0, 'sucasa', '08-7377928', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13096279-3', 0, 0, 'MUÑOZ SOLIS PEDRO ELIAS', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13096472-', 0, 0, 'SOTO CUADRA CESAR FERNANDO', 1, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13097063-K', 0, 0, 'HERNANDEZ ORTEGA RENE ENRIQUE', 2, 2, 1, 0, 0, 0, 'sucasa', '92523881', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13097098-', 0, 0, 'DIAZ GALLEGUILLOS MANUEL', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13097959-9', 0, 0, 'TORRES CABRE PABLO ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '62900572', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13097966-1', 0, 0, 'PEREZ SEPULVEDA  MARIA ALEJANDRA', 1, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13098134-', 0, 0, 'REVECO REVECO RODRIGO SEB', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13098635-8', 0, 0, 'MORALES SILVA  MANUEL ENRIQUE', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13098964-0', 0, 0, 'MARIN MORALES MAURICIO EDUARDO', 2, 7, 1, 0, 0, 0, 'sucasa', '91992057', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13100940-2', 0, 0, 'VELIZ HERNANDEZ ROSENDO ANTONIO', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13100949-6', 0, 0, 'ORLANDO HERIBERTO BRIONES VASQUEZ', 8, 7, 2, 0, 0, 0, 'sucasa', '78180890', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13101584-4', 0, 0, 'SANCHEZ MEDINA ALEX MAURICIO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13122297-1', 0, 0, 'COVARRUBIAS MALDONADO GABRIEL', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13125838-', 0, 0, 'PEREZ MOLINA MANUEL JESUS', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13137963-3', 0, 0, 'RIVAS ARRIAGADA RENATO PABEL', 2, 7, 1, 0, 0, 0, 'sucasa', '09-2477522', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13140212-', 0, 0, 'BECERRA AEDO CLAUDIO ANDRES', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13141824-8', 0, 0, 'CASTILLO CONTRERAS JERSON ARIEL', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13142571-6', 0, 0, 'CORNES NAVARRETE SANDRO MOISES', 2, 7, 4, 0, 0, 0, 'sucasa', '2232180607', '0000-00-00', 'MAIPU', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13147209-9', 0, 0, 'CASTRO ORTIZ MIGUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13149578-1', 0, 0, 'FELUI ARAYA JOSE MANUEL', 8, 7, 1, 0, 0, 0, 'sucasa', '62875115', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13164314-4', 0, 0, 'COTAL COTAL JUAN CARLOS', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13181095-4', 0, 0, 'VEGA MARTINEZ WILLIAMS DAVIS', 8, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13183196-K', 0, 0, 'MANCILLA LAZCANO JUAN CARLOS', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13197405-', 0, 0, 'GODOY NUÑEZ DAVID JOEL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13199983-6', 0, 0, 'JARA TORRES CRISTIAN PATRICK', 2, 7, 1, 0, 0, 0, 'sucasa', '88204407', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13200685-7', 0, 0, 'MARTINEZ GALLARDO DANILO ALVARO', 7, 7, 1, 0, 0, 0, 'sucasa', '95432891', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13200829-9', 0, 0, 'ALBORNOZ RODRIGUEZ SANDRO ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13200864-7', 0, 0, 'RIQUELME CASTRO PEDRO ANTONIO', 8, 7, 1, 0, 0, 0, 'sucasa', '62804398', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13201066-', 0, 0, 'LABBE VASQUEZ MARCO ALEJANDRO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13201518-k', 0, 0, 'CONTRERAS BUSTAMENTE CESAR ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13201605-4', 0, 0, 'CONSTANT JAQUE GILBERTO RAMON', 2, 7, 1, 0, 0, 0, 'sucasa', '76353324', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13201700-K', 0, 0, 'MARTINEZ RAMIREZ FERNANDO AMADOR', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13202180-5', 0, 0, 'CALQUIN FERNANDEZ FERNANDO DEL CARMEN', 2, 7, 1, 0, 0, 0, 'sucasa', '58972011', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13205291-3', 0, 0, 'ABARZA FARIAS DIONISIO EUGENIO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13205292-', 0, 0, 'ABARZA FARIAS LUIS ANTONIO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13231258-3', 0, 0, 'ACEVEDO URRIOLA LUIS ALBERTO', 13, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MACHALI', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13236467-2', 0, 0, 'BAEZA DIAZ MARIO GUILLERMO', 8, 7, 1, 0, 0, 0, 'sucasa', '73049563', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13237725-1', 0, 0, 'ASCENCIO HERNANDEZ CRISTIAN', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13244904-K', 0, 0, 'SAN MARTIN MORALES DAVID MAURICIO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13255119-7', 0, 0, 'GARCIA ROMO PABLO ALEJANDRO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13260823-', 0, 0, 'NOVAL PINO PATRICIO GILBE', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13263333-9', 0, 0, 'ALVAREZ MACIAS CARLOS ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '65807942', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13275445-4', 0, 0, 'ACUÑA MOYA DAVID HERNAN', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13281623-9', 0, 0, 'SAN MARTIN OLIVARES ENRIQUE ANTONIO', 8, 1, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13281893-2', 0, 0, 'GONZALEZ ARIAS JOSE LEONARDO', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13282054-6', 0, 0, 'AGUILAR CARRASCO CRISTIAN ALBERTO', 8, 1, 4, 0, 0, 0, 'sucasa', '079320213', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13291687-k', 0, 0, 'BUENO MUÑOZ ALEX ULISES', 2, 2, 4, 0, 0, 0, 'sucasa', '950233467', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13294218-8', 0, 0, 'FLORES JIMENEZ JAIME GABRIEL', 8, 7, 1, 0, 0, 0, 'sucasa', '90693698', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13294796-1', 0, 0, 'FERNANDEZ ARANGUIZ GUILLERMO ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13296187-5', 0, 0, 'HERNANDEZ SOTO MANUEL MARCELO', 8, 7, 1, 0, 0, 0, 'sucasa', '91720214', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13296392-4', 0, 0, 'SEPULVEDA BUSTOS CARLOS HERNAN', 8, 2, 1, 0, 0, 0, 'sucasa', '66852112', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13299790-K', 0, 0, 'MARTINEZ PEÑA MARIA VERONICA', 1, 7, 0, 0, 0, 0, 'sucasa', '90749027', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13299877-9', 0, 0, 'MEDINA ORTIZ RENE ALBERTO', 8, 7, 1, 0, 0, 0, 'sucasa', '89878117', '0000-00-00', 'GRANEROS', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13300164-6', 0, 0, 'ALVARADO RAMIREZ JUAN LUIS', 8, 7, 1, 0, 0, 0, 'sucasa', '69042429', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13300565-K', 0, 0, 'FERNANDEZ  BARRA PATRICIO ANDRES', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13300737-7', 0, 0, 'FUENTES SALAZAR JULIO ALEJANDRO', 2, 2, 1, 0, 0, 0, 'sucasa', '85763695', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13300883-7', 0, 0, 'TELLO DELGADO RODOLFO ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '71202409', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13300887-7', 0, 0, 'TELLO DELGADO RODOLFO', 2, 2, 1, 0, 0, 0, 'sucasa', '83876312', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13301216-8', 0, 0, 'MENDEZ SANTANDER ROBERTO ARMANDO', 2, 7, 1, 0, 0, 0, 'sucasa', '08-3737455', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13301388-1', 0, 0, 'MORENO AGUIRRE JUAN EDUARDO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13301579-', 0, 0, 'LAGOS DIAZ JUAN FRANCISCO', 15, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13301653-8', 0, 0, 'ABALLAY GONZALEZ OSCAR GENARO', 8, 7, 1, 0, 0, 0, 'sucasa', '81470312', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13302347-K', 0, 0, 'BECERRA SALAZAR JUAN MANUEL', 2, 7, 1, 0, 0, 0, 'sucasa', '78273189', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13303130-5', 0, 0, 'CID FRIZ VICTOR MANUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13303342-4', 0, 0, 'FLORES ARRIAZA  LUIS HERNAN', 7, 7, 1, 0, 0, 0, 'sucasa', '97599345', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13304565-1', 0, 0, 'VELIZ VRSALOVIC JOSE WILIBALDO', 2, 7, 2, 0, 0, 0, 'sucasa', '57165193', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13304947-9', 0, 0, 'MORAGA GONZALEZ ELIAS EDUARDO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13319407-K', 0, 0, 'RODRIGUEZ MONTECINOS DERING ALBERTO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13331080-0', 0, 0, 'SANCHEZ MUÑOZ ALEX MAURICIO', 8, 7, 4, 0, 0, 0, 'sucasa', '968532861', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13336029-8', 0, 0, 'DIAZ VALDES MANUEL EDUARDO', 2, 7, 1, 0, 0, 0, 'sucasa', '08-3955727', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13337166-4', 0, 0, 'ORTIZ CASTILLO ERIC LUIS', 8, 7, 4, 0, 0, 0, 'sucasa', '62785731', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13337276-8', 0, 0, 'CORREA CONTRERAS MANUEL ANTONIO', 1, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13340045-1', 0, 0, 'TORO ZUÑIGA ALBERTO JESUS', 2, 7, 4, 0, 0, 0, 'sucasa', '058420036', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13340894-0', 0, 0, 'ROJAS VERA JOSE LUIS', 2, 7, 1, 0, 0, 0, 'sucasa', '982106399', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13340987-4', 0, 0, 'PEREZ VARGAS MOISES FRANCISCO', 8, 7, 4, 0, 0, 0, 'sucasa', '76467770', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13340988-2', 0, 0, 'PEREZ VARGAS JOSE ALBERTO', 2, 7, 4, 0, 0, 0, 'sucasa', '89436524', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13341057-0', 0, 0, 'GONZALEZ ZUÑIGA MIGUEL ANGEL', 2, 2, 4, 0, 0, 0, 'sucasa', '8314762', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13342939-', 0, 0, 'SOBARZO HERNANDEZ MARCELO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13343263-9', 0, 0, 'FUENTES GAETE ALFREDO MAXIMILIANO', 1, 7, 1, 0, 0, 0, 'sucasa', '89035413', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13344441-6', 0, 0, 'DAZA OSORIO PABLO CESAR', 8, 4, 1, 0, 0, 0, 'sucasa', '08-5826166', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13344608-7', 0, 0, 'SOTO FUENTES VICTOR DEL CARMEN', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'REQUINOA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13345644-', 0, 0, 'MOYA CASTRO MARCELO ANDRES', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13345714-3', 0, 0, 'PAREDES CARREÑO RAMIRO ALFONSO', 2, 7, 1, 0, 0, 0, 'sucasa', '50330076', '0000-00-00', 'QUINTA DE TILCOCO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13346410-', 0, 0, 'JIMENEZ VARGAS ALONSO SAL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13346669-K', 0, 0, 'ACEVEDO VIVANCO OSCAR ANTONIO', 8, 4, 1, 0, 0, 0, 'sucasa', '08-8482274', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13346959-1', 0, 0, 'DONOSO SEGUEL RAMON ULISES', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13347284-3', 0, 0, 'ALBORNOZ RODRIGUEZ ESTEBAN OSVALDO', 2, 4, 2, 0, 0, 0, 'sucasa', '09-4619039', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13347505-', 0, 0, 'SALAZAR CORNEJO GABRIEL A', 7, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'NANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1);
INSERT INTO `ges_trabajadores` (`Rut`, `codigo_ayu`, `codigo_cond`, `Nombre`, `Cargo_id`, `Empresa_id`, `Centro_de_costo_id`, `id_permiso`, `id_grencia`, `id_dpto`, `Direccion`, `Celular`, `Fecha_nac`, `Ciudad`, `Fecha_contrato`, `Tipo_contrato_id`, `Fecha_termino_contrato`, `Sindicato_id`, `N_contacto`, `N_carga`, `Estado`) VALUES
('13347617-2', 0, 0, 'URZUA GONZALEZ HECTOR ENRIQUE', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13347684-9', 0, 0, 'SILVA OLIVOS HERNAN OSVALDO', 7, 3, 2, 0, 0, 0, 'sucasa', '09-7639972', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13347792-6', 0, 0, 'GONZALEZ HERNANDEZ HORACIO DEL CARMEN', 12, 7, 1, 0, 0, 0, 'sucasa', '90249006', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13347845-0', 0, 0, 'GONZALEZ MEZA RODRIGO EUGENIO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13347857-4', 0, 0, 'MUÑOZ SOTELO CRISTIAN ESTEBAN', 2, 7, 1, 0, 0, 0, 'sucasa', '76282191', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13347881-7', 0, 0, 'MONTECINOS VEAS PABLO ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '62875115', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13348152-4', 0, 0, 'ITURRA CRUZ MARCELO GUSTAVO', 6, 7, 1, 0, 0, 0, 'sucasa', '59977411', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13349432-', 0, 0, 'GOMEZ QUIROGA VICTOR MIGUEL', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13352227-1', 0, 0, 'BENITEZ MANRIQUEZ JORGE ANTONIO', 2, 4, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13368246-5', 0, 0, 'GONZALEZ CABELLO LUIS RODRIGO', 8, 7, 4, 0, 0, 0, 'sucasa', '51598283', '0000-00-00', 'MAIPU', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13374441-', 0, 0, 'OPAZO VALLADARES GONZALO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13378365-', 0, 0, 'MENDEZ FIGUEROA PABLO ANDRES', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13393389-1', 0, 0, 'CADIZ  SANHUEZA  ROBERTO CARLOS', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13438306-2', 0, 0, 'AREVALO HIDALGO RAMON MARCELO', 7, 7, 1, 0, 0, 0, 'sucasa', '09-6586613', '0000-00-00', 'SANTA CRUZ', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13439793-4', 0, 0, 'ALVAREZ MORENO PABLO', 8, 7, 2, 0, 0, 0, 'sucasa', '976729728', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13444829-6', 0, 0, 'URRUTIA RETAMAL RODRIGO ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '984495821', '0000-00-00', 'QUILICURA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13445354-', 0, 0, 'ARAVENA UBILLA JUAN PABLO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13459305-9', 0, 0, 'GUTIERREZ CESPEDES CRISTIAN ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13470544-2', 0, 0, 'HURTA TOLOSA MILTON DANILO', 2, 2, 4, 0, 0, 0, 'sucasa', '9586624522', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13476839-8', 0, 0, 'CATALAN TAPIA MIGUEL ANGEL', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAIPU', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13479374-0', 0, 0, 'YAÑEZ MUÑOZ JULIO CESAR', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13480310-K', 0, 0, 'ARIAS MILLA ROBERTO ESTEBAN', 2, 7, 4, 0, 0, 0, 'sucasa', '8959732', '0000-00-00', 'LA PINTANA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13483932-5', 0, 0, 'GONZALEZ GUEVARA VICTOR HUGO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13488352-9', 0, 0, 'SEPULVEDA ARANGUIZ PEDRO ENRIQUE', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13500478-2', 0, 0, 'CANTILLANA RAMIREZ IVAN J', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13500500-2', 0, 0, 'BRAVO GALVEZ  FRANCISCO ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13500531-', 0, 0, 'CAROCA MARQUEZ JONATHAN A', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13500594-0', 0, 0, 'SEPULVEDA RABOY ALEXIS MAXIMILIANO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13501488-5', 0, 0, 'TORRES CABRE LEANDRO ARIEL', 15, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13502076-1', 0, 0, 'CARRASCO FAUNDEZ LAURICH DANIEL', 2, 7, 1, 0, 0, 0, 'sucasa', '67094888', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13503131-3', 0, 0, 'CANALES HORMAZABAL WILLIAM SEGUNDO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13504857-7', 0, 0, 'MARTINEZ BARRUETO RUBEN O', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13505263-', 0, 0, 'ARRIAGADA EYZAGUIRRE PAUL ANDRE', 14, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13506146-8', 0, 0, 'BOTARRO GONZALEZ MARCOS ALONSO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13520080-8', 0, 0, 'BUSTOS PINEDA HAROLDO ANDRES', 2, 2, 4, 0, 0, 0, 'sucasa', '87677756', '0000-00-00', 'SAN RAMON', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13521646-1', 0, 0, 'LIGNAY  NAIL MAURICIO ALEJANDRO', 8, 7, 2, 0, 0, 0, 'sucasa', '50587448', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13541049-7', 0, 0, 'ENCALADA RIVEROS MARIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13548819-4', 0, 0, 'kamal', 26, 7, 7, 24, 0, 12, 'sadsad', '2222', '0000-00-00', 'Rancagua', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13556879-', 0, 0, 'BRICEÑO ÑANCUFIL RUBEN OSCAR', 18, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13558919-5', 0, 0, 'PIZARRO SILVA JUAN EDUARDO', 2, 7, 1, 0, 0, 0, 'sucasa', '95308189', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13559368-0', 0, 0, 'BALBILILLO AMERICO JAVIER', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'melipilla', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13559786-4', 0, 0, 'VERA CESPEDES SANDRA CAROLINA', 19, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13559868-2', 0, 0, 'AGUILAR JORQUERA LEONARDO ANDRES', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13561672-9', 0, 0, 'YAÑEZ  CARREÑO  GONZALO ANTONIO', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13564738-1', 0, 0, 'DURAN RUBILAR FABIAN ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '979431010', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13565695-K', 0, 0, 'GOMEZ SARABIA JOSE LUIS', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13566262-3', 0, 0, 'LOPEZ QUEZADA MIGUEL ANGEL', 2, 2, 4, 0, 0, 0, 'sucasa', '976421574', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13568038-', 0, 0, 'NAVARRETE RIVERA CRISTIAN', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13568484-', 0, 0, 'FUENZALIDA ALVAREZ MARIA ISABEL', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13568760-K', 0, 0, 'LAGOS VALDIVIA TOMAS RAMIRO', 2, 7, 1, 0, 0, 0, 'sucasa', '85318500', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13568789-', 0, 0, 'CORREA UGALDE SEBASTIAN RODRIGO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'OLIVAR', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13569623-4', 0, 0, 'CALQUIN ARANCIBIA EDUARDO MAURICIO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13569699-4', 0, 0, 'CABRERA CORNEJO FERNANDO ANTONIO', 12, 7, 1, 0, 0, 0, 'sucasa', '83819398', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13569852-0', 0, 0, 'FARIAS ARENAS FELIPE ARMANDO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13569915-2', 0, 0, 'GALAZ RAMIREZ  RICARDO ALEXIS', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13569944-6', 0, 0, 'REVECO RABELO CESAR ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '09-3601570', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13570314-1', 0, 0, 'RAMIREZ AMAYA FELIPE FABIAN', 8, 2, 1, 0, 0, 0, 'sucasa', '958790446', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13570438-5', 0, 0, 'NUÑEZ MOYA JUAN CARLOS', 2, 3, 2, 0, 0, 0, 'sucasa', '07-4356744', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13570516-0', 0, 0, 'VILLANUEVA JARAMILLO VICTOR HUGO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13570527-', 0, 0, 'PAREDES CARREÑO MICHAEL TOMMY', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13572607-9', 0, 0, 'SANCHEZ QUINTANA SERGIO OMAR', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13575145-6', 0, 0, 'VALDES ARAVENA NELSON NIVALDO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13584199-4', 0, 0, 'GORMAZ TRENFO ROLANDO ANDRES', 2, 7, 1, 0, 0, 0, 'sucasa', '74443298', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13586958-9', 0, 0, 'VENEGAS NAVARRETE JOSE LUIS', 8, 2, 4, 0, 0, 0, 'sucasa', '092172325', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13596938-9', 0, 0, 'NOVOA MUÑOZ MARCELO ANDRES', 2, 7, 1, 0, 0, 0, 'sucasa', '07-9879792', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13600428-K', 0, 0, 'MUÑOZ MOLINA MIGUEL ANGEL RUBEN', 8, 7, 2, 0, 0, 0, 'sucasa', '67961612', '0000-00-00', 'LINARES', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13606025-2', 0, 0, 'CHAVARRIA FLORES PEDRO PABLO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13606130-5', 0, 0, 'CID FRIZ VICTOR MANUEL', 8, 7, 1, 0, 0, 0, 'sucasa', '91317519', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13611122-1', 0, 0, 'BRAVO GONZALEZ CARLOS PATRICIO', 2, 7, 2, 0, 0, 0, 'sucasa', '973864318', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13611251-1', 0, 0, 'CERPA POBLETE  PABLO ALEJANDRO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13611780-7', 0, 0, 'ORELLANA AZOCAR OSCAR', 8, 5, 2, 0, 0, 0, 'sucasa', '984212431', '0000-00-00', 'talca', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13612616-4', 0, 0, 'GAJARDO GAJARDO PABLO ANDRES', 8, 7, 2, 0, 0, 0, 'sucasa', '976543912', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13613168-', 0, 0, 'HERNANDEZ ZUÑIGA CLAUDIO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13613302-', 0, 0, 'ROJAS BUSTAMANTE RAMON AN', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13632034-3', 0, 0, 'RIGOBERTO JAIME LEFICHE  MILLAFILO', 2, 2, 1, 0, 0, 0, 'sucasa', '7238008', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13666804-8', 0, 0, 'VALENCIA ANDRADE DANIEL MAXIMILIANO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'EL BOSQUE', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13677445-K', 0, 0, 'SOLAR OLGUIN CRISTIAN RENATO', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RECOLETA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13685694-4', 0, 0, 'MARMOLEJO GARRIDO HUGO ALBERTO', 2, 7, 4, 0, 0, 0, 'sucasa', '97707773', '0000-00-00', 'PUDAHUEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13685745-2', 0, 0, 'CIFUENTES ALVAREZ LEONARDO ARIEL', 2, 2, 1, 0, 0, 0, 'sucasa', '91661357', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13699221-K', 0, 0, 'CRETTON HERMOSILLA EMILIO ALEJANDRO', 8, 7, 1, 0, 0, 0, 'sucasa', '67109713', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13701553-6', 0, 0, 'HENRIQUEZ GALLARDO PABLO ESTEBAN', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'GRANJA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13701917-', 0, 0, 'CAMPOS GUERRA MIGUEL ANGEL', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13704592-3', 0, 0, 'VILLIVARES FERNANDEZ OSCAR ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '61602531', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13706952-0', 0, 0, 'MARTINEZ VALDES MIGUEL ALEJANDRO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13709124-', 0, 0, 'CORDOVA SALGADO CAUPOLICAN MANUEL ENRIQUE', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13710007-K', 0, 0, 'LABBE TAFFO HARRY WALTER', 8, 7, 1, 0, 0, 0, 'sucasa', '87502660', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13710260-9', 0, 0, 'PEÑA VALDIVIA VICTOR ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13716671-2', 0, 0, 'BORQUEZ SOTO CLAUDIO ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '75328302', '0000-00-00', 'SANTA CRUZ', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13717022-1', 0, 0, 'SANCHEZ SALINAS HECTOR RODRIGO', 2, 7, 1, 0, 0, 0, 'sucasa', '65559482', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13717420-', 0, 0, 'LIZANA RAMIREZ LEONARDO A', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13718292-', 0, 0, 'PALMA GONZALEZ PEDRO ESTE', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13718431-1', 0, 0, 'ARANGUIZ VENEGAS SEVERINO ANDRES', 2, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13718514-', 0, 0, 'CANDIA PEÑA JORGE MANUEL', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13719049-4', 0, 0, 'GALVEZ RIVERA LUIS HERNAN', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13719783-', 0, 0, 'CANTILLANA RAMIREZ PABLO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13719792-', 0, 0, 'FLORES ORTEGA JOSE ALFREDO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13719889-', 0, 0, 'BERRIOS CATALAN PABLO ALF', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13720688-', 0, 0, 'GONZALEZ GONZALEZ CARLOS', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13721809-7', 0, 0, 'ROJAS VELASQUEZ PATRICIO ALEJANDRO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13721863-', 0, 0, 'SAAVEDRA ARENAS FERNANDO', 2, 3, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13722433-K', 0, 0, 'REBOLLEDO ALEGRIA MARCELO ENRIQUE', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13722529-8', 0, 0, 'GONZALEZ PALAVECINO JUAN JOSE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13722624-3', 0, 0, 'CAÑETE CAÑETE JOSE MIGUEL', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13722723-1', 0, 0, 'VERDUGO FAUNDEZ CARLOS', 2, 7, 2, 0, 0, 0, 'sucasa', '79207703', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13722745-2', 0, 0, 'ROJAS HENRIQUEZ JOSE LUIS', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13723092-', 0, 0, 'GONZALEZ GONZALEZ EMILIO JOSE', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13725334-8', 0, 0, 'URZUA OLIVARES JORGE DARIO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13735713-', 0, 0, 'TORRES URIBE MARCOS ROBINSON', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13749329-2', 0, 0, 'ALEGRE IBACACHE BRAULIO MAURICIO', 2, 2, 4, 0, 0, 0, 'sucasa', '74532840', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13749437-K', 0, 0, 'BRICEÑO ALFARO EDUARDO MAURICIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13753865-2', 0, 0, 'CUEVAS VERDEJO LUIS OSVALDO', 2, 2, 4, 0, 0, 0, 'sucasa', '77838702', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13758430-1', 0, 0, 'MARTINEZ PERALTA CLAUDIO ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '083004379', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13759303-3', 0, 0, 'VERGARA MOLINA JUAN ANTONIO', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13772074-4', 0, 0, 'TORO ACEVEDO RODRIGO ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '95336633', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13773305-6', 0, 0, 'PALMA HUERTA VICTOR MIGUEL', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13775475-4', 0, 0, 'PARRAO ORELLANA ROBERTO ANTONIO', 2, 7, 1, 0, 0, 0, 'sucasa', '99737998', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13775965-9', 0, 0, 'QUIJADA VALENZUELA DANIEL ANDRES', 7, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13776359-1', 0, 0, 'LEON ORTIZ FRANCISCO JAVIER', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13777304-', 0, 0, 'RUBIO PEREZ EVARISTO FABIAN', 2, 2, 1, 0, 0, 0, 'sucasa', '58389225', '0000-00-00', 'Coltauco', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13779788-7', 0, 0, 'PINO MONSALVE PAOLO ANDRES', 1, 7, 1, 0, 0, 0, 'sucasa', '85106092', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13779982-0', 0, 0, 'DONOSO ORMAZABAL PEDRO JAVIER', 2, 7, 1, 0, 0, 0, 'sucasa', '62919965', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13780155-8', 0, 0, 'ACEVEDO CABEZAS JUAN FRANCISCO', 2, 7, 1, 0, 0, 0, 'sucasa', '85097762', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13780197-3', 0, 0, 'SOTO GUZMAN MAX ALBERTO', 7, 7, 1, 0, 0, 0, 'sucasa', '08-5448939', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13780544-8', 0, 0, 'GOMEZ ROMERO PABLO CESAR', 2, 7, 1, 0, 0, 0, 'sucasa', '98268512', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13780822-6', 0, 0, 'GARRIDO GONZALEZ JOSE LEONARDO', 8, 3, 1, 0, 0, 0, 'sucasa', '08-8851842', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13780949-4', 0, 0, 'MATUS MARTINEZ LUIS ALBERTO', 2, 3, 2, 0, 0, 0, 'sucasa', '08-8684064', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13781088-3', 0, 0, 'VALDES FUENTES PATRICIO SEBASTIAN', 2, 7, 1, 0, 0, 0, 'sucasa', '50692099', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13781130-8', 0, 0, 'CORONA MORA ELVIS MANUEL OSVALDO', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13783562-2', 0, 0, 'CABRERA JARA LUIS GABRIEL', 8, 7, 1, 0, 0, 0, 'sucasa', '74996057', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13784244-0', 0, 0, 'ORELLANA GUAJARDO SERGIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13785835-', 0, 0, 'ORDENES VALLE EDGARDO LEO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13785945-', 0, 0, 'MUÑOZ FLORES ELIAS RICARDO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13786506-8', 0, 0, 'MEDINA MEJIAS LUIS RAMON', 2, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13786799-0', 0, 0, 'ORELLANA OSORIO BERNARDO DEL CARMEN', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13787095-9', 0, 0, 'CARRASCO RUIZ JOSE TIMOTEO', 2, 7, 2, 0, 0, 0, 'sucasa', '78917726', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13790534-', 0, 0, 'MONSALVE GONZALEZ CARLOS', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13791261-9', 0, 0, 'DIAZ TAPIA JOSE MANUEL', 2, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13819504-K', 0, 0, 'MARQUEZ MARQUEZ JOSE ALEJANDRO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13834592-0', 0, 0, 'ALFARO ALFARO JAVIER ALEJANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13835749-K', 0, 0, 'GALLARDO ANGULO ANDRES ALBERTO', 2, 2, 1, 0, 0, 0, 'sucasa', '8504907', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13837838-1', 0, 0, 'CAMPOS RUZ ALEJANDRO ENRIQUE', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13838035-1', 0, 0, 'ASTUDILLO GUZMAN JORGE ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '986039487', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13838038-6', 0, 0, 'MAUREIRA LATORRE  ABEL ALEJANDRO', 2, 7, 1, 0, 0, 0, 'sucasa', '67393710', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13853793-5', 0, 0, 'REUQUEN INZUNZA MAURICIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13856588-2', 0, 0, 'GUERRERO FIGUEROA  GUILLERMO ANTONIO', 8, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13856697-8', 0, 0, 'MUÑOZ SAZO  BENJAMIN DE JESUS', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13857571-3', 0, 0, 'FAUNDEZ OYARZUN CRISTIAN ALEJANDRO', 8, 7, 2, 0, 0, 0, 'sucasa', '094113947', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13857674-', 0, 0, 'BACARREZA MEDEL JOSE LUCI', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13858252-3', 0, 0, 'ARDUIZ BUSTOS BRAULIO ANTONIO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13859919-', 0, 0, 'HASLER GARRIDO PABLO ELIA', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13872544-8', 0, 0, 'QUISPE BARRIONUEVO JOHN FRANCISCO', 2, 7, 2, 0, 0, 0, 'sucasa', '78467289', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13887110-K', 0, 0, 'VILLAVICENCIO MANZO MAURICIO ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '95867753', '0000-00-00', 'RECOLETA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13897214-3', 0, 0, 'FERNANDEZ VELOSO RAUL ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13900272-5', 0, 0, 'MIRANDA LABRA JUAN CARLOS', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13913479-6', 0, 0, 'SANCHEZ CACERES ROSA MARIA', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LA CISTERNA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13920886-2', 0, 0, 'GALLARDO BARRIENTOS JONNATHAN ANDRES', 8, 7, 1, 0, 0, 0, 'sucasa', '98159176', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13930495-0', 0, 0, 'LOBOS GAUNE HANS HUMBERTO', 2, 2, 4, 0, 0, 0, 'sucasa', '079361310', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13931056-K', 0, 0, 'ROSALES RIVERA ISMAEL EDUARDO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13931532-4', 0, 0, 'SANCHEZ MUÑOZ CLAUDIO HERNAN', 2, 7, 2, 0, 0, 0, 'sucasa', '959458666', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13932156-1', 0, 0, 'LOPEZ LOPEZ GONZALO PATRICIO', 8, 5, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13932859-0', 0, 0, 'CASTRO CASTRO ARIEL ANTONIO', 7, 7, 1, 0, 0, 0, 'sucasa', '81921471', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13934724-2', 0, 0, 'SANTIBAÑEZ TAPIA SUJEY ANDREA', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13938110-6', 0, 0, 'NUEÑEZ AVILA EDUARDO ANDRES', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13941561-2', 0, 0, 'ABARZÚA ALEGRIA FRANCISCO JAVIER', 2, 7, 1, 0, 0, 0, 'sucasa', '54663743', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13944383-7', 0, 0, 'HERMOSILLA ARREDONDO ORLANDO ENRIQUE', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13944805-', 0, 0, 'CARMONA VALDES LUIS EUGEN', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13944811-1', 0, 0, 'ALEGRIA CANALES RONALD ARNALDO', 2, 7, 1, 0, 0, 0, 'sucasa', '91666082', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13945061-', 0, 0, 'JORQUERA ANICH ISAAC FLAVIO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13945225-', 0, 0, 'FUENTES SILVA BARBARA CAROLINA', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13945254-2', 0, 0, 'BERRIOS NUÑEZ CAROLINA ANDREA', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13945715-', 0, 0, 'CAROCA MARQUEZ ELIZARDO D', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13945946-6', 0, 0, 'MOYA MIRANDA RAQUEL FABIOLA', 24, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13946209-2', 0, 0, 'LEON HERNANDEZ CARLOS EDUARDO', 8, 3, 2, 0, 0, 0, 'sucasa', '09-1668433', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13946242-', 0, 0, 'OLIVARES ALVAREZ MARIO ROBERT', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13946328-5', 0, 0, 'OLEA PAVEZ MARCELO FABIAN', 2, 7, 1, 0, 0, 0, 'sucasa', '988419028', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13946690-', 0, 0, 'PINO BARRIERE CLAUDIO  ANTONIO', 1, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13946965-8', 0, 0, 'ALVARADO VALENZUELA ALEX MARCELO', 2, 7, 1, 0, 0, 0, 'sucasa', '09-6242588', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13947367-1', 0, 0, 'PIZARRO CARREÑO CESAR', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13949645-', 0, 0, 'JIMENEZ ESPINOZA CRISTIAN', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13950574-', 0, 0, 'TOLEDO DIAZ RAUL ESTEBAN', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13966191-5', 0, 0, 'CATRILEO MELIVILU SANTIAGO ADRIAN', 2, 7, 4, 0, 0, 0, 'sucasa', '096859136', '0000-00-00', 'EL BOSQUE', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('13972065-2', 0, 0, 'CUADRA MIRANDA AUGUSTO FABIAN', 8, 1, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('13977771-9', 0, 0, 'ARAYA COLLAO DENIS ALEXIS', 2, 2, 4, 0, 0, 0, 'sucasa', '66303262', '0000-00-00', 'ILLAPEL', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14004353-2', 0, 0, 'MORALES ZUÑIGA LUIS GUSTAVO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14006879-9', 0, 0, 'ARAVENA JORQUERA ARIEL RODRIGO', 2, 7, 4, 0, 0, 0, 'sucasa', '977121874', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14007165-K', 0, 0, 'ALVAREZ GUAJARDO MAURICIO ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14007518-3', 0, 0, 'HERMOSILLA PLAZA VICTOR ANDRES', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14008187-6', 0, 0, 'AGUILAR HERNANDEZ JOSE FELIX', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14008512-K', 0, 0, 'INOSTROZA QUIROZ JUAN', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14010501-5', 0, 0, 'REYES OLMEDO ISMAEL', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ANTONIO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14011565-5', 0, 0, 'CORDOVA LEON JORGE ESTEBAN', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MACHALI', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14011793-', 0, 0, 'GAUTIER CANALES CHRISTIAN', 4, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14012307-', 0, 0, 'GONZALEZ HUENUR JORGE ALEXIS', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14012723-K', 0, 0, 'MARTINEZ MARTINEZ ARNALDO ANDRES', 8, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RENGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14013669-7', 0, 0, 'PEREZ OROSTICA CRISTIAN ALEJANDRO', 2, 3, 2, 0, 0, 0, 'sucasa', '08-5500950', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14013686-7', 0, 0, 'MIRANDA SAAVEDRA LUIS HERNAN', 2, 7, 1, 0, 0, 0, 'sucasa', '07-4685466', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14014119-4', 0, 0, 'ARANGUIZ CABELLO VICTOR FERNANDO', 8, 3, 2, 0, 0, 0, 'sucasa', '07-6802474', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14014325-', 0, 0, 'ESCOBAR ESCOBAR CRISTIAN GALVARINO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14015861-', 0, 0, 'ESPINOZA SAZO ELVIS FERNA', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14016603-0', 0, 0, 'MALDONADO SAN MARTIN JUAN', 2, 7, 2, 0, 0, 0, 'sucasa', '73194030', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14016635-9', 0, 0, 'MARTINEZ CONTRERAS DOMINGO ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14017253-7', 0, 0, 'ORELLANA FIGUEROA LUIS', 2, 4, 2, 0, 0, 0, 'sucasa', '982103677', '0000-00-00', 'SAN JAVIER', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14017795-4', 0, 0, 'SALAZAR MORAGA ALEJANDRO ESTEBAN', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14018955-3', 0, 0, 'VALDES LOYOLA ROBERTO CARLOS', 8, 7, 2, 0, 0, 0, 'sucasa', '82120924', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14019859-5', 0, 0, 'ALBORNOZ FONCECA JUAN AUGUSTO', 2, 7, 2, 0, 0, 0, 'sucasa', '97175589', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14020027-1', 0, 0, 'CRUZ GONZALEZ DANIEL', 2, 7, 2, 0, 0, 0, 'sucasa', '54960589', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14020069-7', 0, 0, 'POBLETE VALDIVIA MAURICIO ALEJANDRO', 8, 7, 2, 0, 0, 0, 'sucasa', '71779526', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14023522-9', 0, 0, 'ACUÑA CARREÑO DAVID', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14025137-2', 0, 0, 'ACUÑA ORELLANA RODRIGO ALEJANDRO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14034371-4', 0, 0, 'RIFFO GALLEGOS OSCAR FABIAN', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14034655-1', 0, 0, 'CAYUPIL CAYUPIL VLADIMIR LAUTARO', 2, 7, 1, 0, 0, 0, 'sucasa', '94829555', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14036265-4', 0, 0, 'ANTILLANCA MANQUE NELSON MANUEL', 8, 2, 4, 0, 0, 0, 'sucasa', '75248166', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14047613-', 0, 0, 'MUÑOZ MARAMBIO SILVIA ANGELICA', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14047893-8', 0, 0, 'PAREDES CARREÑO HECTOR FERNANDO', 2, 3, 2, 0, 0, 0, 'sucasa', '08-3590889', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14048201-3', 0, 0, 'FUENZALIDA RAMIREZ MANUEL DEL CARMEN', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14048539-K', 0, 0, 'CAMPOS FERNANDEZ IVER ONELL', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14048719-8', 0, 0, 'OYARCE VALDES JULIO', 2, 7, 2, 0, 0, 0, 'sucasa', '971063160', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14048721-K', 0, 0, 'CORONA MORA RAUL DEL CARMEN', 7, 7, 1, 0, 0, 0, 'sucasa', '74264483', '0000-00-00', 'PLACILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14048751-1', 0, 0, 'ASTUDILLO ACOSTA JORGE EDUARDO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14048754-6', 0, 0, 'JORQUERA POBLETE CARLOS ESTEBAN', 8, 7, 1, 0, 0, 0, 'sucasa', '85818608', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14048977-8', 0, 0, 'DONOSO SILVA CRISTIAN DE JESUS', 2, 7, 1, 0, 0, 0, 'sucasa', '986775387', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14049116-0', 0, 0, 'REYES MORALES HECTOR MARIANO', 2, 7, 1, 0, 0, 0, 'sucasa', '953908647', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14049163-2', 0, 0, 'PACHECO BARRERA JUAN GUILLERMO', 2, 2, 1, 0, 0, 0, 'sucasa', '97034091', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14049222-1', 0, 0, 'CESPEDE OSORIO MARCIAL ANDRES', 2, 2, 1, 0, 0, 0, 'sucasa', '976890542', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14050112-3', 0, 0, 'ESTRADA DONOSO MANUEL ALEJANDRO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14050577-3', 0, 0, 'ABARCA TOBAR JUAN CARLOS', 2, 8, 1, 0, 0, 0, 'sucasa', '08-2020152', '0000-00-00', 'NANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14050917-5', 0, 0, 'GUTIERREZ GARRIDO ALVARO', 8, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14054003-K', 0, 0, 'ARAYA SEPULVEDA MARCELO ANDRES', 2, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14054819-', 0, 0, 'SAEZ PEÑAILILLO PEDRO PABLO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14054877-4', 0, 0, 'ACOSTA MORALES ISABEL ANDREA', 1, 7, 2, 0, 0, 0, 'sucasa', '98907225', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14054910-k', 0, 0, 'AGUILAR GAJARDO MIGUEL ANGEL', 8, 7, 2, 0, 0, 0, 'sucasa', '989367717', '0000-00-00', 'CONSTITUCION', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14056520-2', 0, 0, 'GARCIA ACEVEDO LUIS MANUEL', 2, 4, 2, 0, 0, 0, 'sucasa', '61710982', '0000-00-00', 'SAN JAVIER', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14056836-8', 0, 0, 'VERGARA GARRIDO VICTOR ERASMO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14066748-k', 0, 0, 'VILLAGRA ALTAMIRANO EDWIN NICOLAS', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14070302-8', 0, 0, 'QUINTEROS RIQUELME  MANUEL RODRIGO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14090180-6', 0, 0, 'SUAREZ POZO ALEJANDRO ANDRÉS', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14093638-3', 0, 0, 'PINO GONZALEZ EDGARDO EDSON', 8, 7, 4, 0, 0, 0, 'sucasa', '84969715', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14121870-0', 0, 0, 'PEREZ ALLENDES RONALD DAVID', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNNADO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14124230-K', 0, 0, 'RODRIGUEZ CESPEDES CESAR HERNAN', 2, 7, 4, 0, 0, 0, 'sucasa', '952035933', '0000-00-00', 'santiago', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14125321-2', 0, 0, 'CELEDON TORRES LUIS ALBERTO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'COLINA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14134297-5', 0, 0, 'RIVEROS TORINO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14135257-1', 0, 0, 'MIRANDA CHACON CLAUDIO HORACIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14139842-3', 0, 0, 'JAQUES RIOS JORGE ANDRES', 8, 1, 4, 0, 0, 0, 'sucasa', '53207267', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14141538-7', 0, 0, 'BERRIOS ARAVENA JUAN JOSE', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14142168-9', 0, 0, 'VARGAS ESCUDERO LUIS ANTONIO', 2, 7, 4, 0, 0, 0, 'sucasa', '977601608', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14142595-1', 0, 0, 'SANCHEZ ORTIZ CRISTIAN', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14142772-5', 0, 0, 'CHAVEZ ORTEGA JUAN ANDRES', 8, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('14150709-5', 0, 0, 'NAVEA INDA LUIS HERNAN', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('14156350-', 0, 0, 'OPAZO TORO DIEGO ELIAS ', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('1752545-2', 0, 0, 'LAVIN GALVEZ PEDRO  PABLO', 2, 2, 1, 0, 0, 0, 'sucasa', '96864258', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('17552614-5', 0, 0, 'Generador de rut', 1, 7, 9, 0, 0, 16, 'mi casas', '5666', '2017-05-17', 'Rancagua', '2017-05-12', 2, '0000-00-00', 0, '', 0, 1),
('18521960-7', 0, 0, 'Claudio Riquelme Moreno', 26, 8, 7, 18521960, 19, 15, 'sucasa', '', '0000-00-00', '', '0000-00-00', 0, '0000-00-00', 0, '', 0, 1),
('19017181-7', 0, 0, 'T cuenta corriente', 1, 7, 1, 0, 0, 12, 'su casa', '585858', '2017-05-15', 'Rancagua', '2017-05-11', 2, '0000-00-00', 0, '', 0, 1),
('4173375-6', 0, 0, 'LIZANA SUAZO ONAN ANTIDIO', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('4541433-7', 0, 0, 'GONZALEZ SALINAS OSVALDO', 7, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('4596786-7', 0, 0, 'MEDINA MORALES JUAN CARLOS', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('4677437-K', 0, 0, 'MORALES FARIAS SAMUEL', 1, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('4823524-', 0, 0, 'GARRIDO DONOSO SERGIO ENRIQUE', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('4840266-6', 0, 0, 'SANCHEZ GARCIA LUIS AUREL', 8, 3, 2, 0, 0, 0, 'sucasa', '08-5173010', '0000-00-00', 'RENGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('4914566-7', 0, 0, 'VALDES GARRIDO MARCOS SEGUNDO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'San Antonio', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('5000236-5', 0, 0, 'URZUA CASTRO LUIS EDMUNDO', 14, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('5031851-6', 0, 0, 'SEGUEL SEGUEL FIDEL SEGUNDO', 14, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('5101566-', 0, 0, 'VERDUGO OLAVE MANUEL ENRIQUE', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5150278-7', 0, 0, 'MANCILLA CASTILLO HECTOR', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5211684-8', 0, 0, 'QUINTANILLA URETA CARLOS ENRIQUE', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5275394-5', 0, 0, 'NORAMBUENA DONOSO FERNANDO', 16, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAIPU', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5347733-K', 0, 0, 'GONZALEZ SALINAS CAMILO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5417485-', 0, 0, 'MEJIAS CARRASCO SALVADOR BENEDICTO', 3, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5520845-K', 0, 0, 'ALVAREZ BUROTTO ARTURO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5533196-0', 0, 0, 'RUIZ REBOLLEDO ELEUTERIO ENRIQUE', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5696324-3', 0, 0, 'JELDRES SALINAS MARCIAL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5764819-8', 0, 0, 'BARRA VERGARA HUMBERTO GUILLERMO', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('5787447-3', 0, 0, 'CARVAJAL RIQUELME OSVALDO ENRIQUE', 1, 7, 1, 0, 0, 0, 'sucasa', '07-6639458', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5839082-8', 0, 0, 'SOLIS MONCADA JUAN ESTUARDO', 22, 7, 1, 0, 0, 0, 'sucasa', '61642999', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('5849429-1', 0, 0, 'IRIBARNE PANDOLFO ENRIQUE ORLANDO', 8, 7, 4, 0, 0, 0, 'sucasa', '954218921', '0000-00-00', 'SAN MIGUEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('5883027-5', 0, 0, 'PIÑA HERNANDEZ HERNAN ALBERTO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5905779-', 0, 0, 'TOLEDO AGUILERA LUIS HUMBERTO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5911783-', 0, 0, 'AYALA SILVA MANUEL EDMUNDO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('5924003-K', 0, 0, 'CAMPOS CRUZ CARLOS ANSELMO', 8, 7, 1, 0, 0, 0, 'sucasa', '86305170', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('5948125-8', 0, 0, 'CATALAN FUENZALIDA JULIO EDUARDO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6018437-2', 0, 0, 'VILLANUEVA LUCUMILLA JOSE MANUEL', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6025327-', 0, 0, 'HERNANDEZ LLANOS CARLOS M', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6030292-', 0, 0, 'CORTEZ SOTO MARIO IVAN', 5, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6088164-2', 0, 0, 'CORTES PARDES CARLOS ENRIQUE', 8, 7, 4, 0, 0, 0, 'sucasa', '990334398', '0000-00-00', 'LA FLORIDA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6116618-', 0, 0, 'VEGA MUÑOZ GASTON', 3, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6145988-K', 0, 0, 'GUAJARDO GONZALEZ FELICIANO', 7, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6172700-0', 0, 0, 'MORALES NUÑEZ FLORIN ANTONIO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6238438-7', 0, 0, 'SAN MARTIN SALAS JAIME ENRIQUE', 8, 3, 2, 0, 0, 0, 'sucasa', '09-5482115', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6306751-2', 0, 0, 'MELLADO BOVET ROLANDO ANTONIO', 14, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6334052-9', 0, 0, 'ROJAS BRAVO  LEOPOLDO', 13, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6344424-', 0, 0, 'MONTANER AMPUERO MIGUEL ANTONIO', 7, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6410102-1', 0, 0, 'BOMBALLET SAVELLE PATRICIO CRISTIAN', 8, 10, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6480823-0', 0, 0, 'FLORES TAPIA PASCUAL DEL CARMEN', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6512528-5', 0, 0, 'TORO CHAVEZ JOSE PATRICIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6518786-8', 0, 0, 'BRAVO CONTARDO MOISES ENRIQUE', 8, 5, 2, 0, 0, 0, 'sucasa', 'TALCA', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6534289-', 0, 0, 'NARANJO CATALAN LUIS ARTURO', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6537690-3', 0, 0, 'CAMPOS SOTO GUILLERMO BENITO', 8, 7, 2, 0, 0, 0, 'sucasa', '79845582', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6567627-3', 0, 0, 'OLAVE CHAVEZ GABRIEL EDUARDO', 1, 7, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6596943-2', 0, 0, 'MOLINA MOSCOSO EUGENIO DEL CARMEN', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6618112-K', 0, 0, 'MARABOLI AGUILAR JOSE ARTURO', 7, 7, 1, 0, 0, 0, 'sucasa', '88382374', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6642508-8', 0, 0, 'POZO ECHEVERRIA SERGIO', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6651381-', 0, 0, 'LIRA PEÑA EDUARDO', 7, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6655449-K', 0, 0, 'ESPINOZA DONOSO JUAN DOMINGO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6656359-6', 0, 0, 'BRIGNARDELLO ARRIAGADA PATRICIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6684613-', 0, 0, 'OLIVARES PIZARRO JOSE ALEJANDRO', 22, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6693437-3', 0, 0, 'TRONCOSO SALGADO CARLOS RICARDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RENCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6758661-1', 0, 0, 'ARRIAGADA GARRIDO EMILIO', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6792699-4', 0, 0, 'BARRUETO RAMOS MANUEL ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6817688-3', 0, 0, 'GALVEZ ADASME ERNESTO RICARDO', 7, 3, 2, 0, 0, 0, 'sucasa', '09-2473148', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6833412-8', 0, 0, 'URZUA BECERRA LUIS', 7, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6844042-4', 0, 0, 'YAÑEZ DIAZ JUAN DE LA CRUZ', 13, 7, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('6877156-0', 0, 0, 'BOBADILLA LEON OLGA DEL CARMEN', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('6951709-9', 0, 0, 'CALQUIN LAZO LUIS ALBERTO', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7047102-7', 0, 0, 'AREVALO BERRIOS CARLOS CLAUDIO', 2, 7, 1, 0, 0, 0, 'sucasa', '53457227', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7071098-6', 0, 0, 'ORTIZ ORTIZ GUILLERMO ANDRES', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7090024-6', 0, 0, 'ZAMORANO CABEZAS CARLOS MANUEL', 13, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7093085-4', 0, 0, 'MUÑOZ MORALES  HECTOR', 17, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7107257-6', 0, 0, 'PARADA SEPULVEDA IGNACIO DEL CARMEN', 13, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7140870-1', 0, 0, 'MORAGA GARCIA LUIS ALBERTO', 8, 1, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7168859-3', 0, 0, 'OLMEDO FUENZALIDA LUIS ALBERTO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7181729-', 0, 0, 'LOPEZ VALENZUELA IVAN ALFREDO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1);
INSERT INTO `ges_trabajadores` (`Rut`, `codigo_ayu`, `codigo_cond`, `Nombre`, `Cargo_id`, `Empresa_id`, `Centro_de_costo_id`, `id_permiso`, `id_grencia`, `id_dpto`, `Direccion`, `Celular`, `Fecha_nac`, `Ciudad`, `Fecha_contrato`, `Tipo_contrato_id`, `Fecha_termino_contrato`, `Sindicato_id`, `N_contacto`, `N_carga`, `Estado`) VALUES
('7186047-7', 0, 0, 'PEÑALOZA VALENZUELA CARLOS PATRICIO', 7, 7, 1, 0, 0, 0, 'sucasa', '07-9449648', '0000-00-00', 'NANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7188295-0', 0, 0, 'LOPEZ LOPEZ JUAN SEGUNDO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7206052-0', 0, 0, 'BAEZA ACUÑA LUIS PATRICIO', 2, 2, 4, 0, 0, 0, 'sucasa', '25362274', '0000-00-00', 'LA PINTANA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7223565-7', 0, 0, 'ALARCON VALIENTE JESÚS HIPOLITO', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7248636-6', 0, 0, 'ORELLANA CARRASCO LUIS ALBERTO', 7, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7257060-K', 0, 0, 'MANRIQUEZ HUERTA MAXIMILIANO', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7278215-1', 0, 0, 'MUÑOZ FARIAS NELSON FERNANDO', 8, 7, 1, 0, 0, 0, 'sucasa', '08-2756668', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7320109-', 0, 0, 'PARADA PACHECO CLAUDIO', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7354539-0', 0, 0, 'ZARATE GUIÑEZ LUIS ALBERTO OSVALDO', 15, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7359374-3', 0, 0, 'CLAVIJO MUÑOZ JORGE LUIS', 8, 3, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7361208-', 0, 0, 'NUÑEZ CEPEDA RENE EDUARDO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7374444-', 0, 0, 'DUARTE RAMIREZ OSCAR JULIO', 8, 4, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7394514-', 0, 0, 'CARRASCO MARCHANT DANIEL LIBORIO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7401801-7', 0, 0, 'DONOSO GOMEZ ALVARO DEL CARMEN', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7409759-6', 0, 0, 'RIVEROS VALDERRAMA JUAN CARLOS', 8, 7, 2, 0, 0, 0, 'sucasa', '50629995', '0000-00-00', 'CURICO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7425739-9', 0, 0, 'LANTADILLA AMARANTO ALEJANDRO LUIS', 8, 7, 1, 0, 0, 0, 'sucasa', '71876301', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7433955-7', 0, 0, 'RAMIREZ LABBE JORGE RAUL', 8, 7, 1, 0, 0, 0, 'sucasa', '57607834', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7447862-', 0, 0, 'MARCHANT MORENO PATRICIO', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7454538-6', 0, 0, 'URZUA FARIAS SANTIAGO LINDOR', 7, 7, 1, 0, 0, 0, 'sucasa', '92261364', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7464255-1', 0, 0, 'DIAZ ROSALES CARLOS ARTURO', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7469617-', 0, 0, 'CANALES HERRERA HUGO HERNAN', 15, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7491009-', 0, 0, 'VALENZUELA JIMENEZ LUIS', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7498150-', 0, 0, 'CANTILLANA CARVAJAL CARLOS SALUSTIANO', 15, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7513365-0', 0, 0, 'SANCHEZ RIQUELME JORGE DEL CARMEN', 14, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7559444-5', 0, 0, 'CORTES URRA JUAN CARLOS', 8, 7, 1, 0, 0, 0, 'sucasa', '98433864', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7565518-5', 0, 0, 'MICHEA GONZALEZ SERGIO ANTONIO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7591144-0', 0, 0, 'GONZALEZ FIGUEROA HUMBERTO ANTONIO', 8, 10, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7592122-', 0, 0, 'MENARES ZUÑIGA JOSE SERGIO', 14, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7592282-5', 0, 0, 'CAÑETE BAEZA SERGIO ANTONIO', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7617514-4', 0, 0, 'MARTINEZ AGUIRRE MANUEL JESUS', 8, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7619006-2', 0, 0, 'BENAVIDES TRONCOSO JUAN BAUTISTA', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7627035-k', 0, 0, 'ESPINOZA DIAZ MARIO ALFONSO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RENCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7636289-0', 0, 0, 'TAPIA RETAMAL EMERINDO JOSE', 14, 7, 2, 0, 0, 0, 'sucasa', '07-7812688', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7649912-8', 0, 0, 'VALDEBENITO TRINCADO JUAN GUILLERMO', 2, 7, 1, 0, 0, 0, 'sucasa', '96868808', '0000-00-00', 'CALERA DE TANGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7660500-9', 0, 0, 'PEREZ CORNEJO EDUARDO ', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7665876-', 0, 0, 'PAREDES RIVEROS HECTOR FERNANDO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7668823-0', 0, 0, 'TAPIA VILLAGRA HUMBERTO MARIO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7693521-1', 0, 0, 'LLANTEN RODRIGUEZ LUIS', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7710662-', 0, 0, 'PEÑA AHUMADA MARCOS ANTONIO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7722451-3', 0, 0, 'CALDERON FERNANDEZ LUIS HERNAN', 14, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7744156-5', 0, 0, 'MONTENEGRO FIGUEROA EDUARDO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7760165-1', 0, 0, 'ESPINOZA ESPINOZA CARLOS MAXIMILIANO', 8, 9, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7762046-K', 0, 0, 'GALVEZ VALDIVIA JUAN CARLOS', 2, 2, 1, 0, 0, 0, 'sucasa', '09-4479689', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7809666-7', 0, 0, 'PINTO ALBARRAN LUIS ERNESTO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7810182-2', 0, 0, 'RIVEROS SEGOVIA  ENRIQUE PATRICIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LA PINTANA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7846289-', 0, 0, 'MEZA PEREZ LUIS HECTOR', 7, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7853432-k', 0, 0, 'GARCIA PEREIRA JUAN FERNANDO', 2, 7, 1, 0, 0, 0, 'sucasa', '98046653', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7856796-1', 0, 0, 'PIÑA GUAJARDO FRANCISCO ANTONIO', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'OLIVAR', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7859712-', 0, 0, 'PEÑA AHUMADA LUIS ALBERTO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7873669-', 0, 0, 'OLIVARES ROJAS MANUEL JOSE', 3, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7886686-1', 0, 0, 'RIVERA FUENZALIDA LUIS FERNANDO', 18, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAIPU', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7902165-2', 0, 0, 'CUADRA SAEZ DIOMEDES DEL CARMEN', 4, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7909019-0', 0, 0, 'ZURITA ROJAS JUAN LUIS', 13, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN CARLOS', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7929417-9', 0, 0, 'ROJAS OCAMICA CESAREO ERNESTO', 2, 7, 4, 0, 0, 0, 'sucasa', '977466026', '0000-00-00', 'QUILICURA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7938541-7', 0, 0, 'LABBE CAMPOS LUIS ALFREDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7938811-4', 0, 0, 'CARRASCO ESPINOZA JUAN GUILLERMO', 8, 1, 1, 0, 0, 0, 'sucasa', '92116979', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('7941427-1', 0, 0, 'ROMERO  MAURO FRANCISCO', 12, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7976462-', 0, 0, 'BARAHONA GONZALEZ GUISEPP', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7990726-K', 0, 0, 'GONZALEZ NUÑEZ SERGIO ANTONIO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7993036-', 0, 0, 'SILVA COFRE FRANCISCO JAVIER', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('7993236-1', 0, 0, 'MANRIQUEZ HUERTA MIGUEL ANGEL', 8, 3, 2, 0, 0, 0, 'sucasa', '08-3930283', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8036351-6', 0, 0, 'COHEN CASTRO JOSE CARLOS', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8048132-2', 0, 0, 'GARRIDO ALVAREZ ARTURO ELIECER', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'HUECHURABA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8064986-', 0, 0, 'SEPULVEDA SILVA CRISTIAN L', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8102006-', 0, 0, 'PEREZ PEREZ LUIS DOMINGO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8103343-9', 0, 0, 'BERRIOS TORO SALVADOR ENRIQUE', 9, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8107740-', 0, 0, 'CORNEJO CHAMORRO PEDRO DO', 13, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8108504-8', 0, 0, 'CASTILLO CASTILLO SALVADOR ARMANDO', 22, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8122838-8', 0, 0, 'RENGIFO DURAN LEOMA ORLANDO', 8, 7, 4, 0, 0, 0, 'sucasa', '981458278', '0000-00-00', 'INDEPENDENCIA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8123325-K', 0, 0, 'ALBORNOZ ALBORBNOZ LUIS', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8124119-', 0, 0, 'CERDA GORIGOITIA ALADINO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8146945-', 0, 0, 'GUTIERREZ BORQUEZ PATRICIO HERNAN', 18, 8, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8178358-', 0, 0, 'LOPEZ ARRATIA FERNANDO ANTONIO', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8193009-', 0, 0, 'ZERENE MARIN OSCAR ARTURO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8218850-', 0, 0, 'ALVORNOZ RODRIGUEZ EDGARDO', 14, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8223136-6', 0, 0, 'ALVAREZ MANZO MIGUEL ANGEL', 2, 7, 4, 0, 0, 0, 'sucasa', '086550327', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8233012-7', 0, 0, 'PERALTA ZUÑIGA PEDRO ALBERTO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8237323-3', 0, 0, 'SILVA MILLAN ENZO ROLANDO', 7, 7, 1, 0, 0, 0, 'sucasa', '588577337', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8245367-9', 0, 0, 'ZUÑIGA PULGAR FERNESIO JAIME', 22, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8264698-1', 0, 0, 'BARRIERE MARAMBIO MARIA TERESA', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8265668-5', 0, 0, 'SANDOVAL JARA JORGE ABEL', 7, 7, 2, 0, 0, 0, 'sucasa', '09-4674872', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8276288-4', 0, 0, 'MOYA MUÑOZ LUIS HIPOLITO', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8303947-7', 0, 0, 'NUÑEZ RIOS ANDRES ANTONIO', 14, 7, 1, 0, 0, 0, 'sucasa', '61622362', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8305192-', 0, 0, 'SOTO REVECO CARLOS A.', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8308747-', 0, 0, 'TORRES MONTAÑO RUDILAN OR', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8309562-8', 0, 0, 'URZUA MUÑOZ MIGUEL FRANCISCO', 8, 7, 1, 0, 0, 0, 'sucasa', '91914945', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8331713-2', 0, 0, 'IBARRA CARES GERMAN  ENRIQUE', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8339235-5', 0, 0, 'SALAZAR CEA HUGO EMILIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8373872-', 0, 0, 'HERNANDEZ LINCUÑIR BENEDICTO ENRIQUE', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8374973-3', 0, 0, 'OLIVARES VALENZUELA HECTOR', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8380708-3', 0, 0, 'JIMENEZ SEPULVEDA MARIO RAUL', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8382572-3', 0, 0, 'BRIONES AGUILERA JOSE', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8384624-', 0, 0, 'MARTINEZ NILO JOSE MIGUEL', 12, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8400372-7', 0, 0, 'SANCHEZ ROJAS HUMBERTO DANILO', 8, 2, 4, 0, 0, 0, 'sucasa', '957644674', '0000-00-00', 'RECOLETA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8401364-1', 0, 0, 'MONTT JAQUE OMAR ERNESTO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'LA PINTANA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8423655-1', 0, 0, 'CAJAS ROZAS CRISTIAN EDGARDO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8431754-3', 0, 0, 'GODOY ZURITA RAFAEL ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8461742-3', 0, 0, '', 13, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8474490-5', 0, 0, 'GALAZ GUERRA LUIS ANGEL', 2, 7, 4, 0, 0, 0, 'sucasa', '955362242', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8475010-7', 0, 0, 'CORNEJO GUALA JORGE FERNANDP', 14, 7, 1, 0, 0, 0, 'sucasa', '71634218', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8482661-8', 0, 0, 'LOPEZ GUTIERREZ RAUL ENRIQUE', 13, 7, 2, 0, 0, 0, 'sucasa', '99738300', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8508809-2', 0, 0, 'CARRILLO CASANOVA LUIS', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8548605-5', 0, 0, 'GALLARDO VELOSO DANTE ULISES', 8, 7, 1, 0, 0, 0, 'sucasa', '92226747', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8573172-', 0, 0, 'LOPEZ MEZA JUAN JOSE', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8581180-', 0, 0, 'VERGARA MORALES CARLOS', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8610748-1', 0, 0, 'VELARDE MELLADO JUAN BERNARDO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8614263-5', 0, 0, 'MORALES ALLENDE ARIEL JESUS', 7, 7, 1, 0, 0, 0, 'sucasa', '54153828', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8623473-', 0, 0, 'GUAJARDO MEDINA JAIME ARTURO', 14, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8656969-8', 0, 0, 'MALHUE NAVARRETE JUAN ELIAS', 1, 4, 1, 0, 0, 0, 'sucasa', '07-7781132', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8680905-2', 0, 0, 'LLANOS ALEGRIA EDUARDO FLAVIO', 13, 4, 1, 0, 0, 0, 'sucasa', '85320005', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8702676-0', 0, 0, 'CERDA REINOSO ROSA DEL CARMEN', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8703503-', 0, 0, 'CAMPOS OSORIO ROSALINO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8722409-0', 0, 0, 'SALAS TORO LUIS ALEJANDRO', 13, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8742031-0', 0, 0, 'ABURTO VALDEVENITO JORGE', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8753733-', 0, 0, 'VIDAL DIAZ FRANCISCO DEL CARMEN', 14, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8759699-0', 0, 0, 'PIÑONES ASTUDILLO JOSE ELISEO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8762830-', 0, 0, 'CANTILLANA LABRANQUE HUGO ENRIQUE', 5, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8763335-7', 0, 0, 'FUENTES MENDEZ LUIS HERNAN', 8, 6, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8764370-0', 0, 0, 'CISTERNA CASTRO ENRIQUE EDMUNDO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8777718-9', 0, 0, 'POLLAROLO CORTES MARCELO ALDO', 1, 7, 1, 0, 0, 0, 'sucasa', '97197649', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8784403-K', 0, 0, 'MUÑOZ HARRIS FELIPE JESUS', 2, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8785506-6', 0, 0, 'ORTIZ RIVAS SERGIO ALVARO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8792378-', 0, 0, 'MUENA NUÑEZ VICTOR DEL', 8, 4, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8813150-9', 0, 0, 'VALDES BAEZA JAIME ENRIQUE', 7, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'NANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8815308-1', 0, 0, 'IBARRA PAVEZ SEGUNDO ADRIAN', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8822486-8', 0, 0, 'TOLEDO MALDONADO JAIME FRANCISCO', 8, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'QUILICURA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8826997-7', 0, 0, 'POZO REYES JORGE MAURICIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8827919-0', 0, 0, 'GONZALEZ FORTET FRANCISCO MANUEL', 13, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN BERNARDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8842096-', 0, 0, 'GAETE MEZA NELSON PATRICIO', 1, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8848322-7', 0, 0, 'BUCAREY CORDOVA MARCO ANTONIO', 8, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8859142-9', 0, 0, 'MOYA ARANCIBIA NELSON  OSVALDO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8870371-5', 0, 0, 'BRAVO BUSTOS JUAN ANTONIO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8876628-8', 0, 0, 'DONOSO MATURANA MIGUEL ANTONIO', 5, 8, 1, 0, 0, 0, 'sucasa', '09-2932997', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8879712-', 0, 0, 'GALVEZ FLORES JOSE EVARIS', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8880839-8', 0, 0, 'VALENZUELA GONZALEZ ALBERTO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8891222-5', 0, 0, 'ALONSO MAHUIDA ANTONIO MAURICIO', 23, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8894483-6', 0, 0, 'CANALES PINO MILTON ALEJANDRO', 16, 7, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8899434-5', 0, 0, 'DIAZ SANDOVAL RODOLFO BERNARDO', 7, 8, 1, 0, 0, 0, 'sucasa', '94250913', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8899489-2', 0, 0, 'BECERRA OSORIO SERGIO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8925697-6', 0, 0, 'GONZALEZ SEGOVIA BERNARDINO ENRIQUE', 2, 7, 4, 0, 0, 0, 'sucasa', '089256976', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8932760-1', 0, 0, 'PEREZ RIOS MANUEL SEGUNDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8947605-', 0, 0, 'PAREDES RIVEROS LUIS ALBERTO', 2, 7, 1, 0, 0, 0, 'sucasa', '971318471', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8955621-k', 0, 0, 'ALCAINO CARMONA MIGUEL ALFREDO', 8, 2, 4, 0, 0, 0, 'sucasa', '974171275', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8962637-4', 0, 0, 'GONZALEZ PATIÑO NELSON EDUARDO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAIPU', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('8970986-5', 0, 0, 'FARIAS ZAMORANO DANIEL DEL CARMEN', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8972831-2', 0, 0, 'BUSTAMANTE PEREZ FRANCISCO JAVIER', 18, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8976364-9', 0, 0, 'DEL RIO ARANEDA MANUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8982729-', 0, 0, 'PRADO LETELIER CESAR ESTEBAN', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('8996143-', 0, 0, 'BRAVO NOVOA JOSE', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9004311-0', 0, 0, 'TAPIA SALGADO MARIO  ROBERTO', 8, 7, 4, 0, 0, 0, 'sucasa', '950510249', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9007429-6', 0, 0, 'NAVARRO GONZALEZ HECTOR', 8, 8, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9016968-', 0, 0, 'VALDES JEREZ GABRIEL HUMB', 15, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9023142-1', 0, 0, 'LOPEZ OLMEDO ROSA MAGALY', 1, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9024474-4', 0, 0, 'VARGAS LIZAMA JOSE LUIS', 15, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9025208-9', 0, 0, 'MICHEA GONZALEZ ALVARO HERNAN', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9027242-', 0, 0, 'RUIZ LOPEZ RAMON HERNAN', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9035383-7', 0, 0, 'JOFRE POMBETT MARCO ANTONIO', 8, 7, 1, 0, 0, 0, 'sucasa', '89570725', '0000-00-00', 'SANTA CRUZ', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9043623-6', 0, 0, 'FIGUEROA OLIVARES LUIS ARMANDO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9069833-8', 0, 0, 'CORREA ARAVENA RAFAEL MAURICIO', 8, 2, 1, 0, 0, 0, 'sucasa', '08-9043645', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9077429-8', 0, 0, 'VILLALOBOS RAMIREZ LUIS', 8, 2, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9081421-4', 0, 0, 'TRONCOSO DIAZ LUIS ALBERTO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9094834-2', 0, 0, 'MORA GAVILAN GUSTAVO HERNAN', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9095675-2', 0, 0, 'MOYA BUSTAMANTE SEGUNDO', 18, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RECOLETA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9118946-', 0, 0, 'RUIZ LOPEZ ESTANISLAO RICARDO', 2, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9146957-K', 0, 0, 'CASTRO VILLASECA OSMAN', 1, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9191535-9', 0, 0, 'PABLO ANDRES FUENTES CORDOVA', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9192164-2', 0, 0, 'GONZALEZ ORMAZABAL CARLOS ANDRES', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9219945-2', 0, 0, 'ACUÑA PINO JOSE LUIS', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9227739-9', 0, 0, 'CAMPOS AGUILERA JORGE', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9231748-K', 0, 0, 'TRIGO GUERRA PEDRO LEONEL', 8, 2, 1, 0, 0, 0, 'sucasa', '53523016', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9233168-7', 0, 0, 'PEÑA GONZALEZ EDUARDO', 8, 8, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9233806-1', 0, 0, 'VALENZUELA GONZALEZ FERNANDO EDUARDO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9233857-6', 0, 0, 'PRIETO LOPEZ PATRICIO ANTONIO', 8, 2, 2, 0, 0, 0, 'sucasa', '97948689', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9236005-', 0, 0, 'RAMIREZ CARREÑO RUBEN MAR', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9237453-k', 0, 0, 'JAÑA DIAZ HECTOR ANDRES', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9237954-K', 0, 0, 'PEREZ DINAMARCA ALLAN MAURICIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9242835-4', 0, 0, 'HERNANDEZ ARROYO ORLANDO', 8, 7, 1, 0, 0, 0, 'sucasa', '085769983', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9255373-6', 0, 0, 'VEGA MOYA LUIS RAMON', 8, 7, 2, 0, 0, 0, 'sucasa', '98619704', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9258520-4', 0, 0, 'ROMERO RIVAS HECTOR GUILLERMO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'EL BOSQUE', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9262029-8', 0, 0, 'JAQUE VERGARA LUIS ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9264251-8', 0, 0, 'NAVARRETE QUINTEROS VICTOR IVAN', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'CURICO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9274492-2', 0, 0, 'ESPINOZA HURTADO SERGIO ANTONIO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9277726-K', 0, 0, 'CESPEDES GALLEGOS HUGO ENRIQUE', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9280219-1', 0, 0, 'SAAVEDRA CASTRO HECTOR MANUEL', 2, 3, 2, 0, 0, 0, 'sucasa', '09-7533831', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9287996-', 0, 0, 'MARTINEZ GOMEZ CARLOS LEONEL', 1, 4, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9307999-k', 0, 0, 'JORQUERA MONSALVE SUSAN MARIOLY', 1, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9321074-', 0, 0, 'SANCHEZ LIBERONA MARCO ANTONIO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9322256-3', 0, 0, 'HERNANDEZ INZULZA JORGE LUIS', 8, 10, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9324959-3', 0, 0, 'REYES MUÑOZ CESAR ANTONIO', 2, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9327675-2', 0, 0, 'LAVIN  SANDOVAL  PEDRO MARIA', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9330606-6', 0, 0, 'PIÑA VALENZUELA LUIS ADAN', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9336502-', 0, 0, 'PAVEZ CASTILLO LUIS ALFREDO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9339702-9', 0, 0, 'HUERTA AVENDAÑO JOSE ANTONIO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9347167-', 0, 0, 'GONZALEZ TORRES JUAN ANDR', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9392161-5', 0, 0, 'MORALES ROJAS SERGIO ROLANDO', 19, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9399608-9', 0, 0, 'ROJAS GUTIERREZ SEGUNDO DANILO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9407994-2', 0, 0, 'QUEZADA SAAVEDRA MANUEL ALEJO', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9415909-1', 0, 0, 'MORENO ARRUE JAVIER ENRIQUE', 8, 7, 1, 0, 0, 0, 'sucasa', '08-9943292', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9424556-7', 0, 0, 'CADIZ CEPEDA MIGUEL OCTAVIO', 14, 7, 1, 0, 0, 0, 'sucasa', '89834456', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9445518-9', 0, 0, 'TRANAMIL CONTRERAS JOSE EUSTAQUIO', 8, 2, 4, 0, 0, 0, 'sucasa', '951939545', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9459735-', 0, 0, 'RUBILAR SILVA FELIPE', 15, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9460801-5', 0, 0, 'GALLEGUILLOS CANALES LUIS ARMANDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9479071-9', 0, 0, 'DIAZ LAGOS AVELINO AURELIO', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAIPU', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9491117-6', 0, 0, 'VEGA MEDINA NELSON ENRIQUE', 2, 2, 4, 0, 0, 0, 'sucasa', '948488273', '0000-00-00', 'LA GRANJA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9492354-9', 0, 0, 'ROJAS TRONCOSO SANTIAGO SIMON', 2, 2, 4, 0, 0, 0, 'sucasa', '946534790', '0000-00-00', 'LA PINTANA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9511183-1', 0, 0, 'VALENZUELA NILO JESUS EDUARDO', 7, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9519196-', 0, 0, 'PEÑA PEÑA LUIS FELIPE', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9527979-', 0, 0, 'RAMIREZ OLIVARES JAIME BERNARDO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9551714-5', 0, 0, 'GUZMAN  ESCOBILLANA LUIS GERMAN', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9557945-0', 0, 0, 'ARROYO YAÑEZ MANUEL ANTONIO', 8, 7, 2, 0, 0, 0, 'sucasa', '94130778', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9572050-', 0, 0, 'MUÑOZ ESCOBAR MAURICIO SE', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9580530-2', 0, 0, 'VIDAL DONOSO OMAR LEONARDO', 8, 1, 4, 0, 0, 0, 'sucasa', '094865995', '0000-00-00', 'Rancagua', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9582461-7', 0, 0, 'LOPEZ FIGUEROA JOSE MIGUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '95425004', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9585251-3', 0, 0, 'MONTECINOS TORRES RENE EUSEBIO', 7, 7, 1, 0, 0, 0, 'sucasa', '92282007', '0000-00-00', 'SAN FERNANDO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9586338-8', 0, 0, 'GARCIA ZUÑIGA MANUEL', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9590631-1', 0, 0, 'VALENZUELA PARRAGUEZ JUAN IGNACIO', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9598859-8', 0, 0, 'CARREÑO QUIROZ LUIS CARLOS', 14, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'POMAIRE', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9612245-4', 0, 0, 'FANTINI VERGARA HECTOR', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9617145-5', 0, 0, 'ARREY FLORES VICTOR HUGO', 2, 2, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9627554-4', 0, 0, 'QUINTANILLA BUSTOS ALFREDO', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9638583-', 0, 0, 'DURAN LOPEZ JORGE ALEJANDRO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9654365-4', 0, 0, 'TRONCOSO DIAZ MARCELO', 1, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9655039-1', 0, 0, 'MUÑOZ MORALES LUIS ARMANDO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9659741-', 0, 0, 'TOLEDO BUENO LUIS ALBERTO', 14, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9678819-3', 0, 0, 'JARA PARRA GINES JOSE', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9682785-', 0, 0, 'VERGARA CUEVAS SERGIO HERMINO', 8, 4, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9689110-5', 0, 0, 'ALVAREZ CASTAÑEDA RICARDO NOBEL', 1, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SAN ANTONIO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9696473-0', 0, 0, 'GONZALEZ PADILLA MIRIAN MAGDALENA', 5, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9700549-4', 0, 0, 'GARCIA RAMOS FANNY LORETO', 1, 4, 1, 0, 0, 0, 'sucasa', '08-9817739', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9717503-9', 0, 0, 'LAZO GOMEZ GREGORIO RICHARD', 8, 7, 3, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9727424-K', 0, 0, 'MONSALVE MORENO MANUEL JESUS', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9733789-', 0, 0, 'ROJAS SALAS PABLO', 8, 4, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9752233-', 0, 0, 'LIZANA CHAPA JORGE FERNANDO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9753450-0', 0, 0, 'SOTO FUENTEALBA JUAN ANTONIO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9756699-2', 0, 0, 'AVELLO ASTETE SERGIO SEBASTIAN', 7, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9759314-0', 0, 0, 'VILOS GONZALEZ LUIS GONZALO', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9763050-K', 0, 0, 'TAPIA TAPIA FRANCISCO JAVIER', 2, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'ILLAPEL', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9764664-3', 0, 0, 'HUAIQUIO SAN MARTIN JUAN RAFAEL', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9769612-8', 0, 0, 'BARRERA BARRAZA RENE ALBERTO', 8, 7, 4, 0, 0, 0, 'sucasa', '90093065', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9791366-', 0, 0, 'CONTRERAS BANDA RICARDO ANTONIO', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9800440-8', 0, 0, 'CASTRO MORALES ROBERTO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'PUENTE ALTO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9805862-1', 0, 0, 'INZUNZA OVIEDO CARLOS EDUARDO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9806496-6', 0, 0, 'GATICA VARGAS RICARDO ANTONIO', 8, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9808313-8', 0, 0, 'AVILES TRIGO ALEJANDRO ANDRES', 8, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9823513-2', 0, 0, 'MUÑOZ MUÑOZ SERGIO HERNAN', 7, 7, 1, 0, 0, 0, 'sucasa', '89870828', '0000-00-00', 'CHIMBARONGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9827666-1', 0, 0, 'MENA OSSES SERGIO EDUARDO', 7, 3, 2, 0, 0, 0, 'sucasa', '08-9598082', '0000-00-00', 'MACHALI', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9864385-0', 0, 0, 'NAVARRO VILLARREOL CARLOS JOHNNY', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9888201-', 0, 0, 'GONZALEZ ALCANTARA JORGE', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9897335-4', 0, 0, 'SOLAR SILVA NELSON EDMUNDO', 8, 7, 4, 0, 0, 0, 'sucasa', '994171549', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9898957-9', 0, 0, 'SANHUEZA FIGUEROA JORGE AUDILIO', 8, 7, 1, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MAIPU', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9913305-8', 0, 0, 'MARTINEZ GONZALEZ MARCO ANTONIO', 2, 2, 1, 0, 0, 0, 'sucasa', '79430688', '0000-00-00', 'RANCAGAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9921483-k', 0, 0, 'PINCHULEF RAMIREZ ERWIN ROLANDO', 2, 2, 4, 0, 0, 0, 'sucasa', '53440406', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9924519-0', 0, 0, 'CAMPOS FUENTES ESTEBAN JERONIMO', 8, 3, 2, 0, 0, 0, 'sucasa', '09-74570431', '0000-00-00', 'RANCAGUA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9928965-', 0, 0, 'GUERRERO ALVARES ABRAHAN', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9929747-6', 0, 0, 'GAJARDO SALAZAR HECTOR PATRICIO', 2, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9942711-', 0, 0, 'CARRASCO CACERES JOSE ERNESTO', 7, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9945072-K', 0, 0, 'SANCHEZ PICHILEF JUAN EDUARDO', 2, 2, 4, 0, 0, 0, 'sucasa', '978107789', '0000-00-00', 'SANTIAGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9947311-8', 0, 0, 'MORALES NUÑEZ JILBERTO HERNAN', 2, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9947754-7', 0, 0, 'TEJEDA AVILA JUAN POLINARDO', 8, 7, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'TALCA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9953201-', 0, 0, 'BESOAIN NAVARRO NELSON AN', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9956369-9', 0, 0, 'CATALAN ROMO HECTOR NELSON', 15, 7, 4, 0, 0, 0, 'sucasa', '092558572', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9960627-4', 0, 0, 'CANIU SILVA JUAN CARLOS', 2, 7, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', 'SANTIAGO', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9962949-5', 0, 0, 'LEIVA NILO PATRICIO EDUARDO', 2, 8, 7, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9977717-', 0, 0, 'CORTES GONZALEZ MARCO MAN', 8, 8, 0, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9977976-4', 0, 0, 'ABARCA ABARCA DANIEL ENRIQUE', 2, 7, 7, 0, 0, 0, 'sucasa', '87199316', '0000-00-00', 'SANTIGO', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9987632-8', 0, 0, 'PIZARRO PARRAGUEZ LUIS HUMBERTO', 7, 3, 2, 0, 0, 0, 'sucasa', '', '0000-00-00', 'NANCAGUA', '0000-00-00', 1, '0000-00-00', 0, '', 0, 1),
('9987667-', 0, 0, 'OLIVARES VERA MANUEL JESUS', 8, 1, 4, 0, 0, 0, 'sucasa', '', '0000-00-00', '', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1),
('9995147-8', 0, 0, 'MENARES SAAVEDRA MANUEL JESUS', 2, 7, 7, 0, 0, 0, 'sucasa', '', '0000-00-00', 'MELIPILLA', '0000-00-00', 2, '0000-00-00', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ges_trabajador_codigo`
--

CREATE TABLE `ges_trabajador_codigo` (
  `Rut` varchar(11) NOT NULL,
  `Codayu` int(11) DEFAULT NULL,
  `CodCond` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ges_trabajador_codigo`
--

INSERT INTO `ges_trabajador_codigo` (`Rut`, `Codayu`, `CodCond`) VALUES
('1752545-2', 49, 0),
('4173375-6', 0, 0),
('4541433-7', 0, 0),
('4596786-7', 0, 0),
('4677437-K', 0, 0),
('4823524-7', 0, 0),
('4840266-6', 0, 0),
('4914566-7', 0, 119),
('5000236-5', 0, 0),
('5031851-6', 0, 0),
('5101566-5', 0, 0),
('5150278-7', 0, 209),
('5211684-8', 0, 0),
('5275394-5', 0, 0),
('5347733-K', 0, 706),
('5417485-3', 0, 0),
('5520845-K', 0, 1),
('5533196-0', 0, 0),
('5696324-3', 0, 440),
('5764819-8', 0, 0),
('5787447-3', 0, 718),
('5839082-8', 0, 0),
('5849429-1', 0, 933),
('5883027-5', 8035, 0),
('5905779-0', 0, 0),
('5911783-1', 0, 0),
('5924003-K', 0, 672),
('5948125-8', 0, 405),
('6018437-2', 0, 730),
('6025327-7', 0, 0),
('6030292-8', 0, 0),
('6088164-2', 0, 945),
('6116618-1', 0, 0),
('6145988-K', 0, 0),
('6172700-0', 5035, 0),
('6238438-7', 0, 0),
('6306751-2', 0, 0),
('6334052-9', 0, 0),
('6344424-3', 0, 0),
('6410102-1', 0, 358),
('6480823-0', 8011, 0),
('6512528-5', 0, 113),
('6518786-8', 0, 352),
('6534289-8', 0, 0),
('6537690-3', 0, 269),
('6567627-3', 0, 0),
('6596943-2', 0, 0),
('6618112-K', 0, 0),
('6642508-8', 0, 0),
('6651381-5', 0, 0),
('6655449-K', 0, 15),
('6656359-6', 0, 428),
('6684613-K', 1202, 0),
('6693437-3', 6506, 0),
('6758661-1', 0, 208),
('6792699-4', 5024, 0),
('6817688-3', 0, 0),
('6833412-8', 0, 0),
('6844042-4', 0, 0),
('6877156-0', 0, 0),
('6951709-9', 0, 0),
('7047102-7', 6076, 0),
('7071098-6', 353, 0),
('7090024-6', 0, 0),
('7093085-4', 0, 0),
('7107257-6', 0, 0),
('7140870-1', 0, 674),
('7168859-3', 5069, 0),
('7181729-6', 0, 0),
('7186047-7', 0, 0),
('7188295-0', 6100, 0),
('7206052-0', 6245, 0),
('7223565-7', 0, 0),
('7248636-6', 0, 0),
('7257060-K', 0, 837),
('7278215-1', 0, 772),
('7320109-8', 0, 206),
('7354539-0', 0, 0),
('7359374-3', 0, 788),
('7361208-K', 0, 0),
('7374444-K', 0, 222),
('7394514-3', 308, 0),
('7401801-7', 5005, 0),
('7409759-6', 0, 816),
('7425739-9', 0, 868),
('7433955-7', 0, 663),
('7447862-K', 0, 719),
('7454538-6', 2004, 0),
('7464255-1', 0, 0),
('7469617-1', 0, 0),
('7491009-2', 0, 710),
('7498150-K', 0, 0),
('7513365-0', 0, 0),
('7559444-5', 0, 781),
('7565518-5', 5033, 0),
('7591144-0', 0, 361),
('7592122-5', 0, 0),
('7592282-5', 0, 0),
('7617514-4', 0, 813),
('7619006-2', 8005, 0),
('7627035-k', 6527, 0),
('7636289-0', 0, 0),
('7649912-8', 6026, 0),
('7660500-9', 0, 0),
('7665876-5', 2010, 0),
('7668823-0', 5043, 0),
('7693521-1', 1436, 0),
('7710662-6', 0, 0),
('7722451-3', 0, 0),
('7744156-5', 0, 10),
('7760165-1', 0, 359),
('7762046-K', 118, 0),
('7809666-7', 0, 219),
('7810182-2', 1421, 0),
('7846289-2', 0, 0),
('7853432-k', 2197, 0),
('7856796-1', 0, 0),
('7859712-7', 0, 0),
('7873669-0', 0, 0),
('7886686-1', 0, 921),
('7902165-2', 0, 0),
('7909019-0', 0, 0),
('7929417-9', 6544, 0),
('7938541-7', 8023, 0),
('7938811-4', 0, 633),
('7941427-1', 0, 0),
('7976462-0', 0, 0),
('7990726-K', 5030, 0),
('7993036-9', 0, 0),
('7993236-1', 0, 0),
('8036351-6', 0, 702),
('8048132-2', 6526, 0),
('8064986-K', 2008, 0),
('8102006-K', 0, 0),
('8103343-9', 0, 0),
('8107740-1', 0, 0),
('8108504-8', 0, 0),
('8122838-8', 0, 922),
('8123325-K', 0, 425),
('8124119-8', 0, 0),
('8146945-8', 0, 0),
('8178358-6', 0, 707),
('8193009-0', 0, 0),
('8218850-9', 0, 0),
('8223136-6', 7079, 0),
('8233012-7', 114, 0),
('8237323-3', 0, 0),
('8245367-9', 1900, 0),
('8264698-1', 0, 0),
('8265668-5', 0, 0),
('8276288-4', 0, 0),
('8303947-7', 0, 0),
('8305192-2', 1510, 0),
('8308747-1', 0, 0),
('8309562-8', 0, 830),
('8331713-2', 340, 0),
('8339235-5', 0, 449),
('8373872-3', 0, 729),
('8374973-3', 0, 11),
('8380708-3', 1986, 0),
('8382572-3', 205, 0),
('8384624-0', 0, 0),
('8400372-7', 0, 925),
('8401364-1', 1419, 0),
('8423655-1', 5003, 0),
('8431754-3', 0, 422),
('8461742-3', 0, 829),
('8474490-5', 6524, 0),
('8475010-7', 0, 0),
('8482661-8', 0, 365),
('8508809-2', 0, 217),
('8548605-5', 0, 655),
('8573172-6', 0, 0),
('8581180-0', 0, 0),
('8610748-1', 6108, 0),
('8614263-5', 0, 0),
('8623473-4', 0, 0),
('8656969-8', 0, 0),
('8680905-2', 0, 855),
('8702676-0', 0, 0),
('8703503-4', 2024, 0),
('8722409-0', 0, 0),
('8742031-0', 0, 723),
('8753733-1', 0, 0),
('8759699-0', 3004, 0),
('8762830-2', 0, 0),
('8763335-7', 0, 260),
('8764370-0', 5026, 0),
('8777718-9', 0, 0),
('8784403-K', 19, 0),
('8785506-6', 0, 31),
('8792378-9', 0, 226),
('8813150-9', 0, 0),
('8815308-1', 8019, 0),
('8822486-8', 0, 931),
('8826997-7', 0, 12),
('8827919-0', 0, 0),
('8842096-9', 0, 0),
('8848322-7', 0, 0),
('8859142-9', 6009, 0),
('8870371-5', 5025, 0),
('8876628-8', 0, 0),
('8879712-4', 0, 0),
('8880839-8', 5013, 0),
('8891222-5', 0, 0),
('8894483-6', 0, 0),
('8899434-5', 0, 0),
('8899489-2', 0, 773),
('8925697-6', 7082, 32),
('8932760-1', 335, 0),
('8947605-4', 2014, 0),
('8955621-k', 0, 929),
('8962637-4', 6509, 0),
('8970986-5', 8010, 0),
('8972831-2', 0, 0),
('8976364-9', 0, 436),
('8982729-9', 0, 0),
('8996143-2', 0, 214),
('9004311-0', 0, 40),
('9007429-6', 0, 0),
('9016968-8', 0, 0),
('9023142-1', 0, 0),
('9024474-4', 0, 0),
('9025208-9', 5031, 0),
('9027242-K', 0, 0),
('9035383-7', 0, 712),
('9043623-6', 5029, 0),
('9069833-8', 0, 870),
('9077429-8', 0, 491),
('9081421-4', 5086, 0),
('9094834-2', 0, 646),
('9095675-2', 0, 0),
('9118946-1', 1408, 0),
('9146957-K', 0, 0),
('9158906-0', 0, 486),
('9191535-9', 7093, 0),
('9192164-2', 708, 0),
('9219945-2', 468, 0),
('9227739-9', 0, 0),
('9231748-K', 0, 416),
('9233168-7', 0, 0),
('9233806-1', 5038, 0),
('9233857-6', 0, 244),
('9236005-9', 0, 0),
('9237453-k', 269, 0),
('9237954-K', 905, 0),
('9242835-4', 0, 603),
('9252439-6', 0, 485),
('9255373-6', 5061, 284),
('9258520-4', 462, 0),
('9262029-8', 5079, 0),
('9264251-8', 5122, 0),
('9274492-2', 0, 0),
('9277726-K', 5128, 0),
('9280219-1', 1515, 0),
('9287996-8', 0, 0),
('9307999-k', 0, 0),
('9321074-3', 0, 0),
('9322256-3', 0, 356),
('9324959-3', 5051, 0),
('9327675-2', 147, 0),
('9330606-6', 0, 0),
('9336502-K', 0, 0),
('9339702-9', 8018, 0),
('9347167-9', 0, 0),
('9392161-5', 0, 0),
('9399608-9', 8041, 0),
('9407994-2', 0, 0),
('9415909-1', 0, 0),
('9424556-7', 0, 0),
('9445518-9', 0, 888),
('9459735-8', 0, 0),
('9460801-5', 7052, 0),
('9479071-9', 0, 0),
('9491117-6', 6271, 0),
('9492354-9', 6272, 0),
('9511183-1', 0, 0),
('9519196-7', 0, 0),
('9527979-1', 0, 0),
('9551714-5', 0, 0),
('9557945-0', 0, 330),
('9572050-1', 0, 0),
('9580530-2', 0, 315),
('9582461-7', 0, 689),
('9585251-3', 0, 0),
('9586338-8', 0, 14),
('9590631-1', 2011, 0),
('9598859-8', 0, 0),
('9612245-4', 0, 6),
('9617145-5', 6116, 0),
('9627554-4', 8037, 0),
('9638583-8', 0, 0),
('9654365-4', 0, 221),
('9655039-1', 1015, 0),
('9659741-K', 0, 0),
('9678819-3', 463, 0),
('9682785-7', 0, 0),
('9689110-5', 0, 0),
('9696473-0', 0, 0),
('9700549-4', 0, 0),
('9717503-9', 0, 243),
('9727424-K', 0, 735),
('9733789-6', 0, 227),
('9752233-2', 0, 0),
('9753450-0', 0, 737),
('9756699-2', 0, 0),
('9759314-0', 0, 0),
('9763050-K', 3003, 0),
('9764664-3', 0, 673),
('9769612-8', 0, 36),
('9791366-8', 0, 0),
('9800440-8', 0, 431),
('9805862-1', 0, 16),
('9806496-6', 0, 7),
('9808313-8', 0, 0),
('9823513-2', 0, 0),
('9827666-1', 0, 0),
('9864385-0', 0, 705),
('9888201-4', 0, 0),
('9897335-4', 0, 886),
('9898957-9', 0, 613),
('9913305-8', 62, 0),
('9921483-k', 6248, 0),
('9924519-0', 0, 752),
('9928965-1', 0, 0),
('9929747-6', 5077, 0),
('9942711-6', 0, 0),
('9945072-K', 1462, 0),
('9947311-8', 0, 0),
('9947754-7', 0, 0),
('9953201-7', 0, 0),
('9956369-9', 0, 0),
('9960627-4', 7020, 0),
('9962949-5', 902, 0),
('9977717-6', 0, 0),
('9977976-4', 6078, 0),
('9987632-8', 0, 0),
('9987667-0', 0, 709),
('9995147-8', 8025, 0),
('10002787-9', 203, 0),
('10004289-4', 304, 0),
('10006662-9', 2012, 0),
('10007320-K', 0, 0),
('10011490-9', 0, 0),
('10013685-6', 0, 0),
('10018850-3', 8092, 0),
('10022577-8', 0, 0),
('10028178-3', 256, 0),
('10028234-8', 0, 722),
('10041854-1', 5032, 0),
('10043154-8', 0, 0),
('10054464-4', 0, 0),
('10056903-5', 0, 407),
('10066780-0', 0, 126),
('10072356-5', 0, 0),
('10074092-3', 0, 624),
('10076891-7', 0, 220),
('10082679-8', 0, 0),
('10084641-1', 0, 283),
('10089269-3', 0, 0),
('10092600-8', 0, 623),
('10094956-3', 0, 0),
('10110755-8', 0, 0),
('10116869-7', 0, 0),
('10125058-K', 6125, 0),
('10139651-7', 328, 0),
('10149988-K', 0, 0),
('10157185-8', 0, 0),
('10159144-1', 458, 0),
('10168323-0', 5027, 0),
('10176434-6', 0, 0),
('10200577-5', 0, 111),
('10207389-4', 0, 0),
('10207848-9', 0, 648),
('10207912-4', 6512, 0),
('10210556-7', 0, 0),
('10243293-2', 0, 355),
('10258777-4', 0, 0),
('10260306-0', 0, 0),
('10267029-9', 0, 0),
('10267277-1', 0, 0),
('10269597-6', 297, 0),
('10270028-7', 0, 740),
('10277221-0', 0, 357),
('10281658-7', 0, 0),
('10286672-K', 0, 0),
('10288840-5', 0, 0),
('10290140-1', 7016, 0),
('10329773-7', 0, 803),
('10342331-7', 0, 435),
('10348139-2', 5, 0),
('10349329-3', 0, 0),
('10361883-5', 0, 0),
('10383258-6', 6518, 0),
('10384908-K', 0, 0),
('10389636-3', 0, 0),
('10391976-2', 0, 351),
('10407198-8', 0, 421),
('10408085-5', 0, 699),
('10423355-4', 0, 0),
('10471292-4', 0, 0),
('10478149-7', 2048, 843),
('10479288-K', 5058, 0),
('10481382-8', 0, 818),
('10483293-8', 0, 207),
('10486843-6', 0, 271),
('10498795-8', 0, 0),
('10512136-9', 5001, 0),
('10514476-8', 0, 371),
('10515549-2', 0, 671),
('10517837-9', 0, 0),
('10520215-6', 0, 0),
('10537242-6', 7005, 0),
('10538235-9', 5010, 0),
('10541140-5', 8077, 0),
('10550252-4', 5057, 0),
('10552292-4', 0, 0),
('10559407-0', 0, 0),
('10559700-2', 0, 0),
('10563563-K', 6118, 0),
('10566408-7', 7011, 0),
('10567137-7', 0, 0),
('10571940-K', 0, 0),
('10577176-2', 6503, 0),
('10582482-3', 0, 0),
('10593342-8', 6215, 0),
('10594595-7', 76, 0),
('10598104-K', 0, 0),
('10600109-K', 0, 0),
('10604205-5', 0, 0),
('10606864-K', 309, 0),
('10607577-8', 0, 453),
('10609416-0', 1444, 0),
('10620283-4', 0, 0),
('10627615-3', 0, 0),
('10631050-5', 400, 0),
('10631640-6', 6501, 0),
('10636577-6', 5040, 0),
('10637230-6', 2070, 0),
('10638054-6', 113, 0),
('10640395-3', 0, 250),
('10640598-0', 0, 653),
('10658195-9', 0, 919),
('10658947-K', 0, 281),
('10671973-K', 0, 0),
('10681822-3', 0, 0),
('10698493-K', 1800, 0),
('10709403-2', 6212, 0),
('10714046-8', 6138, 0),
('10715093-5', 0, 0),
('10716199-6', 0, 0),
('10728108-8', 0, 0),
('10736445-5', 5218, 0),
('10737037-4', 305, 0),
('10739558-K', 0, 0),
('10752629-3', 0, 0),
('10755533-1', 0, 785),
('10758837-K', 1509, 0),
('10759497-3', 1917, 0),
('10764614-0', 0, 817),
('10765781-9', 2178, 0),
('10770946-0', 0, 0),
('10776614-6', 0, 490),
('10783062-6', 0, 0),
('10787281-7', 0, 0),
('10791841-8', 5071, 0),
('10794824-4', 0, 488),
('10808645-9', 0, 863),
('10815954-5', 7038, 0),
('10825017-8', 0, 481),
('10828459-5', 0, 676),
('10831459-1', 471, 0),
('10832458-9', 0, 268),
('10833073-2', 7067, 0),
('10834637-K', 1400, 0),
('10841885-0', 0, 0),
('10850053-0', 0, 0),
('10851617-8', 712, 0),
('10858119-0', 450, 0),
('10876540-2', 5166, 0),
('10880585-4', 7004, 0),
('10895442-6', 2156, 0),
('10898632-8', 0, 0),
('10898658-1', 0, 0),
('10899109-7', 0, 0),
('10907771-2', 0, 0),
('10908003-9', 0, 0),
('10911279-8', 0, 634),
('10915092-4', 1467, 0),
('10932373-k', 6200, 0),
('10932552-K', 0, 261),
('10934387-0', 0, 5),
('10936265-4', 0, 0),
('10954744-1', 6115, 0),
('10957054-0', 0, 0),
('10957849-5', 0, 275),
('11071351-7', 5004, 0),
('11112860-K', 0, 0),
('11134247-4', 0, 0),
('11142371-7', 0, 0),
('11142578-7', 0, 0),
('11142638-4', 1002, 0),
('11145367-5', 0, 776),
('11160133-K', 6523, 947),
('11165919-2', 6251, 0),
('11167213-K', 6133, 0),
('11174175-1', 5034, 0),
('11232270-1', 5174, 0),
('11239000-6', 0, 724),
('11275276-5', 0, 0),
('11275341-9', 16, 0),
('11275449-0', 208, 0),
('11275468-7', 0, 0),
('11275575-6', 0, 0),
('11278881-6', 2022, 0),
('11279510-3', 0, 0),
('11281997-5', 0, 801),
('11283717-5', 0, 0),
('11284274-8', 0, 0),
('11319282-8', 0, 0),
('11319480-4', 0, 0),
('11332856-8', 7085, 0),
('11336885-3', 0, 0),
('11364506-7', 307, 0),
('11365014-1', 0, 0),
('11365047-8', 0, 0),
('11365080-K', 0, 0),
('11365716-2', 1904, 0),
('11365722-7', 150, 0),
('11365905-K', 1926, 0),
('11366009-0', 99, 0),
('11366019-8', 101, 0),
('11367052-5', 0, 0),
('11367101-7', 0, 0),
('11367630-2', 2131, 0),
('11373568-6', 0, 298),
('11396539-8', 0, 0),
('11398067-2', 0, 0),
('11398361-2', 0, 0),
('11439812-8', 0, 715),
('11444138-4', 18, 0),
('11446660-3', 0, 0),
('11450133-6', 2066, 0),
('11457195-4', 0, 0),
('11475739-K', 0, 104),
('11486084-0', 7029, 0),
('11486336-k', 0, 445),
('11487047-1', 151, 0),
('11513128-1', 0, 0),
('11530073-3', 0, 0),
('11530437-2', 0, 842),
('11530484-4', 2016, 0),
('11530880-7', 0, 903),
('11532065-3', 7009, 0),
('11532144-7', 0, 0),
('11533838-2', 1446, 0),
('11534472-2', 78, 0),
('11534528-1', 0, 423),
('11543019-K', 6153, 0),
('11553528-5', 312, 0),
('11553531-5', 0, 0),
('11557780-8', 0, 277),
('11558089-2', 5158, 0),
('11558998-9', 0, 309),
('11564440-8', 5085, 0),
('11572697-8', 451, 0),
('11607765-5', 0, 26),
('11607899-6', 0, 448),
('11608312-4', 7061, 0),
('11615788-8', 0, 0),
('11618187-8', 7047, 0),
('11646298-2', 0, 447),
('11647692-4', 0, 0),
('11653521-1', 0, 790),
('11656167-0', 457, 0),
('11663726-K', 6128, 0),
('11666204-3', 1448, 0),
('11668441-1', 6149, 0),
('11670247-9', 0, 0),
('11670569-9', 0, 0),
('11670611-3', 1221, 739),
('11670743-8', 320, 0),
('11671046-3', 0, 0),
('11672457-K', 0, 0),
('11672536-0', 0, 0),
('11672546-0', 0, 731),
('11673142-8', 0, 0),
('11674409-0', 0, 0),
('11674844-4', 5011, 0),
('11675670-6', 0, 262),
('11675707-9', 0, 204),
('11676397-4', 0, 333),
('11676682-5', 0, 0),
('11688315-5', 0, 328),
('11696579-8', 7091, 0),
('11696662-k', 7095, 0),
('11696989-0', 0, 0),
('11697270-0', 8063, 110),
('11697886-5', 0, 23),
('11737959-0', 0, 124),
('11740888-4', 2126, 841),
('11740913-9', 0, 0),
('11743462-1', 0, 0),
('11744254-3', 0, 0),
('11744418-K', 2018, 0),
('11745523-8', 5235, 0),
('11754026-K', 0, 0),
('11756383-9', 0, 0),
('11758112-8', 0, 0),
('11758532-8', 112, 0),
('11762411-0', 0, 0),
('11763170-2', 5117, 0),
('11772203-1', 0, 340),
('11781539-0', 0, 0),
('11784374-2', 6545, 0),
('11804210-0', 0, 0),
('11804270-0', 6525, 0),
('11837571-8', 6091, 0),
('11842483-2', 0, 635),
('11848159-3', 0, 35),
('11855635-6', 0, 609),
('11869201-2', 1469, 0),
('11869510-0', 6542, 0),
('11879381-1', 469, 0),
('11880660-3', 0, 0),
('11886442-5', 0, 675),
('11887243-6', 7110, 0),
('11887814-0', 249, 834),
('11888221-0', 0, 0),
('11888375-6', 0, 0),
('11888561-9', 66, 0),
('11888835-9', 0, 0),
('11889223-2', 0, 0),
('11889394-8', 0, 0),
('11889952-0', 0, 0),
('11890518-0', 0, 0),
('11891135-0', 0, 0),
('11892417-7', 0, 360),
('11893029-0', 0, 0),
('11893037-1', 0, 337),
('11893507-1', 0, 259),
('11893694-9', 0, 0),
('11894037-7', 5053, 0),
('11894387-2', 5229, 0),
('11894542-5', 0, 312),
('11894666-9', 0, 336),
('11894763-0', 0, 246),
('11894816-5', 0, 0),
('11912452-2', 6163, 0),
('11914793-K', 0, 0),
('11918456-8', 453, 0),
('11940450-9', 0, 413),
('11946518-4', 8042, 0),
('11949119-3', 6152, 0),
('11951020-1', 0, 0),
('11951605-6', 0, 0),
('11951977-2', 2180, 806),
('11953964-1', 0, 0),
('11954058-5', 0, 0),
('11962993-4', 5169, 0),
('11971979-8', 445, 0),
('11983842-8', 0, 0),
('11988615-5', 0, 628),
('11990013-1', 0, 3),
('12010871-9', 0, 0),
('12044717-3', 2242, 0),
('12069098-1', 6249, 0),
('12073170-K', 0, 278),
('12083552-1', 0, 703),
('12090637-2', 0, 0),
('12160849-9', 1423, 0),
('12174844-4', 6516, 0),
('12178918-3', 8081, 0),
('12179083-1', 0, 123),
('12179779-6', 2252, 0),
('12205532-9', 6151, 0),
('12233077-K', 0, 0),
('12235336-2', 0, 237),
('12236381-3', 6054, 0),
('12243261-0', 6062, 0),
('12253723-4', 7021, 0),
('12253724-2', 7086, 651),
('12255904-1', 0, 0),
('12272017-9', 0, 334),
('12272969-9', 0, 891),
('12275275-5', 152, 0),
('12275954-7', 6119, 0),
('12277395-7', 6166, 0),
('12280816-5', 0, 626),
('12281849-7', 0, 484),
('12287477-k', 0, 446),
('12287488-5', 6261, 0),
('12290316-8', 159, 0),
('12290860-7', 711, 0),
('12291168-3', 0, 0),
('12291265-5', 0, 0),
('12291987-0', 91, 0),
('12292196-4', 0, 0),
('12292257-k', 0, 857),
('12292310-K', 0, 0),
('12292453-K', 0, 0),
('12293441-1', 103, 0),
('12293476-4', 1017, 0),
('12295470-6', 0, 327),
('12295492-7', 0, 310),
('12295533-8', 5049, 0),
('12296012-9', 0, 318),
('12296935-5', 0, 274),
('12297208-9', 5188, 0),
('12297341-7', 0, 319),
('12297543-6', 5045, 0),
('12297801-K', 5022, 0),
('12298216-5', 0, 0),
('12313103-7', 6514, 0),
('12330228-1', 7118, 0),
('12351087-9', 0, 621),
('12359219-0', 5019, 0),
('12365707-1', 0, 0),
('12374202-8', 0, 202),
('12374982-0', 0, 637),
('12398732-2', 3032, 0),
('12406564-K', 2101, 0),
('12411452-7', 8021, 0),
('12411950-2', 8012, 0),
('12413213-4', 0, 0),
('12416433-8', 5111, 0),
('12416729-9', 5127, 0),
('12417907-6', 0, 434),
('12418097-K', 0, 0),
('12461117-2', 6045, 0),
('12465185-9', 0, 0),
('12477698-8', 0, 694),
('12488748-8', 0, 0),
('12498419-K', 0, 782),
('12508266-1', 0, 0),
('12513079-8', 0, 661),
('12514677-5', 1505, 0),
('12514763-1', 2038, 0),
('12515065-9', 0, 0),
('12515626-6', 0, 0),
('12515669-K', 0, 0),
('12516176-6', 0, 0),
('12516182-0', 710, 0),
('12516207-K', 1903, 0),
('12516917-1', 0, 0),
('12517363-2', 191, 0),
('12518248-8', 0, 0),
('12519340-4', 0, 0),
('12520197-0', 0, 200),
('12520320-5', 5047, 252),
('12521100-3', 0, 303),
('12521138-0', 0, 0),
('12522504-7', 0, 276),
('12522914-K', 5247, 0),
('12542794-4', 0, 0),
('12548270-8', 0, 0),
('12557510-2', 6040, 0),
('12587471-1', 5060, 0),
('12587882-2', 0, 293),
('12587888-1', 0, 225),
('12588355-9', 0, 0),
('12588478-4', 0, 212),
('12589535-2', 0, 0),
('12589941-2', 0, 264),
('12589943-9', 0, 0),
('12590406-8', 8024, 0),
('12590408-4', 5236, 0),
('12594193-1', 6532, 0),
('12597865-7', 3017, 0),
('12597972-6', 3011, 0),
('12598116-k', 3019, 0),
('12598166-6', 3018, 0),
('12598244-1', 3023, 0),
('12598374-K', 3006, 0),
('12605169-7', 0, 0),
('12605796-2', 1801, 0),
('12606089-0', 0, 0),
('12609777-8', 0, 316),
('12640703-3', 0, 681),
('12663175-8', 0, 216),
('12664529-5', 0, 873),
('12671432-7', 0, 213),
('12672237-0', 6195, 0),
('12685627-K', 0, 0),
('12687865-6', 465, 0),
('12687938-5', 7001, 0),
('12689965-3', 6117, 0),
('12690320-0', 0, 0),
('12690888-1', 74, 0),
('12690975-6', 0, 0),
('12691117-3', 332, 0),
('12691153-K', 713, 0),
('12691330-3', 343, 0),
('12691489-K', 0, 0),
('12691500-4', 0, 0),
('12691803-8', 1997, 0),
('12692078-4', 300, 0),
('12692153-5', 107, 0),
('12692766-5', 116, 0),
('12692938-2', 0, 0),
('12694065-3', 1013, 0),
('12694163-3', 10, 0),
('12694732-1', 0, 0),
('12695616-9', 5007, 0),
('12707986-2', 0, 0),
('12710110-8', 5202, 0),
('12712801-4', 0, 439),
('12718439-9', 3001, 0),
('12726086-9', 6228, 687),
('12726603-4', 0, 0),
('12726643-3', 0, 0),
('12728578-0', 5176, 0),
('12735535-5', 0, 0),
('12738482-7', 2249, 0),
('12740693-6', 0, 0),
('12743147-7', 0, 0),
('12753784-4', 7006, 0),
('12773082-2', 7012, 0),
('12779689-0', 0, 0),
('12779880-K', 2047, 0),
('12779949-0', 0, 0),
('12780036-7', 2135, 0),
('12780230-0', 1937, 0),
('12780418-4', 2171, 0),
('12780629-2', 0, 0),
('12781009-5', 0, 0),
('12784836-K', 5074, 0),
('12785069-0', 0, 369),
('12787280-5', 0, 666),
('12787529-4', 0, 0),
('12787669-k', 0, 374),
('12790461-8', 0, 0),
('12790469-3', 5159, 0),
('12790757-9', 0, 0),
('12791001-4', 5036, 0),
('12791283-1', 5059, 0),
('12799706-3', 8086, 0),
('12800158-1', 0, 0),
('12800299-5', 0, 211),
('12810481-k', 8100, 0),
('12810552-2', 0, 313),
('12811516-1', 0, 622),
('12812308-3', 0, 122),
('12812788-7', 6536, 0),
('12819462-2', 7000, 0),
('12852873-3', 0, 0),
('12880928-7', 0, 656),
('12885350-2', 5150, 0),
('12901837-2', 6094, 0),
('12902771-1', 0, 420),
('12902965-K', 6533, 0),
('12903149-2', 0, 677),
('12906100-6', 7039, 0),
('12909526-1', 7106, 34),
('12911436-3', 1942, 0),
('12913163-2', 0, 0),
('12913255-8', 0, 0),
('12913767-3', 0, 0),
('12913784-3', 1506, 0),
('12914078-K', 25, 0),
('12914182-4', 1706, 0),
('12916046-2', 0, 0),
('12916153-1', 2103, 0),
('12916450-6', 0, 263),
('12916603-7', 2001, 0),
('12944403-7', 8002, 0),
('12955413-4', 0, 100),
('12959624-4', 8062, 0),
('12961604-0', 0, 0),
('12961780-2', 0, 0),
('12963403-0', 2158, 0),
('12964204-1', 5149, 0),
('12964482-6', 6520, 0),
('12991385-1', 0, 861),
('13003281-8', 0, 0),
('13003368-7', 0, 0),
('13003672-4', 2232, 0),
('13003766-6', 0, 0),
('13004310-0', 2152, 0),
('13018524-K', 0, 0),
('13031734-0', 0, 688),
('13032881-4', 0, 28),
('13041952-6', 7045, 0),
('13044006-1', 466, 0),
('13045018-0', 0, 129),
('13046028-3', 1425, 0),
('13049276-2', 0, 0),
('13054446-0', 0, 0),
('13054832-6', 0, 924),
('13065111-9', 0, 39),
('13071666-0', 0, 0),
('13073236-4', 0, 644),
('13085793-0', 0, 642),
('13086829-0', 210, 0),
('13089194-2', 0, 682),
('13092912-5', 6080, 0),
('13095602-5', 0, 831),
('13095738-2', 1911, 0),
('13095979-2', 0, 0),
('13096006-5', 222, 0),
('13096109-6', 0, 0),
('13096279-3', 0, 0),
('13096472-9', 0, 0),
('13097063-K', 11, 0),
('13097098-2', 0, 0),
('13097959-9', 0, 765),
('13097966-1', 0, 0),
('13098134-8', 0, 0),
('13098635-8', 1804, 0),
('13098964-0', 27, 0),
('13100940-2', 0, 0),
('13100949-6', 0, 291),
('13101584-4', 0, 325),
('13122297-1', 322, 0),
('13125838-0', 0, 0),
('13137963-3', 121, 0),
('13140212-0', 0, 0),
('13141824-8', 5173, 0),
('13142571-6', 7127, 0),
('13147209-9', 0, 4),
('13149578-1', 0, 860),
('13164314-4', 5124, 0),
('13181095-4', 0, 400),
('13183196-K', 0, 108),
('13197405-1', 0, 0),
('13199983-6', 6112, 0),
('13200685-7', 0, 0),
('13200829-9', 2194, 0),
('13200864-7', 0, 899),
('13201066-8', 0, 0),
('13201518-k', 2062, 0),
('13201605-4', 2166, 0),
('13201700-K', 2034, 0),
('13202180-5', 2208, 0),
('13205291-3', 5020, 251),
('13205292-1', 5021, 0),
('13231258-3', 0, 0),
('13236467-2', 0, 640),
('13237725-1', 0, 427),
('13244904-K', 6500, 0),
('13255119-7', 0, 437),
('13260823-7', 0, 0),
('13263333-9', 0, 604),
('13275445-4', 344, 0),
('13281623-9', 0, 680),
('13281893-2', 0, 215),
('13282054-6', 0, 683),
('13291687-k', 6502, 0),
('13294218-8', 0, 643),
('13294796-1', 0, 450),
('13296187-5', 0, 665),
('13296392-4', 0, 641),
('13299790-K', 0, 0),
('13299877-9', 0, 711),
('13300164-6', 0, 858),
('13300565-K', 160, 0),
('13300737-7', 264, 0),
('13300883-7', 164, 0),
('13300887-7', 61, 0),
('13301216-8', 1005, 0),
('13301388-1', 35, 0),
('13301579-5', 0, 0),
('13301653-8', 0, 605),
('13302347-K', 200, 0),
('13303130-5', 0, 0),
('13303342-4', 0, 904),
('13304565-1', 5113, 0),
('13304947-9', 0, 0),
('13319407-K', 0, 0),
('13331080-0', 0, 693),
('13336029-8', 126, 0),
('13337166-4', 0, 662),
('13337276-8', 0, 0),
('13340045-1', 7076, 18),
('13340894-0', 8105, 0),
('13340987-4', 7100, 33),
('13340988-2', 7097, 0),
('13341057-0', 7102, 0),
('13342939-5', 0, 0),
('13343263-9', 0, 0),
('13344441-6', 0, 0),
('13344608-7', 8045, 865),
('13345644-9', 0, 0),
('13345714-3', 257, 0),
('13346410-7', 0, 0),
('13346669-K', 0, 795),
('13346959-1', 2186, 0),
('13347284-3', 2058, 0),
('13347505-2', 0, 0),
('13347617-2', 2056, 0),
('13347684-9', 0, 0),
('13347792-6', 0, 0),
('13347845-0', 0, 0),
('13347857-4', 2200, 0),
('13347881-7', 2230, 859),
('13348152-4', 0, 0),
('13349432-4', 0, 0),
('13352227-1', 5068, 0),
('13368246-5', 0, 29),
('13374441-K', 0, 0),
('13375579-9', 0, 489),
('13378365-2', 0, 0),
('13393389-1', 173, 0),
('13438306-2', 0, 0),
('13439793-4', 0, 376),
('13444829-6', 0, 696),
('13445354-0', 106, 0),
('13459305-9', 0, 610),
('13470544-2', 6513, 0),
('13476839-8', 0, 607),
('13479374-0', 0, 0),
('13480310-K', 6148, 0),
('13483932-5', 0, 20),
('13488352-9', 0, 629),
('13500478-2', 0, 0),
('13500500-2', 0, 875),
('13500531-2', 0, 0),
('13500594-0', 1512, 0),
('13501488-5', 0, 0),
('13502076-1', 89, 0),
('13503131-3', 0, 884),
('13504857-7', 0, 0),
('13505263-9', 0, 0),
('13506146-8', 0, 300),
('13515995-6', 0, 487),
('13520080-8', 6238, 0),
('13521646-1', 0, 240),
('13541049-7', 3005, 0),
('13556879-1', 0, 700),
('13558919-5', 8084, 0),
('13559368-0', 0, 101),
('13559786-4', 0, 0),
('13559868-2', 8055, 0),
('13561672-9', 0, 0),
('13564738-1', 0, 926),
('13565695-K', 0, 24),
('13566262-3', 6528, 0),
('13568038-9', 0, 0),
('13568484-8', 0, 0),
('13568760-K', 219, 0),
('13568789-8', 0, 744),
('13569623-4', 0, 0),
('13569699-4', 0, 0),
('13569852-0', 0, 0),
('13569915-2', 2084, 0),
('13569944-6', 0, 0),
('13570314-1', 0, 957),
('13570438-5', 2028, 0),
('13570516-0', 0, 0),
('13570527-6', 0, 0),
('13572607-9', 2129, 0),
('13575145-6', 0, 0),
('13584199-4', 6173, 0),
('13586958-9', 0, 686),
('13596938-9', 120, 0),
('13600428-K', 0, 286),
('13606025-2', 2098, 0),
('13606130-5', 0, 433),
('13611122-1', 5243, 0),
('13611251-1', 5078, 0),
('13611780-7', 0, 373),
('13612616-4', 5082, 370),
('13613168-0', 0, 0),
('13613302-0', 0, 0),
('13632034-3', 84, 0),
('13666804-8', 0, 627),
('13677445-K', 0, 0),
('13685694-4', 6537, 0),
('13685745-2', 59, 0),
('13699221-K', 0, 649),
('13701553-6', 0, 600),
('13701917-5', 0, 0),
('13704592-3', 0, 690),
('13706952-0', 6000, 0),
('13709124-0', 319, 0),
('13710007-K', 0, 618),
('13710260-9', 2163, 0),
('13716671-2', 0, 854),
('13717022-1', 6161, 0),
('13717420-0', 0, 0),
('13718292-0', 0, 0),
('13718431-1', 0, 0),
('13718514-8', 45, 0),
('13719049-4', 122, 0),
('13719783-9', 0, 0),
('13719792-8', 0, 0),
('13719889-4', 0, 0),
('13720688-9', 0, 0),
('13721809-7', 0, 232),
('13721863-1', 0, 0),
('13722433-K', 0, 0),
('13722529-8', 5014, 0),
('13722624-3', 0, 0),
('13722723-1', 5216, 0),
('13722745-2', 0, 0),
('13723092-5', 0, 0),
('13725334-8', 0, 783),
('13735713-5', 5012, 0),
('13749329-2', 3037, 0),
('13749437-K', 204, 0),
('13753865-2', 6244, 0),
('13758430-1', 0, 25),
('13759303-3', 36, 0),
('13772074-4', 0, 115),
('13773305-6', 7046, 0),
('13775475-4', 1213, 0),
('13775965-9', 0, 0),
('13776359-1', 0, 0),
('13777304-K', 86, 0),
('13779788-7', 0, 916),
('13779982-0', 2141, 0),
('13780155-8', 2065, 0),
('13780197-3', 0, 0),
('13780544-8', 2164, 0),
('13780822-6', 0, 0),
('13780949-4', 2002, 0),
('13781088-3', 2215, 0),
('13781130-8', 0, 0),
('13783562-2', 0, 902),
('13784244-0', 0, 443),
('13785835-5', 0, 0),
('13785945-9', 0, 0),
('13786506-8', 0, 0),
('13786799-0', 5009, 0),
('13787095-9', 5181, 0),
('13790534-5', 0, 205),
('13791261-9', 5062, 0),
('13819504-K', 1001, 0),
('13834592-0', 347, 0),
('13835749-K', 6183, 0),
('13837838-1', 342, 0),
('13838035-1', 0, 685),
('13838038-6', 6071, 0),
('13853793-5', 8038, 0),
('13856588-2', 0, 273),
('13856697-8', 0, 0),
('13857571-3', 0, 314),
('13857674-4', 0, 0),
('13858252-3', 0, 379),
('13859919-1', 0, 0),
('13872544-8', 5141, 0),
('13887110-K', 0, 923),
('13897214-3', 0, 608),
('13900272-5', 0, 0),
('13913479-6', 0, 0),
('13920886-2', 0, 645),
('13930495-0', 6208, 0),
('13931056-K', 352, 0),
('13931315-1', 0, 0),
('13931532-4', 5244, 0),
('13932156-1', 0, 345),
('13932859-0', 0, 0),
('13934724-2', 0, 0),
('13938110-6', 0, 442),
('13941561-2', 6129, 0),
('13944383-7', 1969, 0),
('13944805-7', 0, 0),
('13944811-1', 232, 0),
('13945061-2', 0, 0),
('13945225-9', 0, 0),
('13945254-2', 0, 0),
('13945715-3', 0, 0),
('13945946-6', 0, 0),
('13946209-2', 0, 0),
('13946242-4', 1200, 824),
('13946328-5', 285, 0),
('13946690-K', 0, 0),
('13946965-8', 1935, 0),
('13947367-1', 0, 0),
('13949645-0', 0, 0),
('13950574-3', 0, 0),
('13966191-5', 6213, 0),
('13972065-2', 0, 880),
('13977771-9', 3044, 0),
('14004353-2', 7056, 0),
('14006879-9', 7120, 0),
('14007165-K', 0, 19),
('14007518-3', 8016, 0),
('14008187-6', 8001, 0),
('14008512-K', 0, 107),
('14010501-5', 8039, 0),
('14011565-5', 0, 0),
('14011793-5', 0, 0),
('14012307-2', 0, 0),
('14012723-K', 0, 955),
('14013669-7', 2054, 0),
('14013686-7', 1007, 0),
('14014119-4', 0, 791),
('14014325-1', 500, 0),
('14015861-5', 0, 0),
('14016603-0', 5217, 0),
('14016635-9', 5132, 0),
('14017253-7', 5248, 0),
('14017795-4', 0, 231),
('14018955-3', 0, 322),
('14019859-5', 5228, 0),
('14020027-1', 5046, 0),
('14020069-7', 0, 332),
('14023522-9', 7003, 0),
('14025137-2', 6504, 0),
('14034371-4', 1410, 0),
('14034655-1', 6093, 0),
('14036265-4', 0, 691),
('14047613-7', 0, 0),
('14047893-8', 0, 0),
('14048201-3', 2030, 0),
('14048539-K', 0, 0),
('14048719-8', 5237, 0),
('14048721-K', 0, 914),
('14048751-1', 2088, 0),
('14048754-6', 0, 797),
('14048977-8', 1999, 0),
('14049116-0', 2136, 0),
('14049163-2', 2227, 0),
('14049222-1', 2053, 0),
('14050112-3', 0, 0),
('14050577-3', 2043, 0),
('14050917-5', 0, 306),
('14054003-K', 5018, 0),
('14054819-7', 0, 0),
('14054877-4', 0, 0),
('14054910-k', 0, 372),
('14056520-2', 5215, 0),
('14056836-8', 0, 367),
('14066748-k', 274, 0),
('14070302-8', 0, 0),
('14090180-6', 6141, 0),
('14093638-3', 0, 678),
('14121870-0', 0, 856),
('14124230-K', 6535, 0),
('14125321-2', 6531, 0),
('14134297-5', 1420, 0),
('14135257-1', 8028, 0),
('14139842-3', 0, 659),
('14141538-7', 1418, 0),
('14142168-9', 6519, 0),
('14142595-1', 7002, 0),
('14142772-5', 0, 451),
('14150709-5', 6066, 0),
('14156350-5', 0, 0),
('14169223-2', 6530, 0),
('14171898-3', 0, 0),
('14174007-5', 0, 654),
('14182572-0', 6124, 0),
('14186304-5', 0, 930),
('14186564-1', 0, 13),
('14186932-9', 79, 0),
('14189129-4', 0, 452),
('14189521-4', 1205, 0),
('14190681-K', 6131, 0),
('14192931-3', 6210, 0),
('14193603-4', 0, 638),
('14195080-0', 6098, 0),
('14195394-k', 6201, 0),
('14196612-K', 0, 669),
('14200123-3', 0, 0),
('14200608-1', 0, 0),
('14200619-7', 0, 0),
('14200626-k', 46, 0),
('14200632-4', 0, 0),
('14200766-5', 0, 0),
('14200847-5', 0, 0),
('14201139-5', 0, 0),
('14201259-6', 330, 0),
('14201432-7', 0, 0),
('14201464-5', 703, 0),
('14202086-6', 111, 0),
('14202840-9', 1925, 0),
('14203051-9', 0, 0),
('14203123-K', 182, 0),
('14203258-9', 254, 0),
('14203305-4', 1503, 0),
('14204176-6', 0, 727),
('14204275-4', 0, 0),
('14205652-6', 2090, 0),
('14210613-2', 0, 927),
('14213213-3', 0, 620),
('14216434-5', 0, 0),
('14230649-2', 0, 0),
('14240081-2', 0, 128),
('14245576-5', 8022, 0),
('14245965-5', 8006, 0),
('14247775-0', 0, 0),
('14247849-8', 0, 0),
('14247972-9', 0, 0),
('14248022-0', 248, 815),
('14250380-8', 0, 0),
('14255227-2', 7013, 0),
('14255401-1', 0, 438),
('14256304-5', 0, 444),
('14258699-1', 7026, 0),
('14259885-K', 6167, 0),
('14260518-K', 2019, 0),
('14260947-9', 0, 951),
('14261049-3', 0, 0),
('14261393-K', 0, 0),
('14261428-6', 2209, 0),
('14262025-1', 2005, 0),
('14264985-3', 0, 0),
('14274027-3', 0, 866),
('14285275-6', 5070, 0),
('14286483-5', 5042, 0),
('14286862-8', 5148, 0),
('14296319-1', 317, 0),
('14301005-8', 0, 0),
('14302247-1', 8032, 0),
('14302639-6', 0, 882),
('14312659-5', 0, 103),
('14313035-5', 0, 0),
('14314539-5', 0, 0),
('14317372-0', 0, 756),
('14319909-6', 0, 918),
('14324305-2', 0, 0),
('14331599-1', 7028, 0),
('14331726-9', 0, 0),
('14340485-4', 0, 37),
('14343198-3', 0, 0),
('14344347-7', 5268, 0),
('14344640-9', 0, 343),
('14345297-2', 0, 0),
('14345464-9', 0, 0),
('14350027-6', 0, 239),
('14362999-6', 448, 0),
('14363385-3', 6253, 0),
('14363853-7', 290, 0),
('14378801-6', 3002, 0),
('14379018-5', 0, 0),
('14379133-5', 0, 406),
('14379665-5', 0, 116),
('14380291-4', 0, 0),
('14380570-0', 0, 109),
('14381025-9', 0, 652),
('14381800-4', 6177, 0),
('14382190-0', 0, 0),
('14382259-1', 6229, 0),
('14383732-7', 2229, 0),
('14388363-9', 5152, 0),
('14388933-5', 5041, 0),
('14388936-K', 0, 0),
('14395895-7', 6174, 0),
('14397721-8', 0, 0),
('14397785-4', 5067, 0),
('14397910-5', 0, 0),
('14397943-1', 5081, 0),
('14398195-9', 0, 0),
('14398656-K', 0, 347),
('14399577-1', 0, 0),
('14411460-4', 303, 0),
('14424083-9', 6126, 0),
('14436841-K', 3028, 0),
('14437715-K', 6168, 0),
('14438345-1', 0, 0),
('14441123-4', 0, 0),
('14442281-3', 0, 0),
('14442896-K', 0, 0),
('14455068-4', 1414, 0),
('14462139-5', 5064, 242),
('14462268-5', 0, 0),
('14462803-9', 0, 301),
('14464516-2', 0, 350),
('14469465-1', 0, 619),
('14472095-4', 0, 612),
('14479052-9', 0, 0),
('14482541-1', 0, 0),
('14491113-K', 0, 248),
('14495665-6', 0, 0),
('14503868-5', 8014, 0),
('14509355-4', 0, 223),
('14509356-2', 0, 228),
('14509397-K', 5180, 0),
('14512739-4', 318, 0),
('14517744-8', 1437, 0),
('14520029-6', 0, 0),
('14520650-2', 0, 0),
('14522973-1', 0, 0),
('14523042-K', 0, 329),
('14525276-8', 0, 218),
('14526138-4', 0, 17),
('14526364-6', 0, 606),
('14529641-2', 0, 210),
('14529647-1', 5006, 0),
('14532015-1', 0, 0),
('14532476-9', 0, 0),
('14533269-9', 0, 0),
('14534988-5', 2044, 0),
('14535839-6', 0, 0),
('14536759-K', 0, 0),
('14537572-K', 0, 0),
('14541175-0', 0, 708),
('14545501-4', 0, 229),
('14545514-6', 0, 0),
('14546139-1', 0, 429),
('14551266-2', 1941, 0),
('14552311-7', 3030, 0),
('14559317-4', 0, 0),
('14560365-K', 0, 0),
('14562103-8', 0, 741),
('14567930-3', 0, 0),
('14570089-2', 6154, 0),
('14571145-2', 0, 0),
('14571762-0', 0, 0),
('14575476-3', 0, 650),
('14575496-8', 6160, 432),
('14579157-K', 0, 0),
('14581830-3', 0, 245),
('14592714-5', 0, 0),
('14593977-1', 0, 0),
('14596714-7', 0, 0),
('14605123-5', 7050, 0),
('14617190-7', 5015, 0),
('14619105-3', 6155, 0),
('14642482-1', 6143, 441),
('14659618-5', 1957, 0),
('14678784-3', 7025, 0),
('14682327-0', 0, 9),
('14750934-0', 0, 0),
('14900916-7', 5114, 0),
('14907079-6', 1101, 0),
('15014694-1', 3033, 0),
('15044788-7', 0, 0),
('15045945-1', 403, 0),
('15046009-3', 3007, 0),
('15046019-0', 0, 401),
('15061851-7', 0, 0),
('15088813-1', 8027, 0),
('15089532-4', 0, 117),
('15102890-K', 0, 0),
('15102998-1', 0, 0),
('15103565-5', 1902, 0),
('15103966-9', 0, 0),
('15104105-1', 0, 808),
('15104648-7', 0, 0),
('15104738-6', 0, 0),
('15104789-0', 181, 0),
('15105281-9', 1301, 0),
('15107233-K', 1923, 0),
('15114171-4', 108, 0),
('15117003-K', 2221, 867),
('15117068-4', 2251, 0),
('15117611-9', 2075, 0),
('15117893-6', 2247, 0),
('15118025-6', 2059, 0),
('15118111-2', 2240, 0),
('15118255-0', 2174, 0),
('15118318-2', 2110, 0),
('15118586-K', 2007, 0),
('15118871-0', 840, 0),
('15118941-5', 2023, 0),
('15119040-5', 2039, 0),
('15119161-4', 0, 0),
('15119218-1', 0, 0),
('15119345-5', 2182, 0),
('15120247-0', 0, 835),
('15120334-5', 2118, 0),
('15120884-3', 0, 0),
('15122434-2', 0, 0),
('15122880-1', 0, 0),
('15122988-3', 13, 0),
('15123077-6', 0, 0),
('15123227-2', 0, 0),
('15123414-3', 0, 0),
('15123511-5', 0, 0),
('15123625-1', 0, 0),
('15123784-3', 128, 0),
('15123824-6', 0, 0),
('15124011-9', 0, 0),
('15124223-5', 1916, 0),
('15124461-0', 0, 0),
('15124537-4', 0, 0),
('15124897-7', 0, 0),
('15125318-0', 0, 0),
('15125635-K', 0, 0),
('15125646-5', 0, 908),
('15125702-K', 0, 0),
('15127016-6', 0, 0),
('15127753-5', 0, 0),
('15128273-3', 0, 896),
('15130735-3', 0, 0),
('15130779-5', 0, 0),
('15130995-K', 5008, 0),
('15133868-2', 0, 0),
('15134083-0', 0, 0),
('15134092-K', 0, 354),
('15134276-0', 0, 0),
('15134448-8', 0, 279),
('15134906-4', 0, 338),
('15134996-k', 0, 317),
('15135337-1', 0, 270),
('15135450-5', 0, 0),
('15135663-k', 5262, 0),
('15136000-9', 0, 0),
('15136068-8', 0, 0),
('15137308-9', 0, 331),
('15137324-0', 0, 0),
('15138028-K', 0, 0),
('15138343-2', 0, 0),
('15138359-9', 0, 296),
('15138722-5', 0, 0),
('15139099-4', 0, 0),
('15139138-9', 5096, 0),
('15139757-3', 0, 0),
('15139764-6', 5112, 0),
('15141150-9', 5037, 0),
('15141413-3', 5100, 0),
('15142513-5', 0, 247),
('15144809-7', 0, 0),
('15147366-0', 92, 0),
('15148499-9', 6508, 0),
('15148985-0', 0, 0),
('15149159-6', 5090, 0),
('15149303-3', 0, 348),
('15149597-4', 0, 304),
('15149692-K', 0, 307),
('15150095-1', 0, 294),
('15152189-4', 0, 0),
('15153681-6', 5146, 0),
('15155095-1', 0, 0),
('15171249-5', 324, 915),
('15188662-0', 6224, 0),
('15204197-7', 6207, 0),
('15217044-0', 63, 0),
('15218000-4', 158, 0),
('15235149-6', 1020, 0),
('15235153-4', 0, 0),
('15239741-0', 0, 102),
('15245655-7', 2100, 0),
('15246793-1', 1440, 0),
('15263525-7', 268, 0),
('15281613-8', 0, 0),
('15282645-1', 0, 614),
('15313975-k', 0, 906),
('15332354-2', 1427, 0),
('15334269-5', 0, 127),
('15344879-5', 6522, 0),
('15356904-5', 360, 0),
('15378192-3', 1994, 0),
('15387044-6', 5231, 0),
('15387535-9', 6206, 0),
('15387997-4', 341, 0),
('15390934-2', 6058, 0),
('15393245-K', 8044, 120),
('15397142-0', 1466, 0),
('15397235-4', 6205, 0),
('15400440-8', 7115, 0),
('15405649-1', 8003, 0),
('15406211-4', 0, 118),
('15416383-2', 1453, 0),
('15417585-7', 7048, 0),
('15421960-9', 0, 766),
('15425927-9', 6085, 0),
('15433140-9', 7031, 0),
('15439379-K', 1460, 0),
('15440220-9', 0, 658),
('15440492-9', 0, 0),
('15441624-2', 2115, 0),
('15448425-6', 6204, 0),
('15451472-4', 0, 30),
('15452579-3', 0, 632),
('15455877-2', 6127, 0),
('15462943-2', 6104, 0),
('15463528-9', 1452, 0),
('15465976-5', 1208, 0),
('15467714-3', 6069, 0),
('15469874-4', 0, 378),
('15473992-0', 5199, 0),
('15475366-4', 6546, 0),
('15480371-8', 0, 928),
('15482919-9', 6048, 0),
('15492549-K', 6182, 430),
('15504083-1', 1952, 0),
('15504359-8', 8082, 0),
('15509573-3', 0, 639),
('15522669-2', 0, 0),
('15523226-9', 97, 0),
('15523257-9', 1225, 0),
('15523464-4', 0, 825),
('15523477-6', 0, 0),
('15523768-6', 7088, 0),
('15523855-0', 0, 0),
('15523888-7', 183, 0),
('15524798-3', 1944, 0),
('15524996-K', 0, 280),
('15525060-7', 163, 0),
('15525161-1', 131, 0),
('15525675-3', 0, 0),
('15533889-K', 8069, 0),
('15535010-5', 1463, 0),
('15535374-0', 0, 8),
('15538171-K', 6189, 0),
('15541359-K', 6041, 0),
('15543629-8', 464, 0),
('15544442-8', 119, 0),
('15547025-9', 2233, 0),
('15562078-1', 0, 0),
('15564795-7', 0, 660),
('15568187-K', 5108, 0),
('15568346-5', 5091, 0),
('15568516-6', 5084, 0),
('15583325-4', 6156, 0),
('15584401-9', 6529, 0),
('15585089-2', 6084, 0),
('15585672-6', 0, 0),
('15588808-3', 0, 326),
('15589153-K', 6521, 0),
('15596464-2', 5028, 265),
('15597878-3', 0, 363),
('15598276-4', 0, 368),
('15598687-5', 5168, 0),
('15598763-4', 0, 0),
('15599260-3', 0, 728),
('15599567-K', 5137, 0),
('15606720-2', 0, 0),
('15606987-6', 0, 625),
('15607980-4', 1465, 0),
('15609313-0', 7022, 0),
('15615221-8', 5063, 0),
('15618160-9', 6256, 0),
('15619902-8', 0, 616),
('15620967-8', 7078, 0),
('15622866-4', 6193, 0),
('15623815-5', 8043, 0),
('15623911-9', 7070, 0),
('15624565-8', 6188, 0),
('15627535-2', 6146, 0),
('15631216-9', 0, 796),
('15631276-2', 5131, 0),
('15631389-0', 0, 0),
('15631906-6', 1717, 0),
('15632045-5', 1445, 0),
('15632052-8', 5738, 0),
('15632160-5', 5234, 0),
('15632401-9', 0, 774),
('15651222-2', 6043, 0),
('15659527-6', 5105, 0),
('15663699-1', 8033, 0),
('15666316-6', 0, 302),
('15667897-K', 0, 793),
('15668346-9', 6010, 0),
('15672557-9', 5056, 0),
('15682381-3', 7036, 0),
('15692810-0', 0, 417),
('15697633-4', 2095, 853),
('15697638-5', 2051, 872),
('15697808-6', 2210, 0),
('15698191-5', 2231, 0),
('15698374-8', 0, 0),
('15698719-0', 2130, 0),
('15699044-2', 2109, 0),
('15699054-K', 0, 0),
('15699079-5', 2146, 0),
('15700271-6', 6130, 0),
('15705324-8', 148, 0),
('15705826-6', 5075, 0),
('15707746-5', 0, 0),
('15709144-1', 0, 0),
('15710560-4', 5177, 0),
('15713694-1', 8004, 0),
('15713873-1', 0, 0),
('15716986-6', 0, 771),
('15724820-0', 7128, 0),
('15730965-K', 0, 832),
('15731418-1', 0, 0),
('15731440-8', 313, 0),
('15731476-9', 211, 0),
('15733704-1', 0, 410),
('15734513-3', 5048, 0),
('15735190-7', 6230, 0),
('15737810-4', 0, 958),
('15738201-2', 276, 0),
('15738256-k', 95, 0),
('15738656-5', 331, 0),
('15738689-1', 0, 601),
('15738878-9', 0, 0),
('15739099-6', 1943, 0),
('15744029-2', 7030, 0),
('15746780-8', 7023, 0),
('15755843-9', 0, 0),
('15755898-6', 40, 0),
('15757154-0', 0, 657),
('15774396-1', 0, 308),
('15785465-8', 3012, 0),
('15785881-5', 0, 0),
('15788560-K', 0, 424),
('15791869-9', 6517, 0),
('15794271-9', 6055, 0),
('15794493-2', 7068, 0),
('15797934-5', 6534, 0),
('15803853-6', 1998, 0),
('15804367-k', 0, 799),
('15804578-8', 1963, 0),
('15804669-5', 0, 0),
('15804795-0', 0, 0),
('15804928-7', 55, 0),
('15804951-1', 0, 0),
('15805262-8', 0, 0),
('15805291-1', 0, 0),
('15805317-9', 0, 0),
('15805353-5', 0, 956),
('15805768-9', 0, 0),
('15807039-1', 0, 0),
('15807059-6', 0, 0),
('15807268-8', 0, 0),
('15807503-2', 0, 0),
('15807647-0', 701, 0),
('15807676-4', 0, 0),
('15811365-1', 0, 0),
('15811483-6', 0, 602),
('15822739-8', 6097, 0),
('15823003-8', 1431, 0),
('15823818-7', 6051, 0),
('15832014-2', 0, 0),
('15837898-1', 6006, 0),
('15839060-4', 8034, 0),
('15845058-5', 2042, 0),
('15850551-7', 5736, 0),
('15865787-2', 7055, 0),
('15866824-6', 8056, 0),
('15866861-0', 0, 0),
('15867358-4', 8009, 0),
('15872474-K', 8101, 0),
('15891226-0', 6072, 0),
('15893401-9', 117, 0),
('15893904-5', 6114, 0),
('15899210-8', 0, 946),
('15906272-4', 0, 0),
('15906366-6', 0, 0),
('15907211-8', 0, 267),
('15907292-4', 0, 0),
('15907572-9', 5135, 0),
('15907581-8', 0, 0),
('15907857-4', 0, 0),
('15915185-9', 0, 0),
('15916195-1', 2099, 0),
('15916260-5', 51, 784),
('15916586-8', 0, 0),
('15916844-1', 2105, 0),
('15916868-9', 0, 0),
('15918598-2', 6120, 0),
('15920786-2', 0, 0),
('15922381-7', 0, 0),
('15922578-K', 2133, 0),
('15925394-5', 3046, 0),
('15932653-5', 7094, 0),
('15937556-0', 0, 0),
('15948242-1', 72, 0),
('15964123-6', 0, 698),
('15976683-7', 0, 0),
('15983045-4', 0, 0),
('15983093-4', 20, 0),
('15991763-0', 0, 0),
('15992090-9', 0, 0),
('15993384-9', 0, 0),
('15993879-4', 104, 0),
('15993889-1', 0, 0),
('15993896-4', 26, 0),
('15994709-2', 85, 0),
('15994728-9', 904, 0),
('15994792-0', 0, 0),
('15994922-2', 0, 0),
('15995356-4', 0, 0),
('15995957-0', 0, 0),
('16001228-5', 0, 282),
('16001393-1', 5023, 0),
('16001469-5', 5172, 0),
('16001712-0', 0, 0),
('16002345-7', 339, 0),
('16002616-2', 0, 0),
('16002800-9', 0, 0),
('16003042-9', 0, 272),
('16003333-9', 0, 0),
('16003561-7', 0, 0),
('16003965-5', 0, 299),
('16004010-6', 0, 0),
('16004040-8', 0, 0),
('16006186-3', 0, 0),
('16015062-9', 0, 0),
('16022694-3', 8007, 0),
('16023855-0', 5190, 0),
('16028268-1', 6136, 0),
('16030128-7', 6065, 692),
('16034546-2', 0, 0),
('16043620-4', 6059, 0),
('16046618-9', 8074, 0),
('16059507-8', 0, 412),
('16059508-6', 3013, 0),
('16060007-1', 0, 409),
('16072139-1', 0, 483),
('16073792-1', 0, 0),
('16086762-0', 6169, 0),
('16087775-8', 0, 0),
('16089039-8', 6056, 0),
('16090521-2', 0, 0),
('16090862-9', 0, 290),
('16111354-9', 0, 0),
('16111561-4', 2189, 0),
('16134589-K', 0, 0),
('16135375-2', 5250, 0),
('16146400-7', 6222, 0),
('16151580-9', 6221, 0),
('16164147-2', 7014, 0),
('16164654-7', 2127, 0),
('16164849-3', 2017, 0),
('16164877-9', 2160, 0),
('16165671-2', 2045, 814),
('16165967-3', 2020, 0),
('16166135-K', 2031, 0),
('16166163-5', 2132, 0),
('16175830-2', 7087, 0),
('16175994-5', 0, 292),
('16180327-8', 0, 833),
('16185444-1', 0, 0),
('16188590-8', 2114, 0),
('16189604-7', 0, 0),
('16190510-0', 0, 0),
('16191521-1', 8110, 0),
('16198254-7', 6273, 0),
('16198397-7', 0, 0),
('16221867-0', 0, 0),
('16223159-6', 0, 792),
('16228116-K', 21, 0),
('16229791-0', 0, 0),
('16229825-9', 6063, 0),
('16239960-8', 2238, 0),
('16247292-5', 6235, 0),
('16250584-K', 1975, 0),
('16251815-1', 0, 0),
('16251854-2', 311, 0),
('16251973-5', 1023, 0),
('16252386-4', 326, 0),
('16252437-2', 37, 0),
('16252439-9', 709, 0),
('16253107-7', 0, 0),
('16253737-7', 0, 0),
('16253769-5', 1224, 0),
('16253971-K', 0, 0),
('16254242-7', 0, 0),
('16254772-0', 0, 0),
('16255008-K', 1716, 0),
('16255193-0', 157, 821),
('16255302-K', 1416, 0),
('16255316-K', 0, 0),
('16255629-0', 0, 0),
('16256300-9', 0, 0),
('16261011-2', 0, 0),
('16262261-7', 7090, 0),
('16269976-8', 0, 364),
('16270306-4', 0, 201),
('16270331-5', 0, 0),
('16270525-3', 0, 353),
('16270689-6', 5203, 0),
('16271210-1', 0, 321),
('16271326-4', 0, 288),
('16271338-8', 5102, 0),
('16271342-6', 0, 0),
('16273104-1', 0, 335),
('16273771-6', 0, 0),
('16278081-6', 6219, 0),
('16278609-1', 0, 0),
('16279430-2', 1430, 0),
('16279625-9', 0, 0),
('16281308-0', 0, 684),
('16289803-5', 5066, 0),
('16290760-3', 8000, 0),
('16291177-5', 8060, 0),
('16291577-0', 7071, 0),
('16291639-4', 7125, 0),
('16291782-K', 8068, 0),
('16291978-4', 7062, 0),
('16292132-0', 8089, 0),
('16292171-1', 0, 106),
('16292431-1', 7049, 0),
('16294264-6', 5136, 0),
('16296180-2', 6140, 0),
('16296458-5', 6057, 0),
('16296730-4', 6113, 0),
('16297448-3', 361, 0),
('16297641-9', 6257, 0),
('16298389-K', 5052, 0),
('16298823-9', 5094, 0),
('16299083-7', 0, 0),
('16309856-3', 2102, 775),
('16310098-3', 2237, 0),
('16310184-K', 0, 917),
('16310202-1', 0, 0),
('16310241-2', 0, 0),
('16310613-2', 2063, 0),
('16310893-3', 2026, 0),
('16310904-2', 0, 0),
('16311110-1', 0, 0),
('16311131-4', 2241, 0),
('16311181-0', 2243, 954),
('16313041-6', 6157, 0),
('16313996-0', 0, 408),
('16317983-0', 28, 0),
('16323063-1', 0, 0),
('16326102-2', 3035, 0),
('16335592-2', 0, 0),
('16335809-3', 5142, 0),
('16336549-9', 5121, 0),
('16337249-5', 5002, 0),
('16345453-k', 454, 0),
('16345975-2', 357, 0),
('16346140-4', 5165, 0),
('16347043-8', 470, 0),
('16375520-3', 6015, 0),
('16392946-5', 6033, 0),
('16393876-6', 7057, 0),
('16397790-7', 0, 0),
('16399442-9', 7024, 0),
('16404201-4', 8046, 0),
('16406387-9', 6511, 0),
('16407941-4', 6184, 0),
('16409104-K', 1439, 0),
('16409785-4', 0, 0),
('16409936-9', 6087, 0),
('16412015-5', 6186, 0),
('16415192-1', 7058, 0),
('16415671-0', 6019, 0),
('16418047-6', 6023, 0),
('16421705-1', 1962, 0),
('16426517-K', 0, 130),
('16433830-4', 261, 0),
('16434522-K', 0, 0),
('16441256-3', 1958, 0),
('16441573-2', 6042, 0),
('16446746-5', 0, 0),
('16451762-4', 0, 679),
('16451780-2', 250, 864),
('16453523-1', 0, 0),
('16453626-2', 5189, 0),
('16453718-8', 5039, 0),
('16453889-3', 0, 0),
('16453919-9', 5044, 0),
('16454009-K', 0, 0),
('16454080-4', 5089, 0),
('16454327-7', 0, 0),
('16454606-3', 0, 0),
('16454811-2', 5104, 0),
('16454842-2', 0, 311),
('16454917-8', 0, 0),
('16454944-5', 5160, 0),
('16455519-4', 0, 346),
('16455830-4', 0, 0),
('16456069-4', 0, 0),
('16456250-6', 0, 0),
('16456527-0', 0, 0),
('16456692-7', 0, 375),
('16465754-K', 0, 0),
('16482204-4', 7051, 0),
('16482238-9', 8108, 0),
('16491320-1', 0, 0),
('16491603-0', 0, 0),
('16491902-1', 0, 0),
('16491959-5', 0, 0),
('16492004-6', 81, 0),
('16492333-9', 0, 0),
('16492986-8', 0, 0),
('16493130-7', 0, 0),
('16493197-8', 214, 0),
('16493358-K', 0, 0),
('16493362-8', 1921, 0),
('16493377-6', 0, 0),
('16493501-9', 229, 871),
('16493965-0', 0, 0),
('16494059-4', 0, 826),
('16494362-3', 0, 0),
('16494371-2', 0, 0),
('16494628-2', 0, 0),
('16495085-9', 0, 0),
('16495156-1', 0, 827),
('16495555-9', 1403, 0),
('16495859-0', 12, 0),
('16498799-K', 0, 0),
('16501456-1', 0, 404),
('16509229-5', 8064, 0),
('16509961-3', 8088, 0),
('16510038-7', 8078, 125),
('16518644-3', 0, 38),
('16521735-7', 2183, 0),
('16521736-5', 0, 0),
('16521820-5', 0, 0),
('16521827-2', 2046, 0),
('16521865-5', 0, 0),
('16521923-6', 2060, 0),
('16522165-6', 2162, 0),
('16522182-6', 2139, 0),
('16528565-4', 0, 114),
('16528743-6', 0, 0),
('16528768-1', 44, 0),
('16533406-K', 7019, 0),
('16543602-4', 0, 668),
('16545289-5', 8026, 0),
('16555279-2', 0, 324),
('16555630-5', 5139, 0),
('16556301-8', 2025, 0),
('16558312-4', 6030, 0),
('16560942-5', 6070, 0),
('16562008-9', 223, 0),
('16568553-9', 8067, 0),
('16571022-3', 0, 0),
('16573038-0', 3042, 0),
('16576431-5', 8093, 0),
('16576471-4', 7072, 22),
('16576996-1', 7123, 0),
('16577257-1', 7112, 0),
('16577379-9', 6192, 0),
('16577767-0', 7124, 0),
('16587698-9', 1974, 0),
('16590146-0', 0, 0),
('16601965-6', 0, 0),
('16601970-2', 0, 415),
('16602468-4', 0, 419),
('16602571-0', 3029, 0),
('16602585-0', 0, 414),
('16604717-K', 6061, 0),
('16617852-5', 0, 112),
('16619854-2', 6096, 0),
('16621282-0', 1009, 881),
('16621353-3', 2140, 0),
('16621594-3', 2027, 0),
('16627790-6', 6086, 0),
('16640008-2', 5072, 0),
('16641152-1', 7033, 0),
('16645512-K', 6202, 0),
('16666414-4', 467, 0),
('16668039-5', 0, 2),
('16669622-4', 8102, 0),
('16676250-2', 6, 0),
('16679323-8', 0, 0),
('16680101-K', 0, 0),
('16680817-0', 452, 0),
('16681718-8', 6038, 0),
('16682741-8', 8083, 0),
('16682879-1', 6175, 0),
('16682945-3', 6101, 0),
('16685643-4', 7073, 0),
('16688175-7', 0, 630),
('16693308-0', 0, 909),
('16694464-3', 6060, 0),
('16695239-5', 6150, 667),
('16696308-7', 6001, 0),
('16699609-0', 2093, 0),
('16699625-2', 6049, 0),
('16713043-7', 0, 426),
('16713666-4', 0, 631),
('16716199-5', 6233, 0),
('16716729-2', 6170, 0),
('16718862-1', 6137, 0),
('16718920-2', 6007, 0),
('16723659-6', 7101, 0),
('16723868-8', 6053, 0),
('16724477-7', 6165, 0),
('16725061-0', 2176, 0),
('16725158-7', 359, 0),
('16725868-9', 0, 0),
('16727090-5', 0, 323),
('16728116-8', 7059, 0),
('16729252-6', 5209, 349),
('16729545-2', 5242, 0),
('16729715-3', 0, 341),
('16729822-2', 0, 0),
('16730038-3', 5092, 0),
('16730228-9', 5240, 0),
('16730594-6', 0, 0),
('16730684-5', 5264, 0),
('16730846-5', 5065, 0),
('16731005-2', 0, 241),
('16731317-5', 5153, 0),
('16731596-8', 5120, 0),
('16731946-7', 5076, 0),
('16737567-7', 0, 0),
('16738632-6', 6014, 0),
('16742858-4', 8030, 0),
('16750244-3', 0, 0),
('16750341-1', 0, 0),
('16751075-2', 245, 0),
('16757697-4', 8052, 0),
('16758101-3', 0, 0),
('16758244-3', 8049, 0),
('16786467-8', 7041, 0),
('16787288-3', 6541, 0),
('16787935-7', 0, 617),
('16788652-3', 6538, 0),
('16792696-7', 209, 0),
('16795830-3', 6176, 0),
('16797317-5', 1438, 0),
('16798699-4', 6135, 0),
('16816077-1', 3038, 0),
('16816820-9', 1980, 0),
('16816875-6', 275, 0),
('16825744-9', 0, 320),
('16836291-9', 5129, 0),
('16845709-K', 190, 0),
('16845881-9', 0, 0),
('16846202-6', 1711, 0),
('16846395-2', 0, 0),
('16846529-7', 0, 0),
('16846696-K', 1501, 0),
('16852768-3', 2128, 0),
('16854933-4', 0, 0),
('16856112-1', 7069, 0),
('16856415-5', 2035, 0),
('16857457-6', 5017, 0),
('16858093-2', 5016, 0),
('16858413-K', 0, 0),
('16858502-8', 5739, 0),
('16858658-2', 5133, 0),
('16858882-8', 5263, 0),
('16859414-3', 5087, 0),
('16859802-5', 5145, 0),
('16859873-4', 57, 0),
('16860137-9', 1415, 0),
('16860452-1', 2188, 0),
('16860531-5', 2145, 0),
('16860550-1', 2248, 0),
('16860555-2', 2122, 0),
('16860755-5', 0, 822),
('16860760-1', 2134, 0),
('16860935-3', 2009, 0),
('16861424-1', 6267, 0),
('16861882-4', 6269, 0),
('16867658-1', 7077, 0),
('16867684-0', 0, 823),
('16869367-2', 316, 0),
('16877141-K', 7037, 0),
('16879786-9', 0, 0),
('16880071-1', 226, 0),
('16880361-3', 1906, 0),
('16880437-7', 255, 0),
('16880631-0', 0, 780),
('16880729-5', 142, 0),
('16880792-9', 0, 0),
('16881416-K', 334, 0),
('16881919-6', 0, 0),
('16882019-4', 24, 0),
('16882397-5', 0, 0),
('16882547-1', 82, 0),
('16882906-K', 0, 0),
('16883228-1', 2205, 0),
('16883229-K', 0, 0),
('16883284-2', 0, 0),
('16883332-6', 83, 0),
('16883366-0', 4, 0),
('16883434-9', 0, 0),
('16883670-8', 0, 0),
('16883863-8', 0, 0),
('16883983-9', 0, 0),
('16884058-6', 1907, 0),
('16884547-2', 0, 0),
('16884623-1', 1405, 0),
('16885257-6', 194, 0),
('16897686-0', 8079, 0),
('16899982-8', 2015, 0),
('16901579-1', 6234, 0),
('16901662-3', 6106, 0),
('16902400-6', 6022, 0),
('16902432-4', 7032, 0),
('16902740-4', 0, 0),
('16903662-4', 0, 482),
('16910070-5', 8071, 0),
('16910272-4', 2202, 0),
('16911363-7', 6077, 0),
('16928957-3', 8075, 0),
('16930335-5', 0, 885),
('16932100-0', 7092, 0),
('16932453-0', 6008, 0),
('16932495-6', 2235, 0),
('16932899-4', 280, 0),
('16956672-0', 0, 0),
('16967094-3', 8036, 0),
('16973040-7', 2195, 0),
('16973100-4', 2124, 0),
('16973340-6', 2153, 0),
('16973406-2', 2117, 0),
('16973425-9', 2239, 0),
('16973464-k', 2222, 0),
('16973667-7', 2006, 0),
('16979305-0', 32, 0),
('16994977-8', 1929, 0),
('16998779-3', 0, 377),
('16999879-5', 2226, 0),
('17001316-6', 8029, 0),
('17001683-1', 6220, 0),
('17001790-0', 6190, 0),
('17003811-8', 7040, 0),
('17007215-4', 6268, 0),
('17010563-K', 6031, 0),
('17036558-5', 2050, 0),
('17039238-8', 5099, 0),
('17039324-4', 5115, 0),
('17039399-6', 0, 289),
('17039792-4', 0, 0),
('17039907-2', 5245, 0),
('17040201-4', 5175, 0),
('17040252-9', 5095, 0),
('17040502-1', 0, 339),
('17040631-1', 5196, 0),
('17050868-8', 8047, 0),
('17050869-6', 8048, 0),
('17052261-3', 0, 0),
('17052779-8', 473, 0),
('17054498-6', 6242, 0),
('17058072-9', 0, 0),
('17058460-0', 2161, 0),
('17058666-2', 0, 714),
('17058718-9', 0, 953),
('17058772-3', 2080, 0),
('17059075-9', 2049, 0),
('17059558-0', 0, 810),
('17059624-2', 3025, 0),
('17059710-9', 0, 0),
('17061634-0', 0, 0),
('17062813-6', 0, 0),
('17068963-1', 221, 0),
('17069411-2', 7010, 0),
('17071673-6', 1426, 0),
('17081421-5', 7081, 0),
('17081624-2', 8020, 0),
('17081704-4', 0, 105),
('17081936-5', 8059, 0),
('17091357-4', 153, 0),
('17101178-7', 298, 959),
('17104852-4', 0, 21),
('17125753-0', 0, 664),
('17126711-0', 5253, 0),
('17133717-8', 0, 0),
('17134536-7', 0, 0),
('17134540-5', 1401, 0),
('17134987-7', 0, 779),
('17134989-3', 0, 0),
('17135134-0', 0, 0),
('17135210-k', 329, 0),
('17135626-1', 0, 0),
('17136103-6', 73, 0),
('17136222-9', 0, 0),
('17136386-1', 0, 0),
('17136701-8', 287, 0),
('17137038-8', 1705, 0),
('17137040-K', 0, 0),
('17137069-8', 1905, 0),
('17137659-9', 22, 0),
('17137732-3', 52, 0),
('17138394-3', 277, 0),
('17138843-0', 0, 0),
('17139071-0', 42, 0),
('17139196-2', 0, 912),
('17139444-9', 286, 0),
('17139662-K', 2167, 0),
('17146812-4', 2165, 0),
('17147317-9', 5093, 344),
('17149980-1', 6239, 0),
('17156647-9', 0, 295),
('17164243-4', 217, 0),
('17170716-1', 0, 0),
('17171176-2', 0, 0),
('17183188-1', 1424, 0),
('17183803-7', 5088, 0),
('17183958-0', 5054, 0),
('17184789-3', 0, 0),
('17186352-K', 5154, 0),
('17186489-5', 5110, 0),
('17186822-K', 5155, 0),
('17187208-1', 5156, 0),
('17187212-K', 5179, 0),
('17187275-8', 5207, 0),
('17188775-5', 15, 0),
('17190807-8', 1458, 454),
('17207464-2', 0, 285),
('17212196-9', 0, 0),
('17212198-5', 0, 0),
('17212216-7', 0, 366),
('17212293-0', 0, 0),
('17218080-9', 8031, 0),
('17219757-4', 0, 695),
('17224749-0', 7117, 0),
('17225205-2', 1461, 0),
('17228320-9', 8099, 0),
('17228878-2', 6197, 0),
('17229141-4', 6180, 0),
('17229304-2', 6082, 0),
('17230131-2', 6252, 0),
('17232746-K', 355, 0),
('17235333-9', 0, 0),
('17242675-1', 2104, 0),
('17243960-8', 6139, 0),
('17245261-2', 6074, 0),
('17251636-k', 6214, 0),
('17252066-9', 6159, 0),
('17252477-K', 6264, 0),
('17252534-2', 0, 777),
('17258932-4', 2187, 0),
('17259344-5', 2138, 0),
('17275805-3', 0, 411),
('17275855-K', 3015, 0),
('17275973-4', 0, 418),
('17276481-9', 7017, 0),
('17276736-2', 0, 920),
('17281188-4', 446, 0),
('17283459-0', 1468, 0),
('17286040-0', 54, 0),
('17286054-0', 6099, 0),
('17299339-7', 5170, 0),
('17304477-1', 8040, 0),
('17310398-0', 0, 0),
('17310966-0', 6002, 0),
('17318462-K', 0, 0),
('17322001-4', 0, 0),
('17322866-k', 5198, 0),
('17336643-4', 6016, 0),
('17337601-4', 0, 0),
('17338947-7', 5157, 0),
('17340270-8', 77, 0),
('17359538-7', 6081, 0),
('17370472-0', 5147, 0),
('17371626-5', 0, 697);
INSERT INTO `ges_trabajador_codigo` (`Rut`, `Codayu`, `CodCond`) VALUES
('17372753-4', 224, 0),
('17380966-2', 6050, 0),
('17381743-6', 6005, 0),
('17383837-9', 0, 647),
('17390291-3', 6262, 0),
('17391381-8', 6088, 0),
('17397705-0', 7054, 0),
('17398184-8', 7083, 0),
('17398554-1', 7089, 0),
('17399000-6', 8066, 0),
('17399102-9', 0, 0),
('17399247-5', 7084, 0),
('17413797-8', 6132, 0),
('17415784-7', 0, 342),
('17427019-8', 354, 0),
('17428263-3', 6236, 0),
('17441847-0', 5138, 0),
('17449057-0', 5125, 0),
('17455906-6', 0, 0),
('17456897-9', 0, 0),
('17462157-8', 6254, 0),
('17470827-4', 2013, 0),
('17470957-2', 0, 0),
('17471069-4', 2091, 952),
('17471145-3', 2190, 0),
('17471427-4', 2089, 0),
('17471542-4', 2199, 0),
('17482403-7', 0, 0),
('17494106-8', 0, 0),
('17494457-1', 0, 0),
('17494460-1', 5185, 0),
('17494699-K', 0, 0),
('17494786-4', 0, 287),
('17494984-0', 0, 0),
('17495500-k', 5254, 0),
('17496136-0', 5101, 0),
('17496138-7', 5151, 0),
('17500381-9', 0, 0),
('17500410-6', 2108, 0),
('17500543-9', 2198, 0),
('17500550-1', 2083, 0),
('17500860-8', 2225, 0),
('17500904-3', 0, 0),
('17501030-0', 2106, 0),
('17501056-4', 2220, 0),
('17501110-2', 2204, 0),
('17501251-6', 2181, 0),
('17501564-7', 272, 0),
('17501798-4', 0, 0),
('17502180-9', 100, 0),
('17502440-9', 0, 0),
('17502646-0', 231, 0),
('17502688-6', 0, 794),
('17503534-6', 93, 0),
('17503767-5', 0, 0),
('17503881-7', 267, 0),
('17504496-5', 56, 0),
('17504752-2', 0, 0),
('17505636-K', 0, 0),
('17506355-2', 90, 0),
('17506441-9', 105, 0),
('17506987-9', 0, 0),
('17507109-1', 2000, 0),
('17507178-4', 1201, 0),
('17507229-2', 7, 0),
('17507262-4', 0, 0),
('17507653-0', 282, 0),
('17507657-3', 0, 0),
('17507926-2', 43, 0),
('17507943-2', 289, 0),
('17512373-3', 80, 0),
('17512884-0', 306, 0),
('17519995-0', 144, 0),
('17520118-1', 235, 0),
('17520186-6', 0, 901),
('17520227-7', 1961, 0),
('17520301-K', 1, 0),
('17520359-1', 0, 402),
('17521467-4', 0, 828),
('17522184-0', 38, 0),
('17522376-2', 0, 0),
('17522416-5', 29, 0),
('17522921-3', 225, 0),
('17523170-6', 110, 0),
('17523215-K', 2175, 0),
('17523821-2', 2217, 0),
('17524062-4', 202, 0),
('17524098-5', 2, 0),
('17524798-K', 0, 0),
('17525245-2', 60, 0),
('17527677-7', 31, 0),
('17544305-3', 6185, 0),
('17562929-7', 6052, 0),
('17576081-4', 6037, 0),
('17579810-2', 1450, 0),
('17593933-4', 262, 0),
('17608624-6', 1459, 0),
('17608943-1', 1428, 0),
('17610796-0', 6199, 0),
('17611387-1', 6013, 0),
('17613048-2', 0, 883),
('17620710-8', 2213, 0),
('17642861-9', 3010, 0),
('17642967-4', 3008, 0),
('17646327-9', 5126, 0),
('17646492-5', 8085, 0),
('17651747-6', 0, 0),
('17651786-7', 206, 0),
('17652318-2', 0, 0),
('17652431-6', 1989, 0),
('17663108-2', 0, 670),
('17665317-5', 6171, 0),
('17665906-8', 6103, 0),
('17667570-5', 6012, 0),
('17668349-K', 6095, 0),
('17682254-6', 7107, 0),
('17682572-3', 7065, 0),
('17682794-7', 5204, 0),
('17682917-6', 7063, 0),
('17683273-8', 7098, 0),
('17683660-1', 7080, 0),
('17683675-K', 7105, 0),
('17687026-5', 0, 0),
('17687326-4', 271, 0),
('17690716-9', 351, 0),
('17691834-9', 7113, 0),
('17705929-3', 474, 0),
('17708590-1', 5213, 0),
('17715649-3', 2144, 0),
('17729384-9', 0, 932),
('17731309-2', 7007, 0),
('17736642-0', 8107, 0),
('17736789-3', 0, 911),
('17741034-9', 6011, 0),
('17742667-9', 0, 0),
('17746298-5', 68, 0),
('17746516-k', 0, 869),
('17747291-3', 2003, 0),
('17747521-1', 2253, 0),
('17749251-5', 98, 0),
('17763890-0', 6027, 0),
('17764338-6', 459, 0),
('17766564-9', 1456, 0),
('17778977-1', 7096, 0),
('17785072-1', 6209, 0),
('17794913-2', 58, 0),
('17803508-8', 8097, 0),
('17814334-4', 8098, 0),
('17814582-7', 8080, 0),
('17815005-7', 8050, 0),
('17815523-7', 8091, 0),
('17820653-2', 5353, 0),
('17821248-6', 0, 0),
('17821264-8', 5116, 0),
('17821287-7', 5161, 0),
('17821418-7', 5212, 0),
('17821423-3', 5187, 0),
('17822001-2', 5257, 0),
('17822482-4', 5194, 0),
('17823975-9', 5144, 0),
('17824940-1', 5239, 0),
('17825028-0', 5255, 0),
('17825079-5', 5130, 0),
('17828423-1', 0, 0),
('17834030-1', 472, 0),
('17840013-4', 6162, 0),
('17840085-1', 6164, 0),
('17852218-3', 7042, 0),
('17860891-6', 6003, 0),
('17870958-5', 6025, 0),
('17873124-6', 5256, 0),
('17874152-7', 2064, 0),
('17874863-7', 0, 0),
('17875996-5', 6039, 0),
('17889261-4', 5123, 0),
('17895385-0', 5140, 0),
('17895450-4', 0, 0),
('17902979-0', 8073, 0),
('17904870-1', 6515, 0),
('17905061-7', 6032, 0),
('17905707-7', 6111, 0),
('17905990-8', 6105, 0),
('17907263-7', 1449, 0),
('17908198-9', 6144, 0),
('17914229-5', 2125, 0),
('17914230-9', 2159, 0),
('17923989-2', 6068, 0),
('17924242-7', 5134, 0),
('17927794-8', 1447, 0),
('17929516-4', 6216, 0),
('17930259-4', 2179, 0),
('17930711-1', 0, 0),
('17931154-2', 5200, 0),
('17931453-3', 5098, 0),
('17931702-8', 5197, 0),
('17932656-6', 5259, 0),
('17951643-8', 6036, 0),
('17953597-1', 0, 0),
('17953726-5', 6122, 0),
('17954178-5', 455, 0),
('17956811-K', 2120, 0),
('17966919-6', 69, 0),
('17967417-3', 288, 0),
('17968715-1', 0, 492),
('17969142-6', 0, 0),
('17981721-7', 2172, 0),
('17984738-8', 0, 704),
('17986077-5', 7099, 0),
('17986537-8', 8053, 0),
('17992169-3', 2021, 0),
('17992317-3', 2029, 0),
('17992389-0', 2142, 0),
('17992592-3', 2203, 0),
('18030150-k', 1435, 0),
('18039518-0', 0, 0),
('18039605-5', 247, 0),
('18039794-9', 0, 0),
('18040202-2', 48, 0),
('18040319-1', 908, 0),
('18040661-1', 0, 0),
('18040860-6', 253, 0),
('18041009-0', 0, 0),
('18042074-6', 127, 0),
('18042655-8', 168, 0),
('18042661-2', 284, 0),
('18043507-7', 94, 0),
('18043999-4', 263, 0),
('18044061-5', 246, 0),
('18044157-3', 34, 0),
('18044311-8', 207, 0),
('18045232-k', 2193, 0),
('18046679-7', 0, 0),
('18047061-1', 6232, 0),
('18051849-5', 6021, 0),
('18054897-1', 6067, 0),
('18055341-K', 6109, 0),
('18056456-K', 6147, 0),
('18064035-5', 6034, 0),
('18075936-0', 6121, 0),
('18083869-4', 6017, 0),
('18092688-7', 0, 0),
('18093357-3', 6218, 0),
('18095683-2', 6507, 0),
('18096386-3', 6266, 0),
('18097302-8', 6250, 0),
('18105165-5', 259, 0),
('18111892-K', 0, 0),
('18121801-0', 7103, 0),
('18128026-3', 5178, 0),
('18131953-4', 87, 0),
('18161544-3', 8106, 0),
('18161642-3', 8104, 0),
('18163055-8', 8065, 0),
('18175026-K', 5184, 0),
('18175302-1', 5097, 0),
('18176649-2', 5143, 0),
('18181603-1', 0, 0),
('18185472-3', 7109, 0),
('18189289-7', 6158, 0),
('18192173-0', 2185, 0),
('18210250-4', 0, 0),
('18214033-3', 0, 0),
('18215737-6', 23, 0),
('18219516-2', 6075, 0),
('18222290-9', 6089, 0),
('18223794-9', 6064, 0),
('18225132-1', 5050, 0),
('18225204-2', 5201, 0),
('18225618-8', 5267, 0),
('18225850-4', 5164, 0),
('18225899-7', 5238, 0),
('18225967-5', 5260, 0),
('18226495-4', 5163, 0),
('18227033-4', 5221, 0),
('18227114-4', 5191, 0),
('18228047-K', 0, 0),
('18228513-7', 5171, 0),
('18228718-0', 5223, 0),
('18229355-5', 2121, 0),
('18229360-1', 2244, 0),
('18229397-0', 2137, 0),
('18229562-0', 2116, 0),
('18229627-9', 0, 0),
('18229669-4', 2234, 0),
('18238326-0', 258, 0),
('18246173-3', 348, 0),
('18251184-6', 102, 0),
('18254379-9', 5227, 0),
('18254818-9', 3031, 0),
('18255145-7', 3014, 0),
('18260610-3', 3020, 0),
('18261086-0', 327, 0),
('18277227-5', 456, 0),
('18284878-6', 6179, 0),
('18292984-0', 8015, 121),
('18318105-7', 295, 0),
('18323624-5', 2184, 0),
('18326469-K', 7130, 0),
('18327105-9', 7126, 0),
('18333820-K', 0, 0),
('18333871-4', 2107, 0),
('18334992-9', 2207, 0),
('18335256-3', 2218, 0),
('18335298-9', 2113, 0),
('18339985-3', 6090, 0),
('18373853-4', 156, 0),
('18374510-7', 283, 0),
('18376146-3', 0, 0),
('18376221-4', 345, 0),
('18377355-0', 0, 0),
('18378105-7', 75, 0),
('18378146-4', 0, 0),
('18378466-8', 252, 0),
('18378774-8', 88, 0),
('18379210-5', 9, 0),
('18379332-2', 299, 0),
('18402952-9', 33, 0),
('18406914-8', 6225, 0),
('18409500-9', 6211, 0),
('18424466-7', 6004, 0),
('18432450-4', 6028, 0),
('18442222-0', 6110, 0),
('18444023-7', 6142, 0),
('18444261-2', 6270, 0),
('18474589-5', 5083, 0),
('18474892-4', 5167, 0),
('18475662-5', 5219, 0),
('18475999-3', 5210, 0),
('18479620-1', 6092, 0),
('18487079-7', 7060, 0),
('18487744-9', 7044, 0),
('18488025-3', 8017, 0),
('18488046-6', 7066, 0),
('18488047-4', 7074, 0),
('18488105-5', 227, 0),
('18488572-7', 0, 0),
('18489403-3', 6217, 0),
('18496449-k', 6258, 0),
('18497774-5', 1443, 0),
('18498117-3', 7035, 0),
('18498320-6', 6231, 0),
('18498771-6', 53, 0),
('18511186-5', 3021, 0),
('18513452-0', 6178, 0),
('18516055-6', 2192, 0),
('18516431-4', 2119, 0),
('18521898-8', 0, 0),
('18521960-7', 0, 0),
('18531195-3', 1451, 0),
('18531922-9', 6123, 0),
('18548063-1', 349, 0),
('18557569-1', 7064, 0),
('18558889-0', 228, 0),
('18572208-2', 5186, 0),
('18573423-4', 5193, 0),
('18574172-9', 5182, 0),
('18575548-7', 5258, 0),
('18575946-6', 5225, 0),
('18575972-5', 5251, 0),
('18580589-1', 3045, 0),
('18580938-2', 3024, 0),
('18581175-1', 3026, 0),
('18604956-K', 6198, 0),
('18605937-9', 6102, 0),
('18606129-2', 6035, 0),
('18606979-K', 6079, 0),
('18645614-9', 3, 0),
('18645669-6', 2212, 0),
('18646533-4', 233, 0),
('18646871-6', 2216, 0),
('18647346-9', 67, 0),
('18647609-3', 266, 0),
('18648746-K', 30, 0),
('18650095-4', 0, 0),
('18654016-6', 2143, 0),
('18661932-3', 6243, 0),
('18673001-1', 461, 0),
('18676575-3', 1432, 0),
('18693093-2', 5252, 0),
('18693153-K', 6107, 0),
('18694393-7', 6194, 0),
('18696205-2', 7008, 0),
('18697495-6', 6260, 0),
('18701445-K', 0, 0),
('18701686-k', 6223, 0),
('18721620-6', 0, 0),
('18721739-3', 2211, 0),
('18722578-7', 0, 0),
('18723130-2', 2246, 0),
('18740494-0', 6083, 0),
('18743509-9', 6073, 0),
('18750221-7', 358, 0),
('18750739-1', 2228, 0),
('18777093-9', 8013, 0),
('18777165-K', 8051, 0),
('18777272-9', 8008, 0),
('18777307-5', 8054, 0),
('18777323-7', 7053, 0),
('18778238-4', 8061, 0),
('18780031-5', 5214, 0),
('18780386-1', 5230, 0),
('18794944-0', 3039, 0),
('18795459-2', 7034, 0),
('18838243-6', 5233, 0),
('18876793-1', 8070, 0),
('18880674-0', 7043, 0),
('18883453-1', 1433, 0),
('18890296-0', 96, 0),
('18892763-7', 5183, 0),
('18893781-0', 5103, 0),
('18894241-5', 5224, 0),
('18894951-7', 5119, 0),
('18895107-4', 5109, 0),
('18906723-2', 1454, 0),
('18911280-7', 0, 0),
('18952670-9', 3034, 0),
('18952734-9', 3016, 0),
('18961026-2', 7075, 0),
('18988298-K', 2112, 0),
('18988792-2', 2111, 0),
('18989016-8', 2236, 0),
('18989076-1', 2123, 0),
('18989129-6', 2224, 0),
('18989670-0', 2177, 0),
('18991300-1', 6226, 0),
('19002900-K', 6134, 0),
('19006227-9', 6246, 0),
('19006228-7', 6247, 0),
('19008121-4', 5107, 0),
('19008956-8', 5737, 0),
('19016954-5', 70, 0),
('19017203-1', 265, 0),
('19017259-7', 244, 0),
('19017649-5', 65, 0),
('19017985-0', 50, 0),
('19018472-2', 273, 0),
('19018795-0', 41, 0),
('19019024-2', 236, 0),
('19020715-3', 270, 0),
('19020936-9', 17, 0),
('19021308-0', 71, 0),
('19035231-5', 6227, 0),
('19042775-7', 5246, 0),
('19043722-1', 5073, 0),
('19044282-9', 5226, 0),
('19044581-k', 5208, 0),
('19045173-9', 5269, 0),
('19060576-0', 8058, 0),
('19065313-7', 7114, 0),
('19067627-7', 7111, 0),
('19068239-0', 8087, 0),
('19070719-9', 281, 0),
('19083802-1', 64, 0),
('19085368-3', 6172, 0),
('19092350-9', 6265, 0),
('19093202-8', 346, 0),
('19105328-1', 5261, 0),
('19105570-5', 5055, 0),
('19105821-6', 5241, 0),
('19106788-6', 5249, 0),
('19115186-0', 1434, 0),
('19116635-3', 6187, 0),
('19117368-6', 1455, 0),
('19117502-6', 1457, 0),
('19117616-2', 7104, 0),
('19141806-9', 8096, 0),
('19143337-8', 8072, 0),
('19169027-3', 2191, 0),
('19171341-9', 1464, 0),
('19174791-7', 460, 0),
('19188639-9', 6237, 0),
('19199819-7', 0, 27),
('19215619-K', 5118, 0),
('19221152-2', 260, 0),
('19224978-3', 6241, 0),
('19229071-6', 6240, 0),
('19229304-9', 6196, 0),
('19230228-5', 6505, 0),
('19232658-3', 447, 0),
('19243787-3', 6181, 0),
('19255283-4', 201, 862),
('19262887-3', 47, 0),
('19264037-7', 0, 0),
('19265510-2', 8, 0),
('19291469-8', 1442, 0),
('19296071-1', 3027, 0),
('19296148-3', 3036, 0),
('19312074-1', 6145, 0),
('19314339-3', 8057, 0),
('19351713-7', 3022, 0),
('19359305-4', 0, 0),
('19360378-5', 2196, 0),
('19360459-5', 0, 0),
('19371256-8', 6263, 0),
('19386437-6', 5195, 0),
('19386557-7', 5222, 0),
('19389091-1', 5162, 0),
('19389181-0', 5211, 0),
('19403481-4', 8103, 0),
('19404524-7', 8094, 0),
('19404650-2', 8076, 0),
('19411304-8', 7108, 0),
('19412782-0', 7122, 0),
('19428444-6', 7129, 0),
('19431516-3', 6255, 0),
('19472503-5', 5192, 0),
('19473767-K', 5220, 0),
('19473782-3', 5206, 0),
('19474260-6', 5205, 0),
('19487234-8', 278, 0),
('19496607-5', 2214, 0),
('19583255-2', 6539, 0),
('19591570-9', 251, 0),
('19594072-K', 3041, 0),
('19600764-4', 2206, 0),
('19603202-9', 0, 0),
('19604338-1', 2223, 0),
('19604384-5', 2219, 0),
('19646358-5', 6543, 0),
('19651813-4', 2154, 0),
('19657680-0', 0, 0),
('19697171-8', 5232, 0),
('19749915-K', 8095, 0),
('19757153-5', 8090, 0),
('19800990-3', 449, 0),
('19803856-3', 7116, 0),
('19807509-4', 5266, 0),
('19843294-6', 356, 0),
('19850980-9', 279, 0),
('19884599-K', 7119, 0),
('19914563-0', 6203, 0),
('19926552-0', 14, 0),
('19942810-1', 3040, 0),
('19959205-k', 6510, 0),
('19973771-6', 8109, 0),
('19994473-8', 1429, 0),
('19996013-k', 2250, 0),
('19998055-6', 5562, 0),
('20008632-5', 5080, 0),
('20055779-4', 1422, 0),
('20068857-0', 5265, 0),
('20166265-6', 3043, 0),
('20310955-5', 7121, 0),
('20340624-K', 0, 615),
('21745478-6', 0, 0),
('21915201-9', 7027, 0),
('22012905-5', 6259, 0),
('22051476-5', 6044, 0),
('22261910-6', 6191, 0),
('22264033-4', 0, 0),
('22605762-5', 0, 297),
('22755452-5', 7018, 0),
('22840305-9', 0, 910),
('23063437-8', 0, 0),
('23067177-K', 7015, 0),
('23154085-7', 6047, 0),
('23313510-0', 6024, 0),
('23415536-9', 296, 0),
('23626330-4', 6020, 0),
('23785954-5', 6046, 0),
('23938037-9', 0, 0),
('24121750-7', 39, 0),
('24149706-2', 350, 0),
('24318442-8', 294, 0),
('24352148-3', 0, 0),
('24621993-1', 6540, 0),
('24717802-3', 2201, 0),
('24814914-0', 293, 0),
('25257227-9', 1441, 0),
('25289763-1', 292, 0),
('25455785-4', 291, 0),
('25588732-7', 2245, 0),
('99999999-9', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_archivos`
--

CREATE TABLE `int_archivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) CHARACTER SET latin1 NOT NULL,
  `rut_usr_up` varchar(11) NOT NULL,
  `id_dpto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(300) CHARACTER SET latin1 NOT NULL,
  `tamanio` int(10) NOT NULL,
  `tipo` varchar(150) CHARACTER SET latin1 NOT NULL,
  `id_permisos` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `carpeta_id` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `ruta` varchar(256) CHARACTER SET latin1 NOT NULL,
  `privado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_archivos`
--

INSERT INTO `int_archivos` (`id`, `nombre`, `rut_usr_up`, `id_dpto`, `fecha`, `descripcion`, `tamanio`, `tipo`, `id_permisos`, `estado`, `carpeta_id`, `ruta`, `privado`) VALUES
(6, 'jajajaj', '18521960-7', 12, '2017-04-20', '', 4966, 'image/jpeg', 0, 1, '0', 'archivos/descarga.jpeg', 0),
(7, 'usar swal.txt', '18521960-7', 5, '2017-04-20', '', 116, 'text/plain', 0, 1, '1', 'archivos/usar swal.txt', 0),
(8, 'sistcp.sql', '18521960-7', 12, '2017-04-21', '', 33126, 'application/octet-stream', 0, 1, '4', 'archivos/sistcp.sql', 0),
(9, 'funciones.php', '12010871-9', 14, '2017-04-25', '', 264, 'application/octet-stream', 0, 1, '', 'archivos/funciones.php', 0),
(10, 'funciones.php', '12010871-9', 14, '2017-04-25', '', 264, 'application/octet-stream', 0, 1, '', 'archivos/funciones.php', 0),
(11, 'funciones.php', '12010871-9', 14, '2017-04-25', '', 264, 'application/octet-stream', 0, 1, '', 'archivos/funciones.php', 0),
(12, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '', 'archivos/verificarrut.php', 0),
(13, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '4', 'archivos/verificarrut.php', 0),
(14, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '5', 'archivos/verificarrut.php', 0),
(15, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '', 'archivos/verificarrut.php', 0),
(16, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '', 'archivos/verificarrut.php', 0),
(17, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '', 'archivos/verificarrut.php', 0),
(18, 'Copia de diaria23 03 17.csv', '18521960-7', 12, '2017-04-28', '', 8832, 'application/vnd.ms-excel', 0, 1, '', 'archivos/Copia de diaria23 03 17.csv', 0),
(19, 'Copia de diaria23 03 17.csv', '18521960-7', 12, '2017-04-28', '', 8832, 'application/vnd.ms-excel', 0, 1, '', 'archivos/Copia de diaria23 03 17.csv', 0),
(20, 'Copia de diaria23 03 17.csv', '18521960-7', 12, '2017-04-28', '', 8832, 'application/vnd.ms-excel', 0, 1, '', 'archivos/Copia de diaria23 03 17.csv', 0),
(21, 'Copia de diaria23 03 17.csv', '18521960-7', 12, '2017-04-28', '', 8832, 'application/vnd.ms-excel', 0, 1, '', 'archivos/Copia de diaria23 03 17.csv', 0),
(22, 'Copia de diaria23 03 17.csv', '18521960-7', 12, '2017-04-28', '', 8832, 'application/vnd.ms-excel', 0, 1, '', 'archivos/Copia de diaria23 03 17.csv', 0),
(23, 'Copia de diaria23 03 17.csv', '18521960-7', 12, '2017-04-28', '', 8832, 'application/vnd.ms-excel', 0, 1, '', 'archivos/Copia de diaria23 03 17.csv', 0),
(24, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '', 'archivos/verificarrut.php', 0),
(25, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '', 'archivos/verificarrut.php', 0),
(26, 'verificarrut.php', '18521960-7', 12, '2017-04-28', '', 875, 'application/octet-stream', 0, 1, '', 'archivos/verificarrut.php', 0),
(27, 'funciones.php', '18521960-7', 12, '2017-04-28', '', 264, 'application/octet-stream', 0, 1, '', 'archivos/funciones.php', 0),
(28, 'funciones.php', '18521960-7', 12, '2017-04-28', '', 264, 'application/octet-stream', 0, 1, '', 'archivos/funciones.php', 0),
(29, 'funciones.php', '18521960-7', 12, '2017-04-28', '', 264, 'application/octet-stream', 0, 1, '', 'archivos/funciones.php', 0),
(30, 'settings.dat.1493212584.bad', '18521960-7', 12, '2017-04-28', '', 16396, 'application/octet-stream', 0, 1, '', 'archivos/settings.dat.1493212584.bad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_cargo`
--

CREATE TABLE `int_cargo` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_cargo`
--

INSERT INTO `int_cargo` (`Id`, `Descripcion`) VALUES
(1, 'ADMINISTRATIVO'),
(2, 'AYUDANTE'),
(3, 'AYUDANTE MECANICO'),
(4, 'AYUDANTE PATIO'),
(5, 'CAJERO'),
(6, 'CHEQUEADOR'),
(7, 'CONDUCTOR ACARREO'),
(8, 'CONDUCTOR PORTEO'),
(9, 'JEFE MANTENCION'),
(10, 'JEFE OPERACIONES'),
(11, 'MANTENCION'),
(12, 'MECANICO'),
(13, 'MOVILIZADOR'),
(14, 'NOCHERO'),
(15, 'OPERADOR DE GRUA'),
(16, 'SUPERVISOR'),
(17, 'VULCANIZADOR'),
(18, 'JEFE DEPOSITO'),
(19, 'PREVENSIONISTA DE RIESGO'),
(20, 'ENCARGADA DE CALIDAD'),
(21, 'PRE-LIQUIDADDOR'),
(22, 'AUXILIAR DE ASEO'),
(23, 'GERENTE GENERAL'),
(24, 'ASISTENTE SOCIAL'),
(25, 'CONDUCTOR R3'),
(26, 'Informatico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_carpeta`
--

CREATE TABLE `int_carpeta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) CHARACTER SET latin1 NOT NULL,
  `rut_usr` varchar(11) NOT NULL,
  `id_dpto` int(11) NOT NULL COMMENT 'compartico con'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_carpeta`
--

INSERT INTO `int_carpeta` (`id`, `nombre`, `rut_usr`, `id_dpto`) VALUES
(4, 'jklh', '18521960-7', 12),
(5, 'jajaj', '18521960-7', 14),
(6, 'aaaa', '18521960-7', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_comentarios`
--

CREATE TABLE `int_comentarios` (
  `id` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `comntario` varchar(300) CHARACTER SET latin1 NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_dpto`
--

CREATE TABLE `int_dpto` (
  `id` int(11) NOT NULL,
  `dpto` varchar(30) CHARACTER SET latin1 NOT NULL,
  `id_gncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_dpto`
--

INSERT INTO `int_dpto` (`id`, `dpto`, `id_gncia`) VALUES
(12, 'Informatica', 18),
(13, 'Social', 18),
(14, 'gerencia', 19),
(15, 'mantencion', 20),
(16, 'Cuenta corriente', 18),
(17, 'AdministraciÃ³n', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_gerencia`
--

CREATE TABLE `int_gerencia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_gerencia`
--

INSERT INTO `int_gerencia` (`id`, `nombre`) VALUES
(18, 'Gerencia Administrativa'),
(19, 'Gerencia General'),
(20, 'gerencia mantencion'),
(24, 'gogogogog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_lgn`
--

CREATE TABLE `int_lgn` (
  `rut` varchar(50) CHARACTER SET latin1 NOT NULL,
  `conpss` varchar(250) CHARACTER SET latin1 NOT NULL,
  `mail` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_lgn`
--

INSERT INTO `int_lgn` (`rut`, `conpss`, `mail`) VALUES
('13548819-4', '$2y$10$8bGWOVYSJdASrt5xI8eEceDgbSJIYZeupr.u8a1kjJcQjU92O9RAq', 'kyousef@cargopacifico.cl'),
('18521960-7', '$2y$10$sdTy8r2cAZiXMc7Xqp8TAOjj8pOFcx0NCn2ln72fizzf3crDyFGpm', 'criquelmemoreno@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_mensaje`
--

CREATE TABLE `int_mensaje` (
  `ID` int(9) UNSIGNED NOT NULL,
  `para` varchar(180) DEFAULT NULL,
  `de` varchar(180) DEFAULT NULL,
  `leido` varchar(180) DEFAULT NULL,
  `fecha` varchar(180) DEFAULT NULL,
  `asunto` varchar(180) DEFAULT NULL,
  `texto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `int_mensaje`
--

INSERT INTO `int_mensaje` (`ID`, `para`, `de`, `leido`, `fecha`, `asunto`, `texto`) VALUES
(1, 'marcofbb', 'entra-ya', 'si', '23/05/2011, 10:58 pm', 'Bienvenido al sistema', 'Hola marcofbb, bienvenido a el sistema de mensajer?a privada'),
(2, 'dedydamy', 'marcofbb', NULL, '23/05/2011, 11:04 pm', 'Probando', 'Hola como estas?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_noticias`
--

CREATE TABLE `int_noticias` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titular` varchar(150) CHARACTER SET latin1 NOT NULL,
  `ruta` varchar(150) CHARACTER SET latin1 NOT NULL,
  `noticia` varchar(500) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_noticias`
--

INSERT INTO `int_noticias` (`id`, `fecha`, `titular`, `ruta`, `noticia`) VALUES
(4, '2017-02-23', 'Â¿CuÃ¡ntos loros tricahue hay en la regiÃ³n? Las aves estÃ¡n siendo contadas', 'img_noticias/059rrc1.jpg', 'Esta iniciativa, en la provincia de Cachapoal, forma parte de un proyecto que busca enumerar las aves y estudiar su comportamiento.Diego PeÃ±aloza, encargado del Ãrea de Medicina ZoolÃ³gica, del Departamento de Manejo Animal, del Parque Safari, seÃ±alÃ³ que â€œestamos comenzando a realizar- en conjunto con CONAF- un proyecto que aborda la situaciÃ³n del loro tricahue (Cyanoliseus patagonus bloxami) en la cuenca del Cachapoal, por lo que esta alianza surge debido a que como parque tenemos un rol'),
(5, '2017-02-23', 'Version 1.0.0 sistema tcp lista!', 'img_noticias/logo.png', 'Version 1.0.0 sistema tcp lista!'),
(6, '2017-01-20', 'Â¿Por quÃ© en Venezuela es tan difÃ­cil encontrar pan?', 'img_noticias/1487771708370.jpg', '\"Antes tenÃ­a pan campesino, tortasâ€¦\", recuerda con cierta nostalgia en el humilde barrio BoquerÃ³n, en el oeste de Caracas.\r\n\r\nOfrece tambiÃ©n en su tienda cafÃ©, jugos y charcuterÃ­a. Todo para sustituir su principal producto, el pan, casi un artÃ­culo de lujo en la Venezuela actual de la crisis econÃ³mica.\r\n\r\nFredy no tiene casi pan porque, como casi todos los panaderos del paÃ­s, no dispone de harina.\r\n\r\nNo producir trigo no impide que Venezuela sea un paÃ­s de gran tradiciÃ³n panadera gra'),
(7, '2017-04-18', 'erfewr', 'img_noticias/32F.jpg', 'rewwerew'),
(8, '2017-04-07', 'wwwwwwwwwww', 'img_noticias/descarga.jpeg', 'wwwwww'),
(9, '2017-04-18', 'ayayayyay', 'img_noticias/32F.jpg', 'sdsdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_notificaciones`
--

CREATE TABLE `int_notificaciones` (
  `id` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `id_liquidacion` int(11) NOT NULL,
  `id_error` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `rut_usr` varchar(11) NOT NULL,
  `id_usr_origen` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_notificaciones`
--

INSERT INTO `int_notificaciones` (`id`, `id_archivo`, `id_liquidacion`, `id_error`, `estado`, `rut_usr`, `id_usr_origen`) VALUES
(50, 6, 0, 0, 0, '18521960-7', '18521960-7'),
(51, 0, 0, 0, 0, '18521960-7', '18521960-7'),
(52, 6, 0, 0, 0, '18521960-7', '18521960-7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_permisos`
--

CREATE TABLE `int_permisos` (
  `rut` varchar(11) NOT NULL,
  `Administrar_usuarios` int(11) NOT NULL,
  `ver_todo` int(11) NOT NULL,
  `ver_solo_gerencia` int(11) NOT NULL,
  `noticias` int(11) NOT NULL,
  `fondo_fijos` tinyint(4) NOT NULL,
  `Programacion` tinyint(4) NOT NULL,
  `gestion` tinyint(4) NOT NULL,
  `Gestion_trabajadores` int(11) NOT NULL,
  `Administrar_programacion` tinyint(4) NOT NULL,
  `cc_usu` tinyint(4) NOT NULL,
  `cc_admin` tinyint(4) NOT NULL,
  `inter_1` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_permisos`
--

INSERT INTO `int_permisos` (`rut`, `Administrar_usuarios`, `ver_todo`, `ver_solo_gerencia`, `noticias`, `fondo_fijos`, `Programacion`, `gestion`, `Gestion_trabajadores`, `Administrar_programacion`, `cc_usu`, `cc_admin`, `inter_1`) VALUES
('13548819-4', 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1),
('18521960-7', 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_permisos_archivos`
--

CREATE TABLE `int_permisos_archivos` (
  `id` int(11) NOT NULL,
  `rut_usuario` varchar(11) NOT NULL,
  `id_dpto` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `id_carpeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `int_permisos_archivos`
--

INSERT INTO `int_permisos_archivos` (`id`, `rut_usuario`, `id_dpto`, `id_archivo`, `id_carpeta`) VALUES
(1, '18521960-7', 0, 6, 0),
(2, '18521960-7', 0, 1, 0),
(5, '', 0, 0, 0),
(6, '', 0, 0, 0),
(7, '', 0, 6, 0),
(8, '0', 12, 6, 0),
(9, '', 0, 6, 0),
(10, '18521960-7', 0, 6, 0),
(11, '18521960-7', 0, 6, 0),
(12, '18521960-7', 0, 0, 0),
(13, '18521960-7', 0, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaliza`
--

CREATE TABLE `personaliza` (
  `Rut` varchar(11) NOT NULL,
  `img_usr` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personaliza`
--

INSERT INTO `personaliza` (`Rut`, `img_usr`) VALUES
('10004289-', 'imageUsr/logo.png'),
('10013685-', 'imageUsr/logo.png'),
('13548819-4', 'imageUsr/logo.png'),
('18521960-7', 'imageUsr/logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_log`
--

CREATE TABLE `reg_log` (
  `id` int(11) NOT NULL,
  `id_usr` varchar(11) NOT NULL,
  `c_costo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reg_log`
--

INSERT INTO `reg_log` (`id`, `id_usr`, `c_costo`, `fecha`, `descripcion`) VALUES
(957, '18521960-7', 7, '2017-06-05 03:52:23', 'Planilla guardada para planilla numero 20231523 ayudante 1 9977976-4, Ayudante 2, ayudante 3 '),
(958, '18521960-7', 7, '2017-06-05 03:54:17', 'Planilla guardada para planilla numero 20231519 ayudante 1 9995147-8, Ayudante 2, ayudante 3 '),
(959, '18521960-7', 7, '2017-06-05 03:58:01', 'Planilla guardada para planilla numero 20231510 ayudante 1 10004289-, Ayudante 210028178-3, ayudante 3 '),
(960, '18521960-7', 7, '2017-06-05 03:58:24', 'Solicitud de cambio realizada para planilla N° 20231510 '),
(961, '18521960-7', 7, '2017-06-05 04:07:12', 'Planilla guardada para planilla numero 20231523 ayudante 1 9962949-5, Ayudante 2, ayudante 3 '),
(962, '18521960-7', 7, '2017-06-05 04:07:30', 'Solicitud de cambio realizada para planilla N° 20231510 '),
(963, '18521960-7', 7, '2017-06-05 04:08:07', 'Solicitud de cambio realizada para planilla N° 20231523 '),
(964, '18521960-7', 7, '2017-06-05 04:14:28', 'Planilla guardada para planilla numero 20231519 ayudante 1 9995147-8, Ayudante 2, ayudante 3 '),
(965, '18521960-7', 7, '2017-06-05 04:14:36', 'Solicitud de cambio realizada para planilla N° 20231519 '),
(966, '18521960-7', 7, '2017-06-05 04:15:23', 'Solicitud de cambio realizada para planilla N° 20231523 '),
(967, '', 0, '2017-06-05 07:30:48', 'Usuario creado rut 10007320-K'),
(968, '', 0, '2017-06-05 07:44:54', 'Usuario creado rut 10004289-'),
(969, '', 0, '2017-06-05 07:52:10', 'Usuario creado rut 10006662-9'),
(970, '', 0, '2017-06-05 07:52:59', 'Usuario creado rut 10041854-1'),
(971, '', 0, '2017-06-05 07:53:57', 'Usuario creado rut 10013685-'),
(972, '', 0, '2017-06-05 07:54:48', 'Usuario creado rut 10043154-'),
(973, '', 0, '2017-06-05 07:58:38', 'Usuario creado rut 10004289-'),
(974, '', 0, '2017-06-05 08:00:03', 'Usuario creado rut 10022577-8'),
(975, '', 0, '2017-06-05 08:02:52', 'Usuario creado rut 10007320-K'),
(976, '', 0, '2017-06-05 08:04:28', 'Usuario creado rut 10043154-'),
(977, '', 0, '2017-06-05 09:37:32', 'Usuario creado rut 10041854-1'),
(978, '', 0, '2017-06-08 08:01:47', 'Usuario creado rut 13548819-4'),
(979, '18521960-7', 7, '2017-06-15 04:05:38', 'Planilla guardada para planilla numero 20231510 ayudante 1 10028178-3, Ayudante 2, ayudante 3 '),
(980, '', 0, '2017-06-15 04:55:55', 'Usuario creado rut 10006662-9'),
(981, '', 0, '2017-06-15 07:34:02', 'Usuario creado rut 10013685-'),
(982, '18521960-7', 7, '2017-06-16 12:51:31', 'Planilla guardada para planilla numero 20231510 ayudante 1 10004289-, Ayudante 2, ayudante 3 '),
(983, '18521960-7', 7, '2017-06-16 01:01:57', 'Solicitud de cambio realizada para planilla N° 20231510 '),
(984, '', 0, '2017-06-16 03:58:15', 'Usuario creado rut 10004289-'),
(985, '', 0, '2017-06-16 03:59:26', 'Usuario creado rut 13548819-4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcp_colores`
--

CREATE TABLE `tcp_colores` (
  `col_id` int(11) NOT NULL,
  `col_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Colores de los vehículos de la flota';

--
-- Volcado de datos para la tabla `tcp_colores`
--

INSERT INTO `tcp_colores` (`col_id`, `col_descripcion`) VALUES
(1, 'AZUL'),
(2, 'BLANCO'),
(3, 'ROJO'),
(4, 'VERDE'),
(5, 'GRIS'),
(6, 'NEGRO'),
(7, 'BILZ/PAP'),
(8, 'SIN ESPECIFICAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcp_estado_flota`
--

CREATE TABLE `tcp_estado_flota` (
  `est_flo_id` int(11) NOT NULL,
  `est_flo_patente` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `est_flo_estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcp_flota`
--

CREATE TABLE `tcp_flota` (
  `flo_id` int(11) NOT NULL,
  `flo_patente` varchar(8) NOT NULL,
  `flo_dv` varchar(1) NOT NULL,
  `flo_tip_id` int(11) NOT NULL,
  `flo_mar_id` int(11) NOT NULL,
  `flo_modelo` varchar(100) NOT NULL,
  `flo_col_id` int(11) NOT NULL,
  `flo_car_id` int(11) NOT NULL,
  `flo_imagen` varchar(100) DEFAULT NULL,
  `flo_observacion` varchar(4000) DEFAULT NULL,
  `flo_nro_chasis` varchar(100) NOT NULL,
  `flo_nro_motor` varchar(100) NOT NULL,
  `flo_anio` int(11) NOT NULL,
  `flo_propietario` varchar(100) DEFAULT NULL,
  `centro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacenta la flota de vehículos de TCP';

--
-- Volcado de datos para la tabla `tcp_flota`
--

INSERT INTO `tcp_flota` (`flo_id`, `flo_patente`, `flo_dv`, `flo_tip_id`, `flo_mar_id`, `flo_modelo`, `flo_col_id`, `flo_car_id`, `flo_imagen`, `flo_observacion`, `flo_nro_chasis`, `flo_nro_motor`, `flo_anio`, `flo_propietario`, `centro`) VALUES
(1, 'BCZZ84', '0', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWC782T08R803709', '30580304', 2008, 'NUEVA GENERACIÓN SPA', 0),
(2, 'BCZZ88', '3', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWC782T08R803449', '30579275', 2008, 'NUEVA GENERACIÓN SPA', 0),
(3, 'BCZZ92', '1', 1, 1, '17220', 2, 1, '', '', '9BWC782T88R803411', '30580043', 2008, 'ENRIQUE NILO CACERES', 0),
(4, 'BCZZ93', 'K', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWC782T08R804181', '30580103', 2008, 'NUEVA GENERACIÓN SPA', 0),
(5, 'BCZZ99', '9', 1, 1, '17220', 3, 1, 'BILZ/PAP', '', '9BWC782T38R804563', '30580392', 2007, 'JTM', 0),
(6, 'BDBB11', '5', 1, 1, '17220', 3, 1, 'BILZ/PAP', '', '9BWC782T48R804958', '30580757', 2007, 'ENRIQUE NILO CACERES', 0),
(7, 'BFJY18', '4', 1, 1, '17220', 2, 1, 'CRISTAL', 'APOYO, MAL ESTADO', '9BWC782T88R808365', '30581542', 2008, 'ABOSUR LTDA', 0),
(8, 'BFJY19', '2', 1, 1, '17220', 4, 1, 'CRISTAL', 'REVISAR UBICACIÓN NO ESTÁ EN SAN FERNANDO', '9BWC782T18R808501', '30581596', 2008, 'NUEVA GENERACIÓN SPA', 0),
(9, 'BFJY20', '6', 1, 1, '17220', 2, 1, 'SIN IMAGEN', '', '9BWC782T98R808293', '30581554', 2008, 'ABOSUR LTDA', 0),
(10, 'BFJY21', '4', 1, 1, '17220', 2, 1, 'CRISTAL', 'MALO', '9BWC782T08R815035', '30583259', 2008, 'ABOSUR LTDA', 0),
(11, 'BFJY22', '2', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWC782T48R808511', '30581516', 2008, 'NUEVA GENERACIÓN SPA', 0),
(12, 'BFJY23', '', 1, 1, '17220', 4, 1, 'CRISTAL', 'MALO', '9BWC782T18R814363', '30583238', 2008, 'NUEVA GENERACIÓN SPA', 0),
(13, 'BFJY24', '9', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWC782T48R814289', '30583262', 2008, 'NUEVA GENERACIÓN SPA', 0),
(14, 'BFJY25', '7', 1, 1, '17220', 3, 1, 'BILZ/PAP', '', '9BWC782T78R815033', '30583424', 2008, 'ENRIQUE NILO CACERES', 0),
(15, 'BFJY26', '5', 1, 1, '17220', 2, 1, '', '', '9BWC782T98R815034', '30583430', 2008, 'ENRIQUE NILO CACERES', 0),
(16, 'BFJY27', '3', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWC782T68R808509', '30581551', 2008, 'ENRIQUE NILO CACERES', 0),
(17, 'BFJY28', '1', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWC782T48R808380', '30581544', 2008, 'ENRIQUE NILO CACERES', 0),
(18, 'BWGZ89', '8', 2, 3, 'L200', 8, 3, '', '', 'MMBJNKA409D022763', '4D56UCBK3850', 2009, 'BANCO SECURITY', 0),
(19, 'CGPY81', '8', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782T3AR009640', '36144949', 2010, 'ABOSUR LTDA', 0),
(20, 'CGPY82', '6', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782T5AR009641', '36144951', 2010, 'ABOSUR LTDA', 0),
(21, 'CGPY83', '4', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T0AR009286', '36144953', 2010, 'ABOSUR LTDA', 0),
(22, 'CGPY84', '2', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T2AR010424', '36146063', 2010, 'ABOSUR LTDA', 0),
(23, 'CGPY85', '0', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T3AR009766', '36145577', 2010, 'ABOSUR LTDA', 0),
(24, 'CGPY86', '9', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T7AR010421', '36146066', 2010, 'ABOSUR LTDA', 0),
(25, 'CGPY87', '7', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T4AR009372', '36144944', 2010, 'ABOSUR LTDA', 0),
(26, 'CGPY88', '5', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T9AR010419', '36146065', 2010, 'NILO E.I.R.L.', 0),
(27, 'CGPY89', '3', 4, 1, '17220', 4, 3, '', '', '9533782T3AR011372', '36148256', 2010, 'NILO E.I.R.L.', 0),
(28, 'CGPY90', '7', 4, 1, '17220', 8, 3, '', '', '9533782T5AR011518', '36148261', 2010, 'NILO E.I.R.L.', 0),
(29, 'CGPY91', '5', 4, 1, '17220', 4, 3, '', 'MAL ESTADO CORTINAS', '9533782T3AR011534', '36148265', 2010, 'NILO E.I.R.L.', 0),
(30, 'CGPY92', '3', 4, 1, '17220', 4, 3, '', 'MAL ESTADO CORTINAS', '9533782T4AR011453', '36148263', 2010, 'NILO E.I.R.L.', 0),
(31, 'CGPY93', '1', 4, 1, '17220', 4, 3, '', '', '9533782T7AR012296', '36149228', 2010, 'NILO E.I.R.L.', 0),
(32, 'CGPY94', 'K', 4, 1, '17220', 8, 3, '', '', '9533782TXAR012308', '36149375', 2010, 'NILO E.I.R.L.', 0),
(33, 'CGPY95', '5', 4, 1, '17220', 4, 3, 'CRISTAL', '', '9533782T9AR012316', '36149193', 2010, 'NUEVA GENERACIÓN SPA', 0),
(34, 'CGPY96', '6', 4, 1, '17220', 8, 3, '', '', '9533782T8AR012324', '36149813', 2010, 'NUEVA GENERACIÓN SPA', 0),
(35, 'CGPY97', '4', 4, 1, '17220', 4, 3, 'CRISTAL', '', '9533782T6AR012306', '36149809', 2010, 'NUEVA GENERACIÓN SPA', 0),
(36, 'CGPY98', '2', 4, 1, '17220', 8, 3, '', '', '9533782T3AR012313', '36149838', 2010, 'NUEVA GENERACIÓN SPA', 0),
(37, 'CGPY99', '0', 4, 1, '17220', 4, 3, '', '', '9533782T7AR012315', '36149197', 2010, 'NUEVA GENERACIÓN SPA', 0),
(38, 'CGPZ10', '5', 4, 1, '17220', 4, 3, 'NO POSEE IMAGEN', '', '9533782T6AR012323', '36149808', 2010, 'NUEVA GENERACIÓN SPA', 0),
(39, 'CHKX51', '8', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782TXAR009229', '36143953', 2010, 'NUEVA GENERACIÓN SPA', 0),
(40, 'CHKX54', '2', 1, 1, '17220', 4, 2, 'CRISTAL', '', '9533782T8AR009228', '36143951', 2010, 'NUEVA GENERACIÓN SPA', 0),
(41, 'CHKX61', '5', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782T8AR011271', '36148246', 2010, 'NUEVA GENERACIÓN SPA', 0),
(42, 'CHKX62', '3', 1, 1, '17220', 4, 2, 'CRISTAL', '', '9533782TXAR010199', '36145588', 2010, 'NUEVA GENERACIÓN SPA', 0),
(43, 'CHKX63', '1', 1, 1, '17220', 1, 2, 'PEPSI', '', '9533782TXAR011272', '36148247', 2010, 'NUEVA GENERACIÓN SPA', 0),
(44, 'CHKX64', 'K', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782T9AR012509', '36149827', 2010, 'NUEVA GENERACIÓN SPA', 0),
(45, 'CHKX65', '8', 1, 1, '17220', 4, 2, 'CRISTAL', '', '9533782T9AR009769', '36144950', 2010, 'NUEVA GENERACIÓN SPA', 0),
(46, 'CHKX66', '6', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782T9AR008735', '36144162', 2010, 'NILO E.I.R.L.', 0),
(47, 'CHKX67', '4', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T8AR010203', '36145594', 2010, 'NILO E.I.R.L.', 0),
(48, 'CHKX73', '9', 1, 1, '17220', 1, 1, 'CRISTAL', '', '9533782T7AR012511', '36149819', 2010, 'NILO E.I.R.L.', 0),
(49, 'CHKX74', '7', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T5AR009283', '36144475', 2010, 'NILO E.I.R.L.', 0),
(50, 'CHKX76', '3', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T4AR010201', '36145585', 2010, 'NILO E.I.R.L.', 0),
(51, 'CHKX77', '1', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T0AR010423', '36146069', 2010, 'NILO E.I.R.L.', 0),
(52, 'CHKX78', 'K', 1, 1, '17220', 1, 1, 'CRISTAL', '', '9533782T6AR008076', '36142924', 2010, 'NILO E.I.R.L.', 0),
(53, 'CHKX79', '8', 1, 1, '17220', 1, 2, 'PEPSI', '', '9533782T5AR012510', '36149818', 2010, 'ABOSUR LTDA', 0),
(54, 'CHKX80', '1', 1, 1, '17220', 1, 2, 'PEPSI', '', '9533782T5AR009638', '36143789', 2010, 'ABOSUR LTDA', 0),
(55, 'CHKX81', 'K', 1, 1, '17220', 1, 1, 'SIN IMAGEN', '', '9533782T4AR008738', '36144163', 2010, 'ABOSUR LTDA', 0),
(56, 'CHKX82', '8', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782T4AR008271', '36141755', 2010, 'ABOSUR LTDA', 0),
(57, 'CHKX85', '2', 1, 1, '17220', 1, 1, 'PEPSI', '', '9533782T7AR009639', '36143861', 2010, 'ABOSUR LTDA', 0),
(58, 'CHKX87', '9', 1, 1, '17220', 1, 1, 'CRISTAL', '', '9533782T7AR012508', '36149831', 2010, 'ABOSUR LTDA', 0),
(59, 'CSYG55', '4', 2, 5, 'FRONTIER II', 1, 2, 'PEPSI', '', 'KNCWJX72AB7490069', 'JT604874', 2011, 'NUEVA GENERACIÓN SPA', 0),
(60, 'CSYG60', '0', 2, 5, 'FRONTIER II', 8, 3, '', 'PANE MOTOR', 'KNCWJX72AB7491207', 'JT604898', 2011, 'NILO E.I.R.L.', 0),
(61, 'CYGY11', '8', 2, 4, 'DMAX 3.0', 8, 3, '', '', 'MPATFR77HBT100483', '934749', 2011, 'NUEVA GENERACIÓN SPA', 0),
(62, 'CYGY12', '6', 2, 4, 'DMAX 3.0', 8, 3, '', '', 'MPATFR77HBT100486', '934007', 2011, 'NILO E.I.R.L.', 0),
(63, 'CYGY13', '4', 2, 4, 'DMAX 3.0', 8, 3, '', '', 'MPATFR77HBT100487', '934004', 2011, 'NUEVA GENERACIÓN SPA', 0),
(64, 'CYGY14', '2', 2, 4, 'DMAX 3.0', 8, 3, '', '', 'MPATFR77HBT100489', '934166', 2011, 'NILO E.I.R.L.', 0),
(65, 'CYGY15', '0', 2, 4, 'DMAX 3.0', 8, 3, '', '', 'MPATFR77HBT100490', '934722', 2011, 'ABOSUR LTDA', 0),
(66, 'CYGY65', '7', 2, 4, 'DMAX 3.0', 8, 3, '', '', 'MPATFR77HBT100484', '934005', 2011, 'ABOSUR LTDA', 0),
(67, 'DBTT13', '5', 2, 5, 'FRONTIER II 3.0', 7, 2, 'BILZ/PAP', 'PANE MOTOR', 'KNCWJX72AB7548796', 'JT610372', 2011, 'ABOSUR LTDA', 0),
(68, 'DBTT16', 'K', 2, 5, 'FRONTIER II 3.0', 1, 2, 'PEPSI', '', 'KNCWJX72AB7554289', 'JT612296', 2012, 'ABOSUR LTDA', 0),
(69, 'DBTT17', '8', 2, 5, 'FRONTIER II 3.0', 7, 2, 'BILZ/PAP', 'PANE MOTOR', 'KNCWJX72AB7553819', 'JT612292', 2011, 'ABOSUR LTDA', 0),
(70, 'DGVG73', '9', 2, 5, 'FRONTIER II 3.0', 1, 2, 'PEPSI', 'PANE MOTOR', 'KNCWJX72AB7554291', 'JT612297', 2012, 'ABOSUR LTDA', 0),
(71, 'DGWZ39', 'K', 2, 5, 'FRONTIER II 3.0', 8, 3, '', '', '9533782T1CR226218', '36358764', 2011, 'NUEVA GENERACIÓN SPA', 0),
(72, 'DGWZ40', '3', 2, 5, 'FRONTIER II', 8, 3, '', '', 'KNCWJX72AB7528066', 'JT610362', 2011, 'NILO E.I.R.L.', 0),
(73, 'DPCX39', '2', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T1CR226218', '36358764', 2012, 'BANCO CHILE', 0),
(74, 'DSBR23', '2', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T3CR210473', '36339187', 2012, 'BANCO CHILE', 0),
(75, 'DSVV63', '2', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T2CR237986', '36373882', 2012, 'BANCO CHILE', 0),
(76, 'DSVV72', '1', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T5CR235391', '36362282', 2012, 'BANCO CHILE', 0),
(77, 'DTBK97', '9', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T1CR240345', '36373901', 2012, 'BANCO CHILE', 0),
(78, 'DVFL40', '2', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T5CR240851', '36378083', 2012, 'BANCO CHILE', 0),
(79, 'DWFK74', '5', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T5CR240915', '36373907', 2012, 'BANCO CHILE', 0),
(80, 'DWFK96', '6', 1, 1, '17220', 4, 1, 'CRISTAL', '', '9533782T8CR239998', '36374786', 2012, 'BANCO CHILE', 0),
(81, 'DWGD29', '3', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL689977', '9,02916E+13', 2013, 'LA ESTRELLA LEASING LTDA.', 0),
(82, 'FCGJ57', 'k', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL692103', '9,02916E+13', 2012, 'LA ESTRELLA LEASING LTDA.', 0),
(83, 'FCGJ58', '8', 1, 2, '1624', 4, 1, 'CRISTAL', 'PISADERA EN MALESTADO', 'WDB970077DL688860', '9,02916E+14', 2013, 'LA ESTRELLA LEASING LTDA.', 0),
(84, 'FCGJ59', '6', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL718061', '902916C0997519', 2013, 'LA ESTRELLA LEASING LTDA.', 0),
(85, 'FFJT96', '1', 2, 3, 'L200', 8, 3, '', '', 'MMBJNKA40CD054104', '4D56UCDR7668', 2013, 'BANCO ESTADO ', 0),
(86, 'FFPF41', '6', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL693778', '902916C0982218', 2013, 'ABOSUR LTDA', 0),
(87, 'FFPF42', '4', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL693777', '902916C0982266', 2013, 'ABOSUR LTDA', 0),
(88, 'FGJS55', '2', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL691667', '9,02916E+13', 2013, 'LA ESTRELLA LEASING LTDA.', 0),
(89, 'FGJS56', '0', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL691890', '9,02916E+13', 2013, 'LA ESTRELLA LEASING LTDA.', 0),
(90, 'FGJS57', '9', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WCB970077DL688224', '9,02916E+13', 2013, 'LA ESTRELLA LEASING LTDA.', 0),
(91, 'FGJS58', '7', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL691668', '9,02916E+13', 2013, 'LA ESTRELLA LEASING LTDA.', 0),
(92, 'FHVS10', '6', 2, 6, 'ACTION SPORT-2.0', 8, 3, '', '', 'KPACA1ETSDP143468', '6,7196E+13', 2013, 'BANCO ESTADO', 0),
(93, 'FHWD54', '3', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL693776', '9,02916E+13', 2013, 'BANCO SANTANDER', 0),
(94, 'FHWD55', '1', 1, 2, '1624', 4, 1, 'CRISTAL', '', 'WDB970077DL693214', '9,02916E+13', 2013, 'BANCO SANTANDER', 0),
(95, 'FJGD68', '2', 1, 1, '17280', 8, 3, '', '', '953658241DR256736', '2093251B033242', 2013, 'BANCO SANTANDER', 0),
(96, 'FJGD69', '0', 1, 1, '17280', 8, 3, '', '', '953658245DR257470', '2093251A99', 2013, 'BANCO SANTANDER', 0),
(97, 'FJGD70', '4', 1, 1, '17280', 8, 3, '', '', '9536558247DR257485', '2093251B10', 2013, 'BANCO SANTANDER', 0),
(98, 'FJGD71', '2', 1, 1, '17280', 8, 3, '', '', '95365824XDR257500', '2093193A74', 2013, 'BANCO SANTANDER', 0),
(99, 'FJTF26', '8', 2, 3, 'L200', 8, 3, '', '', 'MMBJNKA40CD057904', '4D56UCDS9801', 2013, 'BANCO ESTADO', 0),
(100, 'FXXP42', '0', 4, 1, '19330', 8, 3, '', '', '9536Y8276DR248214', '36386037', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(101, 'FXXP43', '9', 1, 1, '17280', 4, 2, 'CRISTAL', 'NO PARTE', '953658242DR319634', '2093306A463304', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(102, 'FXXP44', '7', 1, 1, '17280', 4, 1, 'CRISTAL', '', '95365824XDR319686', '2093306A443304', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(103, 'FXXP45', '5', 1, 1, '17280', 4, 2, 'SIN IMAGEN', '', '953658240DR319695', '2093306A393304', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(104, 'FXXP46', '3', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658244DR319862', '2093392A523391', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(105, 'FXXR93', '8', 2, 1, 'AMAROK 2.0', 8, 3, '', '', 'WV1ZZZ2HZDA066772', 'CSH051509', 2014, 'FACTOTAL LEASING S.A. 4064', 0),
(106, 'FYKC97', '0', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658245DR319692', '2093305A703304', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(107, 'FYKC98', '9', 1, 1, '17280', 4, 2, 'CRISTAL', '', '953658243DR31907', '2093306A353304', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(108, 'FYKC99', '7', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658242DR319746', '2093306A403304', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(109, 'FYXG55', '9', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658247DR3196757', '2093306A363304', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(110, 'FYXG56', '7', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658241DR319916', '2093286A163286', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(111, 'FYXG57', '5', 1, 1, '17280', 4, 2, 'CRISTAL', '', '953658243DR332778', '2093428A053425', 2014, 'FACTOTAL LEASING S.A. 3987', 0),
(112, 'FZJS23', '2', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR5EL014278', '466HM2U2204875', 2014, 'DE LAGE LANDEN CHILE S.A. 159-1', 0),
(113, 'FZJS24', '0', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR7EL014279', '466HM2U2204876', 2014, 'DE LAGE LANDEN CHILE S.A. 159-1', 0),
(114, 'FZJS25', '9', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR3EL014280', '466HM2U2204889', 2014, 'DE LAGE LANDEN CHILE S.A 159-1', 0),
(115, 'FZJS26', '7', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR5EL014281', '466HM2U2204885', 2014, 'DE LAGE LANDEN CHILE S.A. 159-1', 0),
(116, 'FZJS27', '5', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR7EL014282', '466HM2U2204899', 2014, 'DE LAGE LANDEN CHILE S.A 159-1', 0),
(117, 'FZJS28', '3', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR0EL014284', '466HM2U2204902', 2014, 'DE LAGE LANDEN CHILE S.A. 159-1', 0),
(118, 'FZJS29', '1', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR4EL014286', '466HM2U2204904', 2014, 'DE LAGE LANDEN CHILE S.A 159-1', 0),
(119, 'GCGB87', '7', 4, 1, '19330', 8, 3, '', '', '9536Y8271DR252963', '36390676', 2014, 'BANCO SANTANDER', 0),
(120, 'GCYS41', '8', 1, 1, '8160', 4, 2, 'SIN IMAGEN', '', '9531M52P6ER402202', '89098698', 2014, 'CORPBANCA-2012552', 0),
(121, 'GCYS42', '6', 1, 1, '8160', 4, 1, 'CRISTAL', '', '9531M52P7ER401480', '89098697', 2014, 'CORPBANCA-2012552', 0),
(122, 'GCYS43', '4', 1, 1, '17280', 4, 1, 'LONA CRISTAL', '', '953658248DR319797', '2093392A593391', 2014, 'CORPBANCA-2012552', 0),
(123, 'GCYS44', '2', 1, 1, '17280', 4, 1, 'LONA CRISTAL', '', '95365824XDR319980', '2093306A523304', 2014, 'CORPBANCA-2012552', 0),
(124, 'GCYS45', '0', 1, 1, '17280', 4, 1, 'LONA CRISTAL', '', '953658243DR319853', '2093392A613391', 2014, 'CORPBANCA-2012552', 0),
(125, 'GCYS46', '9', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658242DR319889', '2093305A773304', 2014, 'CORPBANCA-2012552', 0),
(126, 'GCYS47', '7', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658240DR319809', '2093281A013277', 2014, 'CORPBANCA-2012552', 0),
(127, 'GCYS48', '5', 1, 1, '17280', 4, 1, 'LONA CRISTAL', '', '953658244DR320266', '2093392A713391', 2014, 'CORPBANCA-2012552', 0),
(128, 'GCYS49', '3', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658241DR319964', '2093392A463391', 2014, 'CORPBANCA-2012552', 0),
(129, 'GCYS53', '1', 1, 1, '17280', 4, 1, 'CRISTAL', '', '953658240DR319731', '2093306A423304', 2014, 'CORPBANCA-2012552', 0),
(130, 'GDFY60', '9', 4, 1, '19330', 8, 3, '', '', '9536Y8272DR252017', '36390159', 2014, 'CORPBANCA-2012552', 0),
(131, 'GDHJ11', '5', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR6EL014287', '466HM2U2204908', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(132, 'GDHJ12', '3', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR9EL014283', '466HM2U2204898', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(133, 'GDHJ13', '1', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR2EL014285', '466HM2U2204883', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(134, 'GDHJ14', 'K', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR7EL794381', '466HM2U2205107', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(135, 'GDHJ15', '8', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR9EL794382', '466HM2U2205121', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(136, 'GDHJ16', '6', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR9EL794379', '466HM2U2205109', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(137, 'GDHJ17', '4', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR5EL794380', '466HM2U2205110', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(138, 'GDHJ18', '2', 1, 7, '4300', 4, 2, 'NO POSEE IMAGEN', '', '3HAMMAAR7EL794378', '466HM2U2205098', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(139, 'GDHJ19', '0', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR5EL794377', '466HM2U2205103', 2014, 'DE LAGE LANDEN CHILE S.A. 195-1', 0),
(140, 'GFTS23', '7', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR6EL794386', '466HM2U2205169', 2014, 'CORPBANCA 2012753', 0),
(141, 'GFTS24', '5', 1, 7, '4300', 4, 2, 'NO POSEE IMAGEN', '', '3HAMMAAR4EL794385', '466HM2U2205108', 2014, 'CORPBANCA 2012753', 0),
(142, 'GFTS29', '6', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR0EL794383', '466HM2U2205114', 2014, 'CORPBANCA 2012753', 0),
(143, 'GFTS30', 'K', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR2EL794384', '466HM2U2205118', 2014, 'CORPBANCA 2012753', 0),
(144, 'GXRZ63', '7', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR8FL622300', '466HM2U2207280', 2015, 'BANCO ESTADO 1011466', 0),
(145, 'GXRZ64', '5', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR3FL622303', '466HM2U2207279', 2015, 'BANCO ESTADO 1011466', 0),
(146, 'GXRZ65', '3', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR4FL622293', '466HM2U2207236', 2015, 'BANCO ESTADO 1011466', 0),
(147, 'GXRZ66', '1', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR0FL622288', '466HM2U2207253', 2015, 'BANCO ESTADO 1011466', 0),
(148, 'GXRZ68', '8', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR1FL622302', '466HM2U2207258', 2015, 'BANCO ESTADO 1011466', 0),
(149, 'GXRZ69', '6', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAARXFL622301', '466HM2U2207281', 2015, 'BANCO ESTADO 1011466', 0),
(150, 'GXRZ70', 'K', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR8FL622295', '466HM2U2207278', 2015, 'BANCO ESTADO 1011466', 0),
(151, 'GXRZ71', '8', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR6FL622294', '466HM2U2207263', 2015, 'BANCO ESTADO 1011466', 0),
(152, 'GXRZ72', '6', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR2FL622292', '466HM2U2207235', 2015, 'BANCO ESTADO 1011466', 0),
(153, 'GXRZ73', '4', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR7FL649052', '466HM2U2207355', 2015, 'BANCO ESTADO 1011466', 0),
(154, 'GXRZ74', '2', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR6FL647129', '466HM2U2207357', 2015, 'BANCO ESTADO 1011466', 0),
(155, 'GXRZ75', '0', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR4FL647128', '466HM2U2207349', 2015, 'BANCO ESTADO 1011466', 0),
(156, 'GXRZ76', '9', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR9FL647125', '466HM2U2207347', 2015, 'BANCO ESTADO 1011466', 0),
(157, 'GXRZ77', '7', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR3FL647122', '466HM2U2207350', 2015, 'BANCO ESTADO 1011466', 0),
(158, 'GXRZ78', '5', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR5FL622304', '466HM2U2207296', 2015, 'BANCO ESTADO 1011466', 0),
(159, 'GXWW75', '3', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR2FL647127', '466HM2U2207354', 2015, 'CORPBANCA 2014523', 0),
(160, 'GXWW76', '1', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR5FL647123', '466HM2U2207351', 2015, 'CORPBANCA 2014523', 0),
(161, 'GXWW77', 'K', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR1FL647121', '466HM2U2207348', 2015, 'CORPBANCA 2014523', 0),
(162, 'GXWW78', '8', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAARXFL647120', '466HM2U2207234', 2015, 'CORPBANCA 2014523', 0),
(163, 'GXWX31', '8', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR0FL647126', '466HM2U2207356', 2015, 'CORPBANCA 2014523', 0),
(164, 'GXWX32', '6', 1, 7, '4300', 4, 2, 'CRISTAL', '', '3HAMMAAR7FL647124', '466HM2U2207358', 2015, 'CORPBANCA 2014523', 0),
(165, 'GXXF81', '0', 2, 6, 'NEW ACTYON 2.0', 8, 3, '', '', 'KPACA1ETSFP208345', '6,7196E+13', 2015, 'CORPBANCA 2014523', 0),
(166, 'GXXF82', '9', 2, 6, 'NEW ACTYON 2.0', 8, 3, '', '', 'KPACA1ETSFP208649', '6,7196E+13', 2015, 'CORPBANCA 2014523', 0),
(167, 'GXXF83', '7', 2, 6, 'NEW ACTYON 2.0', 8, 3, '', '', 'KPACA1ETSFP208653', '6,7196E+13', 2015, 'CORPBANCA 2014523', 0),
(168, 'JA2818', '8', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(169, 'JA6792', '', 3, 0, '', 8, 3, '', '', 'S/N', 'S/N', 0, 'SANTA ETELVINA', 0),
(170, 'JB9553', 'K', 3, 9, 'SRB 13 8 30 P', 8, 3, '', '', 'CLSE3165E01000311', 'S/N', 2011, 'ABOSUR LTDA', 0),
(171, 'JC8706', 'K', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(172, 'JC8707', '8', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(173, 'JC8710', '8', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1999, 'CORPBANCA', 0),
(174, 'JC8711', '6', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1999, 'CORPBANCA', 0),
(175, 'JC8713', '2', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(176, 'JC8715', '9', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(177, 'JC8716', '7', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1997, 'CORPBANCA', 0),
(178, 'JC8718', '3', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(179, 'JC8719', '1', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(180, 'JC8721', '3', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(181, 'JC8722', '1', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(182, 'JC8723', 'K', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(183, 'JE6142', '6', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(184, 'JE6144', '2', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(185, 'JE6146', '', 3, 8, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1996, 'CCU S.A.', 0),
(186, 'JE6154', 'K', 3, 13, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 1995, 'CORPBANCA', 0),
(187, 'JF7794', '2', 3, 10, 'WALTER ZGT', 8, 3, '', '', 'S/N', 'S/N', 1989, 'CORPBANCA', 0),
(188, 'JG1163', '6', 3, 11, 'S/M', 8, 3, '', '', 'S/N', 'S/N', 2005, 'TCP', 0),
(189, 'JH2680', '8', 3, 12, 'GENERICO MUSSRE', 8, 3, '', '', 'S/N', 'S/N', 2007, 'BANCO CHILE', 0),
(190, 'JH2681', '6', 3, 12, 'GENERICO MUSSRE', 8, 3, '', '', 'S/N', 'S/N', 2007, 'BANCO CHILE', 0),
(191, 'JH2682', '4', 3, 12, 'GENERICO MUSSRE', 8, 3, '', '', 'S/N', 'S/N', 2007, 'BANCO CHILE', 0),
(192, 'JH2683', '2', 3, 12, 'GENERICO MUSSRE', 8, 3, '', '', 'S/N', 'S/N', 2007, 'BANCO CHILE', 0),
(193, 'JH2684', '0', 3, 12, 'GENERICO MUSSRE', 8, 3, '', '', 'S/N', 'S/N', 2007, 'BANCO CHILE', 0),
(194, 'JK4963', '1', 3, 9, 'BOTELLERO', 8, 3, '', '', '1CSBX137E1E9P000186', 'S/N', 2010, 'NILO E.I.R.L.', 0),
(195, 'JK6307', '', 3, 9, 'BOTELLERO', 8, 3, '', '', 'S/N', 'S/N', 2010, 'SANTA ETELVINA', 0),
(196, 'WA7986', '7', 1, 1, '15190', 2, 1, 'NO POSEE IMAGEN', '', '9BWUS72S26R600192', '30795533', 2006, 'NILO E.I.R.L.', 0),
(197, 'WA7987', '5', 1, 1, '15190', 2, 1, 'CRISTAL', 'MALO', '9BWUS72S06R600059', '30795343', 2006, 'SANTA ETELVINA', 0),
(198, 'WK6804', '1', 1, 1, '9150', 2, 2, 'PEPSI', '', '9BWAD52R67R630053', 'E1T136161', 2007, 'ABOSUR LTDA', 0),
(199, 'WR8033', '1', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWCM82T87R630044', '30565136', 2007, 'NILO E.I.R.L.', 0),
(200, 'WR8038', '2', 1, 1, '17220', 2, 1, 'CRISTAL', '', '9BWCM82T47R630137', '30565135', 2007, 'SANTA ETELVINA', 0),
(201, 'ZN4888', '7', 1, 1, '15190', 2, 1, 'CRISTAL', 'MALO', '9BWUS72S86R600214', '30795531', 2006, 'NILO E.I.R.L.', 0),
(202, 'ZN4920', '9', 1, 1, '15190', 2, 1, 'NO POSEE IMAGEN', '', '9BWUS72SX6R600196', '30795534', 2006, 'NILO E.I.R.L.', 0),
(203, 'JFCS41', '1', 1, 2, 'ATEGO 1624', 4, 3, '', '', 'WDB970078H0087624', '902916C1121193', 2017, 'BANCOCHILE', 0),
(204, 'JFCV10', '4', 1, 2, 'ATEGO 1624', 4, 3, '', '', 'WDB970078H0086860', '902916C1121185', 2017, 'BANCOCHILE', 0),
(205, 'JFTY24', '4', 1, 2, 'ATEGO 1624', 4, 3, '', '', 'WDB970078H0094784', '902916C1122376', 2017, 'BCI', 0),
(206, 'JFTY25', '2', 1, 2, 'ATEGO 1624', 4, 3, '', '', 'WDB970078H0086858', '902916C1121199', 2017, 'BCI', 0),
(207, 'JGDG11', '2', 1, 2, 'ATEGO 1624', 4, 3, '', '', 'WDB970078H0100770', '902916C1122643', 2017, 'TRANSPORTES NUEVA GENERACION SPA', 0),
(208, 'JGDG12', '0', 1, 2, 'ATEGO 1624', 4, 3, '', '', 'WDB970078H0098702', '902916C1123103', 2017, 'TRANSPORTES NUEVA GENERACION SPA', 0),
(209, 'JGGG93', '8', 1, 2, 'ATEGO 1624', 1, 3, '', '', 'WDB970078H0093730', '902916C1121589', 2017, 'BCI', 0),
(210, 'HXRR58', 'K', 1, 2, 'ATEGO 1624', 1, 3, '', '', 'WDB970078H0089855', '902916C1121566', 2017, 'BCI', 0),
(211, 'HXRR57', '1', 1, 2, 'ATEGO 1624', 1, 3, '', '', 'WDB970078H0090505', '902916C1121648', 2017, 'BCI', 0),
(212, 'HXRR56', '3', 1, 2, 'ATEGO 1624', 1, 3, '', '', 'WDB970078H0089511', '902916C1121636', 2017, 'BCI', 0),
(213, 'HXRR55', '5', 1, 2, 'ATEGO 1624', 1, 3, '', '', 'WDB970078H0089510', '902916C1121650', 2017, 'BCI', 0),
(214, 'HXRR59', '8', 1, 2, 'ATEGO 1624', 1, 3, '', '', 'WDB970078H0090830', '902916C1121772', 2017, 'BCI', 0),
(215, 'JGGJ67', '1', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0095157', '902916C1122480', 2017, 'BCI', 0),
(216, 'JGGJ68', 'K', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0094455', '902916C1122003', 2017, 'BCI', 0),
(217, 'JGGJ69', '8', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0093394', '902916C1122018', 2017, 'BCI', 0),
(218, 'JGGJ70', '1', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0094453', '902916C1122014', 2017, 'BCI', 0),
(219, 'JHBC13', '3', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0087998', '02916CL121856', 2017, 'BANCOCHILE', 0),
(220, 'JHBC14', '1', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0088000', '902916C1121833', 2017, 'BANCOCHILE', 0),
(221, 'JHBC15', 'K', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0092990', '902916C1121853', 2017, 'BANCOCHILE', 0),
(222, 'JHBC16', '8', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0090504', '902916C1121782', 2017, 'BANCOCHILE', 0),
(223, 'JHBC17', '6', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0092281', '902916C1121798', 2017, 'BANCOCHILE', 0),
(224, 'JHBC18', '4', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0094783', '902916C1122374', 2017, 'BANCOCHILE', 0),
(225, 'JHBC19', '2', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0094786', '902916C1122170', 2017, 'BANCOCHILE', 0),
(226, 'JJVZ44', '4', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0090827', '902916C1121777', 2017, 'BANCOCHILE', 0),
(227, 'JJVZ43', '6', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0088415', '902916C1121499', 2017, 'BANCOCHILE', 0),
(228, 'JJVZ45', '2', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0090828', '902916C1121810', 2017, 'BANCOCHILE', 0),
(229, 'JJVZ46', '0', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0089166', '902916C1121507', 2017, 'BANCOCHILE', 0),
(230, 'JJWT33', '2', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0093395', '902916C1121929', 2017, 'BANCOCHILE', 0),
(231, 'JJWT32', '4', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0092658', '902916C1121813', 2017, 'BANCOCHILE', 0),
(232, 'JJWT36', '7', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0096190', '902916C1122839', 2017, 'BANCOCHILE', 0),
(233, 'JJWT35', '9', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0093337', '902916C1122033', 2017, 'BANCOCHILE', 0),
(234, 'JJWT34', '0', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0095523', '902916C1122580', 2017, 'BANCOCHILE', 0),
(235, 'JJWT31', '6', 1, 2, 'ATEGO 1624 EURO 5', 4, 3, '', '', 'WDB970078H0089854', '902916C1121551', 2017, 'BANCOCHILE', 0),
(236, 'JJWJ11', '0', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0088416', '902916C1121502', 2017, 'BANCOCHILE', 0),
(237, 'JJWJ12', '9', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0089165', '902916C1121560', 2017, 'BANCOCHILE', 0),
(238, 'JJWJ13', '7', 1, 2, 'ATEGO 1624 ', 4, 3, '', '', 'WDB970078H0092657', '902916C1121811', 2017, 'BANCOCHILE', 0),
(239, 'lz5323', '2', 1, 1, 'eewq', 1, 1, 'bilz', 'asdasd', '574654', '6543', 1998, 'cacas', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcp_marcas`
--

CREATE TABLE `tcp_marcas` (
  `mar_id` int(11) NOT NULL,
  `mar_descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Marcas de los vehículos de la flota';

--
-- Volcado de datos para la tabla `tcp_marcas`
--

INSERT INTO `tcp_marcas` (`mar_id`, `mar_descripcion`) VALUES
(1, 'VOLKSWAGEN'),
(2, 'MERCEDES BENZ'),
(3, 'MITSUBISHI'),
(4, 'CHEVROLET'),
(5, 'KIA'),
(6, 'SSANGYONG'),
(7, 'INTER'),
(8, 'HACKNEY'),
(9, 'SANTANDER'),
(10, 'GOREN'),
(11, 'MALDONADO'),
(12, 'MUSSRE'),
(13, 'TREMAC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcp_tipo_carroceria`
--

CREATE TABLE `tcp_tipo_carroceria` (
  `tip_car_id` int(11) NOT NULL,
  `tip_car_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tipos de carroceria para la Flota';

--
-- Volcado de datos para la tabla `tcp_tipo_carroceria`
--

INSERT INTO `tcp_tipo_carroceria` (`tip_car_id`, `tip_car_descripcion`) VALUES
(1, 'METALICA'),
(2, 'ALUMINIO'),
(3, 'NO APLICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcp_tipo_vehiculo`
--

CREATE TABLE `tcp_tipo_vehiculo` (
  `tip_veh_id` int(11) NOT NULL,
  `tip_veh_descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tcp_tipo_vehiculo`
--

INSERT INTO `tcp_tipo_vehiculo` (`tip_veh_id`, `tip_veh_descripcion`) VALUES
(1, 'CAMION'),
(2, 'CAMIONETA'),
(3, 'SEMIREMOLQUE'),
(4, 'TRACTO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_abono`
--
ALTER TABLE `cc_abono`
  ADD PRIMARY KEY (`Planilla`);

--
-- Indices de la tabla `cc_cheque_contabilidad`
--
ALTER TABLE `cc_cheque_contabilidad`
  ADD PRIMARY KEY (`planilla`);

--
-- Indices de la tabla `cc_cheque_pendiente`
--
ALTER TABLE `cc_cheque_pendiente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_gastos`
--
ALTER TABLE `cc_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_history`
--
ALTER TABLE `cc_history`
  ADD PRIMARY KEY (`Planilla`);

--
-- Indices de la tabla `cc_is_abono`
--
ALTER TABLE `cc_is_abono`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cc_is_banco`
--
ALTER TABLE `cc_is_banco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_is_cheque`
--
ALTER TABLE `cc_is_cheque`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cc_is_cliente`
--
ALTER TABLE `cc_is_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_is_concepto`
--
ALTER TABLE `cc_is_concepto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_is_gastos`
--
ALTER TABLE `cc_is_gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_is_producto`
--
ALTER TABLE `cc_is_producto`
  ADD PRIMARY KEY (`Cod_ccu`);

--
-- Indices de la tabla `cc_is_retiro`
--
ALTER TABLE `cc_is_retiro`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `cc_permisos_centros`
--
ALTER TABLE `cc_permisos_centros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_retiro`
--
ALTER TABLE `cc_retiro`
  ADD PRIMARY KEY (`planilla`);

--
-- Indices de la tabla `cc_tipo_abono`
--
ALTER TABLE `cc_tipo_abono`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cc_valores`
--
ALTER TABLE `cc_valores`
  ADD PRIMARY KEY (`planilla`);

--
-- Indices de la tabla `ges_centro_de_costos`
--
ALTER TABLE `ges_centro_de_costos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_empresa`
--
ALTER TABLE `ges_empresa`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ges_honorarios`
--
ALTER TABLE `ges_honorarios`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ges_programacion`
--
ALTER TABLE `ges_programacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_program_ayu_y_cond`
--
ALTER TABLE `ges_program_ayu_y_cond`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_rechazos_xls`
--
ALTER TABLE `ges_rechazos_xls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_sindicato`
--
ALTER TABLE `ges_sindicato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_solicita_cambio`
--
ALTER TABLE `ges_solicita_cambio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_tipo_contrato`
--
ALTER TABLE `ges_tipo_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_tipo_falla`
--
ALTER TABLE `ges_tipo_falla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ges_trabajadores`
--
ALTER TABLE `ges_trabajadores`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `int_archivos`
--
ALTER TABLE `int_archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `int_cargo`
--
ALTER TABLE `int_cargo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `int_carpeta`
--
ALTER TABLE `int_carpeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usr` (`rut_usr`);

--
-- Indices de la tabla `int_comentarios`
--
ALTER TABLE `int_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_archivo` (`id_archivo`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `int_dpto`
--
ALTER TABLE `int_dpto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `int_gerencia`
--
ALTER TABLE `int_gerencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `int_lgn`
--
ALTER TABLE `int_lgn`
  ADD PRIMARY KEY (`rut`);

--
-- Indices de la tabla `int_mensaje`
--
ALTER TABLE `int_mensaje`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `int_noticias`
--
ALTER TABLE `int_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `int_notificaciones`
--
ALTER TABLE `int_notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `int_permisos`
--
ALTER TABLE `int_permisos`
  ADD PRIMARY KEY (`rut`);

--
-- Indices de la tabla `int_permisos_archivos`
--
ALTER TABLE `int_permisos_archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personaliza`
--
ALTER TABLE `personaliza`
  ADD PRIMARY KEY (`Rut`);

--
-- Indices de la tabla `reg_log`
--
ALTER TABLE `reg_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tcp_colores`
--
ALTER TABLE `tcp_colores`
  ADD PRIMARY KEY (`col_id`);

--
-- Indices de la tabla `tcp_estado_flota`
--
ALTER TABLE `tcp_estado_flota`
  ADD PRIMARY KEY (`est_flo_id`);

--
-- Indices de la tabla `tcp_flota`
--
ALTER TABLE `tcp_flota`
  ADD PRIMARY KEY (`flo_id`);

--
-- Indices de la tabla `tcp_marcas`
--
ALTER TABLE `tcp_marcas`
  ADD PRIMARY KEY (`mar_id`);

--
-- Indices de la tabla `tcp_tipo_carroceria`
--
ALTER TABLE `tcp_tipo_carroceria`
  ADD PRIMARY KEY (`tip_car_id`);

--
-- Indices de la tabla `tcp_tipo_vehiculo`
--
ALTER TABLE `tcp_tipo_vehiculo`
  ADD PRIMARY KEY (`tip_veh_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cc_cheque_pendiente`
--
ALTER TABLE `cc_cheque_pendiente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cc_gastos`
--
ALTER TABLE `cc_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `cc_is_abono`
--
ALTER TABLE `cc_is_abono`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cc_is_banco`
--
ALTER TABLE `cc_is_banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cc_is_cheque`
--
ALTER TABLE `cc_is_cheque`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cc_is_cliente`
--
ALTER TABLE `cc_is_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cc_is_concepto`
--
ALTER TABLE `cc_is_concepto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cc_is_gastos`
--
ALTER TABLE `cc_is_gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cc_is_retiro`
--
ALTER TABLE `cc_is_retiro`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cc_permisos_centros`
--
ALTER TABLE `cc_permisos_centros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `cc_tipo_abono`
--
ALTER TABLE `cc_tipo_abono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ges_centro_de_costos`
--
ALTER TABLE `ges_centro_de_costos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ges_empresa`
--
ALTER TABLE `ges_empresa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ges_honorarios`
--
ALTER TABLE `ges_honorarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ges_programacion`
--
ALTER TABLE `ges_programacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;
--
-- AUTO_INCREMENT de la tabla `ges_program_ayu_y_cond`
--
ALTER TABLE `ges_program_ayu_y_cond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ges_rechazos_xls`
--
ALTER TABLE `ges_rechazos_xls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ges_sindicato`
--
ALTER TABLE `ges_sindicato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ges_solicita_cambio`
--
ALTER TABLE `ges_solicita_cambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `ges_tipo_contrato`
--
ALTER TABLE `ges_tipo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ges_tipo_falla`
--
ALTER TABLE `ges_tipo_falla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `int_archivos`
--
ALTER TABLE `int_archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `int_cargo`
--
ALTER TABLE `int_cargo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `int_carpeta`
--
ALTER TABLE `int_carpeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `int_comentarios`
--
ALTER TABLE `int_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `int_dpto`
--
ALTER TABLE `int_dpto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `int_gerencia`
--
ALTER TABLE `int_gerencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `int_mensaje`
--
ALTER TABLE `int_mensaje`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `int_noticias`
--
ALTER TABLE `int_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `int_notificaciones`
--
ALTER TABLE `int_notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `int_permisos_archivos`
--
ALTER TABLE `int_permisos_archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `reg_log`
--
ALTER TABLE `reg_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=986;
--
-- AUTO_INCREMENT de la tabla `tcp_estado_flota`
--
ALTER TABLE `tcp_estado_flota`
  MODIFY `est_flo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tcp_flota`
--
ALTER TABLE `tcp_flota`
  MODIFY `flo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
