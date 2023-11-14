<?php
require_once '../model/Usuario.php';
extract($_REQUEST);
$conexion = new Conexion();
$idRol = $_POST['rolUsuario'];
$ObjUsuario = new Usuario(null, $nombreUsuario, $idRol, $correoUsuario, $contraseñaUsuario);

$resultado = $ObjUsuario->agregarUsuarioAdministrador();

if ($resultado) {
    header("location: ../views/GestionUsuarios.php");
} else {
    echo 'no se pudo hacer el registro del usuario';
}
