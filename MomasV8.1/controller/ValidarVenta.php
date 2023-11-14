<?php
require '../model/Venta.php';
$conexion = new Conexion();
extract($_REQUEST);
$objVenta = new Venta(null, $nombreCliente, $correoCliente, $telefonoCliente,null,null,null,null,null,null,null,null,null);
$idVenta = $objVenta->agregarVenta();

if ($idVenta) {
    $objDetalle= new DetallesVenta($idVenta,$idProducto,$cantidadVendida,null);
    if ($objDetalle->agregarDetalleVenta($idVenta, $idProducto, $cantidadVendida)) {
        $objVenta->actualizarValorTotal($idVenta);
        header('location: ../views/GestionVentas.php');
    } else {
        echo "Error al asociar el producto al venta.";
    }
} else {
    echo "Error al hacer la venta.";
}





