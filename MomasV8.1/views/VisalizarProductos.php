<?php
require_once '../model/ConjuntoProducto.php';
extract($_REQUEST);
$conexion = new Conexion();
$conjuntoProducto = new ConjuntoProducto($idConjunto, null);
$conjuntoProductos = $conjuntoProducto->consultarConjuntoProductoPorId($idConjunto);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/Gestiones.css">
    <title>Lista de Productos</title>
</head>

<body>
    <?php include_once 'encabezadoUsuarioEspecial.php' ?>
    <!-- /////////BARRA GESTIONES////// -->
    <?php include 'barraOpciones.php'; ?>
    <!-- ////////FIN BARRA GESTIONES///// -->
    <br><br><br><br><br><br>

    <section class="home" id="home">
        <div class="container-gestiones">
        <h1 class="heading"><span>Lista </span>de productos de conjunto</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Categoria</th>
                        <th>Talla</th>
                        <th>Color</th>
                        <th>Unidades</th>
                        <th>Precio</th>Producto
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($conjuntoProductos)) {
                        foreach ($conjuntoProductos as $conjuntoProducto) {
                    ?>
                            <tr>
                                <td><?php echo $conjuntoProducto['idProducto']; ?></td>
                                <td>
                                <div style="width: 50px; height: 50px; overflow: hidden; border: 1px solid #212529; border-radius: 50%;">
                                    <img src="images/<?php echo htmlspecialchars(strtolower($conjuntoProducto['imagenProducto'])); ?>" width="50px" alt="Producto">
                                </div>
                                </td>
                                <td><?php echo htmlspecialchars($conjuntoProducto['nombreProducto']); ?></td>
                                <td><?php echo htmlspecialchars($conjuntoProducto['categoriaProducto']); ?></td>
                                <td><?php echo htmlspecialchars($conjuntoProducto['tallaProducto']); ?></td>
                                <td>
                                    <div style="display: inline-block; vertical-align: middle;">
                                        <?php
                                        $colorProducto = htmlspecialchars($conjuntoProducto['colorProducto']);
                                        echo '<div style="width: 20px; height: 20px; background-color: ' . $colorProducto . '; display: inline-block; vertical-align: middle;  border: 1px solid #212529; border-radius: 50%"></div>';
                                        ?>
                                    </div>
                                    <?php echo $colorProducto; ?>
                                </td>
                                <td><?php echo htmlspecialchars($conjuntoProducto['unidadesProducto']); ?></td>
                                <td><?php echo htmlspecialchars($conjuntoProducto['precioProducto']); ?></td>
                                <td><?php echo htmlspecialchars($conjuntoProducto['fecha']); ?></td>
                                <td>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="6">No existen registros</td>
                        </tr>
                    <?php
                    }
                    $conexion->cerrarConexion();
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
