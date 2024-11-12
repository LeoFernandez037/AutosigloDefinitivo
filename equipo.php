<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados - Autosiglo</title>
    <link rel="stylesheet" href="./cssPrincipal/equipo.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img class="logotipo" src="./imagenes/logo.png" alt="AUTOSIGLO logo">
            </div>
            <div class="nav-links">
                <a href="index.php">Inicio</a>
                <a href="equipo.php"><u><strong>Empleados</strong></u></a>
                <a href="contacto.php">Contacto</a>
                <a href="login.php" class="ingresar">Ingresar</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="empleados">
            <h1>Empleados</h1>
            <div class="empleados-grid">
                <?php
                $query = "SELECT empleado.FOTO, persona.NOMBRES FROM empleado JOIN persona WHERE empleado.ID_PERSONA = persona.ID_PERSONA";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class='empleado-card'>
                        <img src="<?php echo $row['FOTO'] ?>" alt="Foto de <?php echo $row['NOMBRES'] ?>">
                        <div class="titulo">
                            <h2><?php echo $row['NOMBRES'] ?></h2>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>NAVEGACION</h3>
                <ul>
                    <li>Inicio</li>
                    <li>Nosotros</li>
                    <li>Contáctenos</li>
                    <li>Cotizar</li>
                    <li>Donale</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>HORARIOS</h3>
                <ul>
                    <li>Lunes a Viernes: 9:00 AM - 6:00 PM</li>
                    <li>Sábados: 9:00 AM - 2:00 PM</li>
                    <li>Domingos: Cerrado</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>LEGAL</h3>
                <ul>
                    <li>Info General</li>
                    <li>Términos de servicio</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>CONTÁCTANOS</h3>
                <ul>
                    <li>Dirección: Av. Revolución 1234</li>
                    <li>Col. Moderna, 12345</li>
                    <li>Ciudad de Baja, Baja</li>
                    <li>Teléfono: +52 (55) 1234 5678</li>
                    <li>Email: info@autosiglo.com</li>
                </ul>
            </div>
        </div>
        <div class="footer-for" style="text-align: center; margin-top: 2rem;">
            <p>© 2024 Los pipoquitas. Todos los derechos reservados.</p>
            <p>AUTOSIGLO</p>
        </div>
    </footer>
</body>

</html>