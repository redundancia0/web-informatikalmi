<?php

$memoria = "";
$velocidad = "";
$tipo_memoria = "";
$nucleos = "";
$tipo_disco = "";
$memoria_ram = "";
$tamano = "";
$peso = "";
$tipo_conexion = "";
$senal_ruido = "";
$potencia = "";
$tipo_liquido = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'bbdd.php';

    $nombre = $_POST['NOMBRE'] ?? null;
    $precio = $_POST['PRECIO'] ?? null;
    $stock = $_POST['STOCK'] ?? null;
    $descripcion = $_POST['DESCRIPCION'] ?? null;
    $tipo_producto = $_POST['opciones'] ?? null;

    $imagen = $_FILES['IMAGEN']['name'] ?? null;
    $imagen_temp = $_FILES['IMAGEN']['tmp_name'] ?? null;
    $carpeta_destino = 'uploads/'; 
    $ruta_imagen = $carpeta_destino . $imagen; 

    move_uploaded_file($imagen_temp, $ruta_imagen);

    switch ($tipo_producto) {
        case '1': // Discos duros
            $memoria = $_POST['MEMORIA'] ?? null;
            $velocidad = $_POST['VELOCIDAD'] ?? null;
            $tipo_disco = $_POST['TIPO_DISCO'] ?? null;
            break;
        case '2': // Fuentes de alimentación
            $potencia = $_POST['POTENCIA'] ?? null;
            break;
        case '3': // Memorias RAM
            $memoria_ram = $_POST['MEMORIA_RAM'] ?? null;
            $tipo_memoria = $_POST['TIPO_MEMORIA'] ?? null;
            break;
        case '4': // Periféricos
            $tipo_conexion = $_POST['TIPO_CONEXION'] ?? null;
            break;
        case '5': // Placas base
            $memoria = $_POST['MEMORIA'] ?? null;
            $velocidad = $_POST['VELOCIDAD'] ?? null;
            $tipo_memoria = $_POST['TIPO_MEMORIA'] ?? null;
            break;
        case '6': // Procesadores
            $memoria = $_POST['MEMORIA'] ?? null;
            $velocidad = $_POST['VELOCIDAD'] ?? null;
            $tipo_memoria = $_POST['TIPO_MEMORIA'] ?? null;
            $nucleos = $_POST['NUCLEOS'] ?? null;
            break;
        case '7': // Refrigeraciones líquidas
            $tamano = $_POST['TAMANO'] ?? null;
            $velocidad = $_POST['VELOCIDAD'] ?? null;   
            $peso = $_POST['PESO'] ?? null;
            $tipo_liquido = $_POST['TIPO_LIQUIDO'] ?? null;
            break;
        case '8': // Tarjetas gráficas
            $memoria_ram = $_POST['MEMORIA_RAM'] ?? null;
            $nucleos = $_POST['NUCLEOS'] ?? null;
            $tipo_memoria = $_POST['TIPO_MEMORIA'] ?? null;
            break;
        case '9': // Tarjetas de sonido
            $tipo_conexion = $_POST['TIPO_CONEXION'] ?? null;
            $senal_ruido = $_POST['SENAL_RUIDO'] ?? null;
            break;
        case '10': // Torres
            $tipo_conexion = $_POST['TIPO_CONEXION'] ?? null;
            $tamano = $_POST['TAMANO'] ?? null;
            $peso = $_POST['PESO'] ?? null;
            break;
        case '11': // Ventiladores
            $velocidad = $_POST['VELOCIDAD'] ?? null;
            $tamano = $_POST['TAMANO'] ?? null;
            $peso = $_POST['PESO'] ?? null;
            break;
        default:
            break;
    }

    $result = insert_producto($nombre, $precio, $stock, $ruta_imagen, $descripcion, $memoria, $velocidad, $tipo_memoria, $nucleos, $tipo_disco, $memoria_ram, $tamano, $peso, $tipo_liquido, $tipo_conexion, $senal_ruido, $potencia);

    // var_dump($_POST);
    echo "Noticia insertada correctamente";
    echo "<br>";
    echo "<a href='index.php'>Volver al inicio</a>";
}
?>
