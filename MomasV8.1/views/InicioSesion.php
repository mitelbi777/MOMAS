<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="views/css/login.css?22102023">
</head>

<body>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Iniciar sesion</h2>
            <form form id="formulario" form method=post action="controller/ValidarInicioSesion.php">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <input type="text" name="nombreUsuario" pattern="[a-zA-Z0-9]+" maxlength="20" required>
                    <label>usuario</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>
                    <input type="password" name="contraseñaUsuario" maxlength="20" required>
                    <input type="hidden" name="accion" value="ingresarUsuario">
                    <label>contraseña</label>
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">
                        Guardar
                    </label>
                    <a href="#">recordar cotraseña</a>
                </div>
                <button type="submit" class="btn" name="button" value="ingresar">Iniciar Sesion</button>
                <div class="login-register">
                    <p>¿No estas registrado? <a href="#" class="register-link">Registrarse</a></p>
                </div>
            </form>
            
        </div>

        <?php
        include_once 'Registrarse.php';
        ?>
        <script src="./views/js/login.js"></script>

</body>

</html>