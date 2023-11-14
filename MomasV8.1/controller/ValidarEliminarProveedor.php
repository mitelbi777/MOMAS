<?php
require '../model/Proveedor.php';
extract($_REQUEST);
$conexion = new Conexion();
$ObjProveedor = new Proveedor($idProveedor, null, null, null,null);

$resultado = $ObjProveedor->eliminarProveedor($idProveedor);

if ($resultado)
	header("location: ../views/GestionProveedores.php");
else
	echo "no se pudo";
