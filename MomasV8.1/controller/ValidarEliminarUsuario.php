<?php
require '../model/Usuario.php';
extract($_REQUEST);

$conexion = new Conexion();
$ObjUsuario = new Usuario($idUsuario, null, null, null, null, null);

$resultado = $ObjUsuario->eliminarUsuario($idUsuario);

if ($resultado) {
	header("location: ../views/GestionUsuarios.php");
} else {
	echo "no se pudo";
}
