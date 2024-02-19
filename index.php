<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Main</title>
</head>
<body>
    <header>
        <?php include_once 'menu.php'; ?>
    </header>
    <?php
        include_once 'bbdd.php'; 
        $productos = selectProductos(); 
        echo "<br>";
        echo '<h1 class="titulo">Articulos Recomendados</h1>';
        echo '<div class="container">';
        if ($productos !== false) {
            $numProductos = count($productos);

            for ($i = 0; $i < $numProductos; $i++) {
                $producto = $productos[$i];
                if (in_array($producto['ID_PRODUCTO'], [1, 15, 27, 56])) {
                    echo '<article>';
                    echo '<section>';
                    echo '<a href="id_articulos.php?id_producto=' . $producto['ID_PRODUCTO'] . '"><h2>' . $producto['NOMBRE'] . '</h2></a>';
                    echo '<br>';
                    echo '<img src="' . $producto['IMAGEN'] . '" alt="fotoNoticia"><br>';
                    echo '<span>' . $producto['PRECIO'] . '€</span>';
                    echo '</section>';
                    echo '</article>';
                }
            }
        } else {
            echo "No se pudieron recuperar los productos.";
        }
        echo "</div>";
        include_once 'footer.php';
    ?>
</body>
</html>