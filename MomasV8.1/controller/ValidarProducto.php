<?php
require '../model/Producto.php';
extract($_REQUEST);
$idCategoria = $_POST['categoriaProducto'];
$idTalla = $_POST['tallaProducto']; 
$idCamisa = $_POST['tipoCamisa']; 
$idPantalon = $_POST['tipoPantalon']; 
$idEstado = 1;
$Conexion = new Conexion();
$ObjProducto = new Producto(null, $imagenProducto, $nombreProducto, $colorProducto, $idCategoria, $idTalla, $idCamisa, $idPantalon, $precioProducto, $unidadesProducto, $idEstado);

$resultado = $ObjProducto->agregarProducto();

if ($resultado) {
    header("location: ../views/GestionProductos.php");
} else {
    echo 'no se pudo hacer el registro del producto';
}
