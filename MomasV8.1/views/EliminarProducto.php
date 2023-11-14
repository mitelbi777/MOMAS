<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar = '') {

    header("Location: ../Index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuarios</title>
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <!-- Incluye las bibliotecas de Bootstrap y jQuery -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <p>¿Desea confirmar la eliminacion del registro?</p>


                    <div class="row">
                        <div class="col-sm-6">
                            <form action="../controller/ValidarEliminarUsuario.php" method="POST">
                                
                                <input type="hidden" name="idUsuario" value="<?php echo $_GET['idUsuario']; ?>">

                                <input type="submit" name="" value="eliminar" class=" btn btn-danger">
                                <a href="GestionUsuarios.php" class="btn btn-success">Cancelar</a>


                        </div>
                    </div>
                </div>

</body>

</html>