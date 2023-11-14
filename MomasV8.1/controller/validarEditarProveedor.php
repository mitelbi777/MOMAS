<?php
require_once "../model/Proveedor.php";
extract($_REQUEST);
$conexion = new Conexion();
$ObjProveedor = new Proveedor($idProveedor, $nombreProveedor, $correoProveedor, $telefonoProveedor, $direccionProveedor);

$resultado = $ObjProveedor->editarProveedor($idProveedor);

if ($resultado)
	header("location: ../views/GestionProveedores.php");  
else
	echo "no se pudo";
