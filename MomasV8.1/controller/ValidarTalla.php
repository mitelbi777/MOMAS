<?php
require_once '../model/TallaProducto.php';
extract($_REQUEST);
$conexion = new Conexion();
$talla = new TallaProducto(null,$tallaProducto);

$resultado = $talla->agregarTalla();

if ($resultado) {
    header("location: ../views/GestionCaracteristicas.php");
} else {
    echo 'no se pudo hacer el registro del usuario';
}
