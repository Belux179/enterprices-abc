<?php include('template/cabecera.php'); ?>
<?php include('config/bd.php'); 

$sentenciaSQL=$conexion->prepare("SELECT * FROM contenedor ");
$sentenciaSQL->execute();
$lisContenedor=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$sentenciaSQL=$conexion->prepare("SELECT * FROM destino ");
$sentenciaSQL->execute();
$listDestino=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$sentenciaSQL=$conexion->prepare("SELECT * FROM compra ");
$sentenciaSQL->execute();
$listCompra=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="col-md-12">
    
    <div class="card">
        <div class="card-header">
            Usuarios
        </div>
        <div class="card-body">
            <table class="table  table-bordered">
            <thead>
                <tr>
                    <th>Nombre de Contenedor</th>
                    <th>Destino</th>
                    <th>Transporte</th>
                    <th>Fecha de Arribo</th>
                    <th>Productos</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Parabilica (Manzanas) </td>
                    <td>Puerto Hulingo </td>
                    <td>Maritimo</td>
                    <td>12/6/2025</td>
                    <td><?php echo nl2br("Proveedor:Parabilica Producto:Manzanas(255) Precio:Q200.00 \n Proveedor:Parabilica Producto:uvas(54) Precio:Q172.00 ")?></td>
                    <td>Q372.00</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>

</div>
   

<?php include('template/pie.php'); ?>
            
