<?php
require_once "../model/Usuario.php";
extract($_REQUEST);
$conexion = new Conexion();
$ObjUsuario = new Usuario($idUsuario, $nombreUsuario, null, $correoUsuario, null);

$resultado = $ObjUsuario->editarPerfil($idUsuario);

if ($resultado)
	header("location: ../index.php");
else
	echo "no se pudo";
