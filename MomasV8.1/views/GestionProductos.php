<?php
require_once '../model/Producto.php';
$conexion = new Conexion();
$producto = new Producto(null, null, null, null, null, null, null, null, null,null,null);
$productos = $producto->consultarProductos();
?>
<!DOCTYPE html>
<html lang="es">

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
        <h1 class="heading"><span>gestion </span>Productos</h1>
            <div class="table-header">
                <a id="btn-agregar" href="RegistrarProducto.php"> Nuevo producto <ion-icon id="icon-agregar" name="add-circle"></ion-icon></a>
                <select name="" id="select-filter">
                    <option value="" selected>tipo producto</option>
                    <option value="" >Femenino</option>
                    <option value="">Masculino</option>
                    <option value="">Infantil</option>
                    <option value="">Unisex</option>
                </select>
                <div class="buscar">
                    
                    <input id="TextoBuscar" type="search" placeholder="Buscar" >
                    <ion-icon name="search-outline"></ion-icon>
                </div> 
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                    <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Color</th>
                        <th>Categoria</th>
                        <th>Talla</th>
                        <th>Tipo de Camisa</th>
                        <th>Tipo de Pantalon</th>
                        <th>Undidades</th>
                        <th>Precio</th>
                        <th>Estado</th>
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
                                <td><?php echo htmlspecialchars($producto['tipoCamisa']); ?></td>
                                <td><?php echo htmlspecialchars($producto['tipoPantalon']); ?></td>
                                <td><?php echo htmlspecialchars($producto['unidadesProducto']); ?></td>
                                <td><?php echo '$'.htmlspecialchars($producto['precioProducto']); ?></td>
                                <td><?php echo htmlspecialchars($producto['estadoProducto']); ?></td>
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
        </div>
    </section>
</body>

</html>
