<?php
require '../model/TallaProducto.php';
extract($_REQUEST);
$conexion = new Conexion();
$talla = new TallaProducto($idTalla,$tallaProducto);

$resultado = $talla->editarTalla($idTalla);

if ($resultado)
	header("location: ../views/GestionCaracteristicas.php");
else
	echo "no se pudo";
