<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/comun.css">
  <link rel="stylesheet" href="css/animation.css">
  <title>Upload Products</title>
</head>
<?php include_once 'menu.php'; ?>
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
    echo "<center>";
   echo "<svg class='ip' viewBox='0 0 256 128' width='256px' height='128px' xmlns='http://www.w3.org/2000/svg'>";
        echo "<defs>";
             echo "<linearGradient id='grad1' x1='0' y1='0' x2='1' y2='0'>"; 
                 echo "<stop offset='0%' stop-color='#5ebd3e' />"; 
                 echo "<stop offset='33%' stop-color='#ffb900' />"; 
                 echo "<stop offset='67%' stop-color='#f78200' />"; 
                 echo "<stop offset='100%' stop-color='#e23838' />"; 
             echo "</linearGradient>"; 
             echo "<linearGradient id='grad2' x1='1' y1='0' x2='0' y2='0'>"; 
                 echo "<stop offset='0%' stop-color='#e23838' />"; 
                 echo "<stop offset='33%' stop-color='#973999' />"; 
                 echo "<stop offset='67%' stop-color='#009cdf' />"; 
                 echo "<stop offset='100%' stop-color='#5ebd3e' />"; 
             echo "</linearGradient>"; 
         echo "</defs>"; 
         echo "<g fill='none' stroke-linecap='round' stroke-width='16'>"; 
             echo "<g class='ip__track' stroke='#ddd'>"; 
                 echo "<path d='M8,64s0-56,60-56,60,112,120,112,60-56,60-56'/>"; 
                 echo "<path d='M248,64s0-56-60-56-60,112-120,112S8,64,8,64'/>"; 
             echo "</g>"; 
             echo "<g stroke-dasharray='180 656'>"; 
                 echo "<path class='ip__worm1' stroke='url(#grad1)' stroke-dashoffset='0' d='M8,64s0-56,60-56,60,112,120,112,60-56,60-56'/>"; 
                 echo "<path class='ip__worm2' stroke='url(#grad2)' stroke-dashoffset='358' d='M248,64s0-56-60-56-60,112-120,112S8,64,8,64'/>"; 
          echo "</g>"; 
        echo "</g>"; 
     echo "</svg>"; 
     echo "</center>"; 
     echo "<br>";
        echo "<center><p>El producto se ha insertado correctamente.</p></center>";
        echo "<center><p>Redirigiendo al inicio...</p></center>";
        header("refresh:3;url=index.php"); // Redirigir después de 3 segundos
    echo "<br>";
}
?>
