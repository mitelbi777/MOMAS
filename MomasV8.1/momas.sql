-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2023 a las 22:14:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `momas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `idCategoria` int(11) NOT NULL,
  `categoriaProducto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`idCategoria`, `categoriaProducto`) VALUES
(1, 'Femenino'),
(2, 'Masculino'),
(3, 'Infantil'),
(4, 'Unisex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conjuntos`
--

CREATE TABLE `conjuntos` (
  `idConjunto` int(11) NOT NULL,
  `nombreConjunto` varchar(255) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conjuntos`
--

INSERT INTO `conjuntos` (`idConjunto`, `nombreConjunto`, `fecha`) VALUES
(1, 'conjunto 1', '2023-11-11'),
(2, 'conjunto 2', '2023-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conjuntos_productos`
--

CREATE TABLE `conjuntos_productos` (
  `idConjunto` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conjuntos_productos`
--

INSERT INTO `conjuntos_productos` (`idConjunto`, `idProducto`) VALUES
(1, 1),
(1, 6),
(2, 2),
(2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE `detalles_venta` (
  `idVenta` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidadVendida` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_producto`
--

CREATE TABLE `estado_producto` (
  `idEstado` int(11) NOT NULL,
  `estadoProducto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_producto`
--

INSERT INTO `estado_producto` (`idEstado`, `estadoProducto`) VALUES
(1, 'Disponible'),
(2, 'No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `fechaPedido` varchar(45) NOT NULL,
  `valorPedido` varchar(45) NOT NULL,
  `Productos_idProductos` int(11) NOT NULL,
  `Productos_Venta_idVenta` int(11) NOT NULL,
  `Productos_Venta_Facturas_idFacturas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `imagenProducto` varchar(200) NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `colorProducto` varchar(45) NOT NULL,
  `idCategoria` int(45) NOT NULL,
  `idTalla` int(5) NOT NULL,
  `idCamisa` int(11) NOT NULL,
  `idPantalon` int(11) NOT NULL,
  `precioProducto` decimal(45,0) NOT NULL,
  `unidadesProducto` int(45) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `fechaInsersion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `imagenProducto`, `nombreProducto`, `colorProducto`, `idCategoria`, `idTalla`, `idCamisa`, `idPantalon`, `precioProducto`, `unidadesProducto`, `idEstado`, `fechaInsersion`) VALUES
(1, '1.jpg', 'pijama1', '#f4878e', 1, 1, 1, 1, 35000, 10, 1, '2023-11-11'),
(2, '2.jpg', 'pijama 2', '#c278a9', 1, 1, 1, 1, 35000, 10, 1, '2023-11-11'),
(3, '3.jpg', 'pijama 3', '#1e1e1e', 1, 1, 1, 1, 35000, 10, 1, '2023-11-11'),
(4, '5.jpg', 'pijama 4', '#b3bab8', 1, 1, 2, 1, 35000, 10, 1, '2023-11-11'),
(5, '6.jpg', 'pijama 5', '#554bae', 1, 1, 1, 1, 35000, 10, 1, '2023-11-11'),
(6, '7.jpg', 'pijama 6', '#696f71', 1, 1, 1, 1, 35000, 10, 1, '2023-11-11'),
(7, '8.jpg', 'pijama 7', '#9fa6a0', 1, 1, 1, 2, 35000, 10, 1, '2023-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(45) NOT NULL,
  `correoProveedor` varchar(45) NOT NULL,
  `telefonoProveedor` varchar(45) NOT NULL,
  `direccionProveedor` varchar(45) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`idRol`, `nombreRol`) VALUES
(1, 'Administardor'),
(2, 'Almacenista'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_producto`
--

CREATE TABLE `talla_producto` (
  `idTalla` int(11) NOT NULL,
  `tallaProducto` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talla_producto`
--

INSERT INTO `talla_producto` (`idTalla`, `tallaProducto`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_camisas`
--

CREATE TABLE `tipo_camisas` (
  `idCamisa` int(11) NOT NULL,
  `tipoCamisa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_camisas`
--

INSERT INTO `tipo_camisas` (`idCamisa`, `tipoCamisa`) VALUES
(1, 'Camisa Manga Corta'),
(2, 'Camisa Manga Larga'),
(3, 'Camisa con Bolsillo  ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pantalones`
--

CREATE TABLE `tipo_pantalones` (
  `idPantalon` int(11) NOT NULL,
  `tipoPantalon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pantalones`
--

INSERT INTO `tipo_pantalones` (`idPantalon`, `tipoPantalon`) VALUES
(1, 'Pantalon Largo '),
(2, 'Pantalon Corto '),
(3, 'Short');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(45) NOT NULL,
  `idRol` int(11) NOT NULL,
  `correoUsuario` varchar(45) NOT NULL,
  `contraseñaUsuario` varchar(250) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `idRol`, `correoUsuario`, `contraseñaUsuario`, `fecha`) VALUES
(1, 'Admin', 1, 'admin@admin', '$2y$10$1Bq1UnoV9stfSTAavc0XKOfXliYObXfXWjfV7iQJVQuVOreQ.5wma', '2023-11-10'),
(2, 'Almacenista', 2, 'almcen@almacen', '$2y$10$hMeXk1agwUDsJ1xCd8kvrODBlQlk8N3L7rpgGny6KCwAc/ybSTAAG', '2023-11-10'),
(3, 'usuario', 1, 'user@user', '$2y$10$GqKGG3VVGL/99s/KmwSuJO2.X2Ly4bo1vzMbj28IMmZrqVrl5Oa6S', '2023-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `nombreCliente` varchar(255) DEFAULT NULL,
  `correoCliente` varchar(255) DEFAULT NULL,
  `telefonoCliente` varchar(20) DEFAULT NULL,
  `valorTotal` decimal(10,2) DEFAULT NULL,
  `fechaEmision` date NOT NULL DEFAULT current_timestamp(),
  `fechaVencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `conjuntos`
--
ALTER TABLE `conjuntos`
  ADD PRIMARY KEY (`idConjunto`);

--
-- Indices de la tabla `conjuntos_productos`
--
ALTER TABLE `conjuntos_productos`
  ADD PRIMARY KEY (`idConjunto`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idVenta` (`idVenta`);

--
-- Indices de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`,`Productos_idProductos`,`Productos_Venta_idVenta`,`Productos_Venta_Facturas_idFacturas`),
  ADD KEY `fk_Pedido_Productos1_idx` (`Productos_idProductos`,`Productos_Venta_idVenta`,`Productos_Venta_Facturas_idFacturas`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idTalla` (`idTalla`),
  ADD KEY `idPantalon` (`idPantalon`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idCamisa` (`idCamisa`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `talla_producto`
--
ALTER TABLE `talla_producto`
  ADD PRIMARY KEY (`idTalla`);

--
-- Indices de la tabla `tipo_camisas`
--
ALTER TABLE `tipo_camisas`
  ADD PRIMARY KEY (`idCamisa`);

--
-- Indices de la tabla `tipo_pantalones`
--
ALTER TABLE `tipo_pantalones`
  ADD PRIMARY KEY (`idPantalon`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `conjuntos`
--
ALTER TABLE `conjuntos`
  MODIFY `idConjunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `talla_producto`
--
ALTER TABLE `talla_producto`
  MODIFY `idTalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_camisas`
--
ALTER TABLE `tipo_camisas`
  MODIFY `idCamisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_pantalones`
--
ALTER TABLE `tipo_pantalones`
  MODIFY `idPantalon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conjuntos_productos`
--
ALTER TABLE `conjuntos_productos`
  ADD CONSTRAINT `conjuntos_productos_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conjuntos_productos_ibfk_3` FOREIGN KEY (`idConjunto`) REFERENCES `conjuntos` (`idConjunto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `detalles_venta_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_venta_ibfk_3` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `detalles_venta_ibfk_4` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado_producto` (`idEstado`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idTalla`) REFERENCES `talla_producto` (`idTalla`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`idPantalon`) REFERENCES `tipo_pantalones` (`idPantalon`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`idCategoria`) REFERENCES `categoria_producto` (`idCategoria`),
  ADD CONSTRAINT `productos_ibfk_5` FOREIGN KEY (`idCamisa`) REFERENCES `tipo_camisas` (`idCamisa`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol_usuario` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
