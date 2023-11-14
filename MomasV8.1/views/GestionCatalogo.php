<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
require_once '../model/Conjunto.php';
$conexion = new Conexion();
$conjunto = new Conjunto(null, null, null);
$conjuntos = $conjunto->consultarConjuntos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/Gestiones.css">
    <title>Lista de Conjuntos</title>
</head>

<body>
    <?php include_once 'encabezadoUsuarioEspecial.php' ?>
    <!-- /////////BARRA GESTIONES////// -->
    <?php include 'barraOpciones.php' ?>
    <!-- ////////FIN BARRA GESTIONES///// -->
    <br><br><br><br><br><br>

    <section class="home" id="home">
        <div class="container-gestiones">
        <h1 class="heading"><span>gestion </span>Catalogo</h1>
            <div class="table-header">
                <a id="btn-agregar" href="RegistrarConjunto.php"> Nuevo Conjunto <ion-icon id="icon-agregar" name="add-circle"></ion-icon></a>
                <select name="" id="select-filter">
                    <option value="" selected>tipo conjunto</option>
                    <option value="" >conjunto 1</option>
                    <option value="">conjunto 2</option>
                    <option value="">conjunto 3</option>
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
                        <th>Nombre Conjunto</th>
                        <th>Imagen Conjunto</th>
                        <th>Cantidad de Productos</th>
                        <th>Fecha</th>
                        <th>Aciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($conjuntos)) {
                        foreach ($conjuntos as $conjunto) {
                    ?>
                            <tr>
                                <td><?php echo $conjunto['idConjunto']; ?></td>
                                <td><?php echo htmlspecialchars($conjunto['nombre_conjunto']); ?></td>
                                <td>
                                    <div style="width: 50px; height: 50px; overflow: hidden; border: 1px solid #212529; border-radius: 50%;">
                                        <img src="images/<?php echo htmlspecialchars(strtolower($conjunto['imagen_asociada'])); ?>" width="50px" alt="Producto">
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($conjunto['cantidad_productos']); ?></td>
                                <td><?php echo htmlspecialchars($conjunto['fecha']); ?></td>
                                <td>
                                    <a class="custom-btn" id="btn-ver" href="VisalizarProductos.php?idConjunto=<?php echo $conjunto['idConjunto']; ?>"><ion-icon name="eye"></ion-icon> </a>

                                    <a class="custom-btn"  href="EditarConjunto.php?idConjunto=<?php echo $conjunto['idConjunto']; ?>"> <i class="fa fa-edit"></i> </a>

                                    <a class="custom-btn" id="btn-eliminar" href="EliminarConjunto.php?idConjunto=<?php echo $conjunto['idConjunto']; ?>"><i class="fa fa-trash"></i></a>
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

    <script src="./js/barranueva.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
</body>

</html>
