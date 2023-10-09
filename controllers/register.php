<?php 
require_once "../includes/config.php";

if (!empty($_POST)){
    
    if($_POST['password'] == $_POST['conf_password']){

        
            $query_user = "INSERT INTO usuarios(nombre, apellido, nombre_usuario, rol_id, email, clave, fecha_nac, direccion, fecha_alta) 
            VALUES('". $_POST['name']."' , '". $_POST['surname']."' , '". $_POST['username']."' ,'". 1 ."' ,'". $_POST['email']."', '". sha1($_POST['password']) ."' , '". $_POST['birth_date']."', '". $_POST['addres']."' , now() );";    

            $result_user = mysqli_query($conn, $query_user);

            if(!$result_user){                
                die('Error de Consulta ' . mysqli_error($conn));
            }else{

                    $sqlLogin = "SELECT * FROM usuarios WHERE email='" . $_POST['email'] . "' ";
                    $resLogin = mysqli_query($conn, $sqlLogin);
                    if(!$resLogin){
                        die("Error de consulta: " . mysqli_error($conn));
                    }
                    if (mysqli_num_rows($resLogin) === 1){
                    $rowLogin = mysqli_fetch_array($resLogin, MYSQLI_ASSOC);
                
                    session_start();
                                
                    $_SESSION["user"] = $rowLogin;

                    header('Location: home.php');
                    }
                }                        
            }
        }
        
$page = "Inicio";
$section = "register";
require_once "../views/layout.php";
