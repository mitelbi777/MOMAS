<?php
require_once 'Conexion.php';
class ConjuntoProducto
{
    private $idConjunto;
    private $idProducto;
    private $conexion;

    public function __construct($idConjunto, $idProducto)
    {
        $this->idConjunto = $idConjunto;
        $this->idProducto = $idProducto;
        $this->conexion = new Conexion();
    }
    public function setIdConjunto($idConjunto)
    {
        $this->idConjunto = $idConjunto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }
    public function getIdConjunto()
    {
        return $this->idConjunto;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function asignarConjuntoProductos($idConjunto, $idProductos)
    {
        $id = true;
        foreach ($idProductos as $idProducto) {
            $consulta = $this->conexion->ejecutarConsulta("INSERT INTO conjuntos_productos (idConjunto, idProducto) VALUES (?,?)");
            $consulta->bind_param("ii", $idConjunto, $idProducto);
            $resultado = $consulta->execute();

            if (!$resultado) {
                $id = false;
                break;
            }
        }
        $consulta->close();
        return $id;
    }
    public function consultarConjuntoProductoPorId($idConjunto)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT c.nombreConjunto AS nombre_conjunto, p.idProducto, (SELECT imagenProducto FROM productos WHERE idProducto = p.idProducto) AS imagenProducto, p.nombreProducto, (SELECT categoriaProducto FROM categoria_producto WHERE idCategoria = p.idCategoria) AS categoriaProducto, p.colorProducto, (SELECT tallaProducto FROM talla_producto WHERE idTalla = p.idTalla) AS tallaProducto, p.precioProducto, p.unidadesProducto, (SELECT estadoProducto FROM estado_producto WHERE idEstado = p.idEstado) AS estadoProducto FROM conjuntos c, conjuntos_productos cp, productos p WHERE c.idConjunto = ? AND c.idConjunto = cp.idConjunto AND cp.idProducto = p.idProducto;  ");
        $consulta->bind_param("i", $idConjunto);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $conjuntoProductos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $conjuntoProductos[] = $fila;
        }

        $consulta->close();
        return $conjuntoProductos;
    }
    public function eliminarProductosConjunto($idConjunto)
    {
        $consultaEliminar = $this->conexion->ejecutarConsulta("DELETE FROM conjuntos_productos WHERE idConjunto = ?");
        $consultaEliminar->bind_param("i", $idConjunto);
        $resultadoEliminar = $consultaEliminar->execute();
        $consultaEliminar->close();

        return $resultadoEliminar;
    }

    public function asociarProductosConjunto($idConjunto, $idProductos)
    {
        $consultaAsociar = $this->conexion->ejecutarConsulta("INSERT INTO conjuntos_productos (idConjunto, idProducto) VALUES (?, ?)");
        $consultaAsociar->bind_param("ii", $idConjunto, $idProducto);

        foreach ($idProductos as $idProducto) {
            $resultadoAsociar = $consultaAsociar->execute();
            if (!$resultadoAsociar) {
                return false;
            }
        }
    }
}
