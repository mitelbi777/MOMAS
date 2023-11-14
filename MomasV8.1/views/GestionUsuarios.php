<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {
    header("Location: ../Index.php");
    die();
}

require_once '../model/Usuario.php';
$conexion = new Conexion();
$usuario = new Usuario(null, null, null, null, null);
$usuarios = $usuario->consultarUsuarios();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/Gestiones.css">
    
    <title>Lista de Usuarios</title>
</head>

<body>
    <?php include_once 'encabezadoUsuarioEspecial.php' ?>
    <!-- /////////BARRA GESTIONES////// -->
    <?php include 'barraOpciones.php' ?>
    <!-- ////////FIN BARRA GESTIONES///// -->
    <br><br><br><br><br><br>
    <section class="home" id="home">
        <div class="container-gestiones">
        <h1 class="heading"><span>gestion </span>usuarios</h1>

            <div class="table-header">                
                    <a id="btn-agregar" href="RegistrarseAdmin.php">Nuevo usuario <ion-icon id="icon-agregar" name="add-circle"></ion-icon></a>
                
                <select name="" id="select-filter">
                    <option value="" selected>tipo usuario</option>
                    <option value="" >administrador</option>
                    <option value="">almacenista</option>
                    <option value="">usuarios</option>
                </select>
                <div class="buscar">
                    
                    <input id="TextoBuscar" type="search" placeholder="Buscar" >
                    <ion-icon name="search-outline"></ion-icon>
                </div> 
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($usuarios)) {
                        foreach ($usuarios as $usuario) {
                    ?>
                            <tr>
                                <td><?php echo $usuario['idUsuario']; ?></td>
                                <td><?php echo htmlspecialchars($usuario['nombreUsuario']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['rolUsuario']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['correoUsuario']); ?></td>
                                <td><?php echo htmlspecialchars($usuario['fecha']); ?></td>
                                <td>
                                    <a  class="custom-btn" href="EditarUsuario.php?idUsuario=<?php echo $usuario['idUsuario']; ?>"> <i class="fa fa-edit"></i> </a>
                                    <a class="custom-btn" id="btn-eliminar" href="EliminarUsuario.php?idUsuario=<?php echo $usuario['idUsuario']; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>