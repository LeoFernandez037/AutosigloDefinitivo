<?php include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT caracteristicas.TRANSMISION, caracteristicas.SUSPENSION_DELANTERA, caracteristicas.SUSPENSION_TRASERA, caracteristicas.FRENOS_DELANTEROS, caracteristicas.FRENOS_TRASEROS, auto.NOMBRE, auto.PRECIO, foto_auto.FOTOGRAFIA FROM caracteristicas JOIN auto JOIN foto_auto WHERE foto_auto.ID_AUTO = auto.ID_AUTO AND auto.ID_AUTO = caracteristicas.ID_CARACTERISTICA AND auto.ID_AUTO = $id";
    $resultado = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($resultado);
};
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizacion - AUTOSIGLO</title>
    <link rel="stylesheet" href="./cssPrincipal/cotizacion.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img class="logotipo" src="./imagenes/logo.png" alt="AUTOSIGLO logo">
            </div>
            <div class="nav-links">
                <a href="index.php">Inicio</a>
                <a href="equipo.php">Empleados</a>
                <a href="contacto.php">Contacto</a>
                <a href="login.php" class="ingresar">Ingresar</a>
            </div>
        </nav>
    </header>
    <main>
        <div class="car-details">
            <div class="car-image">
                <img src="<?php echo $row['FOTOGRAFIA']; ?>" alt="<?php echo $row['NOMBRE']; ?>">
            </div>
            <div class="car-info">
                <h2><?php echo $row['NOMBRE']; ?></h2>
                <p><strong>Año:</strong> 2024</p>
                <p><strong>Precio:</strong> $<?php echo $row['PRECIO']; ?></p>
                <div class="car-specs">
                    <div class="data">
                        <div class="spec">
                            <div class="spec-value"><?php echo $row['TRANSMISION']; ?></div>
                            <div class="spec-label">Transmision</div>
                        </div>
                        <div class="spec">
                            <div class="spec-value"><?php echo $row['SUSPENSION_DELANTERA']; ?></div>
                            <div class="spec-label">Suspension Delantera</div>
                        </div>
                        <div class="spec">
                            <div class="spec-value"><?php echo $row['SUSPENSION_TRASERA']; ?></div>
                            <div class="spec-label">Suspencion Trasera</div>
                        </div>
                    </div>
                    <div class="data">
                        <div class="spec">
                            <div class="spec-value"><?php echo $row['FRENOS_DELANTEROS']; ?></div>
                            <div class="spec-label">Frenos delanteros</div>
                        </div>
                        <div class="spec">
                            <div class="spec-value"><?php echo $row['FRENOS_TRASEROS']; ?></div>
                            <div class="spec-label">Frenos Traseros</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>NAVEGACION</h3>
                <ul>
                    <li>Inicio</li>
                    <li>Nosotros</li>
                    <li>Contáctenos</li>
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