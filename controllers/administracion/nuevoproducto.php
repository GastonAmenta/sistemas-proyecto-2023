<?php
require_once "../../includes/config.php";
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
} else if ($_SESSION['user']['rol_id'] != 2) {
    header('Location:home.php');
}
if (!empty($_POST)) {
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $talle = $_POST['talle'];
    $stock = $_POST['stock'];
    //$imagen = $_FILES['imagen'];



    $sqlProducto = "INSERT INTO productos(nombre, categoria, precio, talle, stock) VALUES ('" . $nombre . "' , '" . $categoria . "' , '" . $precio . "' , '" . $talle . "' , '" . $stock . "')";

    $resultProducto = mysqli_query($conn, $sqlProducto);
    if (!$resultProducto) {
        die("Error de consulta: " . mysqli_error($conn));
    }

    $id_insertado = mysqli_insert_id($conn);

    if ($_FILES['imagen']['error'] > 0) {
        echo "error al cargar archivo";
    }

    $permitidos = array("image/png", "image/jpg", "image/jpeg", "image/JPEG");
    $limite_kb = 3000;

    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {

        $ruta = "../../images/productos/" . $id_insertado . "/";
        $nombre_archivo = $ruta . $_FILES['imagen']['name'];

        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }

        if (!file_exists($nombre_archivo)) {
            $resultado = @move_uploaded_file($_FILES['imagen']['tmp_name'], $nombre_archivo);
        } else {
            echo "archivo no permitido o excede limite";
        }
    }

    $sqlUpdateProducto = "UPDATE productos SET imagen_1 = '" . $nombre_archivo . "' WHERE id= $id_insertado";

    $resultUpdateProducto = mysqli_query($conn, $sqlUpdateProducto);
    if (!$resultUpdateProducto) {
        die("Error de consulta 2: " . mysqli_error($conn));
    }

    header("Location:../administracion.php");
}

//validaciones
/* if($_FILES['imagen']['error'] >0){
 echo"error al cargar archivo";
}

if ($resultado) {
                echo "Se guardo el archivo";
            } else {
                echo "no se guardó el archivo jaja";
            }
        } else {
            echo "archivo ya existe";
        }
*/
$page = "Inicio";
$section = "administracion/nuevoproducto";
require_once "../../views/layout2.php";
