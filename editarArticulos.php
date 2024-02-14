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
    <link rel="stylesheet" href="css/subirArticulos.css">
    <link rel="stylesheet" href="css/comun.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Upload Articles</title>
</head>
<body>
    <header>
     <?php
        include_once 'menu.php';
    ?>
    </header>
    <h1>Subir Articulos</h1>
    <script src="script.js"></script>
    <form method="post" action="edit.php" enctype="multipart/form-data">
    <h1>Información del producto</h1>
    <img class="formLogo" src="img/logo.png">
    <select id="opciones">
    <option value="" disabled selected>Selecciona una categoria</option>
    <option value="1">Discos duros</option>
    <option value="2">Fuentes alimentacion</option>
    <option value="3">Memorias RAM</option>
    <option value="4">Perifericos</option>
    <option value="5">Placas base</option>
    <option value="6">Procesadores</option>
    <option value="7">Refrigeraciones liquidas</option>
    <option value="8">Tarjetas graficas</option>
    <option value="9">Tarjetas de sonido</option>
    <option value="10">Torres</option>
    <option value="11">Ventiladores</option>
</select>
<br>
<div class="all">
<script src="script.js"></script>
<div id="discoduros" style="display:none;">
    <label for="MEMORIA">Memoria</label>
    <input type="text" id="MEMORIA_DURO" name="MEMORIA">
    <br>
    <label for="VELOCIDAD">Velocidad</label>
    <input type="text" id="VELOCIDAD_DURO" name="VELOCIDAD">
    <br>
    <label for="TIPO_DISCO">Tipo disco</label>
    <input type="text" id="TIPO_DISCO_DURO" name="TIPO_DISCO">
</div>
<div id="fuentesalimentacion" style="display:none;">
    <label for="POTENCIA">Potencia</label>
    <input type="text" id="potencia" name="POTENCIA">
</div>
<div id="memoriasram" style="display:none;">
    <label for="MEMORIA">Memoria</label>
    <input type="text" id="MEMORIA_RAM" name="MEMORIA">
    <br>
    <label for="TIPO_MEMORIA">Tipo memoria</label>
    <input type="text" id="TIPO_MEMORIA_RAM" name="TIPO_MEMORIA">
</div>
<div id="perifericos" style="display:none;">
    <label for="TIPO_CONEXION">Tipo de conexion</label>
    <input type="text" id="TIPO_CONEXION" name="TIPO_CONEXION">
</div>
<div id="placasbase" style="display:none;">
    <label for="MEMORIA">Memoria</label> 
    <input type="text" id="MEMORIA_PLACA" name="MEMORIA">
    <br>
    <label for="VELOCIDAD">Velocidad</label>
    <input type="text" id="VELOCIDAD_PLACA" name="VELOCIDAD">
    <br>
    <label for="TIPO_MEMORIA">Tipo memoria</label>
    <input type="text" id="TIPO_MEMORIA_PLACA" name="TIPO_MEMORIA">
</div>
<div id="procesadores" style="display:none;">
    <label for="MEMORIA">Memoria</label>
    <input type="text" id="MEMORIA_PROCES" name="MEMORIA">
    <br>
    <label for="VELOCIDAD">Velocidad</label>
    <input type="text" id="VELOCIDAD_PROCES" name="VELOCIDAD">
    <br>
    <label for="TIPO_MEMORIA">Tipo memoria</label>
    <input type="text" id="TIPO_MEMORIA_PROCES" name="TIPO_MEMORIA">
    <br>
    <label for="NUCLEOS">Nucleos</label>
    <input type="text" id="NUCLEOS" name="NUCLEOS">
</div>
<div id="refrigeraciones_liquidas" style="display:none;">
    <label for="TAMANO">Tamaño</label>
    <input type="text" id="TAMANO_REFRI" name="TAMANO">
    <br>
    <label for="VELOCIDAD">Velocidad</label>
    <input type="text" id="VELOCIDAD_REFRI" name="VELOCIDAD">
    <br>
    <label for="PESO">Peso</label>
    <input type="text" id="PESO" name="PESO">
    <br>
    <label for="TIPO_LIQUIDO">Tipo liquido</label>
    <input type="text" id="TIPO_LIQUIDO" name="TIPO_LIQUIDO">
</div>
<div id="tarjetas_graficas" style="display:none;">
    <label for="MEMORIA_RAM">Memoria RAM</label>
    <input type="text" id="MEMORIA_RAM" name="MEMORIA_RAM">
    <br>
    <label for="NUCLEOS">Nucleos</label>
    <input type="text" id="NUCLEOS" name="NUCLEOS">
    <br>
    <label for="TIPO_MEMORIA">Tipo memoria</label>
    <input type="text" id="TIPO_MEMORIA_GRAFICA" name="TIPO_MEMORIA">
</div>
<div id="tarjetas_sonidos" style="display:none;">
    <label for="TIPO_CONEXION">Tipo conexion</label>
    <input type="text" id="TIPO_CONEXION" name="TIPO_CONEXION">
    <br>
    <label for="SENAL_RUIDO">Señal ruido</label>
    <input type="text" id="SENAL_RUIDO" name="SENAL_RUIDO">
</div>
<div id="torres" style="display:none;">
    <label for="TIPO_CONEXION">Tipo conexion</label>
    <input type="text" id="TIPO_CONEXION" name="TIPO_CONEXION">
    <br>
    <label for="TAMANO">Tamaño</label>
    <input type="text" id="TAMANO_TORRE" name="TAMANO">
    <br>
    <label for="PESO">Peso</label>
    <input type="text" id="PESO_TORRE" name="PESO">
    <br>
</div>
<div id="ventiladores" style="display:none;">
    <label for="VELOCIDAD">Velocidad</label>
    <input type="text" id="VELOCIDAD_VENTILADORES" name="VELOCIDAD">
    <br>
    <label for="TAMANO">Tamaño</label>
    <input type="text" id="TAMANO_VENTILADORES" name="TAMANO">
    <br>
    <label for="PESO">Peso</label>
    <input type="text" id="PESO" name="PESO">
    <br>
</div>
    </div> 
    <br>
        <hr>
            <br>
        <label for="NOMBRE">Nombre</label>
        <input type="text" id="NOMBRE" name="NOMBRE" placeholder="Nombre del artículo">
        <br>
        <label for="PRECIO">Precio</label>
        <input type="text" name="PRECIO" id="PRECIO"  placeholder="Precio del articulo">
        <br>
        <label for="STOCK">Stock</label>
        <input type="number" name="STOCK" id="STOCK"  placeholder="Stock del articulo">
        <br>
        <label for="IMAGEN">Imagen</label>
        <input type="file" name="IMAGEN" id="IMAGEN" accept="image/*">
        <br>
        <label for="DESCRIPCION">Descripcion</label>
        <textarea id="DESCRIPCION" name="DESCRIPCION"  placeholder="Descripción del articulo" rows="5" cols="50" maxlength="250"></textarea>
        <br>
        <input type="submit" id="singup"></input>
    </form>
<?php
include_once 'footer.php';
?>