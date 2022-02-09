<?php include('template/cabecera.php'); ?>
<?php include('config/bd.php'); 
$sentenciaSQL=$conexion->prepare("SELECT * FROM user ");
$sentenciaSQL->execute();
$listUser=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
    try {
        $user=(isset($_POST["user"]))?$_POST["user"]:"";
        $password=(isset($_POST["pass"]))?$_POST["pass"]:"";
        if($listUser){
            foreach($listUser as $userr){
                if($user!=$userr['user']){
                    $hash=password_hash($password, PASSWORD_DEFAULT, ['cost'=>10]) ;
                    $sentenciaSQL=$conexion->prepare("INSERT INTO user ('user', 'password' ) VALUES (:user, :pass)");
                    $sentenciaSQL->bindParam(":user",$user);
                    $sentenciaSQL->bindParam(":pass",$hash);
                    $sentenciaSQL->execute();  
                }
            }
        }else{
        
            $hash=password_hash($password, PASSWORD_DEFAULT, ['cost'=>10]) ;
            
            $sentenciaSQL=$conexion->prepare("INSERT INTO user (user, pass ) VALUES (:user, :pass)");
            $sentenciaSQL->bindParam(":user",$user);
            $sentenciaSQL->bindParam(":pass",$hash);
            $sentenciaSQL->execute();  
        
        }
    }catch(exception $e){}
    
}
?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            A&#241;adir Usuario
        </div>
        <form method="post" action="usuarios.php"  enctype="multipart/form-data">
        <div class="card-body">            
            <div class="form-group">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" name="user" id="user" placeholder="Usuario" >
            </div>
            <div class="form-group">
                <label for="precio">Contrase&#241;a</label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Contrase&#241;a" >
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
                <?php foreach($listUser as $userr){ ?>
                <tr>
                    <td><?php echo $userr['ID'] ?></td>
                    <td><?php echo $userr['user'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </div>
    </div>

</div>
   

<?php include('template/pie.php'); ?>
            
