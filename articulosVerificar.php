<?php
session_start();
include_once('bbdd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['NOMBRE'];
    $precio = $_POST['PRECIO'];
    $stock = $_POST['STOCK'];
    $descripcion = $_POST['DESCRIPCION'];

    // Verifica si se ha enviado una imagen
    if (isset($_FILES["IMAGEN"])) {
        // Obtiene el nombre temporal y original del archivo de imagen
        $imagen_tmp = $_FILES["IMAGEN"]["tmp_name"];
        $nombre_imagen = $_FILES["IMAGEN"]["name"];
        // Ruta donde se guardará la imagen
        $rutaImagen = "uploads/" . $nombre_imagen;

        // Mueve la imagen al directorio deseado
        if (move_uploaded_file($imagen_tmp, $rutaImagen)) {
            // Procesamiento exitoso de la imagen, ahora llama a la función insert_producto
            $result = insert_producto($nombre, $precio, $stock, $nombre_imagen, $descripcion);
            if ($result) {
                // Redirecciona a la página principal si la inserción del producto fue exitosa
                header('location: index.php');
            } else {
                // Error en la inserción del producto
                echo "Error al insertar el producto en la base de datos.";
            }
        } else {
            // Error al mover la imagen
            echo "Error al subir la imagen.";
        }
    } else {
        // No se ha enviado ninguna imagen
        echo "No se ha enviado ninguna imagen.";
    }
} else {
    // Método de solicitud no válido
    echo "Acceso no autorizado.";
}
?>
