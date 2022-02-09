<?php include('template/cabecera.php'); ?>
<?php include('config/bd.php'); ?>
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            A&#241;adir Producto
        </div>
        <div class="card-body">            
            <div class = "form-group">
                <label for="name_proveedor">Nombre del Proveedor</label>
                <select class="form-control" id="name_proveedor" name="name_proveedor" >
                    <?php foreach ($proveedores as $proveedor) { ?> 
                        <option value="<?php echo $proveedor?>"></option>    
                    <?php } ?>
                    <option value="25">asd</option>
                    <option value="25">gasff</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="name_producto">Producto</label>
                <select class="form-control" id="name_producto" name="name_producto" >
                    <?php foreach ($productos as $producto) { ?> 
                        <option value="<?php echo $producto?>"></option>    
                    <?php } ?>
                    <option value="25">asd</option>
                    <option value="25">gasff</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="00.00" disabled>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" name="precio" id="precio" placeholder="00.00" disabled>
            </div>
            <div class="form-group">
                <label for="total_precio">Total</label>
                <input type="text" class="form-control" name="total_precio" id="total_precio" placeholder="00.0" disabled>
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
            <form>
        
            <div class="form-group">
                <label for="name_contenedor">Nombre de Contenedor</label>
                <input type="text" class="form-control" name="name_contenedor" id="name_contenedor" placeholder="Nombre del Contenedor">
            </div>
            
            <div class="form-group">
                <label for="transporte">Transporte</label>
                <select class="form-control" id="transporte" name="transporte" >
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
   

<?php include('template/pie.php'); ?>