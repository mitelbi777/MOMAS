<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
require_once '../model/CategoriaProducto.php';

$conexion = new Conexion();
$categoriaProducto = new Categoriaproducto(null, null);
$categoriaProductos = $categoriaProducto->consultarCategoriaProductos();
require_once '../model/TallaProducto.php';
$tallaProducto = new TallaProducto(null, null);
$tallaProductos = $tallaProducto->consultarTallas();
require_once '../model/TipoCamisa.php';
$tipoCamisa = new TipoCamisa(null, null);
$tipoCamisas = $tipoCamisa->consultarTipoCamisa();
require_once '../model/TipoPantalon.php';
$tipoPantalon = new TipoPantalon(null, null);
$tipoPantalones = $tipoPantalon->consultarTipoPantalones();
?>
<html>

<head>
    <title>Agregar Productos</title>
    <link rel="stylesheet" href="css/AgregarInventario.css">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-pale-pink">
    <div class="container mt-5" id="agregar">
        <form class="row" id="formulario" action="../controller/ValidarProducto.php" method="post">
            <div id="imgProducto">
                <div class="form-group">
                    <label for="imagenProducto" id="labelImagen">Imagen del Producto</label>
                    <input type="file" class="form-control-file" id="imagenProducto" name="imagenProducto" onchange="mostrarImagen()">
                </div>
                <div class="form-group">
                    <img src="#" alt="Imagen del producto" id="imagenSeleccionada" style="display: none; max-width: 396px; max-height: 415px;">
                </div>
            </div>


            <!-- Sección de información a la derecha -->
            <div id="segundaSeccion">
                <div class="form-group">
                    <label for="nombreProducto"></label>
                    <input type="text" class="form-control wider-input" id="nombreProducto" name="nombreProducto" placeholder="Nombre del producto" required>
                </div>


                <div class="form-group ">
                    <label for="categoriaProducto"></label>
                    <select class="form-control" required id="categoriaProducto" name="categoriaProducto" placeholder="Categoria Producto" required>
                    <option value="" disabled selected>Categoria del Producto</option>
                        <?php
                        if (!empty($categoriaProductos))
                            foreach ($categoriaProductos as $categoriaProducto) {
                        ?>  
                            
                            <option value="<?php echo $categoriaProducto['idCategoria'] ?>"><?php echo $categoriaProducto['categoriaProducto'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="tallaProducto"></label>
                            <select type="text" class="form-control" id="tallaProducto" name="tallaProducto" required>
                            <option value="" disabled selected>Talla</option>
                                <?php
                                foreach ($tallaProductos as $tallaProducto) {
                                ?>
                                    <option value="<?php echo $tallaProducto['idTalla'] ?>"><?php echo $tallaProducto['tallaProducto'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipoCamisa"></label>
                            <select type="text" class="form-control" id="tipoCamisa" name="tipoCamisa" required>
                            <option value="" disabled selected>Tipo de Camisa</option>
                                <?php
                                foreach ($tipoCamisas as $tipoCamisa) {
                                ?>
                                    <option value="<?php echo $tipoCamisa['idCamisa'] ?>"><?php echo $tipoCamisa['tipoCamisa'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tipoPantalon"></label>
                            <select type="text" class="form-control" id="tipoPantalon" name="tipoPantalon" required>
                            <option value="" disabled selected>Tipo de Pantalon</option>
                                <?php
                                foreach ($tipoPantalones as $tipoPantalon) {
                                ?>
                                    <option value="<?php echo $tipoPantalon['idPantalon'] ?>"><?php echo $tipoPantalon['tipoPantalon'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group col-md-18">
                    <label for="colorProducto"></label>
                    <input type="color" class="form-control" id="colorProducto" name="colorProducto" placeholder="Color del producto" required>
                </div>
                <div class="form-group">
                    <label for="unidadesProducto"></label>
                    <input type="number" class="form-control" id="unidadesProducto" name="unidadesProducto" placeholder="Unidades disponibles" required>
                </div>
                <div class="form-group">
                    <label for="precioProducto"></label>
                    <input type="number" class="form-control" id="precioProducto" name="precioProducto" placeholder="precio disponibles" required>
                </div>
                <div class="boton">
                    <button type="submit" id="boton" name="registrarProductoIn">Agregar Producto</button>
                </div>
            </div>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function mostrarImagen() {
            const imagenProducto = document.getElementById('imagenProducto');
            const imagenSeleccionada = document.getElementById('imagenSeleccionada');
            const labelImagen = document.getElementById('labelImagen');

            if (imagenProducto.files && imagenProducto.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagenSeleccionada.src = e.target.result;
                    imagenSeleccionada.style.display = 'block';
                    labelImagen.setAttribute('hidden', 'true'); // Oculta el label
                };
                reader.readAsDataURL(imagenProducto.files[0]);
            }
        }
    </script>
</body>

</html>