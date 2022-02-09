<?php 
if($_POST){
    header('Location:productos.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body> 
    <?php ?>     
    <div class="container ">
        <div class="row">
            <div class="col-md-3 "></div>
            <div class="col-md-5 ">
            <br/><br/><br/>
            <div class="card">
                <div class="card-header">
                    Acceder
                </div>
                <div class="card-body">
                <form  method="post" action>
                    <div class = "form-group">
                        <label for="user">Usurario:</label>
                        <input type="email" class="form-control" name="user"  placeholder="Ingresar correo">
                    </div>   
                    <div class="form-group">
                        <label for="password">Contrase&#241;a:</label>
                        <input type="password" class="form-control" name="password" placeholder="Contrase&#241;a">
                    </div>
                    <button type="submit" class="btn btn-primary">Acceder</button>
                </form>
                </div>
            </div>

            </div>
            
        </div>
    </div>

  </body>
</html>