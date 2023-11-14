<?php
require '../model/Conjunto.php';
extract($_REQUEST);
$Conexion = new Conexion();

$objConjunto = new Conjunto(null, $nombreConjunto, null);
$idConjunto = $objConjunto->agregarConjunto();

if ($idConjunto) {
    $objConjuntoProducto = new ConjuntoProducto($idConjunto,$idProducto);

    if ($objConjuntoProducto->asignarConjuntoProductos($idConjunto, $idProducto)) {
        header('location: ../views/GestionCatalogo.php');
    } else {
        echo "Error al asociar el producto al conjunto.";
    }
} else {
    echo "Error al crear el conjunto.";
}
