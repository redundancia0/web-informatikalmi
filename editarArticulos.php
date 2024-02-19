<?php
    session_start();
    include_once 'bbdd.php';
    $user = $_SESSION["USUARIOPROVEEDOR"];
    if(!isset($user)){
        header('location: login.php');
        exit; // Asegúrate de que el script se detenga después de redirigir
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/subirArticulos.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Edit Products</title>
</head>
<body>
    <header>
        <?php include_once 'menu.php'; ?>
    </header>
    <nav aria-label="breadcrumbs">
        <ol>
            <li><a href="index.php">Main</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="gestionArticulos.php">Manage Products</a></li>
            <li><a href="editarArticulos.php">Edit Product</a></li>
        </ol>
    </nav>
    <script src="script.js"></script>
    <script src="editar.js"></script>
    <form method="post" action="edit.php" enctype="multipart/form-data">
        <?php
            $id_producto = $_GET['id_producto'];
            $productos = get_productos_id($id_producto);
            if($producto = $productos[0]) {
                echo '<input type="hidden" name="ID_PRODUCTO" value="' . $producto['ID_PRODUCTO'] . '">';
                echo '<h1>Product Information</h1>';
                echo '<img class="formLogo" src="img/logo.png">';
                echo '<br>';
                echo '<label for="NOMBRE">Name</label>';
                echo '<input type="text" id="NOMBRE" name="NOMBRE" placeholder="Article name" value="' . $producto['NOMBRE'] . '">';
                echo '<br>';
                echo '<label for="PRECIO">Price</label>';
                echo '<input type="text" name="PRECIO" id="PRECIO" placeholder="Article price" value="' . $producto['PRECIO'] . '">';
                echo '<br>';
                echo '<label for="STOCK">Stock</label>';
                echo '<input type="number" name="STOCK" id="STOCK" placeholder="Article stock" value="' . $producto['STOCK'] . '">';
                echo '<br>';
                echo '<label for="IMAGEN">Image</label>';
                echo '<input type="file" name="IMAGEN" id="IMAGEN" accept="image/*">';
                echo '<br>';
                
                echo '<label for="DESCRIPCION">Description</label>';
                echo '<textarea id="DESCRIPCION" name="DESCRIPCION" placeholder="Description of the article" rows="5" cols="50" maxlength="250">' . $producto['DESCRIPCION'] . '</textarea>';
                echo '<br>';
                echo '<input type="submit" id="singup" value="Save changes">';
            } else {
                echo "No se encontró ninguna noticia con el ID especificado.";
            }
        ?>
    </form>
<?php
include_once 'footer.php';
?>
</body>
</html>
