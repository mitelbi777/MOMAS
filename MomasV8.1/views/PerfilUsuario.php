<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar == '') {
    header("Location: ../Index.php");
    die();
}

require_once '../model/Usuario.php';

require_once '../model/Usuario.php';

$nombreUsuario = $_SESSION['nombreUsuario'];
$objUsuario = new Usuario(null, $nombreUsuario, null, null, null);
$usuario = $objUsuario->obtenerUsuarioPorNombre($nombreUsuario);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="css/perfilUsuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Bienvenido</h2>
            <i class="fas fa-user" id="iconPerfil"></i>

            <div class="input-box">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <p><?php echo $usuario['nombreUsuario']; ?></p>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                </span>
                <p><?php echo $usuario['correoUsuario']; ?></p>
            </div>

            <div class="login-register">
                <button type="button" class="btn"><a href="#" class="register-link">Editar perfil</a></button>
                <button type="button" class="btn"><a href="../controller/CerrarSesion.php">Cerrar sesión</a></button>
            </div>

        </div>
        <?php include 'EditarPerfil.php' ?>
        <script src="js/perfil2.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>