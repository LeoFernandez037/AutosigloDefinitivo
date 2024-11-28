<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$dbname = "db_autosiglo_v2";


//$id = 3; //valor enviado del login cambiandolo se mueve el usuario

$conn = new mysqli($servidor, $usuario, $contrasena, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$numerocha = $_POST['numerocha'];
$traccion = $_POST['traccion'];

$transmision = $_POST["transmision"];
$suspensiondel = $_POST["suspensiondel"];
$suspensiontras = $_POST["suspensiontras"];
$frenosdel = $_POST["frenosdel"];
$frenostras = $_POST["frenostras"];

$imagenurl = $_POST["url"];


$errores = [];



$conn->begin_transaction();

try {
    $sql_caracteristica = "INSERT INTO CARACTERISTICAS (TRANSMISION, SUSPENSION_DELANTERA, SUSPENSION_TRASERA, FRENOS_DELANTEROS, FRENOS_TRASEROS) 
                    VALUES ('$transmision', '$suspensiondel', '$suspensiontras', '$frenosdel', '$frenostras')";
                    echo $sql_caracteristica;
    if ($conn->query($sql_caracteristica) === TRUE) {
            $id_caracteristica = $conn->insert_id;
            $sql_auto = "INSERT INTO AUTO (NOMBRE, PRECIO, NUMERO_CHASIS, TRACCION, ID_CARACTERISTICA)
                            VALUES ('$nombre', '$precio','$numerocha','$traccion','$id_caracteristica')";
                            echo $sql_caracteristica;
        if ($conn->query($sql_auto) === TRUE) {
            $id_auto = $conn->insert_id;
            $sql_foto = "INSERT INTO FOTO_AUTO (ID_AUTO, FOTOGRAFIA)
                            VALUES ('$id_auto', '$imagenurl')";
            if ($conn->query($sql_foto) === TRUE) {
                echo $sql_caracteristica, $sql_auto, $sql_foto;

                $conn->commit();

                header("Location: autosadmin.php?id=$id");
                exit();
            } else {
                $conn->rollback();
                echo "Error al registrar la foto: " . $conn->error;
            }
        } else {
            $conn->rollback();
            echo "Error al registrar el auto: " . $conn->error;
        }
    } else {
        $conn->rollback();
        echo "Error al registrar la caracteristica: " . $conn->error;
    }
} catch (Exception $e) {
    $conn->rollback();
    echo "Excepción: " . $e->getMessage();
}

$conn->close();
