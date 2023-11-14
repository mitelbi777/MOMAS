<?php
class Conexion
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'momas';
    private $conexion;

    public function __construct()
    {
    $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conexion->connect_error) {
            die("error de conexion" . $this->conexion->connect_error);
        }
    }
    public function getConexion()
    {
        return $this->conexion;
    }
    public function ejecutarConsulta($consulta)
    {
        $resultado = $this->conexion->prepare($consulta);

        if (!$resultado) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $resultado;
    }
    public function iniciarTransaccion()
    {
        $this->conexion->begin_transaction();
    }

    public function confirmarTransaccion()
    {
        $this->conexion->commit();
    }

    public function revertirTransaccion()
    {
        $this->conexion->rollback();
    }
    public function cerrarConexion()
    {
        $this->conexion->close();
    }
    
}
