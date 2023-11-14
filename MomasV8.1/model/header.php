<?php 
require_once 'Usuario.php'; // Asegúrate de tener la ruta correcta al archivo Usuario.php
session_start();

function mostrarheader($rolUsuario) {
    if ($rolUsuario == 'Administrador') {
        include(__DIR__ . '/encabezadoUsuarioEspecial.php');
    } elseif ($rolUsuario == 'Almacenista') {
        include(__DIR__ . '/encabezadoUsuarioEspecial.php');
    } elseif ($rolUsuario == 'Usuario') {
        include(__DIR__ . '/encabezadoUsuario.php');
    } else {
        include(__DIR__ . '/encabezadoUsuario.php');
    }
}

if (isset($_SESSION['nombreUsuario'], $_SESSION['rolUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];
    $rolUsuario = $_SESSION['rolUsuario'];

    // Crear objeto Usuario y consultar la información del usuario
    $objUsuario = new Usuario(null, $nombreUsuario, null, null, null);
    $usuario = $objUsuario->consultarUsuarioPorNombre($nombreUsuario);

    // Mostrar el encabezado según el rol del usuario
    mostrarheader($rolUsuario);
} else {
    // Si la sesión no está iniciada, cargar el encabezado predeterminado
    include(__DIR__ . '/encabezadoUsuario.php');
}
