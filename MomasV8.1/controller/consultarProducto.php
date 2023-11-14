<?php
require '../model/Producto.php';

$conexion = new Conexion();

// Obtén el ID del producto desde la solicitud
$idProducto = $_POST['idProducto'];

$objProducto = new Producto($idProducto, null, null, null, null, null, null, null, null,null,null);

// Realiza la consulta del producto
$producto = $objProducto->consultarProducto($idProducto);

if ($producto) {
    echo json_encode($producto);
} else {
    echo json_encode(array('error' => 'Producto no encontrado'));
}

$conexion->cerrarConexion();
