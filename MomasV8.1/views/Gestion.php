<?php
session_start();
error_reporting(0);

$validar = $_SESSION['nombreUsuario'];

if ($validar == null || $validar == '') {
    header("Location: ../Index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="images/logoMomas.png" type="image/x-icon" sizes="16x16">
</head>

<body>
    <?php include_once 'encabezadoUsuarioEspecial.php' ?>

    <?php include 'barraOpciones.php' ?>
  

</body>

</html>
