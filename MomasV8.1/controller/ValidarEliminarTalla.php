<?php
require '../model/TallaProducto.php';
extract($_REQUEST);
$conexion = new Conexion();
$talla = new TallaProducto($idTalla, null);

$resultado = $talla->eliminarTalla($idTalla);

if ($resultado)
	header("location: ../views/GestionCaracteristicas.php");
else
	echo "no se pudo";
