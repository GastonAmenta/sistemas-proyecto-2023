<?php
require_once "../../includes/config.php";
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
} else if ($_SESSION['user']['rol_id'] != 2) {
    header('Location:home.php');
}

$sqlPedidos = "SELECT * FROM pedidos WHERE fecha_baja IS NULL";
$resultPedidos = mysqli_query($conn, $sqlPedidos);
if (!$resultPedidos) {
    die("Error de consulta: " . mysqli_error($conn));
}

    $rowPedidos = mysqli_fetch_all($resultPedidos, MYSQLI_ASSOC);



$page = "Inicio";
$section = "administracion/verpedidos";
require_once "../../views/layout2.php";
