<?php
require_once "../model/Usuario.php";
extract($_REQUEST);
$idRol = $_POST ['rolUsuario'];
$conexion = new Conexion();
$ObjUsuario = new Usuario($idUsuario, $nombreUsuario, $idRol, $correoUsuario, $contraseñaUsuario);
$resultado = $ObjUsuario->editarUsuario($idUsuario);

if ($resultado) {
    header("location: ../views/GestionUsuarios.php");
} else {
    echo "No se pudo actualizar el usuario.";
}
