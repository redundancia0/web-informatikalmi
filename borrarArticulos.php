<?php
session_start();
if (!isset($_SESSION["USUARIOPROVEEDOR"])) {
    header("Location: login.php");
    exit();
}
else {
    include_once "bbdd.php";
    $id_producto = $_GET['id_producto'];
    
    $eliminacionCorrecta = eliminarArticulos($id_producto);
    
    if ($eliminacionCorrecta) {
        header('Location: gestionArticulos.php');
        exit();
    }
}
?>