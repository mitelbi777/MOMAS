<?php
require_once 'Conexion.php';
class Usuario
{
    private $idUsuario;
    private $nombreUsuario;
    private $idRol;
    private $correoUsuario;
    private $contraseñaUsuario;
    private $conexion;

    public function __construct($idUsuario, $nombreUsuario, $idRol, $correoUsuario, $contraseñaUsuario)
    {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->idRol = $idRol;
        $this->correoUsuario = $correoUsuario;
        $this->contraseñaUsuario = $contraseñaUsuario;
        $this->conexion = new Conexion();
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }
    public function setRolUsuario($idRol)
    {
        $this->idRol = $idRol;
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }
    public function getRolUsuario()
    {
        return $this->idRol;
    }

    public function setCorreoUsuario($correoUsuario)
    {
        $this->correoUsuario = $correoUsuario;
    }

    public function getCorreoUsuario()
    {
        return $this->correoUsuario;
    }

    public function setContraseñaUsuario($contraseñaUsuario)
    {
        $this->contraseñaUsuario = $contraseñaUsuario;
    }

    public function getContraseñaUsuario()
    {
        return $this->contraseñaUsuario;
    }

    public function agregarUsuario()
    {
        $contarseñaEncriptada = password_hash($this->contraseñaUsuario, PASSWORD_DEFAULT);
        $idRol = 3;

        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO usuarios (nombreUsuario, idRol, correoUsuario, contraseñaUsuario) VALUES (?,?,?,?)");
        $consulta->bind_param("ssss", $this->nombreUsuario, $idRol, $this->correoUsuario, $contarseñaEncriptada);

        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function agregarUsuarioAdministrador()
    {
        $contarseñaEncriptada = password_hash($this->contraseñaUsuario, PASSWORD_DEFAULT);
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO usuarios (nombreUsuario, idRol, correoUsuario, contraseñaUsuario) VALUES (?,?,?,?)");
        $consulta->bind_param("ssss", $this->nombreUsuario, $this->idRol, $this->correoUsuario, $contarseñaEncriptada);

        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function editarUsuario($idUsuario)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE usuarios SET nombreUsuario=?, idRol=?, correoUsuario=? WHERE idUsuario=?");
        $consulta->bind_param("sssi", $this->nombreUsuario, $this->idRol, $this->correoUsuario, $idUsuario);

        $resultado = $consulta->execute();

        $consulta->close();

        return $resultado;
    }
    public function editarPerfil($idUsuario)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE usuarios SET nombreUsuario=?, correoUsuario=? WHERE idUsuario=?");
        $consulta->bind_param("ssi", $this->nombreUsuario, $this->correoUsuario, $idUsuario);

        $resultado = $consulta->execute();

        $consulta->close();

        return $resultado;
    }


    
    public function eliminarUsuario($idUsuario)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM usuarios WHERE idUsuario= ?");
        $consulta->bind_param("i", $idUsuario);

        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarUsuarios()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT u.idUsuario, u.nombreUsuario, (SELECT nombreRol FROM rol_usuario WHERE idRol = u.idRol) AS rolUsuario, u.correoUsuario, u.fecha FROM usuarios u");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $usuarios = array();

        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }

        $consulta->close();
        return $usuarios;
    }

    public function consultarUsuarioPorId($idUsuario)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT idUsuario, nombreUsuario, idRol, correoUsuario FROM usuarios WHERE idUsuario = ?");
        $consulta->bind_param("i", $idUsuario);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $usuario = null;

        if ($fila = $resultado->fetch_assoc()) {
            $usuario = $fila;
        }

        $consulta->close();
        return $usuario;
    }
    public function obtenerUsuarioPorNombre($nombreUsuario) {
        $consulta = $this->conexion->ejecutarConsulta("SELECT idUsuario, nombreUsuario, idRol, correoUsuario, contraseñaUsuario FROM usuarios WHERE nombreUsuario=?");
        $consulta->bind_param("s", $nombreUsuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $usuario = $resultado->fetch_assoc();
        $consulta->close();

        return $usuario;
    }
}
