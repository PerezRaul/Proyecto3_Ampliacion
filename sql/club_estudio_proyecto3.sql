-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2015 a las 01:36:16
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club_estudio_proyecto3`
--
CREATE DATABASE IF NOT EXISTS `club_estudio_proyecto3` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `club_estudio_proyecto3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Aula'),
(2, 'Sala'),
(3, 'Hardware y recursos'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE IF NOT EXISTS `incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id_incidencia`, `titulo`, `descripcion`, `id_recurso`, `id_usuario`, `fecha`) VALUES
(1, 'Cargadores de Portátil', 'Los cargadores de los portátiles 01-19 y 01-22 no funcionan. ', 1, 2, '2015-09-21 09:22:29'),
(2, 'Reparar asiento sala de reuniones', 'Buenos días, mañana se celebrará una reunión muy importante en la sala de reuniones y hemos visto que un par de asientos están en mal estado. Gracias.', 12, 2, '2015-10-05 10:37:18'),
(3, 'Teclados y ratones aula informática', 'Buenos días, algunos estudiantes me han informado que hay ratones y teclados del aula de informática norte que no funcionan correctamente.  ', 4, 3, '2015-10-06 08:33:22'),
(4, 'Pantalla portátil carro rota', 'Esta mañana revisando los portátiles antes de clase he observado que el portátil  01-13 tenía la pantalla rota. Es bastante importante cambiarla cuanto antes, necesitamos todos los portátiles.', 1, 4, '2015-10-10 13:24:37'),
(5, 'Actualización Windows 10', 'Hace un tiempo que siempre que iniciamos este portátil salta un mensaje para actualizar a Windows 10. Nos gustaría que actualizarais el portátil o quitarais el mensaje, es bastante molesto.', 10, 3, '2015-11-04 11:24:35'),
(6, 'No detecta la SIM', 'Me han asignado el teléfono para las llamadas de empresa, pero no me detecta la segunda SIM. Dejaré el teléfono en recepción.', 6, 4, '2015-11-04 10:33:13'),
(7, 'Ratones aula informática', 'Me han informado que siguen fallando algunos ratones del aula informática norte.', 4, 2, '2015-11-04 17:27:39'),
(8, 'Proyector aula Magna', 'El proyector de ha descolgado del techo, lo necesitamos para impartir clase.', 13, 4, '2015-11-04 12:21:34'),
(9, 'Proyector Asus', 'Hemos cogido el proyector Asus para utilizarlo mientras solucionáis lo del aula Magna, pero la bombilla de este proyector emite colores extraños.', 11, 2, '2015-11-04 11:30:00'),
(10, 'Cableado despacho reuniones', 'Esta sala cuenta con dos cables RJ45 pero, han desaparecido y llega muy poca conexión de WI-FI.', 3, 3, '2015-11-04 12:45:33'),
(11, 'Calibrar pizarra táctil', 'La pizarra táctil de este aula está totalmente descalibrada, no podemos utilizarla en este estado.', 14, 3, '2015-11-04 11:17:38'),
(12, 'Proyector Asus', 'La bombilla se ha fundido, esta tarde necesitamos el proyector para una reunión.', 11, 2, '2015-11-04 11:21:33'),
(13, 'Carro portátiles', 'Han desaparecido los portátiles 01-18 y 01-19.', 1, 4, '2015-11-04 12:19:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nombre`, `descr`, `img`, `estado`, `categoria`, `activo`) VALUES
(1, 'Carro portátiles2', 'Carro de portátiles situado en recepción, contiene de 25 portátiles Compaq y sus cargadores, todos ellos numerados. Especificaciones: Windows 7, procesador Intel I5, 4GB de memoria RAM, disco duro de 500 GB, pantalla 15.6”, conectores VGA y HDMI.\r\n', 'carro.jpg', '0', '3', 1),
(2, 'Despacho entrevistas', 'Despacho  para entrevistas situado en la primera planta detrás de recepción, puerta 01. Consta de un escritorio y dos sillas de oficina.', 'despacho1.jpg', '0', '2', 0),
(3, 'Despacho reuniones', 'Despacho de reuniones y estudio en grupo, situado en la primera planta detrás de recepción, puerta 02. Consta de una mesa redonda y cinco sillas de oficina.', 'despacho2.jpg', '0', '2', 0),
(4, 'Aula informática norte', 'Aula de informática situada en la sala 10. Consta de dieciséis equipos sobremesa, pizarra y un proyector. Especificaciones de los equipos: Windows 7, procesador Intel I3, 2GB de memoria RAM, disco duro de 500GB.', 'informatica1.jpg', '0', '1', 0),
(5, 'Aula informática sur', 'Aula de informática situada en la sala 11. Consta de diecinueve equipos portátiles, pizarra y un proyector. Especificaciones de los equipos: Windows 7, procesador Intel I5, 4GB de memoria RAM, disco duro de 1TB.', 'informatica2.jpg', '0', '1', 1),
(6, 'Móvil Bogo', 'Teléfono multimedia Android lifeStyle 4SL-QC. Especificaciones: Procesador Quad Core, Dual SIM, pantalla 4.3”, cámara 8 Mp, batería  integrada litio, GPS, Wi-FI, Bluetooth.', 'movil1.jpg', '0', '3', 0),
(7, 'Móvil HTC', 'Teléfono multimedia Windows Phone HTC 8x. Especificaciones: Procesador Qualcomm, pantalla 4.3”, cámara 8 Mp, batería  integrada litio, GPS, Wi-FI, Bluetooth.', 'movil2.jpg', '0', '3', 0),
(8, 'Portátil Acer', 'Portátil Acer Aspire, guardado en la sala de profesores. Especificaciones: Windows 7, procesador Intel I3, 4GB de memoria RAM, disco duro de 250 GB, pantalla 15.6”, conector VGA.', 'portatil1.jpg', '0', '3', 0),
(9, 'Portátil Toshiba', 'Portátil Toshiba Satellite, guardado en la sala de profesores. Especificaciones: Windows 7, procesador Intel I5, 4GB de memoria RAM, disco duro de 500 GB, pantalla 15.6”, conectores VGA y HDMI.', 'portatil2.jpg', '0', '3', 0),
(10, 'Portátil HP', 'Portátil HP, pensado para diseño, guardado en la sala de profesores. Especificaciones: Windows 8, procesador Intel I7, 8GB de memoria RAM, disco duro de 500 GB, pantalla 15.6”, gráfica gt760, conectores VGA y HDMI.', 'portatil3.jpg', '0', '3', 0),
(11, 'Proyector Asus', 'Proyector Asus, guardado en la sala de profesores. Contiene mando propio. Especificaciones: Entrada VGA y HDMI, audio Estéreo, resolución nativa 800x600, peso 1.9Kg .', 'proyector.jpg', '0', '3', 0),
(12, 'Sala Reuniones', 'Aula de reuniones y debates, situada en la sala 35. Espacio para 38 personas.', 'reuniones.jpg', '0', '2', 0),
(13, 'Aula teoría 01', 'Aula Magna, situada en la sala 38, espacio para 157 estudiantes. Cuenta con proyector y un equipo de sobremesa', 'teoria1.jpg', '0', '1', 0),
(14, 'Aula teoría 02', 'Aula situada en la sala 32, espacio para 40 estudiantes. Cuenta con un proyector y una pizarra táctil. ', 'teoria2.jpg', '0', '1', 0),
(15, 'Aula teoría 03', 'Aula situada en la sala 30, espacio para grupos reducidos (16-20 personas). Cuenta con un proyector y una mesa de reuniones.', 'teoria3.jpg', '0', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `hora_inicial` time NOT NULL,
  `fecha_final` date NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_user`, `id_recurso`, `fecha_inicial`, `hora_inicial`, `fecha_final`, `hora_final`) VALUES
(12, 3, 2, '2012-10-12', '10:10:00', '2015-12-12', '10:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo`) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'Root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rol` tinyint(4) NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nom`, `pass`, `rol`, `img`, `estado`) VALUES
(1, 'us_admin', 'admin123', 3, '1.jpg', 0),
(2, 'us_normal_1', 'user123', 1, '1.jpg', 1),
(3, 'us_normal_2', 'user456', 1, '2.jpg', 0),
(4, 'us_normal_3', 'user789', 1, '2.jpg', 0),
(7, 'paco', '123', 2, '', 0),
(8, 'pérez', '1234', 1, '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
