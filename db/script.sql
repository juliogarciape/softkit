CREATE TABLE `kit` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fechaProcesada` datetime DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `kit`
--

INSERT INTO `kit` (`id`, `usuario`, `total`, `fechaCreacion`, `fechaProcesada`, `estado`) VALUES
(2, 1, '23.30', '2022-11-13 00:00:00', NULL, 2),
(42, 1, '35.10', '2022-11-14 00:00:00', NULL, 2),
(49, 1, '38.60', '2022-11-14 00:00:00', NULL, 2),
(50, 1, '66.60', '2022-11-14 01:00:00', NULL, 2),
(62, 1, '57.00', '2022-11-15 19:25:17', NULL, 2),
(77, 1, '83.40', '2022-11-15 22:33:57', NULL, 1),
(78, 1, '83.40', '2022-11-15 22:33:57', NULL, 1),
(79, 1, '83.40', '2022-11-15 22:33:57', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kit_x_producto`
--

CREATE TABLE `kit_x_producto` (
  `id` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `idKit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `kit_x_producto`
--

INSERT INTO `kit_x_producto` (`id`, `idProducto`, `cantidad`, `subtotal`, `idKit`) VALUES
(4, 2, 1, '2.50', 2),
(5, 1, 2, '11.20', 2),
(6, 3, 3, '9.60', 2),
(83, 3, 3, '9.60', 42),
(84, 2, 3, '7.50', 42),
(85, 5, 3, '18.00', 42),
(104, 4, 2, '21.00', 49),
(105, 1, 2, '11.20', 49),
(106, 3, 2, '6.40', 49),
(107, 4, 3, '31.50', 50),
(108, 5, 3, '18.00', 50),
(109, 3, 3, '9.60', 50),
(110, 2, 3, '7.50', 50),
(145, 5, 3, '18.00', 62),
(146, 4, 3, '31.50', 62),
(147, 2, 3, '7.50', 62),
(188, 3, 3, '9.60', 77),
(189, 5, 3, '18.00', 77),
(190, 4, 3, '31.50', 77),
(191, 2, 3, '7.50', 77),
(192, 1, 3, '16.80', 77),
(193, 4, 3, '31.50', 78),
(194, 2, 3, '7.50', 78),
(195, 1, 3, '16.80', 78),
(196, 5, 3, '18.00', 78),
(197, 3, 3, '9.60', 78),
(198, 2, 3, '7.50', 79),
(199, 4, 3, '31.50', 79),
(200, 3, 3, '9.60', 79),
(201, 5, 3, '18.00', 79),
(202, 1, 3, '16.80', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precioUnitario` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `fechaIngreso` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `descripcion`, `precioUnitario`, `stock`, `fechaIngreso`, `estado`) VALUES
(1, 'Tarro de leche Gloria', '5.60', 25, '2022-11-12 00:00:00', 1),
(2, 'Bolsa de azúcar', '2.50', 30, '2022-11-12 00:00:00', 1),
(3, 'Bolsa de Arroz', '3.20', 34, '2022-11-12 00:00:00', 1),
(4, 'Aceite Vegetal Primor Premium 900ml', '10.50', 30, '2022-11-14 00:00:00', 1),
(5, 'Trozos de Atún en Aceite Primor 140g', '6.00', 40, '2022-11-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `tipo`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `clave`, `rol`, `estado`) VALUES
(1, 'Renato', 'Gutiérrez', 'renato@gmail.com', '123', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kit_usuario` (`usuario`);

--
-- Indices de la tabla `kit_x_producto`
--
ALTER TABLE `kit_x_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kitproducto_producto` (`idProducto`),
  ADD KEY `fk_kitproducto_kit` (`idKit`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `kit`
--
ALTER TABLE `kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `kit_x_producto`
--
ALTER TABLE `kit_x_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `kit`
--
ALTER TABLE `kit`
  ADD CONSTRAINT `fk_kit_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `kit_x_producto`
--
ALTER TABLE `kit_x_producto`
  ADD CONSTRAINT `fk_kitproducto_kit` FOREIGN KEY (`idKit`) REFERENCES `kit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kitproducto_producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
