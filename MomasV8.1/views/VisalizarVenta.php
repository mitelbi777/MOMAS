<?php
require_once '../model/DetallesVenta.php';
extract($_REQUEST);
$conexion = new Conexion();
$venta = new DetallesVenta($idVenta, null, null, null);
$ventas = $venta->consultarDetaleVentaPorId($idVenta);
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
        <h1 class="heading"><span>Lista </span>de Productos</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Categoria</th>
                        <th>Talla</th>
                        <th>Color</th>
                        <th>Unidades Vendidas</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($ventas)) {
                        foreach ($ventas as $venta) {
                    ?>
                            <tr>
                                <td><?php echo $venta['idProducto']; ?></td>
                                <td>
                                    <div style="width: 50px; height: 50px; overflow: hidden; border: 1px solid #212529; border-radius: 50%;">
                                        <img src="images/<?php echo htmlspecialchars(strtolower($venta['imagenProducto'])); ?>" width="50px" alt="Producto">
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($venta['nombreProducto']); ?></td>
                                <td><?php echo htmlspecialchars($venta['categoriaProducto']); ?></td>
                                <td><?php echo htmlspecialchars($venta['tallaProducto']); ?></td>
                                <td>
                                    <div style="display: inline-block; vertical-align: middle;">
                                        <?php
                                        $colorProducto = htmlspecialchars($venta['colorProducto']);
                                        echo '<div style="width: 20px; height: 20px; background-color: ' . $colorProducto . '; display: inline-block; vertical-align: middle;  border: 1px solid #212529; border-radius: 50%"></div>';
                                        ?>
                                    </div>
                                    <?php echo $colorProducto; ?>
                                </td>
                                <td><?php echo htmlspecialchars($venta['cantidadVendida']); ?></td>
                                <td><?php echo htmlspecialchars($venta['total']); ?></td>
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
