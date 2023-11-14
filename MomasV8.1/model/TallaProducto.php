<?php
require_once 'Conexion.php';
class TallaProducto
{
    private $idTalla;
    private $tallaProducto;
    private $conexion;
    public function __construct($idTalla, $tallaProducto)
    {
        $this->idTalla = $idTalla;
        $this->tallaProducto = $tallaProducto;
        $this->conexion = new Conexion();
    }
    public function setIdTallaProducto($idTalla)
    {
        $this->idTalla = $idTalla;
    }

    public function setTallaProducto($tallaProducto)
    {
        $this->tallaProducto = $tallaProducto;
    }
    public function getIdTalla()
    {
        return $this->idTalla;
    }

    public function getTallaProducto()
    {
        return $this->tallaProducto;
    }
    public function agregarTalla()
    {
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO talla_producto (tallaProducto ) VALUES (?) ");
        $consulta->bind_param("s", $this->tallaProducto);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function editarTalla($idTalla)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE talla_producto SET tallaProducto = ? WHERE idTalla = ? ");
        $consulta->bind_param("si", $this->tallaProducto, $idTalla);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarTalla($idTalla)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM talla_producto WHERE idTalla = ? ");
        $consulta->bind_param("i", $idTalla);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function consultarTallas()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM talla_producto");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $tallaProductos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $tallaProductos[] = $fila;
        }

        $consulta->close();
        return $tallaProductos;
    }

    public function consultarTallaPorId($idTalla)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT idTalla, tallaProducto FROM talla_producto WHERE idTalla = ?");
        $consulta->bind_param("i", $idTalla);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $tallaProducto = null;
        if ($fila = $resultado->fetch_assoc()) {
            $tallaProducto = $fila;
        }
        $consulta->close();
        return $tallaProducto;
    }
}
