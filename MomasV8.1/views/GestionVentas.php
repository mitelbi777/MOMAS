<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
require_once '../model/Venta.php';
$conexion = new Conexion();
$venta = new Venta(null, null, null, null, null, null, null, null, null, null, null, null, null);
$ventas = $venta->consultarVentas();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/Gestiones.css">
    <title>Lista de Ventas</title>
</head>

<body>
    <?php include_once 'encabezadoUsuarioEspecial.php' ?>
    <!-- /////////BARRA GESTIONES////// -->
    <?php include 'barraOpciones.php' ?>

    <!-- ////////FIN BARRA GESTIONES///// -->
    <br><br><br><br><br><br>


    <section class="home" id="home">
        <div class="container-gestiones">
            <        <h1 class="heading"><span>Lista </span>de Facturas</h1>

            <div class="table-header">
                <a id="btn-agregar" href="RegistrarVenta.php"> Nuevo Factura <ion-icon id="icon-agregar" name="add-circle"></ion-icon></a>
                <select name="" id="select-filter">
                    <option value="" selected>tipo factura</option>
                    <option value="" >factura 1</option>
                    <option value="">factura 2</option>
                    <option value="">factura 3</option>
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
                        <th>Cliente</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Unidades</th>
                        <th>Valor</th>
                        <th>Fecha Emision</th>
                        <th>Fecha Vencimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($ventas)) {
                        foreach ($ventas as $venta) {
                    ?>
                            <tr>
                                <td><?php echo $venta['idVenta']; ?></td>
                                <td><?php echo htmlspecialchars($venta['nombreCliente']); ?></td>
                                <td><?php echo htmlspecialchars($venta['correoCliente']); ?></td>
                                <td><?php echo htmlspecialchars($venta['telefonoCliente']); ?></td>
                                <td><?php echo htmlspecialchars($venta['unidades_vendidas']); ?></td>
                                <td><?php echo htmlspecialchars($venta['valorTotal']); ?></td>
                                <td><?php echo htmlspecialchars($venta['fechaEmision']); ?></td>
                                <td><?php echo htmlspecialchars($venta['fechaVencimiento']); ?></td>
                                <td>
                                    <a  class="custom-btn" id="btn-ver" href="VisalizarVenta.php?idVenta=<?php echo $venta['idVenta']; ?>"><ion-icon name="eye"></ion-icon>  </a>
                                    <a  class="custom-btn" href="EditarFactura.php?idVenta=<?php echo $venta['idVenta']; ?>"> <i class="fa fa-edit"></i></a>
                                    <a class="custom-btn" id="btn-eliminar" href="EliminarFactura.php?idVenta=<?php echo $venta['idVenta']; ?>"><i class="fa fa-trash"></i></a>
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
                    $conexion->cerrarConexion()
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
