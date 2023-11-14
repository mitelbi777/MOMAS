<?php
require_once 'Conexion.php';
class EstadoProducto
{
    private $idEstado;
    private $estadoProducto;
    private $conexion;
    public function __construct($idEstado, $estadoProducto)
    {
        $this->idEstado = $idEstado;
        $this->estadoProducto = $estadoProducto;
        $this->conexion = new Conexion();
    }
    public function setidEstadoProducto($idEstado)
    {
        $this->idEstado = $idEstado;
    }

    public function setEstadoProducto($estadoProducto)
    {
        $this->estadoProducto = $estadoProducto;
    }
    public function getidEstadoProducto()
    {
        return $this->idEstado;
    }

    public function getEstadoProducto()
    {
        return $this->estadoProducto;
    }

    public function consultarEstados()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM estado_producto");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $estadoProductos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $estadoProductos[] = $fila;
        }

        $consulta->close();
        return $estadoProductos;
    }

    public function consultarEstadoPorId($idEstado)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM estado_producto WHERE idEstado = ?");
        $consulta->bind_param("i", $idEstado);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $estadoProducto = null;
        if ($fila = $resultado->fetch_assoc()) {
            $estadoProducto = $fila;
        }
        $consulta->close();
        return $estadoProducto;
    }
}
