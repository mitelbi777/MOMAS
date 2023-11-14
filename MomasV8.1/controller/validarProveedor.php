<?php
require_once '../model/Proveedor.php';
extract($_REQUEST);
$conexion = new Conexion();
$ObjProveedor = new Proveedor(null, $nombreProveedor, $correoProveedor, $telefonoProveedor, $direccionProveedor);

$resultado = $ObjProveedor->agregarProveedor();

if ($resultado) {
    header("location: ../views/GestionProveedores.php");
} else {
    echo 'no se pudo hacer el registro del usuario';
}
