<?php
require '../model/Conjunto.php';
$idConjunto = $_POST['idConjunto'];
$nombreConjunto = $_POST['nombreConjunto'];
$idProductos = $_POST['idProducto'];

$Conexion = new Conexion();
$objConjunto = new Conjunto($idConjunto, null);

// Llamar a la nueva función para editar el conjunto y productos asociados
if ($objConjunto->editarConjunto($idConjunto, $nombreConjunto, $idProductos)) {
    header('location: ../views/GestionCatalogo.php');
} else {
    echo "Error al editar el conjunto.";
}
?>