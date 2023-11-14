<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
require_once '../model/Producto.php';
extract($_REQUEST);
$Conexion = new Conexion();
$objProducto = new  Producto($idProducto, null, null, null, null, null, null, null, null, null, null);
$producto = $objProducto->consultarProductoPorId($idProducto);
require_once '../model/CategoriaProducto.php';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-pale-pink">
    <div class="container mt-5" id="agregar">
        <form class="row" id="formulario" action="../controller/ValidarEditarProducto.php" method="post">
            <div id="imgProducto">
                <div class="form-group">
                    <label for="imagenProducto" id="labelImagen">Imagen del Producto</label>
                    <input type="file" class="form-control-file" id="imagenProducto" name="imagenProducto" value="<?php echo $producto['imagenProducto'] ?>" onchange="mostrarImagen()">
                </div>
                <div class="form-group">
                    <img src="#" alt="Imagen del producto" id="imagenSeleccionada" style="display: none; max-width: 396px; max-height: 415px;">
                </div>
            </div>


            <!-- Sección de información a la derecha -->
            <div id="segundaSeccion">
                <div class="form-group">
                    <label for="nombreProducto"></label>
                    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Nombre del producto" required value="<?php echo $producto['nombreProducto']; ?>">
                </div>

                <div class="form-group coll-md-3">
                    <select class="form-control" required id="categoriaProducto" name="categoriaProducto">
                    <option value="" disabled selected>Categoria del Producto</option>
                        <?php foreach ($categoriaProductos as $categoriaProducto) : ?>
                            <option class="col-md-2" value="<?php echo $categoriaProducto['idCategoria']; ?>" <?php echo ($categoriaProducto['idCategoria'] == $producto['idCategoria']) ? 'selected' : ''; ?>>
                                <?php echo $categoriaProducto['categoriaProducto']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="tallaProducto"></label>
                            <select type="text" class="form-control" id="tallaProducto" name="tallaProducto" required>
                            <option value="" disabled selected>Talla</option>
                                <?php foreach ($tallaProductos as $tallaProducto) : ?>
                                    <option class="col-md-2" value="<?php echo $tallaProducto['idTalla']; ?>" <?php echo ($tallaProducto['idTalla'] == $producto['idTalla']) ? 'selected' : ''; ?>>
                                        <?php echo $tallaProducto['tallaProducto']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tipoCamisa"></label>
                            <select type="text" class="form-control" id="tipoCamisa" name="tipoCamisa" required>
                            <option value="" disabled selected>Tipo de Camisa</option>
                                <?php foreach ($tipoCamisas as $tipoCamisa) : ?>
                                    <option value="<?php echo $tipoCamisa['idCamisa']; ?>" <?php echo ($tipoCamisa['idCamisa'] == $producto['idCamisa']) ? 'selected' : ''; ?>>
                                        <?php echo $tipoCamisa['tipoCamisa']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tipoPantalon"></label>
                            <select type="text" class="form-control" id="tipoPantalon" name="tipoPantalon" required>
                            <option value="" disabled selected>Tipo de Pantalon</option>
                                <?php foreach ($tipoPantalones as $tipoPantalon) : ?>
                                    <option value="<?php echo $tipoPantalon['idPantalon']; ?>" <?php echo ($tipoPantalon['idPantalon'] == $producto['idPantalon']) ? 'selected' : ''; ?>>
                                        <?php echo $tipoPantalon['tipoPantalon']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="colorProducto"></label>
                    <input type="color" class="form-control" id="colorProducto" name="colorProducto" placeholder="Color del producto" required value="<?php echo $producto['colorProducto']; ?>">
                </div>
                <div class="form-group">
                    <label for="unidadesProducto"></label>
                    <input type="number" class="form-control" id="unidadesProducto" name="unidadesProducto" placeholder="Unidades disponibles" required value="<?php echo $producto['unidadesProducto']; ?>">
                </div>
                <div class="form-group">
                    <label for="precioProducto"></label>
                    <input type="number" class="form-control" id="precioProducto" name="precioProducto" placeholder="precio disponibles" required value="<?php echo $producto['precioProducto']; ?>">
                    <input type="hidden" name="idProducto" value="<?php echo $producto['idProducto']; ?>">
                </div>
                <div class="boton">
                    <button type="submit" id="boton" name="registrarProductoIn">Editar Producto</button>
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
                    labelImagen.style.display = 'none'; // Oculta el label
                };
                reader.readAsDataURL(imagenProducto.files[0]);
            } else {
                // Si no se selecciona un archivo nuevo, muestra la imagen actual
                imagenSeleccionada.src = "<?php echo $producto['imagenProducto']; ?>";
                imagenSeleccionada.style.display = 'block';
                labelImagen.style.display = 'none'; // Oculta el label
            }
        }
    </script>

</body>

</html>