<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momas</title>
    <link rel="stylesheet" href="./css/paginaPrincipal.css">
    <link rel="icon" href="views/images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/catalogo.css">
</head>

<body>

    <!-- ENCABEZADO -->

    <?php include_once 'encabezado.php' ?>

    <!-- ////////FIN ENCABEZADO//////// -->


    <!-- ////////////CATALOGO/////////// -->
    <section class="catalogo">
        <h1 class="heading"><span>Cata</span>logo</h1>

        <div class="productos">
            <div class="catalogo-general">
                <section class="contenido">
                    <div class="mostrador" id="mostrador">
                        <div class="fila">
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/1.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion">Pijama Dama Coffe</p>
                                <span class="precio">$ 50.000</span>
                            </div>
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/2.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion" id>Pijama Stars</p>
                                <span class="precio">$ 50.000</span>
                            </div>
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/3.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion">Batola Dama
                                </p>
                                <span class="precio">$ 50.000</span>
                            </div>
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/4.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion">Pijama Multiusos</p>
                                <span class="precio">$ 50.000</span>
                            </div>
                        </div>
                        <div class="fila">
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/5.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion">Pijama Love</p>
                                <span class="precio">$ 50.000</span>
                            </div>
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/6.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion">Pijama Moradad</p>
                                <span class="precio">$ 50.000</span>
                            </div>
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/7.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion">Pijama Deja Tus Sueños Florecer</p>
                                <span class="precio">$ 50.000</span>
                            </div>
                            <div class="item" onclick="cargar(this)">
                                <div class="contenedor-foto">
                                    <img src="./images/8.jpg" alt="Producto 1">
                                </div>
                                <p class="descripcion">Pijama Atrapasueños</p>
                                <span class="precio">$ 50.000</span>
                            </div>
                        </div>
                    </div>
                    <!-- CONTENEDOR DEL ITEM SELECCIONADO -->
                    <div class="seleccion" id="seleccion">
                        <div class="cerrar" onclick="cerrar()">
                            &#x2715
                        </div>
                        <div class="info">
                            <img src="img/1.png" alt="" id="img">
                            <h2 id="modelo">NIKE MODEL 1</h2>
                            <p id="descripcion">Descripción Modelo 1</p>

                            <span class="precio" id="precio">$ 130</span>

                            <div class="fila">
                                <div class="size">
                                    <label for="">PAPUTIENDA</label>
                                    <select name="" id="">
                                        <option value="">Selecciona</option>
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                        <option value="">XL</option>
                                    </select>
                                </div>
                                <button>AGREGAR AL CARRITO</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    </section>

    <!-- //////////FIN CATALOGO///////////77 -->

    <!-- PAJINADO -->
    <?php include 'paginado.php'?>
    <!-- FIN PAJINADO -->


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
                <img src="./images/pago.png" alt="">
            </div>

        </div>
        <div class="credit">creado por <span>el paputeam </span> | &copy;2023 MOMAS. Todos los derechos reservados.</div>

    </section>
    <script src="./js/catalogo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>