<?php
require_once '../model/TipoPantalon.php';
extract($_REQUEST);
$conexion = new Conexion();
$pantalon = new TipoPantalon(null,$tipoPantalon);

$resultado = $pantalon->agregarTipoPantalon();

if ($resultado) {
    header("location: ../views/GestionCaracteristicas.php");
} else {
    echo 'no se pudo hacer el registro del usuario';
}
