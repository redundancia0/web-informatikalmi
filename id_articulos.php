<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/id_articulos.css">
    <link rel="stylesheet" href="css/comun.css">
    <?php 
    include_once 'bbdd.php';
    $id_producto = $_GET['id_producto'];
    $productos = get_productos_id($id_producto);
        echo "<title>".$producto['NOMBRE']."</title>";
    ?>
</head>
<body>
    <header>
    <?php
        include_once 'menu.php';
    ?>
    </header>
    <nav aria-label="breadcrumbs">
    <ol>
      <li><a href="index.php">Main</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a>
        <?php 
        include_once 'bbdd.php';
        $id_producto = $_GET['id_producto'];
        $productos = get_productos_id($id_producto);
        $producto = $productos[0];
        echo $producto['NOMBRE'];
        ?>
    </a></li>
    </ol>
  </nav>      
    <?php
        include_once 'bbdd.php';
        if(isset($_GET['id_producto'])) {
            $id_producto = $_GET['id_producto'];
            $productos = get_productos_id($id_producto);
            if(!empty($productos))
            $producto = $productos[0];
            echo '<article>';
            echo '<section>';
            echo '<h1>' . $producto['NOMBRE'] . '</h1>';
            echo '<br>';
            echo '<img src="' . $producto['IMAGEN'] . '" alt="fotoArticulo"><br>';
            echo '<span>'. $producto['PRECIO'] . '€</span>';
            echo '<p> Stock: ' . $producto['STOCK'] . '</p>';
            echo '<p>' . $producto['DESCRIPCION'] . '</p>';
            echo '</section>';
            echo '</article>';
        } else {
            echo 'No se encontraron productos con el ID especificado.';
        }
  include_once 'footer.php';      
?>