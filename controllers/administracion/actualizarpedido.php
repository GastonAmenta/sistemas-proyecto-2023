<?php
require_once "../../includes/config.php";
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
} else if ($_SESSION['user']['rol_id'] != 2) {
    header('Location:home.php');
} else if (!isset($_GET['id'])) {
    header("Location:../administracion.php");
}
$id = $_GET['id'];

$sqlActualizar = "UPDATE pedidos SET fecha_retiro = now() WHERE id= $id";
$resultActualizar = mysqli_query($conn, $sqlActualizar);
if (!$resultActualizar) {
    die("Error de consulta: " . mysqli_error($conn));
} else {
    header("Location:verpedidos.php");
}



if (isset($_GET['type'])) {
    $sqlActualizar = "UPDATE pedidos SET fecha_baja = now() WHERE id= $id";
    $resultActualizar = mysqli_query($conn, $sqlActualizar);
    if (!$resultActualizar) {
        die("Error de consulta: " . mysqli_error($conn));
    } else {
        header("Location:verpedidos.php");
    }
}
