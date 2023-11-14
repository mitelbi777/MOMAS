<?php
require_once 'Conexion.php';
class TipoCamisa
{
    private $idCamisa;
    private $tipoCamisa;
    private $conexion;
    public function __construct($idCamisa, $tipoCamisa)
    {
        $this->idCamisa = $idCamisa;
        $this->tipoCamisa = $tipoCamisa;
        $this->conexion = new Conexion();
    }
    public function setidCamisa($idCamisa)
    {
        $this->idCamisa = $idCamisa;
    }

    public function settipoCamisa($tipoCamisa)
    {
        $this->tipoCamisa = $tipoCamisa;
    }
    public function getidCamisa()
    {
        return $this->idCamisa;
    }

    public function gettipoCamisa()
    {
        return $this->tipoCamisa;
    }
    public function agregarTipoCamisa()
    {
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO tipo_camisas (tipoCamisa) VALUES (?) ");
        $consulta->bind_param("s", $this->tipoCamisa);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function editarTipoCamisa($idCamisa)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE tipo_camisas SET tipoCamisa = ? WHERE idCamisa = ? ");
        $consulta->bind_param("si", $this->tipoCamisa, $idCamisa);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarTipoCamisa($idCamisa)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM tipo_camisas WHERE idCamisa = ? ");
        $consulta->bind_param("i", $idCamisa);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function consultarTipoCamisa()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM tipo_camisas");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $tipoCamisas = array();

        while ($fila = $resultado->fetch_assoc()) {
            $tipoCamisas[] = $fila;
        }

        $consulta->close();
        return $tipoCamisas;
    }

    public function consultarTipoCamisaPorId($idCamisa)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT idCamisa, tipoCamisa FROM tipo_camisas WHERE idCamisa = ?");
        $consulta->bind_param("i", $idCamisa);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $tipoCamisa = null;
        if ($fila = $resultado->fetch_assoc()) {
            $tipoCamisa = $fila;
        }
        $consulta->close();
        return $tipoCamisa;
    }
}
