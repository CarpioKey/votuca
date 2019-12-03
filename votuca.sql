-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-12-2019 a las 11:52:36
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votuca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `censo`
--

DROP TABLE IF EXISTS `censo`;
CREATE TABLE IF NOT EXISTS `censo` (
  `Id_Usuario` int(11) NOT NULL,
  `Id_Votacion` int(11) NOT NULL,
  PRIMARY KEY (`Id_Usuario`,`Id_Votacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `censo`
--

INSERT INTO `censo` (`Id_Usuario`, `Id_Votacion`) VALUES
(1, 1),
(1, 2),
(6, 1),
(6, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expiracion`
--

DROP TABLE IF EXISTS `expiracion`;
CREATE TABLE IF NOT EXISTS `expiracion` (
  `Id_Usuario` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Id_Usuario` (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficheros_censo`
--

DROP TABLE IF EXISTS `ficheros_censo`;
CREATE TABLE IF NOT EXISTS `ficheros_censo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ficheros_censo`
--

INSERT INTO `ficheros_censo` (`Id`, `Nombre`) VALUES
(1, 'censo1'),
(2, 'censo2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa_electoral`
--

DROP TABLE IF EXISTS `mesa_electoral`;
CREATE TABLE IF NOT EXISTS `mesa_electoral` (
  `Id_Usuario` int(11) NOT NULL,
  `Id_Votacion` int(11) NOT NULL,
  `seAbre` tinyint(1) NOT NULL,
  `seCierra` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_Usuario`,`Id_Votacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesa_electoral`
--

INSERT INTO `mesa_electoral` (`Id_Usuario`, `Id_Votacion`, `seAbre`, `seCierra`) VALUES
(12, 1, 0, 0),
(12, 2, 0, 0),
(13, 1, 0, 0),
(14, 1, 0, 0),
(15, 2, 0, 0),
(16, 2, 0, 0),
(17, 3, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuento`
--

DROP TABLE IF EXISTS `recuento`;
CREATE TABLE IF NOT EXISTS `recuento` (
  `Id_Votacion` int(11) NOT NULL,
  `Id_Voto` int(11) NOT NULL,
  `Num_Votos` int(11) NOT NULL,
  PRIMARY KEY (`Id_Votacion`,`Id_Voto`),
  KEY `Id_Votacion` (`Id_Votacion`,`Id_Voto`),
  KEY `Id_Voto` (`Id_Voto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recuento`
--

INSERT INTO `recuento` (`Id_Votacion`, `Id_Voto`, `Num_Votos`) VALUES
(3, 2, 0),
(3, 3, 0),
(3, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `Id` int(32) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id`, `Nombre`) VALUES
(4, 'Administrador'),
(1, 'Elector'),
(5, 'MiembroElectoral'),
(2, 'Secretario'),
(3, 'SecretarioDelegado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarios_delegados`
--

DROP TABLE IF EXISTS `secretarios_delegados`;
CREATE TABLE IF NOT EXISTS `secretarios_delegados` (
  `Id_Secretario` int(11) NOT NULL,
  `Id_Votacion` int(11) NOT NULL,
  PRIMARY KEY (`Id_Secretario`,`Id_Votacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `secretarios_delegados`
--

INSERT INTO `secretarios_delegados` (`Id_Secretario`, `Id_Votacion`) VALUES
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovotacion`
--

DROP TABLE IF EXISTS `tipovotacion`;
CREATE TABLE IF NOT EXISTS `tipovotacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(32) NOT NULL AUTO_INCREMENT,
  `Id_Rol` int(32) NOT NULL,
  `NombreUsuario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `NombreUsuario` (`NombreUsuario`),
  KEY `Id_Rol` (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Id_Rol`, `NombreUsuario`, `Password`, `Email`) VALUES
(1, 1, 'u00000000', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(2, 4, 'a00000000', '$2y$12$sZ9YHmBqYETwRKfIKGSUT.4ti4rlapaM5uYNj2M.tn21KxSGlytLG', ''),
(3, 3, 's12345678', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(5, 2, 's00000000', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(6, 1, 'u12121212', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(7, 1, 'u13131313', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(8, 1, 'u12345678', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(9, 1, 'u11111111', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(10, 1, 'u14141414', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(11, 1, 'u15151515', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(12, 5, 'm12345678', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(13, 5, 'm14141414', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(14, 5, 'm15151515', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(15, 5, 'm11111111', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(16, 5, 'm12121212', '$2y$12$aecF4Ak8JHHsEWHHoVzs7.UQ/IXMpyekhuG8vXjJ61HXy5aJ84WV.', ''),
(17, 5, 'm00000000', '$2y$12$0F83vZENyQFwMK8Ze2c53.gtazQ.jKZ6svuOp/xUpBhNT3UjggVIa', 'm00000000@uca.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_votacion`
--

DROP TABLE IF EXISTS `usuario_votacion`;
CREATE TABLE IF NOT EXISTS `usuario_votacion` (
  `Id_Usuario` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Votacion` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Voto` varchar(1024) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_votacion`
--

INSERT INTO `usuario_votacion` (`Id_Usuario`, `Id_Votacion`, `Id_Voto`) VALUES
('$2y$10$oknCJ9GaiV6PI.OSVP/XGutB1K3Av8I87nxgWtV2davAGb3ats2ma', '$2y$10$FQVreekq83lCRbHdaq1pve/E3eVJbapTmgFY0DBDiKhlYZk4scL6G', '$2y$10$5kR.H/PhCoHtRyIe6peJa.sV3F4WSY/ow4KvoDJUjuAQEaJEsF9vi'),
('$2y$10$lBjIp0feAbzu1hpF92VZ0.R6pjgfgNdCs9pl2o73JnPbr2YPZCRFm', '$2y$10$H6RVPs8zqR3DRz2gbVhI6OjFcpPjlG428YxV11lgUPXfvC9hdSinC', '$2y$10$KXZGTqgCrd1FG.IM.pcCbuq3r6MOVFzkY.pvQtne69A.WNe9gSqrC'),
('$2y$10$/1TSFRu20SQ2uuP/1qJfReWRWYJi//pa/mv26YOzVEPmRNV7EBVbO', '$2y$10$IWMNgVdKeE1UxA3SXYNGUOhuL/TykbGwN9cXpO3cPTuRfNbb/IRhy', '$2y$10$iV7G0RXwiWu/ytL5VHNtFeMHqxcO8sL.4VRTPwEt5Jm8exvph32Ai'),
('$2y$10$ZlV5RdHTpgnXawfJ/BupmOTKLxzSgvXxL4CzfGm.0t7aCS6q6Cx1i', '$2y$10$BXrN2fqE6eQrZ1SKDFBCyuSAU/k/DW8/8ACzzZ/V08.o6R0yWne1C', '$2y$10$QDyPwowUxvtIzsyCovYtFe60YfoYMTgr3sPRoL9Qxz0V4KTj.V1F.'),
('$2y$10$5uWM5YztxckWx/yZQ.lJB.9qJH16DK0cugt3nJQQEfcqb9/GKxrwK', '$2y$10$AietQ3zcsIVkawUUiu55JOVhnLvn5HuN5n9xO5gJVwoyvrPRwkudS', '$2y$10$/Sjz1FWUU4BY/pjrFVs4nO.SDjLNI7m.ZM0B62gmzqSFLNX/FJWJS'),
('$2y$10$PQP8A03BK5XThsBJQhDfguG5oBXBPpXvQeqbR0jbO6UjAKIyTS6Am', '$2y$10$DpVnu0sPBXZeSnwuBuJBJOifmfYzxh.FaeenSvharJ.hKdg8kHFIS', '$2y$10$PChACBaiCAB6hEwJjpu1XedODQrgHdxFWk/xAF57QI/SjagRCgVt2'),
('$2y$10$/J77NoQwvRPE1FMjJvHp4OQ7bPOHVS60diBejLLvMEyPUkjpyC07u', '$2y$10$PPw2qroh5TkDeq5uxjlLVOgd9hLyH5YVPQvJS70GmyCQdjF.uIFZS', '$2y$10$D3pWppgTKBe8YCPDXoifiuyCIfoZ40WEgkFWvcua4xTn3Lm/z74ya'),
('$2y$10$.7wL88Ohw5PT4BGxs.tCG.m2BldCbcv27aIdfiG1blPdi5GyTsAu6', '$2y$10$ta3OsKA2/b14ylvIMhpmkeMYMfXydCOMnEoV90xmLX7/dl1DMbcZC', '$2y$10$q1W4/7OADZgsQ1/nXQy5O.f8DsHJUdFzzd5vr.GQ9Bbtwm2b1CaeW'),
('$2y$10$ezLL07oFkyYvaboUhKKyv..Gz3XfTBV4Zt2NoWDC5RIrq8YQHM.Mq', '$2y$10$0lJ2MVx6TLmDFer0U24PaOBfT5j5bGsYPQsxQLQw0M1Mss0PD7q.e', '$2y$10$i7caEnWP7d3HGsT4lycGqe9P8NjBTPJf77KReUvq2cvrUuynfhBuC'),
('$2y$10$ciwM7Jpng42iYhO6OilxwOgzgpxauEb7j4mRStreL2toSxiRBpVEi', '$2y$10$QtqmlvzU1dNWo3t/z1.A6eJNcdZh9UKQqaADrehOwbbEMxhF1da6e', '$2y$10$tYuYwUz7pP9Hi5KEjP2DXOetp9jo7nhX6SDT9cBKW8ET7RM7IvbNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

DROP TABLE IF EXISTS `votacion`;
CREATE TABLE IF NOT EXISTS `votacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(1024) COLLATE utf8_spanish_ci NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFinal` datetime NOT NULL,
  `Quorum` float NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `esBorrador` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `votacion`
--

INSERT INTO `votacion` (`Id`, `Titulo`, `Descripcion`, `FechaInicio`, `FechaFinal`, `Quorum`, `isDeleted`, `esBorrador`) VALUES
(1, 'Votacion 1', 'Descripcion 1', '2019-11-30 09:21:00', '2019-12-01 09:00:00', 0, 0, 0),
(2, 'Votacion 2', 'Descripcion 2', '2019-12-02 09:00:00', '2019-12-03 09:00:00', 0, 0, 0),
(3, 'Votacion diciembre abierta', 'dasfseresr', '2019-12-02 15:00:00', '2019-12-31 15:00:00', 0.2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion_voto`
--

DROP TABLE IF EXISTS `votacion_voto`;
CREATE TABLE IF NOT EXISTS `votacion_voto` (
  `Id_Votacion` int(11) NOT NULL,
  `Id_Voto` int(11) NOT NULL,
  PRIMARY KEY (`Id_Votacion`,`Id_Voto`),
  KEY `Id_Votacion` (`Id_Votacion`),
  KEY `Id_Voto` (`Id_Voto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `votacion_voto`
--

INSERT INTO `votacion_voto` (`Id_Votacion`, `Id_Voto`) VALUES
(3, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

DROP TABLE IF EXISTS `voto`;
CREATE TABLE IF NOT EXISTS `voto` (
  `Id` int(32) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `voto`
--

INSERT INTO `voto` (`Id`, `Nombre`) VALUES
(1, 'No votado'),
(2, 'Sí'),
(3, 'No'),
(4, 'En blanco');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expiracion`
--
ALTER TABLE `expiracion`
  ADD CONSTRAINT `expiracion_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id`);

--
-- Filtros para la tabla `recuento`
--
ALTER TABLE `recuento`
  ADD CONSTRAINT `recuento_ibfk_1` FOREIGN KEY (`Id_Votacion`) REFERENCES `votacion` (`Id`),
  ADD CONSTRAINT `recuento_ibfk_2` FOREIGN KEY (`Id_Voto`) REFERENCES `voto` (`Id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_rol - con rol usario` FOREIGN KEY (`Id_Rol`) REFERENCES `rol` (`Id`);

--
-- Filtros para la tabla `votacion_voto`
--
ALTER TABLE `votacion_voto`
  ADD CONSTRAINT `votacion_voto_ibfk_1` FOREIGN KEY (`Id_Votacion`) REFERENCES `votacion` (`Id`),
  ADD CONSTRAINT `votacion_voto_ibfk_2` FOREIGN KEY (`Id_Voto`) REFERENCES `voto` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
