<?php include('template/cabecera.php'); ?>
<?php include('config/bd.php'); ?>
<?php  
$accion=(isset($_POST["submit-ADD"]))?$_POST["submit-ADD"]:"";
$add_proveedor=(isset($_POST["name_proveedor"]))?$_POST["name_proveedor"]:"";
$telefono=(isset($_POST["telefono"]))?$_POST["telefono"]:"";
$direccion=(isset($_POST["direccion"]))?$_POST["direccion"]:"";

$proveedor=(isset($_POST["pproveedor"]))?$_POST["pproveedor"]:"";
$add_producto=(isset($_POST["add_producto"]))?$_POST["add_producto"]:"";
$precio=(isset($_POST["precio"]))?$_POST["precio"]:"";
$image=(isset($_FILES["img_producto"]["name"]))?$_FILES["img_producto"]["name"]:"";
switch ($accion){
    case "Prov":
        $sentenciaSQL=$conexion->prepare("INSERT INTO proveedor (nameProveedor, numProveedor, adressProveedor) VALUES (:nombre, :numero, :direccion)");
        $sentenciaSQL->bindParam(":nombre",$add_proveedor);
        $sentenciaSQL->bindParam(":numero",$telefono);
        $sentenciaSQL->bindParam(":direccion",$direccion);
        $sentenciaSQL->execute();
        break;
    case "Prod":
        $sentenciaSQL=$conexion->prepare("INSERT INTO proveedor (nameProveedor, numProveedor, adressProveedor) VALUES (:nombre, :numero, :direccion)");
        $sentenciaSQL->bindParam(":nombre",$add_proveedor);
        $sentenciaSQL->bindParam(":numero",$telefono);
        $sentenciaSQL->bindParam(":direccion",$direccion);
        echo "Presionado Producto";
        break;
}
$sentenciaSQL=$conexion->prepare("SELECT * FROM proveedor WHERE `status` = '1'");
$sentenciaSQL->execute();
$listProveedores=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$sentenciaSQL=$conexion->prepare("SELECT * FROM producto WHERE `status` = '1'");
$sentenciaSQL->execute();
$listProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            A&#241;adir Proveedor
        </div>
        <div class="card-body">            
            <form  method="POST" action="productos.php" enctype="multipart/form-data">
            <div class = "form-group">
                <label for="name_proveedor">Nombre del Proveedor</label>
                <input type="text" class="form-control" name="name_proveedor" id="name_proveedor" placeholder="Nombre del proveedor">
            </div>
        
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Numero de telefono">
            </div>
            
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direcci&oacute;n">
            </div>
            
            <button type="submit" name="submit-ADD" value="Prov" class="btn btn-success">Guardar</button>
            
            </form>    
        </div>
    </div>
    </br>
    <div class="card">
        <div class="card-header">
            A&#241;adir Productos
        </div>
        <div class="card-body">            
            <form method="POST" action="productos.php" enctype="multipart/form-data">
            <div class = "form-group">
                <label for="pproveedor">Nombre del Proveedor</label>
                <select class="form-control" id="pproveedor" name="pproveedor" >
                    <?php foreach ($listProveedores as $prov) { ?> 
                    <option value="<?php echo $prov['idProveedor']?>"><?php echo $prov['nameProveedor']?></option>    
                    <?php } ?>
                </select>
            </div>
        
            <div class="form-group">
                <label for="add_producto">Producto</label>
                <input type="text" class="form-control" name="add_producto" id="add_producto" placeholder="Nombre del Producto">
            </div>
            
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio">
            </div>
            
            <div class="form-group">
                <label for="img_producto">Imagen</label>
                <input accept="image/*" type="file" class="form-control" name="img_producto" id="img_producto" >
            </div>
            <button type="submit"  name="submit-ADD" value="Prod" class="btn btn-success">Guardar</button>            
            </form>    
        </div>
    </div>
    

</div>
<div class="col-md-7">
    
    <div class="card">
        <div class="card-header">
            Proveedores
        </div>
        <div class="card-body">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Numero</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listProveedores as $prov){?>
                <tr>
                    <td><?php echo $prov['idProveedor']?></td>
                    <td><?php echo $prov['nameProveedor']?></td>
                    <td><?php echo $prov['numProveedor']?></td>
                    <td><?php echo $prov['adressProveedor']?></td>
                    <td>Borrar</td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
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
                    <th>Proveedor</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>maiz</td>
                    <td>pricelorad</td>
                    <td>14.54</td>
                    <td>imagen.jpe</td>
                    <td>Borrar</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
    

</div>

<?php include('template/pie.php'); ?>
            
