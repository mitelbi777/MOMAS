<!DOCTYPE html>
<html lang="es">
<?php
require_once '../model/Producto.php';
$conexion = new Conexion();
$producto = new Producto(null, null, null, null, null, null, null, null, null, null, null);
$productos = $producto->consultarProductos();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Producto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Agregar Conjunto</h1>
        <form action="../controller/ValidarConjunto.php" method="post" id="formulario">
            <div class="form-group">
                <label for="nombreConjunto"></label>
                <input type="text" class="form-control wider-input" id="nombreConjunto" name="nombreConjunto" placeholder="Nombre del Conjunto" required>
            </div>
            <table class="table table-striped table_id">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Categoria</th>
                        <th>Talla</th>
                        <th>Color</th>
                        <th>Unidades</th>
                        <th>Precio</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($productos)) {
                        foreach ($productos as $producto) {
                    ?>
                            <tr>
                                <td><input type="checkbox" name="idProducto[]" value="<?php echo $producto['idProducto']; ?>"></td>
                                <td><?php echo $producto['idProducto']; ?></td>
                                <td>
                                    <div style="width: 50px; height: 50px; overflow: hidden; border: 1px solid #212529; border-radius: 50%;">
                                        <img src="images/<?php echo htmlspecialchars(strtolower($producto['imagenProducto'])); ?>" width="50px" alt="Producto">
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($producto['nombreProducto']); ?></td>
                                <td>
                                    <div style="display: inline-block; vertical-align: middle;">
                                        <?php
                                        $colorProducto = htmlspecialchars($producto['colorProducto']);
                                        echo '<div style="width: 20px; height: 20px; background-color: ' . $colorProducto . '; display: inline-block; vertical-align: middle;  border: 1px solid #212529; border-radius: 50%"></div>';
                                        ?>
                                    </div>
                                    <?php echo $colorProducto; ?>
                                </td>
                                <td><?php echo htmlspecialchars($producto['categoriaProducto']); ?></td>
                                <td><?php echo htmlspecialchars($producto['tallaProducto']); ?></td>
                                <td><?php echo htmlspecialchars($producto['unidadesProducto']); ?></td>
                                <td><?php echo htmlspecialchars($producto['precioProducto']); ?></td>
                                <td><?php echo htmlspecialchars($producto['fechaInsersion']); ?></td>
                                <td>
                                    <a class="btn btn-warning" href="EditarProducto.php?idProducto=<?php echo $producto['idProducto']; ?>"> <i class="fa fa-edit"></i> </a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal" href="EliminarProducto.php?idProducto=<?php echo $producto['idProducto']; ?>"><i class="fa fa-trash"></i></a>

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
    <button type="submit" class="btn btn-primary" name="accion" value="realizarVenta">Realizar Factura</button>
    </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.table_id tbody tr').click(function() {
            var checkbox = $(this).find('.rowCheckbox');
            checkbox.prop('checked', !checkbox.prop('checked'));
        });
    });
</script>
</html>