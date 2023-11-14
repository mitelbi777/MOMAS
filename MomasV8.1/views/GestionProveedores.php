<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
require_once '../model/Proveedor.php';;
$conexion = new Conexion();
$proveedor = new Proveedor(null, null, null, null, null, null);
$proveedores = $proveedor->consultarProveedores();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/Gestiones.css">
    <title>Lista de Proveedores</title>
</head>

<body>
    <?php include_once 'encabezadoUsuarioEspecial.php' ?>

    <!-- /////////BARRA GESTIONES////// -->
    <?php include 'barraOpciones.php'; ?>
    <!-- ////////FIN BARRA GESTIONES///// -->
    <br><br><br><br><br><br>
    <section class="home" id="home">
        <div class="container-gestiones">
        <h1 class="heading"><span>gestion </span>Proveedores</h1>
            <div class="table-header">  
                <a id="btn-agregar" href="RegistrarProveedor.php"> Nuevo Proveedor <ion-icon id="icon-agregar" name="add-circle"></ion-icon> </a>
                <select name="" id="select-filter">
                    <option value="" selected>tipo proveedor</option>
                    <option value="" >proveedor</option>
                    <option value="">proveedor</option>
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
                        <th>Proveedor</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($proveedores)) {
                        foreach ($proveedores as $proveedor) {
                    ?>
                            <tr>
                                <td><?php echo $proveedor['idProveedor']; ?></td>
                                <td><?php echo htmlspecialchars($proveedor['nombreProveedor']); ?></td>
                                <td><?php echo htmlspecialchars($proveedor['correoProveedor']); ?></td>
                                <td><?php echo htmlspecialchars($proveedor['telefonoProveedor']); ?></td>
                                <td><?php echo htmlspecialchars($proveedor['direccionProveedor']); ?></td>
                                <td><?php echo htmlspecialchars($proveedor['fecha']); ?></td>
                                <td>
                                    <a  class="custom-btn" href="EditarProveedor.php?idProveedor=<?php echo $proveedor['idProveedor']; ?>"> <i class="fa fa-edit"></i> </a>
                                    <a class="custom-btn" id="btn-eliminar" href="EliminarProveedor.php?idProveedor=<?php echo $proveedor['idProveedor']; ?>"> <i class="fa fa-trash"></i> </a>
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
