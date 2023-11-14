<?php 
require_once '../model/TallaProducto.php';
extract($_REQUEST);
$Conexion = new Conexion();
$objTalla = new  TallaProducto($idTalla,null);
$talla = $objTalla->consultarTallaPorId($idTalla);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar talla</title>
    <link rel="icon" href="/vista/imagenes/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="css/RegistrarTalla.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="talla">
    <header>
        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user" id="login-open-talla"></a>
        </div>
    </header>



    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box login">
            <h2> Tipo de Talla</h2>
            <form action="../controller/ValidarEditarTalla.php" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="pricetags-outline"></ion-icon> </span>
                    <input type="text" name="tallaProducto" value="<?php echo $talla['tallaProducto']; ?> " required>
                    <input type="hidden" name="idTalla" value="<?php echo $idTalla; ?>">
                    <label>Talla</label>
                </div>

                <div class="remember-forgot">
                    <div class="login-register">
                        <button type="submit" id="btn" class="register-link">Editar</a></p>
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
    <script src="js/RegistrarTalla.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>