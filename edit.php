<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'bbdd.php';

if (!isset($_SESSION["USUARIOPROVEEDOR"])) {
    header("Location: login.php");
    exit();
} else {
    if (isset($_POST['tipo_producto'])) {
        $tipo_producto = $_POST['tipo_producto'];
        
        $imagen_anterior = '';
if (isset($_POST['IMAGEN_ANTERIOR'])) {
    $imagen_anterior = $_POST['IMAGEN_ANTERIOR'];
}

// Verificar si se cargó una nueva imagen
if ($_FILES['IMAGEN']['error'] === UPLOAD_ERR_OK && $_FILES['IMAGEN']['size'] > 0) {
    // Si se cargó una nueva imagen, usarla
    $imagen_nueva = $_FILES['IMAGEN']['name'];
    $imagen_temp = $_FILES['IMAGEN']['tmp_name'];

    $carpeta_destino = 'uploads/';
    $ruta_imagen = $carpeta_destino . $imagen_nueva;

    move_uploaded_file($imagen_temp, $ruta_imagen);
} else {
    // Si no se cargó una nueva imagen, mantener la imagen anterior
    $ruta_imagen = $imagen_anterior;
}
        
        $id_producto = $_POST['ID_PRODUCTO'];
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

        echo "Id:" .$id_producto ;

        echo "<br>";
        if (editar_producto($id_producto, $nombre, $precio, $stock, $ruta_imagen, $descripcion, $memoria, $velocidad, $tipo_memoria, $nucleos, $tipo_disco, $memoria_ram, $tamano, $peso, $tipo_liquido, $tipo_conexion, $senal_ruido, $potencia, $tipo_producto)) {
            header("Location: gestionArticulos.php");
            exit();
        } else {
            echo "<a href='gestionArticulos.php'>Volver</a>";
            exit();
        }
    } else {
        echo "Error.";
        exit();
    }
}

?>