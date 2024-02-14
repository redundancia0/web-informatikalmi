<?php
function conectarOracle() {
    $host = "54.164.171.161";
    $puerto = 1521;
    $sid = "ORCLCDB";
    $usuario = "informatikalmi";
    $contraseña = "Almi12345";
    $oracle_db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = $host)(PORT = $puerto)))(CONNECT_DATA=(SID=$sid)))";
    $conn = oci_connect($usuario, $contraseña, $oracle_db);

    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        return false;
    }
    return $conn;
}

function selectProductos() {
    $conn = conectarOracle();

    if (!$conn) {
        return false;
    }

    $query = "SELECT * FROM productos";
    $stid = oci_parse($conn, $query);
    oci_execute($stid);

    $resultados = array();
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        $resultados[] = $row;
    }

    oci_close($conn);

    return $resultados;
}

// // $productos = selectProductos();

// if ($productos !== false) {
//     print_r($productos);
// } else {
//     echo "No se pudo conectar a la base de datos.";
// }

function login($usuarioProveedor, $passwordProveedor) {
    $conn = conectarOracle();

    $query = "SELECT id_proveedor FROM proveedores WHERE usuarioproveedor = :usuarioproveedor 
        AND passwordproveedor = :passwordproveedor";

    $stmt = oci_parse($conn, $query);
    if (!$stmt) {
        $e = oci_error($conn);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_bind_by_name($stmt, ':usuarioproveedor', $usuarioProveedor);
    oci_bind_by_name($stmt, ':passwordproveedor', $passwordProveedor);
    
    oci_execute($stmt);

    $id_cliente = -1;
    oci_bind_by_name($stmt, ':id_cliente', $id_cliente);

    $result = false;
    if (oci_fetch($stmt)) {
        $result = $id_cliente;
    }

    oci_free_statement($stmt);
    oci_close($conn);

    return $result;
}
function insert_producto($nombre, $precio, $stock, $imagen, $descripcion, $memoria, $velocidad, $tipo_memoria, $nucleos, $tipo_disco, $memoria_ram, $tamano, $peso, $tipo_liquido, $tipo_conexion, $senal_ruido, $potencia) {

    $conn = conectarOracle();
    
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Preparar la llamada al procedimiento
    $stmt = oci_parse($conn, 'BEGIN agregar_producto(:p_nombre, :p_precio, :p_stock, :p_imagen, :p_descripcion,:p_memoria, :p_velocidad, :p_tipo_memoria, :p_nucleos, :p_tipo_disco, :p_memoria_ram, :p_tamano, :p_peso, :p_tipo_liquido, :p_tipo_conexion, :p_senal_ruido, :p_potencia); END;');

    // Vincular los parámetros
    oci_bind_by_name($stmt, ':p_nombre', $nombre);
    oci_bind_by_name($stmt, ':p_precio', $precio);
    oci_bind_by_name($stmt, ':p_stock', $stock);
    oci_bind_by_name($stmt, ':p_imagen', $imagen);
    oci_bind_by_name($stmt, ':p_descripcion', $descripcion);
    oci_bind_by_name($stmt, ':p_memoria', $memoria);
    oci_bind_by_name($stmt, ':p_velocidad', $velocidad);
    oci_bind_by_name($stmt, ':p_tipo_memoria', $tipo_memoria);
    oci_bind_by_name($stmt, ':p_nucleos', $nucleos);
    oci_bind_by_name($stmt, ':p_tipo_disco', $tipo_disco);
    oci_bind_by_name($stmt, ':p_memoria_ram', $memoria_ram);
    oci_bind_by_name($stmt, ':p_tamano', $tamano);
    oci_bind_by_name($stmt, ':p_peso', $peso);
    oci_bind_by_name($stmt, ':p_tipo_liquido', $tipo_liquido);
    oci_bind_by_name($stmt, ':p_tipo_conexion', $tipo_conexion);
    oci_bind_by_name($stmt, ':p_senal_ruido', $senal_ruido);
    oci_bind_by_name($stmt, ':p_potencia', $potencia);

    // Ejecutar el procedimiento
    $result = oci_execute($stmt);
    if (!$result) {
        $e = oci_error($stmt);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    // Cerrar la conexión
    oci_free_statement($stmt);
    oci_close($conn);

    return $result;
}

function eliminarArticulos($id_producto){
    $conn = conectarOracle();
    
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $stmt = oci_parse($conn, 'BEGIN eliminar_producto(:p_id_producto); END;');

    oci_bind_by_name($stmt, ':p_id_producto', $id_producto);
  
    $result = oci_execute($stmt);
    if (!$result) {
        $e = oci_error($stmt);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_free_statement($stmt);
    oci_close($conn);

    return $result;
}

function editarArticulos($id_producto){
    $conn = conectarOracle();
    
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $stmt = oci_parse($conn, 'BEGIN eliminar_producto(:p_id_producto); END;');

    oci_bind_by_name($stmt, ':p_id_producto', $id_producto);
  
    $result = oci_execute($stmt);
    if (!$result) {
        $e = oci_error($stmt);
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    oci_free_statement($stmt);
    oci_close($conn);

    return $result;
}
    
   function get_productos_id($id_producto) {
        
        $conn = conectarOracle();
    
        if (!$conn) {
            return false;
        }
        // Preparar la consulta
        $query = "SELECT * FROM productos WHERE id_producto = :id_producto";
        
        $stid = oci_parse($conn, $query);
        
        // Asignar valor al parámetro :id_producto
        oci_bind_by_name($stid, ':id_producto', $id_producto);
        
        // Ejecutar la consulta
        oci_execute($stid);
        
        // Fetch resultados
        $productos = array();
        while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
        $articulo = array(
        'ID_PRODUCTO' => $row['ID_PRODUCTO'],
        'NOMBRE' => $row['NOMBRE'],
        'PRECIO' => $row['PRECIO'],
        'STOCK' => $row['STOCK'],
        'IMAGEN' => $row['IMAGEN'],
        'DESCRIPCION' => $row['DESCRIPCION'],
        );
    $productos[] = $articulo;
}
        oci_close($conn);
        return $productos;
    }

    function busqueda($term) {
        $conn = conectarOracle();
    
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    
        $term = strtolower($term);
    
        $query = "SELECT * FROM productos WHERE LOWER(nombre) LIKE '%' || :term || '%'";
    
        $stmt = oci_parse($conn, $query);
    
        oci_bind_by_name($stmt, ":term", $term);
    
        oci_execute($stmt);
    
        $resultados = array();
        while ($row = oci_fetch_assoc($stmt)) {
            $resultados[] = $row;
        }
    

        oci_free_statement($stmt);
        oci_close($conn);
    
        return $resultados;
    }    
?>