<?php
 require_once '../model/Usuario.php';
 session_start();

$nombreUsuario = $_REQUEST['nombreUsuario'];
$contraseñaUsuario = $_REQUEST['contraseñaUsuario'];

$conexion = new Conexion();
$usuarios = new Usuario(null, $nombreUsuario, null, null, null);
$usuario = $usuarios->obtenerUsuarioPorNombre($nombreUsuario);

if ($usuario) {
    $contraseñaGuardada = $usuario['contraseñaUsuario'];

    // Verificar la contraseña utilizando password_verify()
    if (password_verify($contraseñaUsuario, $contraseñaGuardada)) {
        $_SESSION['nombreUsuario'] = $nombreUsuario;

        switch ($usuario['idRol']) {
            case 1:
            case 2:
                header('Location: ../views/indexAdmin.php');
                break;
            case 3:
                header('Location: ../views/indexUser.php');
                break;
            default:
                // Rol desconocido, mostrar un mensaje de error y redirigir a la página de inicio de sesión
                $_SESSION['error_message'] = "Rol de usuario desconocido.";
                header('Location: ../index.php');
                break;
        }
    } else { 
        // Contraseña incorrecta, mostrar un mensaje de error y redirigir a la página de inicio de sesión
        $_SESSION['error_message'] = "Nombre de usuario o contraseña incorrectos.";
        header('Location: ../index.php');
    }
} else {
    // Usuario no encontrado, mostrar un mensaje de error y redirigir a la página de inicio de sesión
    $_SESSION['error_message'] = "Nombre de usuario o contraseña incorrectos.";
    header('Location: ../index.php');
}
