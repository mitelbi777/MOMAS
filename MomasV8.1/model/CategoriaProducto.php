<?php
require_once 'Conexion.php';
class CategoriaProducto
{
    private $idCategoria;
    private $categoriaProducto;
    private $conexion;

    public function __construct($idCategoria, $categoriaProducto)
    {
        $this->idCategoria = $idCategoria;
        $this->categoriaProducto = $categoriaProducto;
        $this->conexion = new Conexion();
    }
    public function setIdCategoriaProducto($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function setNombreCategoriaProducto($categoriaProducto)
    {
        $this->categoriaProducto = $categoriaProducto;
    }
    public function getIdCategoriaProducto()
    {
        return $this->idCategoria;
    }

    public function getNombreCategoriaProducto()
    {
        return $this->categoriaProducto;
    }

    public function consultarCategoriaProductos()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM categoria_producto");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $categoriaProductos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $categoriaProductos[] = $fila;
        }

        $consulta->close();
        return $categoriaProductos;
    }

    public function consultarCategoriaPorId($idCategoria)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM categoria_producto WHERE idCatagoria = ?");
        $consulta->bind_param("i", $idCategoria);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $categoriaProducto = null;
        if ($fila = $resultado->fetch_assoc()) {
            $categoriaProducto = $fila;
        }
        $consulta->close();
        return $categoriaProducto;
    }
}
