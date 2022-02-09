<?php include('template/cabecera.php'); ?>
<?php include('config/bd.php'); ?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            A&#241;adir Usuario
        </div>
        <form method="post" action="usuarios.php"  enctype="multipart/form-data">
        <div class="card-body">            
            <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" disabled>
            </div>
            <div class="form-group">
                <label for="precio">Contrase&#241;a</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Contrase&#241;a" disabled>
            </div>
            <button type="submit" id="ADD-USER" name="ADD-USER" class="btn btn-success">Agregar usuario</button>
        </div>
        </form>
    </div>
</div>
<div class="col-md-2"></div>
<div class="col-md-5">
    
    <div class="card">
        <div class="card-header">
            Usuarios
        </div>
        <div class="card-body">
            <table class="table  table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuarios</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pablico</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>

</div>
   

<?php include('template/pie.php'); ?>
            
