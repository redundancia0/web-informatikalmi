<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'bbdd.php';
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/comun.css">
  <link rel="stylesheet" href="css/animation.css">
  <title>Upload Products</title>
</head>
<?php include_once 'menu.php'; ?>
<?php
if (!isset($_SESSION["USUARIOPROVEEDOR"])) {
    header("Location: login.php");
    exit();
} else {
    $ruta_imagen = "";
    if ($_FILES['IMAGEN']['error'] === UPLOAD_ERR_OK && $_FILES['IMAGEN']['size'] > 0) {
        $imagen_nueva = $_FILES['IMAGEN']['name'];
        $imagen_temp = $_FILES['IMAGEN']['tmp_name'];

        $carpeta_destino = 'uploads/';
        $ruta_imagen = $carpeta_destino . $imagen_nueva;

        move_uploaded_file($imagen_temp, $ruta_imagen);
    } else {
        $ruta_imagen = null;
    }

    $id_producto = $_POST['ID_PRODUCTO'];
    $nombre = $_POST['NOMBRE'];
    $precio = $_POST['PRECIO'];
    $stock = $_POST['STOCK'];
    $descripcion = $_POST['DESCRIPCION'];

    echo "<br>";
    echo $ruta_imagen;

    if (editar_producto($id_producto, $nombre, $precio, $stock, $ruta_imagen, $descripcion)) {
        
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
        echo "<center><p>El producto se ha actualizado correctamente.</p></center>";
        echo "<center><p>Redirigiendo al inicio...</p></center>";
        header("refresh:3;url=index.php"); // Redirigir después de 3 segundos
        exit();
    } else {
        echo "<a href='index.php'>Volver</a>";
        exit();
    }
}
?>
<?php
include_once 'footer.php';
?>