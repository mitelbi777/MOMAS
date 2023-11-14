<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
require_once '../model/TipoCamisa.php';
$conexion = new Conexion();
$tipoCamisa = new TipoCamisa(null, null);
$tipoCamisas = $tipoCamisa->consultarTipoCamisa();
?>
<section class="home" id="home">
    <div class="container-gestiones">
        <div class="table-header">
            <h2>Lista de tipos de camisa</h2> 
            <a id="btn-agregar" href="RegistrarTipoCamisa.php"> Nuevo Tipo de Camisa <ion-icon id="icon-agregar" name="add-circle"></ion-icon></a>
            
        </div>

        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo Camisa</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($tipoCamisas)) {
                    foreach ($tipoCamisas as $tipoCamisa) {
                ?>
                        <tr>
                            <td><?php echo $tipoCamisa['idCamisa']; ?></td>
                            <td><?php echo htmlspecialchars($tipoCamisa['tipoCamisa']); ?></td>
                            <td>
                                <a class="custom-btn" href="EditarTipoCamisa.php?idCamisa=<?php echo $tipoCamisa['idCamisa']; ?>"> <i class="fa fa-edit"></i>  </a>

                                <a class="custom-btn" id="btn-eliminar" href="EliminarTipoCamisa.php?idCamisa=<?php echo $tipoCamisa['idCamisa']; ?>"><i class="fa fa-trash"></i></a>
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
