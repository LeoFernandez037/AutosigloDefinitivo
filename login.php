<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="./cssPrincipal/InicioS.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <h1>IMPORTADORA</h1>
    <h2>AUTOSIGLO</h2>
    <div class="login-container">
        <a href="index.php" class="icon-link">
            <img src="./Imagenes/atras.png" alt="Salir" class="icon-image">
        </a>
        <div class="login-box">
            <h3>Inicio de sesión</h3>
            <p>Bienvenido de nuevo</p>
            <?php
            if (isset($_GET['error'])) {
                echo "<p style='color: red;'>Datos incorrectas. Inténtalo de nuevo.</p>";
            }
            ?>
            <form action="login3.php" method="POST">
                <label for="nik">Nickname:</label>
                <input type="text" id="nik" name="nik" placeholder="Su alias" required>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" placeholder="Su contraseña" required>
                <button type="submit">Acceso</button>
            </form>
            <p>Si no tiene una cuenta <a href="Registro.html" style="color: red">Registrese</a></p>
        </div>
    </div>
    <img src="./Imagenes/1.png" alt="Auto" class="auto_derecha">
    <img src="./Imagenes/2.png" alt="Auto2" class="auto_izquierda">
</body>

</html>