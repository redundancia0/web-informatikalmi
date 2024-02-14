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
        <ul>
            <li><a href="index.php">Main</a></li>
            <li><a href="categorias.php">Articles</a></li>
            <li><a href="insertarArticulos.php">Upload Articles</a></li>
            <li><a href="gestionArticulos.php">Manage Articles</a></li>
        <?php
            include_once 'bbdd.php';
                session_start();
                if (isset($_SESSION["USUARIOPROVEEDOR"])) {
                    $user = $_SESSION["USUARIOPROVEEDOR"];
                    echo "<li><p class='user'>".$user."</p></li>";
                    echo "<li><a href='logout.php'>Exit</a></li>";

                } else {
                    echo "<li><a href='login.php'>Acceso</a></li>";
                }
                ?>
             </ul>
</header>