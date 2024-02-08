<?php
    session_start();
    unset($_SESSION["USUARIOPROVEEDOR"]);
    header("location: index.php");
?>