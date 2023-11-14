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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
    <link rel="stylesheet" href="./css/Gestiones.css">
    <title>Lista de Caracteristicas</title>
</head>

<body>
    <?php include 'encabezadoUsuarioEspecial.php' ?>
    <Br></Br><Br></Br><Br></Br>
    <!-- /////////BARRA GESTIONES////// -->
    <?php include 'barraOpciones.php' ?>
    <h1 class="heading"><span>gestion </span>Caracteristicas</h1>


    <?php include 'GestionTallaProducto.php' ?> 

    <?php include 'GestionTipoCamisa.php' ?>
    <?php include 'GestionTipoPantalon.php' ?>
</body>

</html>