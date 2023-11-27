<?php
require_once "../../includes/config.php";
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
} else if ($_SESSION['user']['rol_id'] != 2) {
    header('Location:home.php');
}

$page = "Inicio";
$section = "administracion/verproductos";
require_once "../../views/layout2.php";
