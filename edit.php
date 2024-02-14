<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION["USUARIOPROVEEDOR"])) {
    header("Location: login.php");
    exit();
} else {
    if ($_FILES['IMAGEN']['error'] === UPLOAD_ERR_OK) {
        $imagen = $_FILES['IMAGEN']['name'];
        $imagen_temp = $_FILES['IMAGEN']['tmp_name'];

        $carpeta_destino = 'uploads/'; 
        $ruta_imagen = $carpeta_destino . $imagen; 

        move_uploaded_file($imagen_temp, $ruta_imagen);
    } else {
        echo "Error al subir la imagen.";
    }

    $nombre = $_POST['NOMBRE'];
    $precio = $_POST['PRECIO'];
    $stock = $_POST['STOCK'];
    $descripcion = $_POST['DESCRIPCION'];
    $memoria = $_POST['MEMORIA'];
    $velocidad = $_POST['VELOCIDAD'];
    $tipo_memoria = $_POST['TIPO_MEMORIA'];
    $nucleos = $_POST['NUCLEOS'];
    $tipo_disco = $_POST['TIPO_DISCO'];
    $memoria_ram = $_POST['MEMORIA_RAM'];
    $tamano = $_POST['TAMANO'];
    $peso = $_POST['PESO'];
    $tipo_liquido = $_POST['TIPO_LIQUIDO'];
    $tipo_conexion = $_POST['TIPO_CONEXION'];
    $senal_ruido = $_POST['SENAL_RUIDO'];
    $potencia = $_POST['POTENCIA'];

    include_once 'bbdd.php';

    if (editar_producto($id_producto, $nombre, $precio, $stock, $ruta_imagen, $descripcion, $memoria, $velocidad, $tipo_memoria, $nucleos, $tipo_disco, $memoria_ram, $tamano, $peso, $tipo_liquido, $tipo_conexion, $senal_ruido, $potencia)) {
        header("Location: gestionArticulos.php");
        exit();
    } else {
        echo "Error al editar el producto.";
    }
}
?>