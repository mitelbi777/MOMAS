<?php
require_once '../model/TipoPantalon.php';
$conexion = new Conexion();
$tipoPantalon = new TipoPantalon(null, null);
$tipoPantalones = $tipoPantalon->consultarTipoPantalones();
?>

<section class="home" id="home">
    <div class="container-gestiones">
        
        <div class="table-header">
        <h2>Lista de Tipos de Pantalones</h2>
            <a id="btn-agregar" href="RegistrarTipoPantalon.php"> Nuevo Tipo de Pantalon <ion-icon id="icon-agregar" name="add-circle"></ion-icon></a>
        </div>

        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Aciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($tipoPantalones)) {
                    foreach ($tipoPantalones as $tipoPantalon) {
                ?>
                        <tr>
                            <td><?php echo $tipoPantalon['idPantalon']; ?></td>
                            <td><?php echo htmlspecialchars($tipoPantalon['tipoPantalon']); ?></td>
                            <td>
                                <a class="custom-btn" href="EditarTipoPantalon.php?idPantalon=<?php echo $tipoPantalon['idPantalon']; ?>"> <i class="fa fa-edit"></i> </a>

                                <a class="custom-btn" id="btn-eliminar" href="EliminarTipoPantalon.php?idPantalon=<?php echo $tipoPantalon['idPantalon']; ?>"><i class="fa fa-trash"></i></a>
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
