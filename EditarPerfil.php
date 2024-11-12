<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$dbname = "db_autosiglo_v2";

$conn = new mysqli($servidor, $usuario, $contrasena, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Suponiendo que el cliente ya está logueado y su ID_USUARIO está almacenado en la sesión
session_start();
if (!isset($_SESSION['id_usuario'])) {
    die("Acceso no autorizado.");
}

$id_usuario = $_SESSION['id_usuario'];

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];  
    $foto = $_FILES['foto'];

    // Manejo de la foto de perfil
    if (!empty($foto['name'])) {
        $ruta_foto = "./Imagenes" . basename($foto["name"]);
        
        if (move_uploaded_file($foto["tmp_name"], $ruta_foto)) {
            $sql = "UPDATE USUARIO SET FOTO='$ruta_foto' WHERE ID_USUARIO='$id_usuario'";
            if ($conn->query($sql) === FALSE) {
                echo "Error al subir la foto: " . $conn->error;
            }
        } else {
            echo "Error al subir la foto.";
        }
    }

    // Actualizar el nickname y la contraseña
    $sql = "UPDATE USUARIO SET NICKNAME='$nickname', CONTRASEÑA='$password' WHERE ID_USUARIO='$id_usuario'";
    if ($conn->query($sql) === TRUE) {
        echo "Perfil actualizado correctamente.";
    } else {
        echo "Error al actualizar el perfil: " . $conn->error;
    }
}

$conn->close();
?>
