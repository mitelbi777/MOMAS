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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barra Operaciones</title>
  <link rel="icon" href="views/images/logoMomas.png" type="image/x-icon" sizes="16x16">
  <link rel="stylesheet" href="css/barranueva.css">
</head>

<body>


  <!-- /////////BARRA GESTIONES////// -->
  <section id="sidebar">
    <div class="toggle-btn">
      <span class="flecha-gestiones"><ion-icon name="caret-forward"></ion-icon></span>
    </div>
    <ul>
      <li id="operaciones"><b>operaciones</b></li>
      <a href="GestionUsuarios.php" class="gestiones">
        <li>gestion de usuarios</li>
      </a>
      <a href="GestionProductos.php" class="gestiones">
        <li>gestion de Productos</li>
      </a>
      <a href="GestionCaracteristicas.php" class="gestiones">
        <li>gestion de Caracteristicas</li>
      </a>
      <a href="GestionProveedores.php" class="gestiones">
        <li>gestion de Proveedores</li>
      </a>
      <a href="#" class="gestiones">
        <li>gestion de pedidos</li>
      </a>
      <a href="GestionCatalogo.php" class="gestiones">
        <li>gestion de catalogo</li>
      </a>
      <a href="GestionVentas.php" class="gestiones">
        <li>gestion de ventas</li>
      </a>
    </ul>
    <div class="content">
      <p class="welcome">Bienvenido <?php echo htmlspecialchars($_SESSION['nombreUsuario']); ?></p>

    </div>
  </section>
  <!-- ////////FIN BARRA GESTIONES///// -->

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script src="./js/barranueva.js"></script>

</body>

</html>