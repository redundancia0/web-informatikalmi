<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Search</title>
</head>
<body>
    <header>
    <?php
        include_once 'menu.php';
    ?>
    </header>
    
<?php
    include_once 'bbdd.php';

echo '<script src="buscador.js"></script>';
echo '<form id="searchContainer" action="busqueda.php" method="post">';
echo '<div id="imageContainer"><a id="toggleSearch"><img src="img/lupa.png"></a></div>';
echo '<div id="searchInputContainer">';
echo '<input type="search" id="searchInput" name="term" placeholder="Buscar">';
echo '<input type="submit" id="submit" value="Buscar">';
echo '</div>';   
echo '</form>';
    
    $term = $_POST['term'];
    
    $resultados = busqueda($term);
    echo '<div class="container">';
    foreach ($resultados as $articulo) {
        echo '<article>';
        echo '<section>';
        echo '<h1>' . $articulo['NOMBRE'] . '</h1>';
        echo '<br>';
        echo '<img src="' . $articulo['IMAGEN'] . '" alt="fotoArticulo"><br>';
        echo '<span>'. $articulo['PRECIO'] . '€</span>';
        echo '<p> Stock: ' . $articulo['STOCK'] . '</p>';
        echo '<br>';
        echo '<p>' . $articulo['DESCRIPCION'] . '</p>';
        echo '</section>';
        echo '</article>';
    }
    echo "</div>";
    include_once 'footer.php';
?>