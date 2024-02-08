<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Iniciar Sesion</title>
</head>
<body>
    <header>
    <?php
        include_once 'menu.php';
    ?>
    </header>
    <h1>Iniciar Sesion</h1>
    <form method="post" action="loginVerificar.php">
        <img class="formLogo" src="img/logo.png">
        
        <label for="USUARIOPROVEEDOR">Usuario</label>
        <input type="text" id="USUARIOPROVEEDOR" name="USUARIOPROVEEDOR" required placeholder="Introduzca su usuario">
        <br>
        <label for="PASSWORDPROVEEDOR">Contraseña</label>
        <input type="password" id="PASSWORDPROVEEDOR" name="PASSWORDPROVEEDOR" required placeholder="Introduzca su contraseña">
        <br>
        <input type="submit" id="singup"></input>
    </form>
    <footer>
        <a href="https://www.instagram.com/"><img src="img/insta.png" alt="fotoInsta"></a>
        <a href="https://twitter.com/"><img src="img/x.png" alt="fotoTwitter"></a>
        <a href="https://www.youtube.com/"><img src="img/yt.png" alt="fotoYoutube"></a>
    </footer>
</body>
</html>