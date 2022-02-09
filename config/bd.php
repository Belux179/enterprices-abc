
<?php 
$host="us-cdbr-east-05.cleardb.net";
$bd='heroku_cf833e9fc77f5ff';
$user="b6575c977b214d";
$pass="e5fca229";
try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$user,$pass);
    $conexion->query("SET NAMES 'utf8'");
    //if($conexion){ echo "conexion";}
}catch(Exception $e){
    echo $e->getMessage();
}
?>