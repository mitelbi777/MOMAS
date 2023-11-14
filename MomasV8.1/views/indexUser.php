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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momas</title>
    <link rel="stylesheet" href="css/paginaPrincipal.css">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>

    <!-- ENCABEZADO -->
    <?php include_once 'encabezadoUsuario.php' ?>
    <!-- banner principal -->

    <section class="home" id="home">
        <div class="content">
            <h3>MOMAS</h3>
            <span>hermosas pijamas </span>
            <p>

                karen julian<<<<< niuaaaaaallerrrrr juan es un peo todo patico momas t da vida momas es amor momas t da vida momas es amor </p>
                    <a href="#" class="btn">ver mas</a>

        </div>
    </section>



    <!-- seccion QUIENES SOMOS -->


    <section class="about" id="about">
        <h1 class="heading"><span>Quienes </span>Somos</h1>
        <div class="row">
            <div class="video-container">
                <video src="videos/VideoIndex.mp4" loop autoplay muted></video>
                <h3>HERMOSAS pijamas</h3>
            </div>
            <div class="content">
                <h3>¿Quienes Somos?</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae nemo fugiat suscipit id. Incidunt eveniet sunt aliquid laudantium dolores assumenda sequi aliquam magni molestias modi, voluptas ullam! Laborum, commodi accusantium.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore maiores exercitationem ratione et quibusdam qui excepturi corrupti aliquid, atque eveniet. </p>
                <a href="quienesSomos.html" class="btn">leer mas</a>
            </div>
        </div>
    </section>


    <!-- seccion de iconos -->
    <section class="iconos-container">
        <div class="icons">
            <img src="images/icono1.png" alt="">
            <h3>Confiabilidad</h3>
            <span>mejor calidad posible</span>
        </div>
        <div class="icons">
            <img src="images/icono2.png" alt="">
            <h3>Nuevos productos</h3>
            <span>solo productos nuevos</span>
        </div>
        <div class="icons">
            <img src="images/icono3.png" alt="">
            <h3>Buen precio</h3>
            <span>pijamas al mejor precio</span>
        </div>
        <div class="icons">
            <img src="images/icono4.png" alt="">
            <h3>Innovacion</h3>
            <span>nuevos y mejores diseños</span>
        </div>

    </section>



    <!-- seccion de contacto -->

    <section class="contact" id="contact">
        <h1 class="heading"> <span> contacta</span>nos</h1>
        <div class="row">
            <form action="">
                <input type="text" placeholder="nombre" class="box" required>
                <input type="email" placeholder="email" class="box" required>
                <input type="numero" placeholder="numero" class="box" required>
                <textarea name="" class="box" placeholder="mensaje" cols="30" rows="10" required></textarea>
                <input type="submit" value="enviar mensaje" class="btn">
            </form>
            <div class="image">
                <img src="images/contacto1.png" alt="">

            </div>
        </div>
    </section>

    <!-- seccion pie de pagina -->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>enlaces rapidos</h3>
                <a href="#home">Inicio</a>
                <a href="#about">quienes somos</a>
                <a href="#products">catalogo</a>
                <a href="#contact">contacto</a>
            </div>
            <div class="box">
                <h3>enlaces extras</h3>
                <a href="#">Inicio</a>
                <a href="#">quienes somos</a>
                <a href="#">catalogo</a>
                <a href="#">contacto</a>
            </div>
            <div class="box">
                <h3>ubicaciones</h3>
                <a href="#">Colombia</a>
                <a href="#">Bogota</a>
                <a href="#">suba</a>
                <a href="#">direccion aqui</a>

            </div>
            <div class="box">
                <h3>informacion de contacto</h3>
                <a href="#">+57 3024529227</a>
                <a href="#">momasxd@gmail.com</a>
                <a href="#">direccion aqui</a>
                <img src="images/pago.png" alt="">
            </div>

        </div>
        <div class="credit">creado por <span>el paputeam </span> | &copy;2023 MOMAS. Todos los derechos reservados.</div>

    </section>

    <script src="js/perfil2.js"></script>

    <script src="./vista/js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>

</html>