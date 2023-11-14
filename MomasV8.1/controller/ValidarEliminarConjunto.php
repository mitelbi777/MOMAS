<?php
require '../model/Conjunto.php';
require '../model/ConjuntoProducto.php';
extract($_REQUEST);
$conexion = new Conexion();

$ObjConjuntoProducto = new ConjuntoProducto($idconjunto, null, null);

$resultado = $ObjConjuntoProducto->eliminarConjuntoProducto($idConjunto);

if ($resultado) {
    $ObjConjunto = new Conjunto($idConjunto,null);

    if ($ObjConjunto->eliminarConjunto($idConjunto)){
        header("location: ../views/GestionCatalogo.php");
        exit;
    } else {
        echo "Error al eliminar conjuntos de productos: ";
    }
} else {
    echo "No se pudo eliminar el conjunto: ";
}
