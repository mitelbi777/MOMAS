<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funcional</title>
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="css/RegistrarProveedor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <header>
        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user" id="login-open"></a>
        </div>
    </header>



    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Registrar proveedor</h2>
            <form id="formulario" action="../controller/ValidarProveedor.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" class="form-control" id="nombreProveedor" name="nombreProveedor" pattern="[a-zA-Z0-9]+" required maxlength="20">
                    <label>proveedor</label>
                </div>


                <div class="input-box" id="email">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" class="form-control" id="correoProveedor" name="correoProveedor" maxlength="40" required>
                    <label>correo</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="call-outline"></ion-icon></span>
                    <input type="number" class="form-control" id="telefonoProveedor" name="telefonoProveedor" maxlength="40" required>
                    <label>telefono</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="location-outline"></ion-icon></span>
                    <input type="text" class="form-control" id="direccionProveedor" name="direccionProveedor" maxlength="40" required>
                    <label>direccion</label>
                </div>
                <div class="remember-forgot">

                    <div class="login-register">
                        <button type="submit" id="btn" class="register-link" name="registrarProveedor">Registrar</button>
                    </div>
            </form>
        </div>


        <div class="form-box register">
            <form action="#">
                <div class="login-register">
                    <a href="#" class="login-link"></a>
                </div>
            </form>
        </div>
    </div>
    <!-- <link rel="stylesheet" href="./vista/scripts/login.js"> -->
    <script src="./js/RegistrarProveedor.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>