<div class="form-box register">
    <h2>Editar</h2>
    <i class="fas fa-user" id="iconPerfil"></i>
    <form id="formulario" action="../controller/ValidarEditarPerfil.php" method="post">
        <div class="input-box">
            <span class="icon">
                <ion-icon name="person-outline"></ion-icon>
            </span>
            <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre de Usuario" pattern="[a-zA-Z0-9]+" required maxlength="20" value="<?php echo $usuario['nombreUsuario']; ?>">
            <label>Usuario</label>
        </div>
        <div class="input-box" id="email">
            <span class="icon">
                <ion-icon name="mail-outline"></ion-icon>
            </span>
            <input type="email" class="form-control" id="correoUsuario" name="correoUsuario" placeholder="Correo" maxlength="40" required value="<?php echo $usuario['correoUsuario']; ?>">
            <input type="hidden" name="idUsuario" value="<?php echo $usuario['idUsuario']; ?>">
            <label>Correo</label>
        </div>
        <div class="login-register">
            <button type="submit" class="btn" name="registrar">Aceptar</button>
            <button type="button" class="btn"><a href="#" class="login-link">Cancelar</a></button>
        </div>
    </form>
</div>
</div>