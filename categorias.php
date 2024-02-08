<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/articulos.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Articulos</title>
</head>
<body>
    <header>
    <?php
        include_once 'menu.php';
    ?>
    </header>
    <article>
    <?php
        include_once 'menu.php';
    ?>
    </header>
    <?php
include_once 'bbdd.php'; 
$productos = selectProductos(); 
// var_dump($articulos);

echo '<br>';
echo '<script src="buscador.js"></script>';
echo '<form id="searchContainer" action="busqueda.php">';
echo '  <div id="imageContainer"><a id="toggleSearch"><img src="img/lupa.png"></a></div>';
echo '  <div id="searchInputContainer">';
echo '    <input type="search" id="searchInput" placeholder="Buscar">';
echo '<input type="submit" id="submit" placholder="Buscar">';
echo '  </div>';
echo '</form>';
echo '<br>';
echo '<h1 class="titulo">Articulos Iniciales</h1>';
echo '<div class="container">';
if ($productos !== false) {
    foreach ($productos as $producto) {
        echo '<article>';
        echo '<section>';
        echo '<a href="id_articulos.php?id_producto='.$producto["ID_PRODUCTO"].'"><h2>' . $producto['NOMBRE'] . '</h2></a>';
        echo '<br>';
        echo '<img src="' . $producto['IMAGEN'] . '" alt="fotoNoticia"><br>';
        echo '<span>'.$producto['PRECIO'].'€</span>';
        echo '</section>';
        echo '</article>';
    }
} else {
    echo "No se pudieron recuperar los productos.";
}
echo "</div>";
?>
    </article>
    <footer>
        <a href="https://www.instagram.com/"><img src="img/insta.png" alt="fotoInsta"></a>
        <a href="https://twitter.com/"><img src="img/x.png" alt="fotoTwitter"></a>
        <a href="https://www.youtube.com/"><img src="img/yt.png" alt="fotoYoutube"></a>
    </footer>
</body>
</html>