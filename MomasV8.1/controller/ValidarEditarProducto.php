<?php
require_once "../model/Producto.php";
extract($_REQUEST);
$idCategoria = $_POST['categoriaProducto'];
$idTalla = $_POST['tallaProducto']; 
$idCamisa = $_POST['tipoCamisa']; 
$idPantalon = $_POST['tipoPantalon']; 
$idEstado = 1;
$conexion = new Conexion();
$ObjProducto = new Producto($idProducto, $imagenProducto, $nombreProducto, $colorProducto, $idCategoria, $idTalla, $idCamisa, $idPantalon, $precioProducto, $unidadesProducto, $idEstado);

$resultado = $ObjProducto->editarProducto($idProducto);
if ($resultado)
	header("location: ../views/GestionProductos.php");  //x=1 quiere decir que se modifico bien
else
	echo "no se pudo";
