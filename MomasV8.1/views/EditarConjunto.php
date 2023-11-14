<!DOCTYPE html>
<html lang="es">
<?php
require_once '../model/ConjuntoProducto.php';
require_once '../model/Conjunto.php';
require_once '../model/Producto.php';
extract($_REQUEST);
$conexion = new Conexion();
$conjuntoProducto = new ConjuntoProducto($idConjunto, null);
$conjuntoProductos = $conjuntoProducto->consultarConjuntoProductoPorId($idConjunto);
$conjunto = new Conjunto($idConjunto, null);
$conjunto = $conjunto->consultarConjuntoPorId($idConjunto);

$producto = new Producto(null, null, null, null, null, null, null, null, null, null, null);
$productos = $producto->consultarProductos();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conjunto</title>
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Conjunto</h1>
        <form action="../controller/ValidarEditarConjunto.php" method="post" id="formulario">
            <div class="form-group">
                <label for="nombreConjunto">Nombre del Conjunto:</label>
                <input type="text" class="form-control wider-input" id="nombreConjunto" name="nombreConjunto" placeholder="Nombre del Conjunto" required value="<?php echo htmlspecialchars($conjunto['nombreConjunto']); ?>">
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
                                <td>
                                    <input type="checkbox" class="rowCheckbox" name="idProducto[]" value="<?php echo $producto['idProducto']; ?>" <?php echo (in_array($producto['idProducto'], array_column($conjuntoProductos, 'idProducto')) ? 'checked' : ''); ?>>
                                </td>
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
            <input type="hidden" name="idConjunto" value="<?php echo isset($conjunto['idConjunto']) ? $conjunto['idConjunto'] : ''; ?>">
            <button type="submit" class="btn btn-primary" name="accion" value="EditarConjunto">Editar Conjunto</button>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table_id tbody tr').click(function() {
            var checkbox = $(this).find('.rowCheckbox');
            checkbox.prop('checked', !checkbox.prop('checked'));
        });
    });
</script>
</html>
