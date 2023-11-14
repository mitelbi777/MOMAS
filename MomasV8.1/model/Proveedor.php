<?php
require_once 'Conexion.php';
class Proveedor
{
    private $idProveedor;
    private $nombreProveedor;
    private $correoProveedor;
    private $telefonoProveedor;
    private $direccionProveedor;
    private $conexion;

    // Constructor
    public function __construct($idProveedor, $nombreProveedor, $correoProveedor, $telefonoProveedor, $direccionProveedor,)
    {
        $this->idProveedor = $idProveedor;
        $this->nombreProveedor = $nombreProveedor;
        $this->correoProveedor = $correoProveedor;
        $this->telefonoProveedor = $telefonoProveedor;
        $this->direccionProveedor = $direccionProveedor;
        $this->conexion = new Conexion();
    }

    // Métodos set
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    public function setNombreProveedor($nombreProveedor)
    {
        $this->nombreProveedor = $nombreProveedor;
    }

    public function setCorreoProveedor($correoProveedor)
    {
        $this->correoProveedor = $correoProveedor;
    }


    public function setTelefonoProveedor($telefonoProveedor)
    {
        $this->telefonoProveedor = $telefonoProveedor;
    }

    public function setDireccionProveedor($direccionProveedor)
    {
        $this->direccionProveedor = $direccionProveedor;
    }

    // Métodos get
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    public function getNombreProveedor()
    {
        return $this->nombreProveedor;
    }

    public function getCorreoProveedor()
    {
        return $this->correoProveedor;
    }
    public function getTelefonoProveedor()
    {
        return $this->telefonoProveedor;
    }

    public function getDireccionProveedor()
    {
        return $this->direccionProveedor;
    }

    public function agregarProveedor()
    {
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO proveedores (nombreProveedor, correoProveedor, telefonoProveedor,direccionProveedor) VALUES (?,?,?,?)");
        $consulta->bind_param("ssss", $this->nombreProveedor, $this->correoProveedor, $this->telefonoProveedor, $this->direccionProveedor);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function editarProveedor($idProveedor)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE proveedores SET nombreProveedor=?, correoProveedor=?, telefonoProveedor=?, direccionProveedor=? WHERE idProveedor=?");
        $consulta->bind_param("ssssi", $this->nombreProveedor, $this->correoProveedor, $this->telefonoProveedor, $this->direccionProveedor, $idProveedor);

        $resultado = $consulta->execute();

        $consulta->close();

        return $resultado;
    }

    public function eliminarProveedor($idProveedor)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM proveedores WHERE idProveedor= ?");
        $consulta->bind_param("i", $idProveedor);

        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarProveedores()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM proveedores");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $proveedores = array();

        while ($fila = $resultado->fetch_assoc()) {
            $proveedores[] = $fila;
        }

        $consulta->close();
        return $proveedores;
    }
    public function consultarProveedorPorId($idProveedor)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM proveedores WHERE idProveedor = ?");
        $consulta->bind_param("i", $idProveedor);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $proveedor = null;
        if ($fila = $resultado->fetch_assoc()) {
            $proveedor = $fila;
        }
        $consulta->close();
        return $proveedor;
    }
}
