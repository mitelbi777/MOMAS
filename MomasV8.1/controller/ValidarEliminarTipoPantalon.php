<?php
require '../model/TipoPantalon.php';
extract($_REQUEST);
$conexion = new Conexion();
$pantalon= new TipoPantalon($idPantalon, null);

$resultado = $pantalon->eliminarTipoPantalon($idPantalon);

if ($resultado)
	header("location: ../views/GestionCaracteristicas.php");
else
	echo "no se pudo";
