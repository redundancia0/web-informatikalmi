<?php
    session_start();
    include_once 'bbdd.php';
    $user = $_SESSION["USUARIOPROVEEDOR"];
    if(isset($user) != true){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Editar Articulo</title>
</head>
<body>
    <header>
    <?php
        include_once 'menu.php';
    ?>
    </header>
<div id="">
        <h1>Editar Articulo</h1>
        <form method="post" action="updateNoticia.php" enctype="multipart/form-data">
            
            <label for="titulo">Título: </label>
            <input type="text" id="titulo" name="titulo" placeholder="Escriba el titulo de la noticia" />
            <br />
            <label for="texto">Texto</label>
            <textarea id="texto" name="texto" rows="5" cols="50" maxlength="250"></textarea>
            <br />
            <label for="imagen">Imagen: </label>
            <input type="file" name="imagen" id="imagen" accept="image/*">
            <br />
            <label for="fecha">Fecha: </label>
            <input type="date" id="fecha" name="fecha" placeholder="YYYY\MM\DD" />
            <br />
            <label for="resumen">Resumen: </label>
            <input type="text" id="resumen" name="resumen" placeholder="Escriba el resumen de la noticia" />
            <br />
 <input type="submit" id="enviar" value="Enviar" />
 <?php
include_once 'footer.php';
?>