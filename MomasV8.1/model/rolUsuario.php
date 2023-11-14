<?php
require_once 'Conexion.php';
class RoLUsuario
{
    private $idRol;
    private $rolUsuario;
    private $conexion;
    public function __construct($idRol, $rolUsuario)
    {
        $this->idRol = $idRol;
        $this->rolUsuario = $rolUsuario;
        $this->conexion = new Conexion();
    }
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function setRolUsuario($rolUsuario)
    {
        $this->rolUsuario = $rolUsuario;
    }
    public function getIdTRol()
    {
        return $this->idRol;
    }

    public function getRolUsuario()
    {
        return $this->rolUsuario;
    }
    public function agregarRolUsuario()
    {
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO rol_usuario (nombreRol ) VALUES (?) ");
        $consulta->bind_param("s", $this->rolUsuario);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function editarRolUsuario($idRol)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE rol_usuario SET nombreRol= ? WHERE idRol = ? ");
        $consulta->bind_param("si", $this->rolUsuario, $idRol);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminarRolUsuario($idRol)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM rol_usuario WHERE idRol = ? ");
        $consulta->bind_param("i", $idRol);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function consultarRolUsuarios()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM rol_usuario");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $rolUsuarios = array();

        while ($fila = $resultado->fetch_assoc()) {
            $rolUsuarios[] = $fila;
        }

        $consulta->close();
        return $rolUsuarios;
    }

    public function consultarRolUsuariorId($idRol)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM rol_usuario WHERE idRol = ?");
        $consulta->bind_param("i", $idRol);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $rolUsuario = null;
        if ($fila = $resultado->fetch_assoc()) {
            $rolUsuario = $fila;
        }
        $consulta->close();
        return $rolUsuario;
    }
}
