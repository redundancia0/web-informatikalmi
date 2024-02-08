<?php
    include_once 'bbdd.php'; // Incluir el archivo de conexión a la base de datos
    
    // Recibir datos principales del formulario
    $nombre = $_POST['NOMBRE'];
    $precio = $_POST['PRECIO'];
    $stock = $_POST['STOCK'];
    $descripcion = $_POST['DESCRIPCION'];
    $tipo_producto = $_POST['opciones']; // Obtener el tipo de producto seleccionado
    
    // Manejar la imagen
    $imagen = $_FILES['IMAGEN']['name']; // Nombre del archivo de imagen
    $imagen_temp = $_FILES['IMAGEN']['tmp_name']; // Nombre temporal del archivo de imagen
    $carpeta_destino = 'uploads/'; // Carpeta donde se guardarán las imágenes
    $ruta_imagen = $carpeta_destino . $imagen; // Ruta final de la imagen
    
    // Mover la imagen desde su ubicación temporal a la carpeta destino
    move_uploaded_file($imagen_temp, $ruta_imagen);
    
    // Manejar campos adicionales según el tipo de producto
    switch ($tipo_producto) {
        case '1': // Discos duros
            $memoria = $_POST['MEMORIA'];
            $velocidad = $_POST['VELOCIDAD'];
            $tipo_disco = $_POST['TIPO_DISCO'];
            break;
        case '2': // Fuentes de alimentación
            $potencia = $_POST['POTENCIA'];
            break;
        case '3': // Memorias RAM
            $memoria_ram = $_POST['MEMORIA_RAM'];
            $tipo_memoria = $_POST['TIPO_MEMORIA'];
            break;
        case '4': // Periféricos
            $tipo_conexion = $_POST['TIPO_CONEXION'];
            break;
        case '5': // Placas base
            $memoria = $_POST['MEMORIA'];
            $velocidad = $_POST['VELOCIDAD'];
            $tipo_memoria = $_POST['TIPO_MEMORIA'];
            break;
        case '6': // Procesadores
            $memoria = $_POST['MEMORIA'];
            $velocidad = $_POST['VELOCIDAD'];
            $tipo_memoria = $_POST['TIPO_MEMORIA'];
            $nucleos = $_POST['NUCLEOS'];
            break;
        case '7': // Refrigeraciones líquidas
            $tamano = $_POST['TAMANO'];
            $velocidad = $_POST['VELOCIDAD'];
            $peso = $_POST['PESO'];
            $tipo_liquido = $_POST['TIPO_LIQUIDO'];
            break;
        case '8': // Tarjetas gráficas
            $memoria_ram = $_POST['MEMORIA_RAM'];
            $nucleos = $_POST['NUCLEOS'];
            $tipo_memoria = $_POST['TIPO_MEMORIA'];
            break;
        case '9': // Tarjetas de sonido
            $tipo_conexion = $_POST['TIPO_CONEXION'];
            $senal_ruido = $_POST['SENAL_RUIDO'];
            break;
        case '10': // Torres
            $tipo_conexion = $_POST['TIPO_CONEXION'];
            $tamano = $_POST['TAMANO'];
            $peso = $_POST['PESO'];
            break;
        case '11': // Ventiladores
            $velocidad = $_POST['VELOCIDAD'];
            $tamano = $_POST['TAMANO'];
            $peso = $_POST['PESO'];
            break;
        default:
            // Manejar otros tipos de productos si es necesario
            break;
    }
    
    // Llamar al procedimiento almacenado para agregar el producto
    $stmt = oci_parse($conn, 'BEGIN agregar_producto(:p_nombre, :p_precio, :p_stock, :p_imagen, :p_descripcion, :p_tipo_producto, :p_memoria, :p_velocidad, :p_tipo_memoria, :p_nucleos, :p_tipo_disco, :p_memoria_ram, :p_tamano, :p_peso, :p_tipo_liquido, :p_tipo_conexion, :p_senal_ruido, :p_potencia); END;');
    
    // Vincular parámetros
    oci_bind_by_name($stmt, ':p_nombre', $nombre);
    oci_bind_by_name($stmt, ':p_precio', $precio);
    oci_bind_by_name($stmt, ':p_stock', $stock);
    oci_bind_by_name($stmt, ':p_imagen', $ruta_imagen); // Usar la ruta de la imagen
    oci_bind_by_name($stmt, ':p_descripcion', $descripcion);
    oci_bind_by_name($stmt, ':p_tipo_producto', $tipo_producto);
    oci_bind_by_name($stmt, ':p_memoria', $memoria);
    oci_bind_by_name($stmt, ':p_velocidad', $velocidad);
    oci_bind_by_name($stmt, ':p_tipo_memoria', $tipo_memoria);
    oci_bind_by_name($stmt, ':p_nucleos', $nucleos);
    oci_bind_by_name($stmt, ':p_tipo_disco', $tipo_disco);
    oci_bind_by_name($stmt, ':p_memoria_ram', $memoria_ram);
    oci_bind_by_name($stmt, ':p_tamano', $tamano);
    oci_bind_by_name($stmt, ':p_peso', $peso);
    oci_bind_by_name($stmt, ':p_tipo_liquido', $tipo_liquido);
    oci_bind_by_name($stmt, ':p_tipo_conexion', $tipo_conexion);
    oci_bind_by_name($stmt, ':p_senal_ruido', $senal_ruido);
    oci_bind_by_name($stmt, ':p_potencia', $potencia);
    
    // Ejecutar la consulta
    oci_execute($stmt);
    
    // Cerrar la conexión y liberar recursos
    oci_close($conn);
    
    // Redirigir a la página de éxito o mostrar un mensaje de éxito después de completar la operación
    header('Location: index.php');
?>
