<?php
$hots = "localhost";
$user = "root";
$password = "";
$database ="momas";

$conexion = mysqli_connect($hots,$user,$password,$database);
if(!$conexion){
    echo "No se pudo realizar la conexion con la base de datos, el error es: ".
    mysqli_connect_error();
}

function realizarVenta($conexion, $idProducto, $cantidadVendida)
{
    $consulta = "SELECT nombreProducto, categoriaProducto, tallaProducto, colorProducto, precioProducto, unidadesProducto FROM productos WHERE idProducto = '$idProducto'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $nombreProducto = $fila["nombreProducto"];
        $categoriaProducto = $fila["categoriaProducto"];
        $tallaProducto = $fila["tallaProducto"];
        $colorProducto = $fila["colorProducto"];
        $precioProducto = $fila["precioProducto"];
        $unidadesDisponibles = $fila["unidadesProducto"];

        if ($unidadesDisponibles >= $cantidadVendida) {
            $nuevasUnidades = $unidadesDisponibles - $cantidadVendida;
            $consulta = "UPDATE productos SET unidadesProducto = '$nuevasUnidades' WHERE idProducto = '$idProducto'";
            if (mysqli_query($conexion, $consulta)) {
                return "Venta exitosa. Producto: $nombreProducto,  categoria: $categoriaProducto, talla: $tallaProducto, Color: $colorProducto, Precio: $precioProducto, Cantidad Vendida: $cantidadVendida";
            } else {
                return "Error al actualizar las unidades: " . mysqli_error($conexion);
            }
        } else {
            return "No hay suficientes unidades disponibles para la venta.";
        }
    } else {
        return "Producto no encontrado.";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["idProducto"], $_POST["cantidadVendida"])) {
        $ventas = array();

        for ($i = 0; $i < count($_POST["idProducto"]); $i++) {
            $idProducto = $_POST["idProducto"][$i];
            $cantidadVendida = $_POST["cantidadVendida"][$i];
            $resultadoVenta = realizarVenta($conexion, $idProducto, $cantidadVendida);

            if (strpos($resultadoVenta, "Venta exitosa") === 0) {
                $ventas[] = $resultadoVenta;
            }
        }

        if (!empty($ventas)) {
            echo "<h2>Ventas realizadas:</h2>";
            echo "<ul>";
            foreach ($ventas as $venta) {
                echo "<li>$venta</li>";
            }
            echo "</ul>";
        }
    }
}


mysqli_close($conexion);
