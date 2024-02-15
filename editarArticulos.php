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
    <title>Edit Articles</title>
</head>
<body>
    <header>
     <?php
        include_once 'menu.php';
    ?>
    </header>
    <h1>Edit Articles</h1>
    <script src="script.js"></script>
    <script src="editar.js"></script>
    <form method="post" action="edit.php" enctype="multipart/form-data">
    <input type="hidden" name="ID_PRODUCTO" value="
    <?php
            $id_producto = $_GET['id_producto'];
            $productos = get_productos_id($id_producto);
            if(!empty($productos))
            $producto = $productos[0];
            echo '<h1>' . $producto['ID_PRODUCTO'] . '</h1>'; ?>">
    <input type="hidden" name="tipo_producto" id="tipo_producto" value="">
    <h1>Product Information</h1>
    <img class="formLogo" src="img/logo.png">
    <select id="opciones">
    <option value="" disabled selected>Select a category</option>
    <option value="1">Hard disks</option>
    <option value="2">Power supply</option>
    <option value="3">RAM</option>
    <option value="4">Peripherals</option>
    <option value="5">Motherboards</option>
    <option value="6">CPU</option>
    <option value="7">Liquid cooling</option>
    <option value="8">GPU</option>
    <option value="9">Sound cards</option>
    <option value="10">Cases</option>
    <option value="11">Fans</option>
</select>
<br>
<div class="all">
<script src="script.js"></script>
<div id="discoduros" style="display:none;">
    <label for="MEMORIA">Memory</label>
    <input type="text" id="MEMORIA_DURO" name="MEMORIA">
    <br>
    <label for="VELOCIDAD">Speed</label>
    <input type="text" id="VELOCIDAD_DURO" name="VELOCIDAD">
    <br>
    <label for="TIPO_DISCO">Disk type</label>
    <input type="text" id="TIPO_DISCO_DURO" name="TIPO_DISCO">
</div>
<div id="fuentesalimentacion" style="display:none;">
    <label for="POTENCIA">Power</label>
    <input type="text" id="potencia" name="POTENCIA">
</div>
<div id="memoriasram" style="display:none;">
    <label for="MEMORIA">Memory</label>
    <input type="text" id="MEMORIA_RAM" name="MEMORIA">
    <br>
    <label for="TIPO_MEMORIA">Type of memory</label>
    <input type="text" id="TIPO_MEMORIA_RAM" name="TIPO_MEMORIA">
</div>
<div id="perifericos" style="display:none;">
    <label for="TIPO_CONEXION">Type of connection</label>
    <input type="text" id="TIPO_CONEXION" name="TIPO_CONEXION">
</div>
<div id="placasbase" style="display:none;">
    <label for="MEMORIA">Memory</label> 
    <input type="text" id="MEMORIA_PLACA" name="MEMORIA">
    <br>
    <label for="VELOCIDAD">Speed</label>
    <input type="text" id="VELOCIDAD_PLACA" name="VELOCIDAD">
    <br>
    <label for="TIPO_MEMORIA">Type of memory</label>
    <input type="text" id="TIPO_MEMORIA_PLACA" name="TIPO_MEMORIA">
</div>
<div id="procesadores" style="display:none;">
    <label for="MEMORIA">Memory</label>
    <input type="text" id="MEMORIA_PROCES" name="MEMORIA">
    <br>
    <label for="VELOCIDAD">Speed</label>
    <input type="text" id="VELOCIDAD_PROCES" name="VELOCIDAD">
    <br>
    <label for="TIPO_MEMORIA">Type of memory</label>
    <input type="text" id="TIPO_MEMORIA_PROCES" name="TIPO_MEMORIA">
    <br>
    <label for="NUCLEOS">Cores</label>
    <input type="text" id="NUCLEOS" name="NUCLEOS">
</div>
<div id="refrigeraciones_liquidas" style="display:none;">
    <label for="TAMANO">Size</label>
    <input type="text" id="TAMANO_REFRI" name="TAMANO">
    <br>
    <label for="VELOCIDAD">Speed</label>
    <input type="text" id="VELOCIDAD_REFRI" name="VELOCIDAD">
    <br>
    <label for="PESO">Weight</label>
    <input type="text" id="PESO" name="PESO">
    <br>
    <label for="TIPO_LIQUIDO">Liquid type</label>
    <input type="text" id="TIPO_LIQUIDO" name="TIPO_LIQUIDO">
</div>
<div id="tarjetas_graficas" style="display:none;">
    <label for="MEMORIA_RAM">RAM Memory</label>
    <input type="text" id="MEMORIA_RAM" name="MEMORIA_RAM">
    <br>
    <label for="NUCLEOS">Cores</label>
    <input type="text" id="NUCLEOS" name="NUCLEOS">
    <br>
    <label for="TIPO_MEMORIA">Type of memory</label>
    <input type="text" id="TIPO_MEMORIA_GRAFICA" name="TIPO_MEMORIA">
</div>
<div id="tarjetas_sonidos" style="display:none;">
    <label for="TIPO_CONEXION">Type of connection</label>
    <input type="text" id="TIPO_CONEXION" name="TIPO_CONEXION">
    <br>
    <label for="SENAL_RUIDO">Signal-to-noise ratio</label>
    <input type="text" id="SENAL_RUIDO" name="SENAL_RUIDO">
</div>
<div id="torres" style="display:none;">
    <label for="TIPO_CONEXION">Type of connection</label>
    <input type="text" id="TIPO_CONEXION" name="TIPO_CONEXION">
    <br>
    <label for="TAMANO">Size</label>
    <input type="text" id="TAMANO_TORRE" name="TAMANO">
    <br>
    <label for="PESO">Weight</label>
    <input type="text" id="PESO_TORRE" name="PESO">
    <br>
</div>
<div id="ventiladores" style="display:none;">
    <label for="VELOCIDAD">Speed</label>
    <input type="text" id="VELOCIDAD_VENTILADORES" name="VELOCIDAD">
    <br>
    <label for="TAMANO">Size</label>
    <input type="text" id="TAMANO_VENTILADORES" name="TAMANO">
    <br>
    <label for="PESO">Weight</label>
    <input type="text" id="PESO" name="PESO">
    <br>
</div>
    </div> 
    <br>
        <hr>
            <br>
        <input type="hidden" name="ID_PRODUCTO" value="<?php include_once 'bbdd.php'; echo $id_producto; ?>">
        <label for="NOMBRE">Name</label>
        <input type="text" id="NOMBRE" name="NOMBRE" placeholder="Article name" value="<?php 
        $id_producto = $_GET['id_producto'];
        $productos = get_productos_id($id_producto);
        if(!empty($productos))
        $producto = $productos[0];
        echo $producto['NOMBRE']; 
        ?>">
        <br>
        <label for="PRECIO">Price</label>
        <input type="text" name="PRECIO" id="PRECIO"  placeholder="Article price" value="<?php 
        $id_producto = $_GET['id_producto'];
        $productos = get_productos_id($id_producto);
        if(!empty($productos))
        $producto = $productos[0];
        echo $producto['PRECIO']; 
        ?>">
        <br>
        <label for="STOCK">Stock</label>
        <input type="number" name="STOCK" id="STOCK"  placeholder="Article stock" value="<?php 
        $id_producto = $_GET['id_producto'];
        $productos = get_productos_id($id_producto);
        if(!empty($productos))
        $producto = $productos[0];
        echo $producto['STOCK']; 
        ?>">
        <br>
        <label for="IMAGEN">Image</label>
        <input type="file" name="IMAGEN" id="IMAGEN" accept="image/*">
        <?php
    if (!empty($_POST['imagen_anterior'])) {
        echo '<input type="text" value="' . basename($_POST['imagen_anterior']) . '" readonly>';
    }
?>
        <br>
        <label for="DESCRIPCION">Description</label>
        <textarea id="DESCRIPCION" name="DESCRIPCION"  placeholder="Description of the article" rows="5" cols="50" maxlength="250"><?php 
        $id_producto = $_GET['id_producto'];
        $productos = get_productos_id($id_producto);
        if(!empty($productos))
        $producto = $productos[0];
        echo $producto['DESCRIPCION']; 
        ?>
        </textarea>
        </textarea>
        <br>
        <input type="submit" id="singup" value="Save changes"></input>
    </form>
<?php
include_once 'footer.php';
?>