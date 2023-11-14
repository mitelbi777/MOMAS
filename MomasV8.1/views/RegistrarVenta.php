<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Producto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Venta de Producto</h1>
        <form action="../controller/ValidarVenta.php" method="post" id="formulario">
            <div>
                <label for="nomberCliente">Nombre Cliente</label>
                <input type="text" id="nombreCliente" class="form-control" name="nombreCliente" require>
            </div>
            <div>
                <label for="nomberCliente">Correo Cliente</label>
                <input type="email" id="nombreCliente" class="form-control" name="correoCliente" require>
            </div>
            <div>
                <label for="nomberCliente">Telefono Cliente</label>
                <input type="tel" id="nombreCliente" class="form-control" name="telefonoCliente" require>
            </div>
            <br>
            <br>

            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Producto</th>
                            <th>Nombre Producto</th>
                            <th>Categoría Producto</th>
                            <th>Talla Producto</th>
                            <th>Color Producto</th>
                            <th>Unidades Disponibles</th>
                            <th>Precio Producto</th>
                            <th>Cantidad Vendida</th>
                            <th>Valor toral</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody id="productos">
                        <tr>
                            <td>
                                <input type="number" class="form-control" id="idProducto" name="idProducto[]">
                            </td>
                            <td>
                                <div id="nombreProducto"></div>
                            </td>
                            <td>
                                <div id="categoriaProducto"></div>
                            </td>
                            <td>
                                <div id="tallaProducto"></div>
                            </td>
                            <td>
                                <div id="colorProducto"></div>
                            </td>
                            <td>
                                <div id="unidadesProducto"></div>
                            </td>
                            <td>
                                <div id="precioProducto"></div>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="cantidadProducto" name="cantidadVendida[]">
                            </td>
                            <td>
                                <div id="valorTotal"></div>
                            </td>
                            <td>
                                <div></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar Producto</button>
            <button type="submit" class="btn btn-primary" name="accion" value="realizarVenta">Realizar Factura</button>
            <button type="button" class="btn btn-info" onclick="imprimirFactura()">Imprimir Factura</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <Script>
        let contadorFilas = 0;

        function agregarProducto() {
            var productos = document.getElementById("productos");
            var newRow = productos.insertRow();
            contadorFilas++;

            newRow.innerHTML = `
                        <td>
                            <input type="number" class="form-control" id="idProducto${contadorFilas}" name="idProducto[]">
                        </td>
                        <td>
                            <div id="nombreProducto${contadorFilas}"></div>
                        </td>
                        <td>
                            <div id="categoriaProducto${contadorFilas}"></div>
                        </td>
                        <td>
                            <div id="tallaProducto${contadorFilas}"></div>
                        </td>
                        <td>
                            <div id="colorProducto${contadorFilas}"></div>
                        </td>
                        <td>
                            <div id="unidadesProducto${contadorFilas}"></div>
                        </td>
                        <td>
                            <div id="precioProducto${contadorFilas}" ></div>
                        </td>

                        <td>
                            <input type="number" class="form-control" id="cantidadProducto${contadorFilas}" name="cantidadVendida[]" required>
                        </td>
                        <td>
                            <div id="valorTotal${contadorFilas}"></div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminarProducto(this)">Eliminar</button>
                        </td>
    `;

            // Agregar evento keyup al nuevo campo idProducto
            var idProductoInput = newRow.querySelector(`#idProducto${contadorFilas}`);
            idProductoInput.addEventListener('keyup', function() {
                realizarBusquedaFilas(contadorFilas);
            });
        }

        function eliminarProducto(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }


        function imprimirFactura() {
            window.print();
        }



        function realizarBusqueda() {
            var idProducto = $('#idProducto').val();

            $.ajax({
                type: 'POST',
                url: '../controller/consultarProducto.php',
                data: {
                    idProducto: idProducto
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#nombreProducto').html(data.nombreProducto);
                    $('#categoriaProducto').html(data.categoriaProducto);
                    $('#tallaProducto').html(data.tallaProducto);
                    var colorCircle = `<div style="width: 20px; height: 20px; background-color: ${data.colorProducto}; border-radius: 50%; display: inline-block;"></div>`;
                    $('#colorProducto').html(data.colorProducto);
                    $('#colorProducto').append(colorCircle);
                    $('#precioProducto').html(data.precioProducto);
                    $('#unidadesProducto').html(data.unidadesProducto);
                }
            });
        }

        $(document).ready(function() {
            $('#idProducto').keyup(function() {
                realizarBusqueda();
            });
        });

        function realizarBusquedaFilas(fila) {
            var idProducto = $(`#idProducto${fila}`).val();

            $.ajax({
                type: 'POST',
                url: '../controller/consultarProducto.php',
                data: {
                    idProducto: idProducto
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    // Actualiza las otras columnas en la misma fila
                    $(`#nombreProducto${fila}`).html(data.nombreProducto);
                    $(`#categoriaProducto${fila}`).html(data.categoriaProducto);
                    $(`#tallaProducto${fila}`).html(data.tallaProducto);

                    var colorCircle = `<div style="width: 20px; height: 20px; background-color: ${data.colorProducto}; border-radius: 50%; display: inline-block;"></div>`;
                    $(`#colorProducto${fila}`).html(data.colorProducto);
                    $(`#colorProducto${fila}`).append(colorCircle);
                    $(`#precioProducto${fila}`).html(data.precioProducto);
                    $(`#unidadesProducto${fila}`).html(data.unidadesProducto);
                }
            });
        }
    </Script>
</body>

</html>