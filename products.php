<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/articulos.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Products</title>
</head>
<body>
    <header>
    <?php
        include_once 'menu.php';
    ?>
    </header>
    <article>
    </header>
    <nav aria-label="breadcrumbs">
    <ol>
      <li><a href="index.php">Main</a></li>
      <li><a href="products.php">Products</a></li>
    </ol>
  </nav>
    <?php
include_once 'bbdd.php'; 
$productos = selectProductos(); 
// var_dump($articulos);

echo '<br>';
echo '<script src="buscador.js"></script>';
echo '<form id="searchContainer" action="busqueda.php" method="post">';
echo '<div id="imageContainer"><a id="toggleSearch"><img src="img/lupa.png"></a></div>';
echo '<div id="searchInputContainer">';
echo '<input type="search" id="searchInput" name="term" placeholder="Buscar">';
echo '<input type="submit" id="submit" value="Buscar">';
echo '</div>';   
echo '</form>';
echo '<br>';
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
include_once 'footer.php';  
?>