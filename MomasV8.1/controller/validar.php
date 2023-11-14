<?php

/////////////////////////////////registarVEnta//////////////////////////////////////////////////////////////

if (isset($_POST['accion']) && $_POST['accion'] === 'realizarFactura') {
    // Obtener los datos del formulario
    $nombreCliente = mysqli_real_escape_string($conexion, $_POST['nombreCliente']);
    $correoCliente = mysqli_real_escape_string($conexion, $_POST['correoCliente']);
    $telefonoCliente = mysqli_real_escape_string($conexion, $_POST['telefonoCliente']);
    $idProductos = $_POST['idProducto'];
    $cantidadesVendidas = $_POST['cantidadVendida'];

    // Calcular el valor total de la venta
    $totalVenta = 0;

    // Insertar la venta en la base de datos
    $consultaVenta = "INSERT INTO facturas (nombreCliente, correoCliente, telefonoCliente, valorTotal) VALUES ('$nombreCliente', '$correoCliente', '$telefonoCliente', '$totalVenta')";

    if (mysqli_query($conexion, $consultaVenta)) {
        $idVenta = mysqli_insert_id($conexion); // Obtener el ID de la venta insertada

        // Iterar sobre los productos vendidos y actualizar unidades y detalles de la venta
        foreach ($idProductos as $key => $idProducto) {
            $cantidadVendida = $cantidadesVendidas[$key];

            // Obtener información del producto
            $consultaProducto = "SELECT nombreProducto, categoriaProducto, tallaProducto, colorProducto, precioProducto, unidadesProducto FROM productos WHERE idProducto = '$idProducto'";
            $resultadoProducto = mysqli_query($conexion, $consultaProducto);

            if ($resultadoProducto) {
                $filaProducto = mysqli_fetch_assoc($resultadoProducto);
                $nombreProducto = $filaProducto["nombreProducto"];
                $categoriaProducto = $filaProducto["categoriaProducto"];
                $tallaProducto = $filaProducto["tallaProducto"];
                $colorProducto = $filaProducto["colorProducto"];
                $precioProducto = $filaProducto["precioProducto"];
                $unidadesDisponibles = $filaProducto["unidadesProducto"];

                if ($unidadesDisponibles >= $cantidadVendida) {
                    // Actualizar unidades del producto
                    $nuevasUnidades = $unidadesDisponibles - $cantidadVendida;
                    $consultaActualizarUnidades = "UPDATE productos SET unidadesProducto = '$nuevasUnidades' WHERE idProducto = '$idProducto'";
                    mysqli_query($conexion, $consultaActualizarUnidades);

                    // Calcular subtotal y agregar detalle de la venta
                    $subtotal = $precioProducto * $cantidadVendida;
                    $consultaDetalleVenta = "INSERT INTO ventas (idVenta, idProducto, cantidadVendida, subtotal) VALUES ('$idVenta', '$idProducto', '$cantidadVendida', '$subtotal')";
                    mysqli_query($conexion, $consultaDetalleVenta);

                    // Actualizar el valor total de la venta
                    $totalVenta += $subtotal;
                }
            }
        }

        // Actualizar el valor total en la venta
        $consultaActualizarTotalVenta = "UPDATE ventas SET valorTotal = '$totalVenta' WHERE idVenta = '$idVenta'";
        mysqli_query($conexion, $consultaActualizarTotalVenta);

        mysqli_close($conexion);
        header('location:../views/GestionFacturas.php');
    } else {
        die("Error al insertar la venta: " . mysqli_error($conexion));
    }
}
