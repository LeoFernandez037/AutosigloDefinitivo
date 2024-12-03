<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - AUTOSIGLO</title>
    <link rel="stylesheet" href="./cssPrincipal/contacto.css">
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
                <a href="contacto.php"><u><strong>Contacto</strong></u></a>
                <a href="login.php" class="ingresar">Ingresar</a>
            </div>
        </nav>
    </header>
    <div class="patitulo">
        <div class="titulo-contacto">
            <h1>Contactenos</h1>
        </div>
    </div>
    <main>
        <div class="contact-form">
            <h2>Mandanos un mensaje</h2>
            <form method="POST" action="https://formsubmit.co/andres10000fky@gmail.com">
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Mensaje" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Enviar</button>
                <input type="hidden" name="_next" value="https://localhost/AutosigloDefinitivo/contacto.php">
                <input type="hidden" name="_captcha" value="false">
            </form>
        </div>

        <div class="contact-info">
            <div class="info">
                <h4>Visitanos en:</h4>
                <p><strong>Dirección</strong><br>
                    Av. Revolución 1234 y Col. Moderna, 12345<br>
                    Ciudad de La Paz, Bolivia</p>
                <h4>Teléfono</h4>
                <p>+591 72345678</p>
                <h4>Email</h4>
                <p>info@autosiglo.com</p>
                <h4>Horario de Atención</h4>
                <p>Lunes a Viernes: 9:00 AM - 6:00 PM<br>
                    Sábados: 10:00 AM - 2:00 PM<br>
                    Domingos: <span style="color: #dc3545;">Cerrado</span></p>
            </div>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15304.059920241021!2d-68.12141121570261!3d-16.474779138675412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f210f6de24a71%3A0x607ebc6d88a0162c!2sIMPORTADORA%20AUTOSIGLO%20S.R.L.!5e0!3m2!1ses!2sbo!4v1729558181998!5m2!1ses!2sbo"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </main>
    <?php include('footer.php') ?>
</body>

</html>