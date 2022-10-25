-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2022 a las 10:50:08
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
-- Base de datos: `proyecto_jujomi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `img_curso` varchar(2000) NOT NULL,
  `nombre_curso` varchar(100) DEFAULT NULL,
  `desc_curso` text DEFAULT NULL,
  `num_lecciones` int(11) DEFAULT NULL,
  PRIMARY KEY(`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `img_curso`, `nombre_curso`, `desc_curso`, `num_lecciones`) VALUES
(1, '<svg xmlns=\"http://www.w3.org/2000/svg\" x=\"0px\" y=\"0px\" width=\"200\" height=\"200\" viewBox=\"0 0 50 50\" style=\" fill:#000000;\">\n<path fill=\"#E65100\" d=\"M41,5H7l3,34l14,4l14-4L41,5L41,5z\"></path>\n<path fill=\"#FF6D00\" d=\"M24 8L24 39.9 35.2 36.7 37.7 8z\"></path>\n<path fill=\"#FFF\" d=\"M24,25v-4h8.6l-0.7,11.5L24,35.1v-4.2l4.1-1.4l0.3-4.5H24z M32.9,17l0.3-4H24v4H32.9z\"></path>\n<path fill=\"#EEE\" d=\"M24,30.9v4.2l-7.9-2.6L15.7,27h4l0.2,2.5L24,30.9z M19.1,17H24v-4h-9.1l0.7,12H24v-4h-4.6L19.1,17z\"></path>\n</svg>', 'HTML 5', 'En este curso gratuito, aprenderás todos los aspectos fundamentales para empezar a crear páginas web con HTML 5', 10),
(2, '<svg xmlns=\"http://www.w3.org/2000/svg\" x=\"0px\" y=\"0px\" width=\"200\" height=\"200\" viewBox=\"0 0 50 50\" style=\" fill:#000000;\">\n<path fill=\"#0277BD\" d=\"M41,5H7l3,34l14,4l14-4L41,5L41,5z\"></path>\n<path fill=\"#039BE5\" d=\"M24 8L24 39.9 35.2 36.7 37.7 8z\"></path>\n<path fill=\"#FFF\" d=\"M33.1 13L24 13 24 17 28.9 17 28.6 21 24 21 24 25 28.4 25 28.1 29.5 24 30.9 24 35.1 31.9 32.5 32.6 21 32.6 21z\"></path>\n<path fill=\"#EEE\" d=\"M24,13v4h-8.9l-0.3-4H24z M19.4,21l0.2,4H24v-4H19.4z M19.8,27h-4l0.3,5.5l7.9,2.6v-4.2l-4.1-1.4L19.8,27z\"></path></svg>', 'Css 3', 'En este curso gratuito, aprenderas a darle estilo a tus documentos html con CSS3, tu unico limite sera la imaginacion', 0),
(3, '<svg xmlns=\"http://www.w3.org/2000/svg\" x=\"0px\" y=\"0px\" width=\"200\" height=\"200\" viewBox=\"0 0 50 50\" style=\" fill:#000000;\">\n<path fill=\"#ffd600\" d=\"M6,42V6h36v36H6z\"></path>\n<path fill=\"#000001\" d=\"M29.538 32.947c.692 1.124 1.444 2.201 3.037 2.201 1.338 0 2.04-.665 2.04-1.585 0-1.101-.726-1.492-2.198-2.133l-.807-.344c-2.329-.988-3.878-2.226-3.878-4.841 0-2.41 1.845-4.244 4.728-4.244 2.053 0 3.528.711 4.592 2.573l-2.514 1.607c-.553-.988-1.151-1.377-2.078-1.377-.946 0-1.545.597-1.545 1.377 0 .964.6 1.354 1.985 1.951l.807.344C36.452 29.645 38 30.839 38 33.523 38 36.415 35.716 38 32.65 38c-2.999 0-4.702-1.505-5.65-3.368L29.538 32.947zM17.952 33.029c.506.906 1.275 1.603 2.381 1.603 1.058 0 1.667-.418 1.667-2.043V22h3.333v11.101c0 3.367-1.953 4.899-4.805 4.899-2.577 0-4.437-1.746-5.195-3.368L17.952 33.029z\"></path></svg>', 'JavaScript', 'En este curso gratuito de JavaScript aprenderas desde las operaciones basicas, hasta funciones complejas con arrays y manejo de numerosos datos', NULL),
(4, '<svg xmlns=\"http://www.w3.org/2000/svg\" x=\"0px\" y=\"0px\" width=\"200\" height=\"200\" viewBox=\"0 0 80 80\" style=\" fill:#000000;\"><path fill=\"#dcd5f2\" d=\"M40,61.5C18.22,61.5,0.5,51.855,0.5,40S18.22,18.5,40,18.5S79.5,28.145,79.5,40S61.78,61.5,40,61.5z\"></path><path fill=\"#8b75a1\" d=\"M40,19c21.505,0,39,9.421,39,21S61.505,61,40,61S1,51.579,1,40S18.495,19,40,19 M40,18 C17.909,18,0,27.85,0,40s17.909,22,40,22s40-9.85,40-22S62.091,18,40,18L40,18z\"></path><path fill=\"#36404d\" d=\"M25.112 34c1.725 0 3.214.622 4.084 1.706.749.934.981 2.171.668 3.577C29.023 43.074 27.395 44 21.57 44h-4.14l1.75-10H25.112M25.112 32H17.5L14 52h2l1.056-6h4.515c5.863 0 9.053-.905 10.246-6.284C32.842 35.096 29.436 32 25.112 32L25.112 32zM61.112 34c1.725 0 3.214.622 4.084 1.706.749.934.981 2.171.668 3.577C65.023 43.074 63.395 44 57.57 44h-4.14l1.75-10H61.112M61.112 32H53.5L50 52h2l1.056-6h4.515c5.863 0 9.053-.905 10.246-6.284C68.842 35.096 65.436 32 61.112 32L61.112 32z\"></path><g><path fill=\"#36404d\" d=\"M49.072,33.212C48.193,32.348,46.644,32,44.334,32h-5.538L40,26h-2.1L34,46h1.99l2.388-12h0.419 h5.538c2.338,0,3.094,0.4,3.335,0.637c0.343,0.338,0.424,1.226,0.217,2.363l-1.767,9h2.106l1.626-8.63 C50.199,35.462,49.936,34.062,49.072,33.212z\"></path></g></svg>', 'PhP', 'En este curso aprenderas los conceptos basicos de PHP mediante la realizacion de un crud', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_u` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `hora_u` time DEFAULT NULL,
  `email_u` varchar(150) DEFAULT NULL,
  `nombre_u` varchar(100) DEFAULT NULL,
  `contrasena_u` varchar(255) DEFAULT NULL,
  PRIMARY KEY(`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_u`, `fecha_u`, `hora_u`, `email_u`, `nombre_u`, `contrasena_u`) VALUES
(10, '2022-09-01', '14:41:55', 'despinal12@misena.edu.co', 'juanguarnizo', '$argon2id$v=19$m=65536,t=4,p=1$Ti5CSnVOdlVnV290UnpjSA$eSn6iYzoYcw+FHkSXCL2tuYE5aiN79HRKt91txDukbg'),
(20, '2022-09-10', '02:41:55', '2804juanjo@gmail.com', 'juanjo', '$argon2id$v=19$m=65536,t=4,p=1$anZPZC5VMGV4MTNBMW9naA$KDzRAF8vZv2nzfL9QKvj+U00Zd40Vmes3et/4rAclkM'),
(21, '1900-01-15', '05:41:55', 'placeholder@deez.nuts', 'test', '$argon2id$v=19$m=65536,t=4,p=1$U0Z6a3FIcnRzZkZpZ3N0Tw$Hrwj3cYpE4+xTAphxjh8t8906nNG7nqNcxhKivqPUjA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_u`),
  ADD UNIQUE KEY `email_u` (`email_u`,`nombre_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
