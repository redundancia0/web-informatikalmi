<?php
    session_start();
    include_once 'bbdd.php';
    $user = $_SESSION["USUARIOPROVEEDOR"];
    if(isset($user) != true){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Manage Articles</title>
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
      <li><a href="gestionArticulos.php">Manage Products</a></li>
    </ol>
  </nav>  
<br>
<table>
        <tr>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            include_once("bbdd.php");
            $productos = selectProductos(); 
            foreach ($productos as $producto) {
                echo "<tr>";
                    echo "<td>".$producto["NOMBRE"]."</td>";
                    echo "<td><a href='editarArticulos.php?id_producto=".$producto["ID_PRODUCTO"]."'>Edit</a></td>";
                    echo "<td><a href='borrarArticulos.php?id_producto=".$producto["ID_PRODUCTO"]."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
</table>
<br>
<?php
    include_once 'footer.php';
?>