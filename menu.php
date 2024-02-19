<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>
<header>
    <a href="index.php"><img src="img/logo.png" alt="logo"></a>
    <ul class="menu">
    <li><a href="index.php">Main</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="insertarArticulos.php">Upload Products</a></li>
    <li><a href="gestionArticulos.php">Manage Products</a></li>
    <?php
    include_once 'bbdd.php';
    session_start();
    if (isset($_SESSION["USUARIOPROVEEDOR"])) {
        $user = $_SESSION["USUARIOPROVEEDOR"];
        echo "<li><p class='user'>".$user."
                    <li><a href='logout.php'>Log Out</a></li>
              </p></li>";
    } else {
        echo "<li><a href='login.php'>Access</a></li>";
    }
    ?>
</ul>


</header>