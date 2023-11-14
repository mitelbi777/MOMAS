<?php
require_once 'Conexion.php';
require_once 'ConjuntoProducto.php';
class Conjunto
{
    private $idConjunto;
    private $nombreConjunto;
    private $conexion;

    // Constructor
    public function __construct($idConjunto, $nombreConjunto)
    {

        $this->idConjunto = $idConjunto;
        $this->nombreConjunto = $nombreConjunto;
        $this->conexion = new Conexion();
    }

    // Métodos Setter
    public function setIdConjunto($idConjunto)
    {
        $this->idConjunto = $idConjunto;
    }

    public function setNombreConjunto($nombreConjunto)
    {
        $this->nombreConjunto = $nombreConjunto;
    }

    // Métodos Getter
    public function getIdConjunto()
    {
        return $this->idConjunto;
    }

    public function getNombreConjunto()
    {
        return $this->nombreConjunto;
    }



    public function agregarConjunto()
    {
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO conjuntos (nombreConjunto) VALUES (?)");
        $consulta->bind_param("s", $this->nombreConjunto);
        $resultado = $consulta->execute();
        $idConjunto = null;

        if ($resultado) {
            $idConjunto = $this->conexion->getConexion()->insert_id;
            $consulta->close();
            return $idConjunto;
        } else {
            $consulta->close();
            return false;
        }
    }

    public function eliminarConjunto($idConjunto)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM conjuntos WHERE idConjunto= ?");
        $consulta->bind_param("i", $idConjunto);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarConjuntos()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT c.idConjunto, c.nombreConjunto AS nombre_conjunto, (SELECT COUNT(idProducto) FROM conjuntos_productos WHERE idConjunto = c.idConjunto) AS cantidad_productos, c.fecha, ( SELECT imagenProducto FROM productos p WHERE p.idProducto = ( SELECT idProducto FROM conjuntos_productos WHERE idConjunto = c.idConjunto LIMIT 1 ) ) AS imagen_asociada FROM conjuntos c; ");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $conjuntos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $conjuntos[] = $fila;
        }

        $consulta->close();
        return $conjuntos;
    }

    public function consultarConjuntoPorId($idConjunto)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT idConjunto, nombreConjunto FROM conjuntos WHERE idConjunto = ?  ");
        $consulta->bind_param("i", $idConjunto);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $conjunto = $resultado->fetch_assoc();

        $consulta->close();
        return $conjunto;
    }
    
    public function editarNombreConjunto($idConjunto, $nombreConjunto)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE conjuntos SET nombreConjunto=? WHERE idConjunto= ?");
        $consulta->bind_param("si", $nombreConjunto, $idConjunto);
        $resultado = $consulta->execute();
        $consulta->close();

        return $resultado;
    }

    public function editarConjunto($idConjunto, $nombreConjunto, $idProductos)
{
    // Eliminar productos existentes asociados al conjunto
    $consultaEliminar = $this->conexion->ejecutarConsulta("DELETE FROM conjuntos_productos WHERE idConjunto = ?");
    $consultaEliminar->bind_param("i", $idConjunto);
    $resultadoEliminar = $consultaEliminar->execute();
    $consultaEliminar->close();

    // Actualizar el nombre del conjunto
    $consultaConjunto = $this->conexion->ejecutarConsulta("UPDATE conjuntos SET nombreConjunto=? WHERE idConjunto= ?");
    $consultaConjunto->bind_param("si", $nombreConjunto, $idConjunto);
    $resultadoConjunto = $consultaConjunto->execute();
    $consultaConjunto->close();

    // Asociar los nuevos productos al conjunto
    $consultaAsociar = $this->conexion->ejecutarConsulta("INSERT INTO conjuntos_productos (idConjunto, idProducto) VALUES (?, ?)");
    $consultaAsociar->bind_param("ii", $idConjunto, $idProducto);

    foreach ($idProductos as $idProducto) {
        $resultadoAsociar = $consultaAsociar->execute();
        if (!$resultadoAsociar) {
            // Manejar error al asociar producto
            return false;
        }
    }

    $consultaAsociar->close();

    // Verificar resultados
    if ($resultadoEliminar && $resultadoConjunto) {
        return true;
    } else {
        return false;
    }
}

}
