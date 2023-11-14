<?php
require_once 'Conexion.php';
require_once 'DetallesVenta.php';

class Venta
{
    private $idVenta;
    private $nombreCliente;
    private $correoCliente;
    private $telefonoCliente;
    private $valorTotal;
    private $fechaEmision;
    private $fechaVencimiento;
    private $conexion;

    // Constructor
    public function __construct($idVenta, $nombreCliente, $correoCliente, $telefonoCliente, $valorTotal, $fechaEmision, $fechaVencimiento)
    {
        $this->idVenta = $idVenta;
        $this->nombreCliente = $nombreCliente;
        $this->correoCliente = $correoCliente;
        $this->telefonoCliente = $telefonoCliente;
        $this->valorTotal = $valorTotal;
        $this->fechaEmision = $fechaEmision;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->conexion = new Conexion();
    }

    // Métodos Getter
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

    // Métodos Setter
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

    public function agregarVenta()
    {
        $fechaVencimiento = $this->calcularFechaVencimiento();
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO ventas (nombreCliente, correoCliente, telefonoCliente, fechaVencimiento) VALUES (?,?,?,?)");
        $consulta->bind_param("ssss", $this->nombreCliente, $this->correoCliente, $this->telefonoCliente,  $fechaVencimiento);
        $resultado = $consulta->execute();
        $idVenta = null;

        if ($resultado) {
            $idVenta = $this->conexion->getConexion()->insert_id;
            $consulta->close();
            return $idVenta;
        } else {
            $consulta->close();
            return false;
        }
    }

    private function calcularFechaVencimiento()
    {
        $fechaActual = date('Y-m-d');
        return date('Y-m-d', strtotime($fechaActual . ' + 3 months'));
    }

    public function actualizarValorTotal($idVenta)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT SUM(total) AS valorTotal FROM detalles_venta WHERE idVenta = ?");
        $consulta->bind_param("i", $idVenta);
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($fila = $resultado->fetch_assoc()) {
            $valorTotal = $fila['valorTotal'];
            $consultaActualizar = $this->conexion->ejecutarConsulta("UPDATE ventas SET valorTotal = ? WHERE idVenta = ?");
            $consultaActualizar->bind_param("di", $valorTotal, $idVenta);
            $consultaActualizar->execute();
        }

        // Cierra las consultas
        $consulta->close();
        $consultaActualizar->close();
    }
    public function consultarVentas()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT v.idVenta, v.nombreCliente, v.correoCliente, v.telefonoCliente, v.valorTotal, v.fechaEmision, v.fechaVencimiento, SUM(d.cantidadVendida) AS unidades_vendidas FROM ventas v LEFT JOIN detalles_venta d ON v.idVenta = d.idVenta GROUP BY v.idVenta, v.nombreCliente, v.correoCliente, v.telefonoCliente, v.valorTotal, v.fechaEmision, v.fechaVencimiento;");
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
