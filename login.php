<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="stylesheet" href="css/animation.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Log In</title>
</head>
<body>
    <header>
    <?php
        include_once 'menu.php';
    ?>
    </header>
    <h1>Log In</h1>
    <form method="post" action="loginVerificar.php">
    <main>
        <center>
    <svg class="ip" viewBox="0 0 256 128" width="256px" height="128px" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="grad1" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="#5ebd3e" />
                <stop offset="33%" stop-color="#ffb900" />
                <stop offset="67%" stop-color="#f78200" />
                <stop offset="100%" stop-color="#e23838" />
            </linearGradient>
            <linearGradient id="grad2" x1="1" y1="0" x2="0" y2="0">
                <stop offset="0%" stop-color="#e23838" />
                <stop offset="33%" stop-color="#973999" />
                <stop offset="67%" stop-color="#009cdf" />
                <stop offset="100%" stop-color="#5ebd3e" />
            </linearGradient>
        </defs>
        <g fill="none" stroke-linecap="round" stroke-width="16">
            <g class="ip__track" stroke="#ddd">
                <path d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56"/>
                <path d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64"/>
            </g>
            <g stroke-dasharray="180 656">
                <path class="ip__worm1" stroke="url(#grad1)" stroke-dashoffset="0" d="M8,64s0-56,60-56,60,112,120,112,60-56,60-56"/>
                <path class="ip__worm2" stroke="url(#grad2)" stroke-dashoffset="358" d="M248,64s0-56-60-56-60,112-120,112S8,64,8,64"/>
            </g>
        </g>
    </svg>
    </center>
    </main>
        <label for="USUARIOPROVEEDOR">Usuario</label>
        <input type="text" id="USUARIOPROVEEDOR" name="USUARIOPROVEEDOR" required placeholder="Put your user">
        <br>
        <label for="PASSWORDPROVEEDOR">Contraseña</label>
        <input type="password" id="PASSWORDPROVEEDOR" name="PASSWORDPROVEEDOR" required placeholder="Put your password">
        <br>
        <input type="submit" id="singup"></input>
    </form>
<?php
    include_once 'footer.php';
?>