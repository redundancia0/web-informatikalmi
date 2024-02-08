<?php
    session_start();
    include_once 'bbdd.php';
    $sesionCorrecta = login($_POST["USUARIOPROVEEDOR"], $_POST["PASSWORDPROVEEDOR"]);
    
    if($sesionCorrecta) {
        $_SESSION["USUARIOPROVEEDOR"] = $_POST["USUARIOPROVEEDOR"];
        $_SESSION["ID_PROVEEDOR"] = $sesionCorrecta;
        header("location: insertarArticulos.php");
        echo "alert('Login completado')";
    } else
    {
        header("location: index.php");
    }
?>
