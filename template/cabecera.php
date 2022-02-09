<?php 
session_start();
if($_SESSION['user']==null || $_SESSION['user']=='' ){
  header('Location:./index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Empresa ABC</a>
  <a class="nav-link" href="productos.php">Productos</a> 
  <a class="nav-link" href="compras.php">Compras</a>
  <a class="nav-link" href="contenedores.php">Contenedores</a> 
  <a class="nav-link" href="usuarios.php">Usuarios</a> 
  <a class="nav-link" href="./config/close.php">Cerrar Sesion</a> </li>
</nav>
<div class="container">
</br>
        <div class="row">
            