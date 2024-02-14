<?php
session_start();
include_once('bbdd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['NOMBRE'];
    $precio = $_POST['PRECIO'];
    $stock = $_POST['STOCK'];
    $descripcion = $_POST['DESCRIPCION'];

    $memoria = $_POST['MEMORIA'] ?? null;
    $velocidad = $_POST['VELOCIDAD'] ?? null;
    $tipo_memoria = $_POST['TIPO_MEMORIA'] ?? null;
    $nucleos = $_POST['NUCLEOS'] ?? null;
    $tipo_disco = $_POST['TIPO_DISCO'] ?? null;
    $memoria_ram = $_POST['MEMORIA_RAM'] ?? null;
    $tamano = $_POST['TAMANO'] ?? null;
    $peso = $_POST['PESO'] ?? null;
    $tipo_liquido = $_POST['TIPO_LIQUIDO'] ?? null;
    $tipo_conexion = $_POST['TIPO_CONEXION'] ?? null;
    $senal_ruido = $_POST['SENAL_RUIDO'] ?? null;
    $potencia = $_POST['POTENCIA'] ?? null;

    if (isset($_FILES["IMAGEN"])) {
        $imagen_tmp = $_FILES["IMAGEN"]["tmp_name"];
        $nombre_imagen = $_FILES["IMAGEN"]["name"];
        $rutaImagen = "uploads/" . $nombre_imagen;

        if (move_uploaded_file($imagen_tmp, $rutaImagen)) {
            $result = insert_producto($nombre, $precio, $stock, $rutaImagen, $descripcion, $memoria, $velocidad, $tipo_memoria, $nucleos, $tipo_disco, $memoria_ram, $tamano, $peso, $tipo_liquido, $tipo_conexion, $senal_ruido, $potencia);

            
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "No se ha enviado ninguna imagen.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
