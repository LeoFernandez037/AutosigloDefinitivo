<?php 
// $servidor = "localhost"; 
// $usuario = "root";
// $contrasena = ""; 
// $dbname = "db_autosiglo_v2";

// $conn = new mysqli($servidor, $usuario, $contrasena, $dbname);

// if ($conn->connect_error) {
//     die("Conexión fallida: " . $conn->connect_error);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $nik = $_POST['nik'];
//     $password = $_POST['password'];

//     $sql = "SELECT * FROM USUARIO WHERE NICKNAME = ? AND CONTRASEÑA = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ss", $nik, $password); 
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         session_start(); 
//         $user = $result->fetch_assoc(); 

//         $_SESSION['usuario'] = $nik; 
//         $_SESSION['rol'] = $user['ID_ROL']; 

//         switch ($user['ID_ROL']) {
//             case 1: //Usuario
//                 header("Location: CotizarRegis.php");
//                 break;
//             case 2: //Empleado
//                 header("Location: EditarPerfil.html");
//                 break;
//             case 3: //Administrador
//                 header("Location: Registro.html");
//                 break;
//             default:
//                 header("Location: index.php");
//                 break;
//         }
//         exit(); 
//     } else {
//         header("Location: login.php?error=1");
//         exit();
//     }
    
//     $stmt->close();
// }

// $conn->close();

session_start(); // Iniciar sesión al comienzo del archivo

$servidor = "localhost"; 
$usuario = "root";
$contrasena = ""; 
$dbname = "db_autosiglo_v2";

$conn = new mysqli($servidor, $usuario, $contrasena, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM USUARIO WHERE NICKNAME = ? AND CONTRASEÑA = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nik, $password); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); 
        $_SESSION['usuario'] = $nik; 
        $_SESSION['id_usuario'] = $user['ID_PERSONA']; // Guardar ID_USUARIO
        $_SESSION['rol'] = $user['ID_ROL']; 
        
        switch ($user['ID_ROL']) {
            case 1: // Usuario
                header("Location: index.php");
                break;
            case 3: // Empleado
                header("Location: empleado.php?id=".urlencode($_SESSION['id_usuario'])); // Asegúrate de redirigir correctamente
                break;
            case 5: // Administrador
                header("Location: admi.php?id=".urlencode($_SESSION['id_usuario'])); 
                break;
            default:
                header("Location: index.php");
                break;
        }
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
    
    $stmt->close();
}

$conn->close();
