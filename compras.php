<?php include('template/cabecera.php'); ?>
<?php include('config/bd.php');

$sentenciaSQL = $conexion->prepare("SELECT * FROM producto ");
$sentenciaSQL->execute();
$listProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$sentenciaSQL = $conexion->prepare("SELECT * FROM proveedor ");
$sentenciaSQL->execute();
$listProveedores = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            A&#241;adir Producto
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name_proveedor">Nombre del Proveedor</label>
                <select class="form-control" id="name_proveedor" name="name_proveedor">
                    <?php foreach ($listProveedores as $proveedor) { ?>
                        <option value="<?php echo $proveedor['idProveedor'] ?>">
                            <?php echo $proveedor['nameProveedor'] ?> </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name_producto">Producto</label>
                <select class="form-control" id="name_producto" name="name_producto">
                    <?php foreach ($listProductos as $producto) {
                        if ($producto["idProveedor"] == $listProveedores[0]["idProveedor"]) {
                            echo "<option value=" . $producto["idProducto"] . ">" . $producto["nameProducto"] . "</option>";
                        }
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad" value="1" placeholder="00.00" min="1">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio" placeholder="00.00" value="<?php foreach ($listProductos as $producto) {
                                                                                                                    if ($producto["idProveedor"] == $listProveedores[0]["idProveedor"]) {
                                                                                                                        echo $producto["precio"];
                                                                                                                        break;
                                                                                                                    }
                                                                                                                } ?>" disabled>
            </div>
            <div class="form-group">
                <label for="total_precio">Total</label>
                <input type="number" class="form-control" name="total_precio" id="total_precio" placeholder="00.0" value="<?php foreach ($listProductos as $producto) {
                                                                                                                                if ($producto["idProveedor"] == $listProveedores[0]["idProveedor"]) {
                                                                                                                                    echo $producto["precio"];
                                                                                                                                    break;
                                                                                                                                }
                                                                                                                            } ?>" disabled>
            </div>
            <button id="ADD-Prod" name="ADD-Prod" value="Prod" class="btn btn-success">Agregar</button>
        </div>
    </div>
    </br>
    <div class="card">
        <div class="card-header">
            Destino
        </div>
        <div class="card-body">
            <form id="formulario">

                <div class="form-group">
                    <label for="name_contenedor">Nombre de Contenedor</label>
                    <input type="text" class="form-control" name="name_contenedor" id="name_contenedor" placeholder="Nombre del Contenedor">
                </div>

                <div class="form-group">
                    <label for="transporte">Transporte</label>
                    <select class="form-control" id="transporte" name="transporte">
                        <option value="Aereo">Aereo</option>
                        <option value="Maritimo">Maritimo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="destino">Destino</label>
                    <input type="text" class="form-control" name="destino" id="destino" placeholder="Nombre del Destino">
                </div>

                <div class="form-group">
                    <label for="fechaArribo">Fecha de arribo</label>
                    <input type="date" class="form-control" name="fechaArribo" id="fechaArribo">
                </div>

                <button type="submit" name="submit-ADD" value="Contenedor" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>


</div>
<div class="col-md-7">

    </br>
    <div class="card">
        <div class="card-header">
            Productos
        </div>
        <div class="card-body">
            <table class="table  table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>maiz</td>
                        <td>4</td>
                        <td>pricelorad</td>
                        <td>20.00</td>
                        <td>80</td>
                        <td>Borrar</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    try {
        var productos = <?php echo json_encode($listProductos); ?>;
        var prov = document.getElementById('name_proveedor');
        var precio = document.getElementById('precio');
        var total_precio = document.getElementById('total_precio');
        var cantidad = document.getElementById('cantidad');
        var listprod = document.getElementById('name_producto');

        function precios() {
            for (let index = 0; index < productos.length; index++) {
                if (prov.value == productos[index].idProveedor && listprod.value == productos[index].idProducto) {
                    precio.value = productos[index].precio;
                }
            }
            total_precio.value = precio.value * cantidad.value;
        }
        cantidad.onchange = function() {
            precios();
        }
        prov.onchange = function() {
            var cod = "";
            for (let index = 0; index < productos.length; index++) {
                if (prov.value == productos[index].idProveedor) {
                    cod += "<option value=" + productos[index].idProducto + ">" + productos[index].nameProducto + "</option>";
                }
            }
            listprod.innerHTML = cod;
            precios();
        }
        listprod.onchange = function() {
            precios();
        }
        var formulario = document.getElementById("formulario");
        formulario.addEventListener("submit", function(e) {
            e.preventDefault();
            const data = new FormData(document.getElementById("formulario"));
            arr_p = ((45, 45, 36), (63, 87, 96));
            data.append('datos', arr_p);
            fetch('./config/post.php', {
                    method: 'POST',
                    body: data
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.text()
                    } else {
                        throw "Error"
                    }
                })
        })
    } catch (error) {
        console.error(error);
    }
</script>


<?php include('template/pie.php'); ?>