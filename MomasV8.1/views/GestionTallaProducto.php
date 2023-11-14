<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
require_once '../model/TallaProducto.php';
$conexion = new Conexion();
$tallaProducto = new TallaProducto(null, null);
$tallaProductos = $tallaProducto->consultarTallas();
?>
<section class="home" id="home">
    <div class="container-gestiones">

        <div class="table-header">
            <h2>Lista de Talla</h2> 
            <a id="btn-agregar" href="RegistrarTalla.php"> Nueva Talla <ion-icon id="icon-agregar" name="add-circle"></ion-icon></a>
        </div>

        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Talla</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($tallaProductos)) {
                    foreach ($tallaProductos as $tallaProducto) {
                ?>
                        <tr>
                            <td><?php echo $tallaProducto['idTalla']; ?></td>
                            <td><?php echo htmlspecialchars($tallaProducto['tallaProducto']); ?></td>
                            <td>
                                <a  class="custom-btn" href="EditarTalla.php?idTalla=<?php echo $tallaProducto['idTalla']; ?>">  <i class="fa fa-edit"></i></a>

                                <a class="custom-btn" id="btn-eliminar" href="EliminarTalla.php?idTalla=<?php echo $tallaProducto['idTalla']; ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr class="text-center">
                        <td colspan="3">No existen registros</td>
                    </tr>
                <?php
                }
                $conexion->cerrarConexion();
                ?>
            </tbody>
        </table>
    </div>
</section>
