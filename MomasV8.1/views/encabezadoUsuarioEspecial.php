<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encabezado</title>
    <link rel="stylesheet" href="./css/encabezado.css">
    <link rel="stylesheet" href="views/css/encabezado.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- ENCABEZADO -->

    <header>

        <!-- barra menu -->

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <div class="logo-container">
            <img class="logoMomas" src="images/logoMomas.png" alt="">
            <a href="" class="logo">MOMAS</a>
        </div>
        <nav class="navbar">
            <a href="indexAdmin.php">Inicio</a>
            <a href="Gestion.php">Gestion</a>
            <a href="#about">quienes somos</a>
            <a href="catalogo.php">catalogo</a>
            <a href="#contact">contacto</a>

        </nav>

        <!-- iconos ENCABEZADO -->

        <div class="icons">
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user tooltip" id="login-open"><span class="tooltip-box"><?php echo htmlspecialchars($_SESSION['nombreUsuario']); ?></span></a>
        </div>   
    </header>
    <!-- FIN ENCABEZADO -->
    <?php include_once 'PerfilUsuario.php' ?>
</body>

</html>