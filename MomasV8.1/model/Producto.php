<?php
require_once 'Conexion.php';
class Producto
{
    private $idProducto;
    private $imagenProducto;
    private $nombreProducto;
    private $colorProducto;
    private $idCategoria;
    private $idTalla;
    private $idCamisa;
    private $idPantalon;
    private $precioProducto;
    private $unidadesProducto;
    private $idEstado;
    private $conexion;

    public function __construct($idProducto, $imagenProducto, $nombreProducto, $colorProducto, $idCategoria, $idTalla, $idCamisa, $idPantalon, $precioProducto, $unidadesProducto, $idEstado)
    {
        $this->idProducto = $idProducto;
        $this->imagenProducto = $imagenProducto;
        $this->nombreProducto = $nombreProducto;
        $this->colorProducto = $colorProducto;
        $this->idCategoria = $idCategoria;
        $this->idTalla = $idTalla;
        $this->idCamisa = $idCamisa;
        $this->idPantalon = $idPantalon;
        $this->precioProducto = $precioProducto;
        $this->unidadesProducto = $unidadesProducto;
        $this->idEstado = $idEstado;
        $this->conexion = new Conexion();
    }

    // Getters
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function getImagenProducto()
    {
        return $this->imagenProducto;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    public function getColorProducto()
    {
        return $this->colorProducto;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getIdTalla()
    {
        return $this->idTalla;
    }

    public function getIdCamisa()
    {
        return $this->idCamisa;
    }

    public function getIdPantalon()
    {
        return $this->idPantalon;
    }

    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    public function getUnidadesProducto()
    {
        return $this->unidadesProducto;
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    // Setters
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function setImagenProducto($imagenProducto)
    {
        $this->imagenProducto = $imagenProducto;
    }

    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }

    public function setColorProducto($colorProducto)
    {
        $this->colorProducto = $colorProducto;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function setIdTalla($idTalla)
    {
        $this->idTalla = $idTalla;
    }

    public function setIdCamisa($idCamisa)
    {
        $this->idCamisa = $idCamisa;
    }

    public function setIdPantalon($idPantalon)
    {
        $this->idPantalon = $idPantalon;
    }

    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;
    }

    public function setUnidadesProducto($unidadesProducto)
    {
        $this->unidadesProducto = $unidadesProducto;
    }

    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
    }

    public function agregarProducto()
    {
        $idEstado = '1';
        $consulta = $this->conexion->ejecutarConsulta("INSERT INTO productos (imagenProducto, nombreProducto, colorProducto, idCategoria, idTalla, idCamisa, idPantalon, precioProducto, unidadesProducto, idEstado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $consulta->bind_param("ssssiiidii", $this->imagenProducto, $this->nombreProducto, $this->colorProducto, $this->idCategoria, $this->idTalla, $this->idCamisa, $this->idPantalon, $this->precioProducto, $this->unidadesProducto, $idEstado);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function editarProducto($idProducto)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE productos SET imagenProducto = ?, nombreProducto = ?, colorProducto = ?, idCategoria = ?, idTalla = ?, idCamisa = ?, idPantalon = ?, precioProducto = ?, unidadesProducto = ?, idEstado = ? WHERE idProducto = ?");
        $consulta->bind_param("sssiidiiidi", $this->imagenProducto, $this->nombreProducto, $this->colorProducto, $this->idCategoria, $this->idTalla, $this->idCamisa, $this->idPantalon, $this->precioProducto, $this->unidadesProducto, $this->idEstado, $idProducto);

        if ($consulta->execute()) {
            $consulta->close();
            return true;
        } else {
            $consulta->close();
            return false;
        }
    }
    public function eliminarProducto($idProducto)
    {
        $consulta = $this->conexion->ejecutarConsulta("DELETE FROM productos WHERE idProducto= ?");
        $consulta->bind_param("i", $idProducto);
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }


    public function consultarProducto($idProducto)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT p.idProducto, p.imagenProducto, p.nombreProducto, p.colorProducto, cp.categoriaProducto, tp.tallaProducto, tc.tipoCamisa, tpt.tipoPantalon, ep.estadoProducto, p.precioProducto, p.unidadesProducto, p.fechaInsersion FROM productos p LEFT JOIN categoria_producto cp ON p.idCategoria = cp.idCategoria LEFT JOIN talla_producto tp ON p.idTalla = tp.idTalla LEFT JOIN tipo_camisas tc ON p.idCamisa = tc.idCamisa LEFT JOIN tipo_pantalones tpt ON p.idPantalon = tpt.idPantalon LEFT JOIN estado_producto ep ON p.idEstado = ep.idEstado WHERE p.idProducto = ?");
        $consulta->bind_param("i", $idProducto);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $producto = $resultado->fetch_assoc();

        $consulta->close();
        return $producto;
    }


    public function consultarProductos()
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT p.idProducto, p.imagenProducto, p.nombreProducto, p.colorProducto, (SELECT categoriaProducto FROM categoria_producto WHERE idCategoria = p.idCategoria) AS categoriaProducto, (SELECT tallaProducto FROM talla_producto WHERE idTalla = p.idTalla) AS tallaProducto, (SELECT tipoCamisa FROM tipo_camisas WHERE idCamisa = p.idCamisa) AS tipoCamisa, (SELECT tipoPantalon FROM tipo_pantalones WHERE idPantalon = p.idPantalon) AS tipoPantalon, p.precioProducto, p.unidadesProducto, (SELECT estadoProducto FROM estado_producto WHERE idEstado = p.idEstado) AS estadoProducto, p.fechaInsersion FROM productos AS p; ");
        $consulta->execute();

        $resultado = $consulta->get_result();
        $productos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }

        $consulta->close();
        return $productos;
    }
    public function consultarProductoPorId($idProducto)
    {
        $consulta = $this->conexion->ejecutarConsulta("SELECT * FROM productos WHERE idProducto = ?");
        $consulta->bind_param("i", $idProducto);
        $consulta->execute();

        $resultado = $consulta->get_result();
        $producto = null;
        if ($fila = $resultado->fetch_assoc()) {
            $producto = $fila;
        }
        $consulta->close();
        return $producto;
    }

    public function actualizarCantidadProducto($idProducto, $cantidadVendida)
    {
        $consulta = $this->conexion->ejecutarConsulta("UPDATE productos SET unidadesProducto=? WHERE idProducto=?");
        $consulta->bind_param("si", $this->unidadesProducto, $idProducto);

        $resultado = $consulta->execute();
        $consulta->close();

        return $resultado;
    }
    public function consultarPrecioProducto($idProducto)
    {
        $consultaPrecio = $this->conexion->ejecutarConsulta("SELECT precioProducto FROM productos WHERE idProducto = ?");
        $consultaPrecio->bind_param("i", $idProducto);
        $resultado = $consultaPrecio->execute();

        if (!$resultado) {
            die('Error en la consulta: ' . $this->conexion->getConexion()->error);
        }

        $consultaPrecio->bind_result($precio);
        $consultaPrecio->fetch();
        $consultaPrecio->close();
        return $precio;
    }
    public function actualizarUnidadesProducto($cantidadVendida)
    {
        $consultaUnidades = $this->conexion->ejecutarConsulta("SELECT unidadesProducto FROM productos WHERE idProducto = ?");
        $consultaUnidades->bind_param("i", $this->idProducto);
        $consultaUnidades->execute();
        $consultaUnidades->bind_result($unidadesActuales);
        $consultaUnidades->fetch();
        $consultaUnidades->close();

        $nuevasUnidades = max(0, $unidadesActuales - $cantidadVendida);

        $consulta = $this->conexion->ejecutarConsulta("UPDATE productos SET unidadesProducto = ? WHERE idProducto = ?");
        $consulta->bind_param("ii", $nuevasUnidades, $this->idProducto);
        $resultado = $consulta->execute();
        $consulta->close();

        return $resultado;
    }
}
