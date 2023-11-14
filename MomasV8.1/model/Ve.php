<?php
require_once 'Conexion.php';
class Venta
{
    private $idVenta;
    private $nombreCliente;
    private $correoCliente;
    private $telefonoCliente;
    private $idProducto;
    private $cantidadTotal;
    private $valorTotal;
    private $fechaEmision;
    private $fechaVencimiento;
    private $cantidadVendida;
    private $subTotal;
    private $descuento;
    private $total;
    private $conexion;

    public function __construct( $idVenta,$nombreCliente,$correoCliente,$telefonoCliente,$idProducto,$cantidadTotal,$valorTotal,$fechaEmision,$fechaVencimiento,$cantidadVendida,$subTotal,$descuento,$total,) {
        $this->idVenta = $idVenta;
        $this->nombreCliente = $nombreCliente;
        $this->correoCliente = $correoCliente;
        $this->telefonoCliente = $telefonoCliente;
        $this->idProducto = $idProducto;
        $this->cantidadTotal = $cantidadTotal;
        $this->valorTotal = $valorTotal;
        $this->fechaEmision = $fechaEmision;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->cantidadVendida = $cantidadVendida;
        $this->subTotal = $subTotal;
        $this->descuento = $descuento;
        $this->total = $total;
        $this->conexion = new Conexion();
    }

    // Métodos "set" para establecer los valores de los atributos
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }

    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    public function setCorreoCliente($correoCliente)
    {
        $this->correoCliente = $correoCliente;
    }

    public function setTelefonoCliente($telefonoCliente)
    {
        $this->telefonoCliente = $telefonoCliente;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function setCantidadTotal($cantidadTotal)
    {
        $this->cantidadTotal = $cantidadTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }

    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;
    }

    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setCantidadVendida($cantidadVendida)
    {
        $this->cantidadVendida = $cantidadVendida;
    }

    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    // Métodos "get" para obtener los valores de los atributos
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    public function getCorreoCliente()
    {
        return $this->correoCliente;
    }

    public function getTelefonoCliente()
    {
        return $this->telefonoCliente;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getCantidadTotal()
    {
        return $this->cantidadTotal;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    public function getCantidadVendida()
    {
        return $this->cantidadVendida;
    }

    public function getSubTotal()
    {
        return $this->subTotal;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getConexion()
    {
        return $this->conexion;
    }




    public function agregarVenta()
    {
        $this->conexion = Conectarse();
        $sql = "INSERT INTO ventas (nombreCliente,correoCliente,telefonoCliente) VALUES ('$this->nombreCliente','$this->correoCliente','$this->telefonoCliente')";
        $resultado = $this->conexion->query($sql);

        if ($resultado) {
            $idVenta = $this->conexion->insert_id;
            $this->conexion->close();
            return $idVenta;
        } else {
            $this->conexion->close();
            return false;
        }
    }

    public function asignarVentaProductos($idVenta, $idProductos, $cantidadVendida)
    {
        $this->conexion = Conectarse();
        $success = true;

        if (count($idProductos) !== count($cantidadVendida)) {
            return false;
        }

        for ($i = 0; $i < count($idProductos); $i++) {
            $idProducto = $idProductos[$i];
            $cantidad = $cantidadVendida[$i]; // Obtiene la cantidad correspondiente

            $sql = "INSERT INTO detalles_venta (idVenta, idProducto, cantidadVendida) VALUES ('$idVenta', '$idProducto', '$cantidad')";
            $resultado = $this->conexion->query($sql);

            if (!$resultado) {
                $success = false;
                break;
            }
        }

        $this->conexion->close();
        return $success;
    }
}
