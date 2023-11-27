<?php 
require_once "../../includes/config.php";

if(!isset($_SESSION['user'])){
    header('Location:login.php');
}

$id = $_POST['id'];
$flag = $_POST['flag'];

if(isset($id) && isset($flag)){
    if($flag == 1){
        
        $sqlSelect = "SELECT * FROM productos WHERE id = ". $id ." ";
        $result = mysqli_query($conn,$sqlSelect);

        if(!$result){
            die("ERROR de consulta");
        }

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sqlInsert = "INSERT INTO pedidos(usuario_nombre, usuario_apellido, usuario_email, usuario_direccion, producto, fecha_despacho, fecha_llegada) VALUES('".$_SESSION['nombre']."', '".$_SESSION['apellido']."' , '".$_SESSION['email']."' , '".$_SESSION['direccion']."' , '".$data['nombre']."' ,now() , now())";
        $resultInsert= mysqli_query($conn, $resultInsert);
        if(!$resultInsert){
            die("Error de consulta 2: " . mysqli_error($conn));
        }

    }else if($flag == 0){

    }else{
        //en caso de error
    }
}


/* 
$messege = [
    'messege' => 'Exito',
    'cantProductos' => $CantProductos,
    'data' => $rowProductos
];

return print_r(json_encode($messege));
*/
?>