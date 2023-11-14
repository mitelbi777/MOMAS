<?php
require_once 'Conexion.php';
class TipoPantalon
{
    private $idPantalon;
    private $tipoPantalon;
    private $conexion;
    public function __construct($idPantalon, $tipoPantalon)
    {
        $this->idPantalon = $idPantalon;
        $this->tipoPantalon = $tipoPantalon;
        $this->conexion = new Conexion();
    }
    public function setidPantalon($idPantalon)
    {
        $this->idPantalon = $idPantalon;
    }

    public function settipoCamisa($tipoPantalon)
    {
        $this->tipoPantalon = $tipoPantalon;
    }
    public function getidPantalon()
    {
        return $this->idPantalon;
    }

    public function gettipoPantalon()
    {
        return $this->tipoPantalon;
    }
    public function agregarTipoPantalon()
    {
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO tipo_pantalones (tipoPantalon) VALUES (?) ");
        $consulta->bind_param("s", $this->tipoPantalon);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function editarTipoPantalon($idPantalon)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE tipo_pantalones SET tipoPantalon = ? WHERE idPantalon = ? ");
        $consulta->bind_param("si", $this->tipoPantalon, $idPantalon);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarTipoPantalon($idPantalon)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM tipo_pantalones WHERE idPantalon = ? ");
        $consulta->bind_param("i", $idPantalon);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function consultarTipoPantalones()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM tipo_pantalones");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $tipoPantalones = array();

        while ($fila = $resultado->fetch_assoc()) {
            $tipoPantalones[] = $fila;
        }

        $consulta->close();
        return $tipoPantalones;
    }

    public function consultarTipoPantalonPorId($idPantalon)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT idPantalon, tipoPantalon FROM tipo_pantalones WHERE idPantalon = ?");
        $consulta->bind_param("i", $idPantalon);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $tipoPantalon = null;
        if ($fila = $resultado->fetch_assoc()) {
            $tipoPantalon = $fila;
        }
        $consulta->close();
        return $tipoPantalon;
    }
}
