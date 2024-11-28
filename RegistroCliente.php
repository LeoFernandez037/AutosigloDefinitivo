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
$ApPaterno = $_POST['ApPaterno'];
$ApMaterno = $_POST['ApMaterno'];
$email = $_POST['email'];
$nik = $_POST['nik'];
$tel = $_POST['tel'];
$ci = $_POST['ci'];
$contraseña = $_POST['Contraseña'];
$confirm_password = $_POST['confirm_password'];

$errores = [];

if (empty($nombre) || empty($ApPaterno) || empty($ApMaterno) || empty($email) || empty($nik) || empty($contraseña) || empty($confirm_password)) {
    $errores[] = "Todos los campos son obligatorios.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El formato del correo electrónico no es válido.";
}

if ($contraseña !== $confirm_password) {
    $errores[] = "Las contraseñas no coinciden.";
}

if (count($errores) > 0) {
    echo "<h3>Error en el registro:</h3>";
    foreach ($errores as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    echo "<p><a href=clientesadmin.php?id=<?php echo $id?>'>Volver al formulario de registro</a></p>";
    exit();
}

$conn->begin_transaction();

try {
    $sql_persona = "INSERT INTO PERSONA (NOMBRES, AP_PATERNO, AP_MATERNO, CORREO_ELECTRONICO, TELEFONO, CI) 
                    VALUES ('$nombre', '$ApPaterno', '$ApMaterno', '$email', '$tel', '$ci')";
    if ($conn->query($sql_persona) === TRUE) {
        $id_persona = $conn->insert_id;
        $sql_usuario = "INSERT INTO USUARIO (ID_PERSONA, NICKNAME, CONTRASEÑA, ID_ROL)
                        VALUES ('$id_persona', '$nik', '$contraseña', 1)";
        if ($conn->query($sql_usuario) === TRUE) {
            $conn->commit();
            header("Location: clientesadmin.php?id=$id");
            exit();
        } else {
            $conn->rollback();
            echo "Error al registrar el usuario: " . $conn->error;
        }
    } else {
        $conn->rollback();
        echo "Error al registrar la persona: " . $conn->error;
    }
} catch (Exception $e) {
    $conn->rollback();
    echo "Excepción: " . $e->getMessage();
}

$conn->close();
