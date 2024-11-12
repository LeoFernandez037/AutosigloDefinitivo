<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autosiglo</title>
    <link rel="stylesheet" href="./cssPrincipal/index.css">
</head>

<body>
    <?php include('header.php') ?>
    <main>
        <section class="hero">
            <div class="hero-text">
                <h1>Conseguir tu nuevo vehiculo con Autosiglo es Fácil</h1>
                <p>Olvídese de preocupaciones. Con los trámites adecuados y la ayuda de nuestros expertos logrará hacerlo de forma segura.</p>
            </div>
            <div class="hero-image">
                <img src="./imagenes/AutoPrincipal.png" alt="Auto naranja">
            </div>
        </section>

        <section class="car-section">
            <h2>Autos a medio uso</h2>
            <div class="car-carousel">
                <form action=""></form>
                <?php
                $query = "SELECT auto.ID_AUTO, auto.NOMBRE, auto.PRECIO, foto_auto.FOTOGRAFIA FROM auto JOIN foto_auto WHERE auto.ID_AUTO = foto_auto.ID_AUTO";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="car-card">
                        <a href="cotizacion.php?id=<?php echo $row['ID_AUTO'] ?>" class="webada">
                            <img src="<?php echo $row['FOTOGRAFIA'] ?>" alt="Suzuki Alto">
                            <div class="car-info">
                                <h3><?php echo $row['NOMBRE'] ?></h3>
                                <p>$<?php echo $row['PRECIO'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="features">
            <div class="feature">   
                <h3>Calidad</h3>
                <p>Nuestro compromiso con la excelencia garantiza que cada vehículo y servicio que ofrecemos cumpla con los más altos estándares de calidad.</p>
            </div>
            <div class="feature">
                <h3>Centrado en el cliente</h3>
                <p>Ponemos a nuestros clientes en primer lugar, esforzándonos por superar las expectativas y brindar un servicio incomparable en cada punto de contacto.</p>
            </div>
        </section>

        <section class="car-section">
            <h2>Autos 0-KM</h2>
            <div class="car-carousel">
                <?php
                $query = "SELECT auto.ID_AUTO, auto.NOMBRE, auto.PRECIO, foto_auto.FOTOGRAFIA FROM auto JOIN foto_auto WHERE auto.ID_AUTO = foto_auto.ID_AUTO";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="car-card">
                        <a href="cotizacion.php?id=<?php echo $row['ID_AUTO'] ?>" class="webada">
                            <img src="<?php echo $row['FOTOGRAFIA'] ?>" alt="Suzuki Alto">
                            <div class="car-info">
                                <h3><?php echo $row['NOMBRE'] ?></h3>
                                <p>$<?php echo $row['PRECIO'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>

        <section class="payment-types">
            <h2>Tipos de pago</h2>
            <div class="payment-grid">
                <div class="payment-card">
                    <img src="./imagenes/dinero-en-efectivo.png" alt="Pago en efectivo">
                    <h3>Efectivo</h3>
                </div>
                <div class="payment-card">
                    <img src="./imagenes/tarjeta-de-debito.png" alt="Pago con tarjeta de crédito">
                    <h3>Tarjeta de crédito</h3>
                </div>
                <div class="payment-card">
                    <img src="./imagenes/financiamiento.png" alt="Financiamiento">
                    <h3>Financiamiento</h3>
                </div>
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