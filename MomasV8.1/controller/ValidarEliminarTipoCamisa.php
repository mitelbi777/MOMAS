<?php
require '../model/TipoCamisa.php';
extract($_REQUEST);
$conexion = new Conexion();
$camisa= new TipoCamisa($idCamisa, null);

$resultado = $camisa->eliminarTipoCamisa($idCamisa);

if ($resultado)
	header("location: ../views/GestionCaracteristicas.php");
else
	echo "no se pudo";
