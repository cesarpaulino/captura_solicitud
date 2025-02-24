CREATE DATABASE  soporte_tecnico_informatica

USE DATABASE soporte_tecnico_informatica;

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
  `horallamada` time NOT NULL,
  `horaatencion` time DEFAULT NULL,
  `teloext` varchar(20) DEFAULT NULL,
  `folio` varchar(50) DEFAULT NULL,
  `noficio` varchar(50) DEFAULT NULL,
  `ntabla` varchar(50) DEFAULT NULL,
  `secretarias` varchar(100) DEFAULT NULL,
  `hardware` varchar(100) DEFAULT NULL,
  `nomreqser` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `niveluno` varchar(50) DEFAULT NULL,
  `niveldos` varchar(50) DEFAULT NULL,
  `niveltres` varchar(50) DEFAULT NULL,
  `desfalla` text DEFAULT NULL,
  `tecnicos` varchar(100) DEFAULT NULL,
  `nprogresivo` varchar(50) DEFAULT NULL,
  `mac` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `tomarazon` text DEFAULT NULL,
  `desserea` text DEFAULT NULL,
  `nomusuate` varchar(100) DEFAULT NULL,
  `firma` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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

--
-- Indices de la tabla `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `hardware`
--

ALTER TABLE `hardware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE firma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    respuesta ENUM('Sí', 'No') NOT NULL
);