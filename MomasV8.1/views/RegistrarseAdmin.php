<?php
require_once '../model/RolUsuario.php';
$conexion = new Conexion();
$rolUsuario = new RoLUsuario(null, null);
$rolUsuarios = $rolUsuario->consultarRolUsuarios();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funcional</title>
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="css/RegistrarAdmin.css">
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
            <h2>Registrar usuario</h2>
            <form id="formulario" action="../controller/validarUsuarioAdmin.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" pattern="[a-zA-Z0-9]+" required maxlength="20">
                    <label>usuario</label>
                </div>
                <div class="form-group">
                    <label for="rolUsuario"></label>
                    <select class="form-control" required id="rolUsuario " name="rolUsuario" placeholder="Rol Usuario" required>
                    <option value="" disabled selected>Rol del Usuario</option>
                            <?php
                                    foreach ($rolUsuarios as $rolUsuario) {
                            ?>
                                <option value="<?php echo $rolUsuario['idRol'] ?>"><?php echo $rolUsuario['nombreRol'] ?></option>
                            <?php
                                }
                            ?>
                    </select>
                </div>
                <div class="input-box" id="email">
                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>
                    <input type="email" class="form-control" id="correoUsuario" name="correoUsuario" maxlength="40" required>
                    <label>correo</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="Password" class="form-control" id="contraseñaUsuario" name="contraseñaUsuario" maxlength="20" required>
                    <label>contraseña</label>
                </div>
                <div class="remember-forgot">

                    <div class="login-register">
                        <button type="submit" id="btn" class="register-link" name="registrarUsuarioAd">Registrar</button>
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
    <script src="./js/RegistrarseAdmin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>