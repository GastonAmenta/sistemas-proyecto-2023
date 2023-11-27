<?php 
require_once "../../includes/config.php";

$sqlCantProductos = "SELECT * FROM productos WHERE fecha_baja IS NULL";
$resultCantProductos = mysqli_query($conn, $sqlCantProductos);
// AGREGAR messege Err

// CANTIDAD DE PRODUCTOS
$CantProductos = mysqli_num_rows($resultCantProductos);

// Despues se puede agregar paginador y muestra por categoria/busqueda

// DATA DE PRODUCTOS
$sqlProductos = "SELECT id, nombre, categoria, precio, talle, imagen_1, stock, fecha_alta FROM productos WHERE fecha_baja IS NULL";
$resultProductos = mysqli_query($conn, $sqlProductos);
// AGREGAR messege Err

if (!$resultProductos) {
    die("Error de consulta: " . mysqli_error($conn));
    // AGREGAR messege Err
}

$rowProductos = mysqli_fetch_all($resultProductos, MYSQLI_ASSOC);

$messege = [
    'messege' => 'Exito',
    'cantProductos' => $CantProductos,
    'data' => $rowProductos
];

return print_r(json_encode($messege));
?>

?>