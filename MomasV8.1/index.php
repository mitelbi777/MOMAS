<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momas</title>
    <link rel="stylesheet" href="views/css/paginaPrincipal.css">
    <link rel="icon" href="views/images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>

    <!-- ENCABEZADO -->

    <?php include './views/encabezado.php'; ?>

    <!-- FIN ENCABEZADO -->

    <!-- banner principal -->

    <section class="home" id="home">
        <div class="content">
            <h3>MOMAS</h3>
            <span>hermosas pijamas </span>
            <p>

                karen julian<<<<< niuaaaaaallerrrrr juan es un peo todo patico momas t da vida momas es amor momas t da vida momas es amor </p>
                    <a href="#" class="btnHome">ver mas</a>

        </div>
    </section>
    <!-- fin banner principal -->

    <!-- seccion QUIENES SOMOS -->

    <section class="about" id="about">
        <h1 class="heading"><span>Quienes </span>Somos</h1>
        <div class="row">
            <div class="video-container">
                <video src="views/videos/VideoIndex.mp4" loop autoplay muted></video>
                <h3>HERMOSAS pijamas</h3>
            </div>
            <div class="content">
                <h3>¿Quienes Somos?</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae nemo fugiat suscipit id. Incidunt eveniet sunt aliquid laudantium dolores assumenda sequi aliquam magni molestias modi, voluptas ullam! Laborum, commodi accusantium.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore maiores exercitationem ratione et quibusdam qui excepturi corrupti aliquid, atque eveniet. </p>
                <a href="views/sobreNosotros.php" class="btnHome">leer mas</a>
            </div>
        </div>
    </section>
    <!-- fin seccion quienes somos -->

    <!-- seccion de iconos -->
    <section class="iconos-container">
        <div class="icons">
            <img src="views/images/icono1.png" alt="">
            <h3>Confiabilidad</h3>
            <span>mejor calidad posible</span>
        </div>
        <div class="icons">
            <img src="views/images/icono2.png" alt="">
            <h3>Nuevos productos</h3>
            <span>solo productos nuevos</span>
        </div>
        <div class="icons">
            <img src="views/images/icono3.png" alt="">
            <h3>Buen precio</h3>
            <span>pijamas al mejor precio</span>
        </div>
        <div class="icons">
            <img src="views/images/icono4.png" alt="">
            <h3>Innovacion</h3>
            <span>nuevos y mejores diseños</span>
        </div>

    </section>
    <!-- fin seccion iconos -->

    <!-- seccion de contacto -->

    <section class="contact" id="contact">
        <h1 class="heading"> <span> contacta</span>nos</h1>
        <div class="row">
            <form action="https://formsubmit.co/forerojulian545@gmail.com" method="POST">
                <input type="text" name="nombre" placeholder="nombre" class="box" required>
                <input type="email" name="email" placeholder="email" class="box" required>
                <input type="numero" name="numero" placeholder="numero" class="box" required>
                <textarea name="mensaje" class="box" placeholder="mensaje" cols="30" rows="10" required></textarea>
                <input type="submit" value="enviar mensaje" class="btnHome">
                <input type="hidden" name="_next" value="http://localhost/Momasv6.6.3/#contact">
                <input type="hidden" name="_captcha" value="false">
            </form>
            <div class="image">
                <img src="views/images/contacto1.png" alt="">

            </div>
        </div>
    </section>
    <!-- fin seccion de contacto -->

    <!-- seccion pie de pagina -->
    <?php include './views/footer.php' ?>
    <!-- fin pie de pagina -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>