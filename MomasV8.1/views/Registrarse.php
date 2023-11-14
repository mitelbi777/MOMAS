<div class="form-box register">
    <h2>Registrarse</h2>
    <form action="controller/ValidarUsuario.php" method="post">
        <div class="input-box">
            <span class="icon">
                <ion-icon name="person-outline"></ion-icon>
            </span>
            <input type="text" name="nombreUsuario" pattern="[a-zA-Z0-9]+" maxlength="20" required>
            <label>usuario</label>
        </div>
        <div class="input-box" id="email">
            <span class="icon">
                <ion-icon name="mail-outline"></ion-icon>
            </span>
            <input type="email" name="correoUsuario" maxlength="40" required>
            <label class="prueba-correo">correo</label>
        </div>
        <div class="input-box">
            <span class="icon">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </span>
            <input type="password" name="contraseñaUsuario" maxlength="20" required>
            <label>contraseña</label>
        </div>
        <div class="remember-forgot">
            <label>
                <input type="checkbox">
                acepto terminos y condiciones
            </label>

        </div>
        <button type="submit" class="btn" name="registrarUsuario">registrarse</button>

        <div class="login-register">
            <p>¿ya estas registrado? <a href="#" class="login-link">iniciar sesion</a></p>
        </div>
    </form>
</div>
</div>