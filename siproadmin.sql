-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2024 a las 01:32:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siproadmin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abreviaturasempresa`
--

CREATE TABLE `abreviaturasempresa` (
  `id` int(11) NOT NULL,
  `nombreEmpresa` varchar(255) DEFAULT NULL,
  `abreviatura` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `abreviaturasempresa`
--

INSERT INTO `abreviaturasempresa` (`id`, `nombreEmpresa`, `abreviatura`) VALUES
(21, 'Adventum Vita', 'S-AVI'),
(23, 'Altec Fluidos', 'S-ATA'),
(24, 'Apc Bombas', 'S-APC'),
(25, 'Capleton', 'S-CAP'),
(26, 'Dacsa', 'S-DAC'),
(27, 'Extracciones Basálticas', 'S-EBA'),
(28, 'Fijodent', 'S-FIJ'),
(29, 'Global Denim', 'S-GDE'),
(30, 'Grupo AGRI-BEANS', 'S-ABS'),
(31, 'Grupo Industrial POPUSA', 'S-POP'),
(33, 'H&C Cosedoras de Sacos', 'S-H&C'),
(34, 'Ing. Cirilo', 'S-CIR'),
(35, 'Jg Proindusa', 'S-JPR'),
(36, 'Jordi Maquinaria', 'S-JMA'),
(37, 'Lamitec', 'S-LAM'),
(38, 'Leonali', 'S-LEO'),
(39, 'Peisa Foods', 'S-PFO'),
(40, 'Rilsa 2000', 'S-RDM'),
(41, 'Unión Agropecuaria Alze', 'S-UAA'),
(43, 'METALES GVO', 'S-GVO'),
(44, 'RICARDO ROJAS', 'S-RRS'),
(45, 'TAVEX', 'S-ITP'),
(46, 'GENARO', 'S-GNR'),
(47, 'ALBERTO BERLAW', 'S-ABW'),
(48, 'Felipe de Jesús Téllez Ramos  ', 'S-FJT'),
(49, 'Pinturas Cuauhtemoc', 'S-PCU'),
(50, 'ANTONIO VAZQUEZ', 'S-AVZ'),
(51, 'ING.MARCO DE GANTE', 'S-MDG'),
(52, 'ING.MARIA ROSARIO REYES ROBLES', 'S-MRR'),
(53, 'ALEJANDRO', 'S-ALE'),
(54, 'EMILIO CORDOBA RAMIREZ', 'S-ECR'),
(55, 'EDUARDO CORTÉS', 'S-EDC'),
(56, 'Alejandro Mozo', 'S-AMZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesm`
--

CREATE TABLE `clientesm` (
  `idClienteSM` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientesm`
--

INSERT INTO `clientesm` (`idClienteSM`, `nombre`, `imagen`) VALUES
(8, 'Adventum Vita', 'adventium.jpg'),
(9, 'Leonali', 'LEONALLI.jpg'),
(10, 'Grupo AGRI-BEANS', 'AgriBeans Re.png'),
(11, 'Altec Fluidos', 'alteck Re.jpeg'),
(12, 'Apc Bombas', 'bombas.jpg'),
(13, 'Capleton', 'capleton Re.png'),
(14, 'Extracciones Basálticas', 'extracciones basalticas Re.png'),
(15, 'Fijodent', 'Fijodent Re.png'),
(16, 'Global Denim', 'Global Re.png'),
(17, 'H&C Cosedoras de Sacos', 'H&C Re.png'),
(18, 'Jordi Maquinaria', 'jordi maquinri Re.png'),
(19, 'Lamitec', 'lamitec2 Re.png'),
(20, 'Peisa Foods', 'peisa Re.jpg'),
(21, 'Grupo Industrial POPUSA', 'popusa Re.jpeg'),
(22, 'Jg Proindusa', 'proindusa Re.png'),
(23, 'Rilsa 2000', 'RILSA2000 Re.jpg'),
(24, 'Unión Agropecuaria Alze', 'unionAlze Re.png'),
(25, 'Dacsa', 'dacsaR.png'),
(34, 'Ing. Cirilo', ''),
(35, 'METALES GVO', 'descarga.png'),
(36, 'RICARDO ROJAS', ''),
(37, 'TAVEX', '0795ebc3-9f43-4280-83fd-c18974ff4c1f.jpeg'),
(38, 'GENARO', ''),
(39, 'ALBERTO BERLAW', ''),
(40, 'Felipe de Jesús Téllez Ramos  ', ''),
(41, 'Pinturas Cuauhtemoc', ''),
(42, 'ANTONIO VAZQUEZ', ''),
(43, 'ING.MARCO DE GANTE', ''),
(44, 'ING.MARIA ROSARIO REYES ROBLES', ''),
(45, 'ALEJANDRO', ''),
(46, 'EMILIO CORDOBA RAMIREZ', ''),
(47, 'EDUARDO CORTÉS', ''),
(48, 'Alejandro Mozo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgclientes`
--

CREATE TABLE `imgclientes` (
  `idCliente` int(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `archivo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `imgclientes`
--

INSERT INTO `imgclientes` (`idCliente`, `nombre`, `archivo`) VALUES
(1, 'Leonali', 'LEONALLI.jpg'),
(2, 'Adventum Vita', 'adventium.jpg'),
(29, 'Grupo AGRI-BEANS', 'AgriBeans Re.png'),
(30, 'Altec Fluidos', 'alteck Re.jpeg'),
(31, 'Apc Bombas', 'bombas.jpg'),
(32, 'Capleton', 'capleton Re.png'),
(33, 'Extracciones Basálticas', 'extracciones basalticas Re.png'),
(34, 'Fijodent', 'Fijodent Re.png'),
(35, 'Global Denim', 'Global Re.png'),
(36, 'H&C Cosedoras de Sacos', 'H&C Re.png'),
(37, 'Jordi Maquinaria', 'jordi maquinri Re.png'),
(38, 'Lamitec', 'lamitec2 Re.png'),
(39, 'Peisa Foods', 'peisa Re.jpg'),
(40, 'Grupo Industrial POPUSA', 'popusa Re.jpeg'),
(41, 'Jg Proindusa', 'proindusa Re.png'),
(42, 'Rilsa 2000', 'RILSA2000 Re.jpg'),
(44, 'Unión Agropecuaria Alze', 'unionAlze Re.png'),
(45, 'Dacsa', 'dacsaR.png'),
(54, 'TAVEX', 'WhatsApp Image 2024-08-13 at 2.26.24 PM.jpeg'),
(55, 'METALES GVO', 'descarga.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgtrabajos`
--

CREATE TABLE `imgtrabajos` (
  `idTrabajo` int(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `imgtrabajos`
--

INSERT INTO `imgtrabajos` (`idTrabajo`, `nombre`, `descripcion`, `archivo`, `tipo`) VALUES
(1, 'Dispositivos', '', 't8.jpg', 'image'),
(2, 'Poleas Dentadas', '', 't10.jpg', 'image'),
(3, 'Conectores', '', 't12.jpg', 'image'),
(4, 'Tapas Nylamid', '', 't14.jpg', 'image'),
(5, 'Mordazas', '', 't16.jpg', 'image'),
(12, 'Conectores', '', 'ruedas Re.jpg', 'image');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_de_trabajo`
--

CREATE TABLE `orden_de_trabajo` (
  `requisicion_id` varchar(255) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `fecha_elab` date DEFAULT NULL,
  `idClienteSM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_salida`
--

CREATE TABLE `orden_salida` (
  `cliente` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `fecha_de_entrega` varchar(255) DEFAULT NULL,
  `numero_de_salida` varchar(255) DEFAULT NULL,
  `requisicion_id` varchar(255) NOT NULL,
  `idClienteSM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidasreq`
--

CREATE TABLE `partidasreq` (
  `id` int(11) NOT NULL,
  `num_partida` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `u_m` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `orden_trabajo` varchar(255) DEFAULT NULL,
  `orden_salida` varchar(255) DEFAULT NULL,
  `ganancia_ingreso` decimal(13,2) DEFAULT NULL,
  `precio` decimal(13,2) DEFAULT NULL,
  `ganancia_porcentaje` decimal(13,2) DEFAULT NULL,
  `requisicion_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidassa`
--

CREATE TABLE `partidassa` (
  `id` int(11) NOT NULL,
  `requisicion_id` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `orden_de_trabajo` varchar(255) DEFAULT NULL,
  `control_de_calidad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidassm`
--

CREATE TABLE `partidassm` (
  `id` int(11) NOT NULL,
  `num_partida` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `u_m` varchar(255) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `cot_no` varchar(255) DEFAULT NULL,
  `orden_trabajo` varchar(255) DEFAULT NULL,
  `plano` varchar(255) DEFAULT NULL,
  `orden_compra` varchar(255) DEFAULT NULL,
  `orden_salida` varchar(255) DEFAULT NULL,
  `rep_fotografico` varchar(255) DEFAULT NULL,
  `fact_no` varchar(255) DEFAULT NULL,
  `precio_uni` decimal(13,2) DEFAULT NULL,
  `c_c` varchar(255) DEFAULT NULL,
  `rf` varchar(255) DEFAULT NULL,
  `porcentaje` decimal(13,2) DEFAULT NULL,
  `estatus` varchar(255) NOT NULL,
  `requisicion_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `partidassm`
--
DELIMITER $$
CREATE TRIGGER `deletePartidasSM` AFTER DELETE ON `partidassm` FOR EACH ROW BEGIN
    DELETE FROM partidasreq WHERE requisicion_id = OLD.requisicion_id;

    DELETE FROM partidastrabajo WHERE requisicion_id = OLD.requisicion_id;

    DELETE FROM partidassa WHERE requisicion_id = OLD.requisicion_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertPartidasSM` AFTER INSERT ON `partidassm` FOR EACH ROW BEGIN
    INSERT INTO partidasreq(id, num_partida, cantidad, u_m, descripcion, orden_trabajo, orden_salida, precio, requisicion_id)
    VALUES (NEW.id, NEW.num_partida, NEW.cantidad, NEW.u_m, NEW.descripcion, NEW.orden_trabajo, NEW.orden_salida, NEW.precio_uni, NEW.requisicion_id);

    INSERT INTO partidastrabajo(id, orden_trabajo, cantidad, descripcion, reporte_fotos, plano, requisicion_id)
    VALUES (NEW.id, NEW.orden_trabajo, NEW.cantidad, NEW.descripcion, NEW.rep_fotografico, NEW.plano, NEW.requisicion_id);

    INSERT INTO partidassa(id, requisicion_id, cantidad, descripcion, orden_de_trabajo, control_de_calidad)
    VALUES (NEW.id, NEW.requisicion_id, NEW.cantidad, NEW.descripcion, NEW.orden_trabajo, NEW.c_c);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatePartidaSM` AFTER UPDATE ON `partidassm` FOR EACH ROW BEGIN
    UPDATE partidastrabajo SET orden_trabajo = NEW.orden_trabajo, cantidad = NEW.cantidad, descripcion = NEW.descripcion, reporte_fotos = NEW.rep_fotografico, plano = NEW.plano, requisicion_id = NEW.requisicion_id WHERE id = OLD.id;

    UPDATE partidassa SET requisicion_id = NEW.requisicion_id, cantidad = NEW.requisicion_id, cantidad = NEW.cantidad, descripcion = NEW.descripcion, orden_de_trabajo = NEW.orden_trabajo, control_de_calidad = NEW.c_c WHERE id = OLD.id;

    UPDATE partidasreq SET num_partida = NEW.num_partida, cantidad = NEW.cantidad, u_m = NEW.u_m, descripcion = NEW.descripcion, orden_trabajo = NEW.orden_trabajo, orden_salida = NEW.orden_salida, precio = NEW.precio_uni, requisicion_id = NEW.requisicion_id WHERE id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidastrabajo`
--

CREATE TABLE `partidastrabajo` (
  `id` int(11) NOT NULL,
  `orden_trabajo` varchar(255) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `reporte_fotos` varchar(255) DEFAULT NULL,
  `muestra` varchar(255) DEFAULT NULL,
  `plano` varchar(50) DEFAULT NULL,
  `sobre_pieza` varchar(50) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `requisicion_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisiciones`
--

CREATE TABLE `requisiciones` (
  `cotizacion` varchar(255) DEFAULT NULL,
  `requisicion_id` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL,
  `factura` varchar(255) DEFAULT NULL,
  `orden_compra` varchar(255) DEFAULT NULL,
  `idClienteSM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sipromadre`
--

CREATE TABLE `sipromadre` (
  `cliente` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `total_f` decimal(13,2) DEFAULT NULL,
  `requisicion_id` varchar(255) NOT NULL,
  `orden_salida` varchar(255) NOT NULL,
  `cot_no` varchar(255) NOT NULL,
  `orden_compra` varchar(255) NOT NULL,
  `fact_no` varchar(255) NOT NULL,
  `idClienteSM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `sipromadre`
--
DELIMITER $$
CREATE TRIGGER `deleteSipromadre` AFTER DELETE ON `sipromadre` FOR EACH ROW BEGIN
    DELETE FROM orden_salida WHERE requisicion_id = OLD.requisicion_id;

    DELETE FROM requisiciones WHERE requisicion_id = OLD.requisicion_id;

    DELETE FROM orden_de_trabajo WHERE requisicion_id = OLD.requisicion_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertSiproMadre` AFTER INSERT ON `sipromadre` FOR EACH ROW BEGIN
    INSERT INTO requisiciones(cotizacion, requisicion_id, fecha, usuario, factura, orden_compra, idClienteSM)
    VALUES (NEW.cot_no, NEW.requisicion_id, NEW.fecha, NEW.usuario, NEW.fact_no, NEW.orden_compra, NEW.idClienteSM);

    INSERT INTO orden_de_trabajo(requisicion_id, usuario, idClienteSM)
    VALUES (NEW.requisicion_id, NEW.usuario, NEW.idClienteSM);

    INSERT INTO orden_salida(cliente, usuario, numero_de_salida, requisicion_id, idClienteSM)
    VALUES (NEW.cliente, NEW.usuario, NEW.orden_salida, NEW.requisicion_id, NEW.idClienteSM);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateSiproMadre` AFTER UPDATE ON `sipromadre` FOR EACH ROW BEGIN
    UPDATE orden_de_trabajo SET requisicion_id = NEW.requisicion_id, usuario = NEW.usuario WHERE requisicion_id = OLD.requisicion_id;

    UPDATE orden_salida SET cliente = NEW.cliente, usuario = NEW.usuario, numero_de_salida = NEW.orden_salida, requisicion_id = NEW.requisicion_id WHERE requisicion_id = OLD.requisicion_id;

    UPDATE requisiciones SET cotizacion = NEW.cot_no, requisicion_id = NEW.requisicion_id, fecha = NEW.fecha, usuario = NEW.usuario, factura = NEW.fact_no, orden_compra = NEW.orden_compra WHERE requisicion_id = OLD.requisicion_id;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abreviaturasempresa`
--
ALTER TABLE `abreviaturasempresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientesm`
--
ALTER TABLE `clientesm`
  ADD PRIMARY KEY (`idClienteSM`);

--
-- Indices de la tabla `imgclientes`
--
ALTER TABLE `imgclientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `imgtrabajos`
--
ALTER TABLE `imgtrabajos`
  ADD PRIMARY KEY (`idTrabajo`);

--
-- Indices de la tabla `orden_salida`
--
ALTER TABLE `orden_salida`
  ADD PRIMARY KEY (`requisicion_id`);

--
-- Indices de la tabla `partidasreq`
--
ALTER TABLE `partidasreq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidassa`
--
ALTER TABLE `partidassa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidassm`
--
ALTER TABLE `partidassm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidastrabajo`
--
ALTER TABLE `partidastrabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requisiciones`
--
ALTER TABLE `requisiciones`
  ADD PRIMARY KEY (`requisicion_id`);

--
-- Indices de la tabla `sipromadre`
--
ALTER TABLE `sipromadre`
  ADD PRIMARY KEY (`requisicion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abreviaturasempresa`
--
ALTER TABLE `abreviaturasempresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `clientesm`
--
ALTER TABLE `clientesm`
  MODIFY `idClienteSM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `imgclientes`
--
ALTER TABLE `imgclientes`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `imgtrabajos`
--
ALTER TABLE `imgtrabajos`
  MODIFY `idTrabajo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `partidasreq`
--
ALTER TABLE `partidasreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidassa`
--
ALTER TABLE `partidassa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidassm`
--
ALTER TABLE `partidassm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidastrabajo`
--
ALTER TABLE `partidastrabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
