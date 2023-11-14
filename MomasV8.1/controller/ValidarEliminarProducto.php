<?php
require '../model/Producto.php';
extract($_REQUEST);
$conexion = new Conexion();
$ObjProducto = new Producto($idProducto, null, null, null, null, null, null, null, null, null,null,null,null);

$resultado = $ObjProducto->eliminarProducto($idProducto);

if ($resultado)
	header("location: ../views/GestionProductos.php");
else
	echo "no se pudo";
