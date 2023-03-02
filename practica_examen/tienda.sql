-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2023 a las 21:00:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
DROP DATABASE IF EXISTS `tienda`;
CREATE DATABASE `tienda`;
use `tienda`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributos`
--

CREATE TABLE `atributos` (
  `idAtributos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_has_direccion`
--

CREATE TABLE `clientes_has_direccion` (
  `Clientes_idClientes` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `codigoPostal` int(11) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Clientes_idClientes` int(11) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fechaPago` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `tamano` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_atributos`
--

CREATE TABLE `productos_has_atributos` (
  `Productos_idProductos` int(11) NOT NULL,
  `Atributos_idAtributos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `salt` varchar(16) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `codActivacion` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`idAtributos`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

--
-- Indices de la tabla `clientes_has_direccion`
--
ALTER TABLE `clientes_has_direccion`
  ADD PRIMARY KEY (`Clientes_idClientes`,`Direccion_idDireccion`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Clientes_idClientes`,`Productos_idProductos`),
  ADD KEY `fk_Clientes_has_Productos_Productos1` (`Productos_idProductos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`);

--
-- Indices de la tabla `productos_has_atributos`
--
ALTER TABLE `productos_has_atributos`
  ADD PRIMARY KEY (`Productos_idProductos`,`Atributos_idAtributos`),
  ADD KEY `fk_Productos_has_Atributos_Atributos1` (`Atributos_idAtributos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Clientes_has_Productos_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_atributos`
--
ALTER TABLE `productos_has_atributos`
  ADD CONSTRAINT `fk_Productos_has_Atributos_Atributos1` FOREIGN KEY (`Atributos_idAtributos`) REFERENCES `atributos` (`idAtributos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_has_Atributos_Productos1` FOREIGN KEY (`Productos_idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;




--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('Barbara', 'alvaro@gmail.com', 21, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('Pedro', 'pedro@gmail.com', 25, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('Barbara', 'barbara@gmail.com', 21, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('chispa', 'alvaro@gmail.com', 24, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 3, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 56, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 100, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 100, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro0', 'alvaro0@gmail.com', 1, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 47, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 77, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 10, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 91, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 52, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 92, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 56, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 89, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 39, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro0', 'alvaro0@gmail.com', 3, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 113, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 80, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 41, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 47, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 82, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 118, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 38, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 13, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 63, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro0', 'alvaro0@gmail.com', 34, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 34, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 114, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 92, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 52, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 117, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 17, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 117, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 30, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 106, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro0', 'alvaro0@gmail.com', 22, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 98, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 53, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 99, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 33, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 77, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 59, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 30, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 47, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 90, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 90, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 81, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 108, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 22, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 63, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 69, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 108, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 26, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 14, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro0', 'alvaro0@gmail.com', 91, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 38, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 92, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 32, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 27, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 79, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 11, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 62, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 115, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 40, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro0', 'alvaro0@gmail.com', 38, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 96, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 95, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 27, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 79, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 114, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 100, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 30, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 97, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 54, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 93, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 105, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 4, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 30, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 1, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 81, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 84, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 4, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 52, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro0', 'alvaro0@gmail.com', 19, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 1, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 36, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 104, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 78, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 77, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 108, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 18, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 90, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 97, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 26, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 108, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 97, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 15, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 38, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 86, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 93, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 76, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 68, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 37, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 105, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 69, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 53, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 27, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 36, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 107, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 17, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 6, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 3, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 39, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 52, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 17, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 48, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 86, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 87, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 23, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 21, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 69, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 61, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 85, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 104, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 113, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 21, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 28, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 114, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 29, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 68, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 15, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 40, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 80, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 92, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 117, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 103, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 65, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 61, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 8, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 92, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 12, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 45, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 53, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 49, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 58, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 28, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 105, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro1', 'alvaro1@gmail.com', 14, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro2', 'alvaro2@gmail.com', 49, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro3', 'alvaro3@gmail.com', 117, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro4', 'alvaro4@gmail.com', 71, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro5', 'alvaro5@gmail.com', 61, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro6', 'alvaro6@gmail.com', 16, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro7', 'alvaro7@gmail.com', 10, 'H');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro8', 'alvaro8@gmail.com', 34, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('alvaro9', 'alvaro9@gmail.com', 16, 'M');
INSERT INTO clientes (nombre, email, edad, sexo) VALUES ('Maximo', 'max@gemail.com', 19, 'H');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;