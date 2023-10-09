<?php 
require_once "../includes/config.php";

if (!empty($_POST)) {

    if (filter_var($_POST['identifier'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['identifier'];
    }else{
        $username = $_POST['identifier'];
    }

    $clave = $_POST['clave'];
    
    if(!empty($email)){
        $sqlLogin = "SELECT * FROM usuarios WHERE email ='" . trim($email) . "' AND clave='".sha1($clave)."' AND fecha_baja IS NULL";
        $resLogin = mysqli_query($conn, $sqlLogin);
    }else{
        $sqlLogin = "SELECT * FROM usuarios WHERE nombre_usuario ='" . trim($username) . "' AND clave='".sha1($clave)."' AND fecha_baja IS NULL";
        $resLogin = mysqli_query($conn, $sqlLogin);
    }
    
    if(!$resLogin){
        die("Error de consulta: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($resLogin) === 1){
    $rowLogin = mysqli_fetch_array($resLogin, MYSQLI_ASSOC);

    session_start();

    $_SESSION["user"] = $rowLogin;

    header('Location: home.php');
    }else{
        $error = "Los datos ingresados son incorrectos";
    }
}

$page = "Iniciar sesion";
$section = "login";
require_once "../views/layout.php";
?>