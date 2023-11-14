<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encabezado</title>
    <link rel="stylesheet" href="./css/encabezado.css">
    <link rel="stylesheet" href="views/css/encabezado.css">
    <link rel="stylesheet" href="views/css/ModoOscuro.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
    <!-- ENCABEZADO -->

    <header>
        <!-- barra menu -->
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <div class="logo-container">
            <img class="logoMomas" src="views/images/logoMomas.png" alt="">
            <a href="" class="logo">MOMAS</a>
        </div>

        <nav class="navbar">
            <a href="#home">Inicio</a>
            <a href="#about">quienes somos</a>
            <a href="views/catalogo.php">catalogo</a>
            <a href="#contact">contacto</a>
        </nav>

        <!-- iconos ENCABEZADO -->
        <div class="icons">
            <label for="dark-mode" class="dark-mode-button">
            <input id="dark-mode"type="checkbox" class="offscreen"
            onclick="document.documentElement.classList.toggle('dark-mode')">
            </label>  
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="far fa-user" id="login-open"></a>
        </div>
    </header>

    <!-- Inicio de sesion -->
    <?php include './views/InicioSesion.php' ?>
    <!-- fin pie de inicio de sesion -->
    <!-- FIN ENCABEZADO -->
</body>

</html>