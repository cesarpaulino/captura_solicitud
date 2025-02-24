-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2025 a las 09:37:46
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
-- Base de datos: `soporte_informatica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_subarea` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `id_subarea`) VALUES
(1, 'J.U.D. Control de Asistencia', 1),
(2, 'J.U.D. de Movimiento de Personal', 1),
(3, 'J.U.D de Pagos', 2),
(4, 'J.U.D Nominas', 2),
(5, 'J.U.D. de Programación', 3),
(6, 'J.U.D. de Presupuesto', 3),
(7, 'J.U.D. de Tesorería', 4),
(8, 'J.U.D. de Recursos de Aplicación Automática', 4),
(9, 'J.U.D de Adquisiciones', 7),
(10, 'J.U.D de Almacenes e Inventarios', 7),
(11, 'J.U.D. de Talleres', 8),
(12, 'J.U.D. de Mantenimiento a Edificios Públicos', 8),
(13, 'J.U.D. de Intendencia', 8),
(14, 'J.U.D. de Servicios Generales', 8),
(15, 'J.U.D. de Logística', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `nombre`) VALUES
(1, 'Dirección General de Administración'),
(2, 'Dirección General de Desarrollo y Bienestar'),
(3, 'Dirección General de Gobierno'),
(4, 'Dirección General de los Derechos Culturales, Recreativos y Educativos'),
(5, 'Dirección General de Obras y Desarrollo Urbano'),
(6, 'Dirección General de Seguridad Ciudadana y Protección Civil'),
(7, 'Dirección General de Servicios Urbanos'),
(8, 'Dirección General Jurídica y de Servicios Legales'),
(9, 'Jefatura de Alcaldía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hardware`
--

CREATE TABLE `hardware` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hardware`
--

INSERT INTO `hardware` (`id`, `nombre`) VALUES
(1, 'Escaner'),
(2, 'Impresora'),
(3, 'Laptop'),
(4, 'Monitor'),
(5, 'Mouse'),
(6, 'Multifuncional'),
(7, 'No-Break'),
(8, 'PC'),
(9, 'Teclado'),
(10, 'USB'),
(11, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horadellamada` time NOT NULL,
  `horadeatencion` time DEFAULT NULL,
  `teloext` varchar(11) DEFAULT NULL,
  `folio` varchar(5) DEFAULT NULL,
  `noficio` varchar(5) DEFAULT NULL,
  `ndetabla` varchar(5) DEFAULT NULL,
  `secretarias` varchar(100) DEFAULT NULL,
  `hardware` varchar(100) DEFAULT NULL,
  `nomreqser` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `subdireccion` varchar(150) DEFAULT NULL,
  `subarea` varchar(150) DEFAULT NULL,
  `departamento` varchar(150) DEFAULT NULL,
  `seccion` varchar(150) DEFAULT NULL,
  `desfalla` text DEFAULT NULL,
  `tecnicos` varchar(100) DEFAULT NULL,
  `nprogresivo` varchar(50) DEFAULT NULL,
  `mac` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `tomarazon` text DEFAULT NULL,
  `firma` varchar(50) DEFAULT NULL,
  `nomusuate` varchar(100) DEFAULT NULL,
  `desserea` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `fecha`, `horadellamada`, `horadeatencion`, `teloext`, `folio`, `noficio`, `ndetabla`, `secretarias`, `hardware`, `nomreqser`, `ubicacion`, `direccion`, `subdireccion`, `subarea`, `departamento`, `seccion`, `desfalla`, `tecnicos`, `nprogresivo`, `mac`, `ip`, `tomarazon`, `firma`, `nomusuate`, `desserea`) VALUES
(1, '2025-02-19', '10:16:00', '10:33:00', '435', '45', '345', '4354', 'Claudia Santos', 'Impresora', 'Cesar', 'Primer piso ala oriente', '1', '1', '1', '1', NULL, 'dsfdf', 'Cesar Parra', '345', 'EE:EE:EE:EE:EE:EE', '192.168.15.1', 'Sí', 'Sí', 'cesar', 'hola mundo'),
(2, '2025-02-21', '08:02:00', '08:23:00', '15', '158', '23', '234', 'Andrea Felix', 'Escaner', 'Cesar', 'Primer piso ala oriente', '1', '1', '1', '1', '1', 'sdfsfdf', 'Daniel Lopez', '345', 'EE:EE:EE:EE:EE:EE', '192.168.25.25', 'Sí', 'Sí', 'CesarPa', 'fgfdgtr'),
(3, '2025-02-23', '17:00:00', '18:00:00', '12', '12', '21', '212', 'Andrea Felix', 'Multifuncional', 'sdasdsd', 'Segundpo piso ala sur', 'Dirección General de Administración', 'Dirección de Recursos Humanos', 'Subdirección de Asuntos Laborales y Movimiento de Personal', 'J.U.D. Control de Asistencia', 'Sección 1', 'fdsgfdsg', 'Ángel Hernandez', '345', 'EE:EE:EE:EE:EE:EE', '192.168.3.3', 'Sí', 'Sí', 'fdgdfg', 'dfgdfgdfg'),
(4, '2025-02-23', '16:00:00', '17:05:00', '25', '45', '454', '454', 'Fabiola Estrada', 'Monitor', '45454', 'Segundpo piso ala poniente', 'Dirección General de Administración', 'Dirección de Recursos Humanos', 'Subdirección de Asuntos Laborales y Movimiento de Personal', 'J.U.D. Control de Asistencia', 'Sección 1', 'dxfvdsf', 'Abraham Alvarado', '456', '00:00:00:00:00:00', '192.168.2.3', 'Sí', 'Sí', 'rdgtdrtgre', 'fdggtr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_departamentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`, `id_departamentos`) VALUES
(1, 'Sección 1', 1),
(2, 'Sección 2', 1),
(3, 'Sección 3', 2),
(4, 'Sección 4', 2),
(5, 'Sección 5', 3),
(6, 'Sección 6', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarias`
--

CREATE TABLE `secretarias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `secretarias`
--

INSERT INTO `secretarias` (`id`, `nombre`) VALUES
(1, 'Andrea Felix'),
(2, 'Claudia Santos'),
(3, 'Fabiola Estrada'),
(4, 'Rosa Ramirez'),
(5, 'Rosario Sanchez'),
(6, 'Tatiana Farfan'),
(7, 'Vanessa Gonzalez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subareas`
--

CREATE TABLE `subareas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_subdireccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `subareas`
--

INSERT INTO `subareas` (`id`, `nombre`, `id_subdireccion`) VALUES
(1, 'Subdirección de Asuntos Laborales y Movimiento de Personal', 1),
(2, 'Subdirección de administración del Personal', 1),
(3, 'Subdirección de Presupuesto', 2),
(4, 'Subdirección de Contabilidad', 2),
(5, 'J.U.D. de Atención a Siniestros', 3),
(6, 'Subdirección de Informática', 3),
(7, 'Subdirección de Recursos materiales', 3),
(8, 'Subdirección de Servicios Generales', 3),
(9, 'J.U.D. de Administración de Procesos', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subdirecciones`
--

CREATE TABLE `subdirecciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_direcciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `subdirecciones`
--

INSERT INTO `subdirecciones` (`id`, `nombre`, `id_direcciones`) VALUES
(1, 'Dirección de Recursos Humanos', 1),
(2, 'Dirección de Presupuesto y Finanzas', 1),
(3, 'Dirección de Recursos Material y Servicios Generales ', 1),
(4, 'L.C.P. de Control y Seguimiento ', 1),
(5, 'L.C.P. de Adquisiciones y Servicios Generales A-B', 1),
(6, 'L.C.P. de Proyectos en Materia Financiera A-B', 1),
(7, 'L.C.P. de Administración de Personal', 1),
(8, 'J.U.D. de Control y Gestión de Administración', 1),
(9, 'J.U.D. de Atención y Seguimiento a Auditorias', 1),
(10, 'Subdirección de Organización y Desarrollo Administrativo', 1),
(11, 'Dirección de Recursos Materiales y Servicios Generales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `nombre`) VALUES
(1, 'Aban Prieto'),
(2, 'Abraham Alvarado'),
(3, 'Ángel Hernandez'),
(4, 'Antonio Villa'),
(5, 'Arturo Islas'),
(6, 'Carolina Amaro'),
(7, 'Cesar Parra'),
(8, 'Cristopher Ibañez'),
(9, 'Daniel Lopez'),
(10, 'Emilio Linarez'),
(11, 'Emilio Nuñez'),
(12, 'Fernanado Aceves'),
(13, 'Fernando Vera'),
(14, 'Gladis Mora'),
(15, 'Guillermo Sandoval'),
(16, 'Hiram Olalde'),
(17, 'Ivan Morales'),
(18, 'Javier Alarcon'),
(19, 'Josue Limon'),
(20, 'Mario Lopez'),
(21, 'Oscar Yañez'),
(22, 'Rafael Gutierrez'),
(23, 'Ricardo Aguilar'),
(24, 'Ruben Ramirez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `nombre`) VALUES
(1, 'Primer piso ala oriente'),
(2, 'Segundpo piso ala poniente'),
(3, 'Primer piso ala sur'),
(4, 'Segundpo piso ala sur'),
(5, 'Planta baja'),
(6, 'Sotano'),
(7, 'Deportivo'),
(8, 'Aldama');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
