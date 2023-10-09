<?php 
require_once "../includes/config.php";

if (!empty($_POST)){
    
    if($_POST['password'] == $_POST['conf_password']){

        
            $query_user = "INSERT INTO usuarios(nombre, apellido, nombre_usuario, rol, email, clave, fecha_nac, direccion, fecha_alta) 
            VALUES('". $_POST['dni']."' , '". $_POST['name']."' , '". $_POST['surname']."' , '". $_POST['email']."' , '". $_POST['birth_date']."' , '". sha1($_POST['password']) ."' , '". $_POST['cell_nmb']."' , '". $_POST['addres']."' , '". $_POST['cuil']."' , '". $_POST['select-register']."' , '". sha1($_POST['answer'])."' , now() );";    

            $result_user = mysqli_query($conn, $query_user);

            if(!$result_user){                
                die('Error de Consulta ' . mysqli_error($conn));
            }else{

            //$query_usuario_id = mysqli_insert_id($conn)
            // mysqli_insert_id($conn);
                    $sqlLogin = "SELECT * FROM usuarios WHERE DNI='" . $_POST['dni'] . "' ";
                    $resLogin = mysqli_query($conn, $sqlLogin);
                    if(!$resLogin){
                        die("Error de consulta: " . mysqli_error($conn));
                    }
                    if (mysqli_num_rows($resLogin) === 1){
                    $rowLogin = mysqli_fetch_array($resLogin, MYSQLI_ASSOC);
                
                    session_start();
                
                
                    $_SESSION["user"] = $rowLogin;
                   // print_r($_SESSION["user"]);
                    header('Location: home.php');
                    }
                }                        
            }
        }
    

$page = "Inicio";
$section = "register";
require_once "../views/layout.php";
