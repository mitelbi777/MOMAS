<?php
require_once '../model/TipoCamisa.php';
extract($_REQUEST);
$conexion = new Conexion();
$camisa = new TipoCamisa(null,$tipoCamisa);

$resultado = $camisa->agregarTipoCamisa();

if ($resultado) {
    header("location: ../views/GestionCaracteristicas.php");
} else {
    echo 'no se pudo hacer el registro del usuario';
}
