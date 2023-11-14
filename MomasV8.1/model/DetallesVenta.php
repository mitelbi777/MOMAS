<?php
require_once 'Conexion.php';
require_once 'Producto.php';
class DetallesVenta
{
    private $idVenta;
    private $idProducto;
    private $cantidadVendida;
    private $total;
    private $conexion;

    // Constructor
    public function __construct($idVenta, $idProducto, $cantidadVendida, $total)
    {
        $this->idVenta = $idVenta;
        $this->idProducto = $idProducto;
        $this->cantidadVendida = $cantidadVendida;
        $this->total = $total;
        $this->conexion = new Conexion();
    }

    // Métodos Getter
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getCantidadVendida()
    {
        return $this->cantidadVendida;
    }

    public function getTotal()
    {
        return $this->total;
    }

    // Métodos Setter
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function setCantidadVendida($cantidadVendida)
    {
        $this->cantidadVendida = $cantidadVendida;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    // public function agregarDetalleVenta($idVenta, $idProductos, $cantidades)
    // {
    //     $id = true;

    //     foreach ($idProductos as $index => $idProducto) {
    //         $producto = new Producto($idProducto, null, null, null, null, null, null, null, null);
    //         $precioProducto = $producto->consultarPrecioProducto($idProducto);
    //         $cantidadVendida = $cantidades[$index]; // Obtén la cantidad correspondiente al producto actual

    //         $total = $cantidadVendida * $precioProducto;

    //         $consulta = $this->conexion->ejecutarConsulta("INSERT INTO detalles_venta (idVenta, idProducto, cantidadVendida, total) VALUES (?, ?, ?, ?)");
    //         $consulta->bind_param("iiid", $idVenta, $idProducto, $cantidadVendida, $total);
    //         $resultado = $consulta->execute();

    //         if (!$resultado) {
    //             $id = false;
    //             break;
    //         }
    //     }
    //     $consulta->close();
    //     return $id;
    // }
    public function agregarDetalleVenta($idVenta, $idProductos, $cantidades)
    {
        $id = true;

        foreach ($idProductos as $index => $idProducto) {

            $producto = new Producto($idProducto, null, null, null, null, null, null, null, null,null,null);
            $precioProducto = $producto->consultarPrecioProducto($idProducto);
            $cantidadVendida = $cantidades[$index];

            $total = $cantidadVendida * $precioProducto;

            $consulta = $this->conexion->ejecutarConsulta("INSERT INTO detalles_venta (idVenta, idProducto, cantidadVendida, total) VALUES (?, ?, ?, ?)");
            $consulta->bind_param("iiid", $idVenta, $idProducto, $cantidadVendida, $total);
            $resultado = $consulta->execute();

            if ($resultado) {
                $restarUnidades = $producto->actualizarUnidadesProducto($cantidadVendida);
                if (!$restarUnidades) {
                    $id = false;
                    break;
                }
            } else {
                $id = false;
                break;
            }
        }
        $consulta->close();
        return $id;
    }
    public function calcularTotalVenta($idVenta)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT SUM(total) AS totalVenta FROM detalles_venta WHERE idVenta = ?");
        $consulta->bind_param("i", $idVenta);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $totalVenta = $resultado->fetch_assoc()['totalVenta'];
        $consulta->close();

        return $totalVenta;
    }
    public function consultarDetaleVentaPorId($idVenta)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT dv.idProducto, dv.cantidadVendida, dv.total, p.nombreProducto, p.imagenProducto, p.colorProducto, p.idTalla, (SELECT tallaProducto FROM talla_producto WHERE idTalla = p.idTalla) AS tallaProducto, p.idCategoria, (SELECT categoriaProducto FROM categoria_producto WHERE idCategoria = p.idCategoria) AS categoriaProducto FROM detalles_venta dv, (SELECT idProducto, nombreProducto, imagenProducto, colorProducto, idTalla, idCategoria FROM productos) p WHERE dv.idProducto = p.idProducto AND dv.idVenta = ?");
        $consulta->bind_param("i", $idVenta);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $ventas = array();

        while ($fila = $resultado->fetch_assoc()) {
            $ventas[] = $fila;
        }

        $consulta->close();
        return $ventas;
    }
}
