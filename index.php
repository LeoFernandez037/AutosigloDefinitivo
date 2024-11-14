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
            <div class="car-carousel" id="car-carousel">
                <form action=""></form>
                <?php
                $query = "SELECT auto.ID_AUTO, auto.NOMBRE, auto.PRECIO, foto_auto.FOTOGRAFIA FROM auto JOIN foto_auto WHERE auto.ID_AUTO = foto_auto.ID_AUTO";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="car-card" id="car-card">
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
            <button class="boton-carrusel boton-anterior" id="botonAnterior" aria-label="Anterior imagen">&lt;</button>
            <button class="boton-carrusel boton-siguiente" id="botonSiguiente"
                aria-label="Siguiente imagen">&gt;</button>
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

        <section class="car-section2">
            <h2>Autos 0-KM</h2>
            <div class="car-carousel2" id="car-carousel2">
                <?php
                $query = "SELECT auto.ID_AUTO, auto.NOMBRE, auto.PRECIO, foto_auto.FOTOGRAFIA FROM auto JOIN foto_auto WHERE auto.ID_AUTO = foto_auto.ID_AUTO";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="car-card" id="car-card2">
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
            <button class="boton-carrusel2 boton-anterior2" id="botonAnterior2"
                aria-label="Anterior imagen">&lt;</button>
            <button class="boton-carrusel2 boton-siguiente2" id="botonSiguiente2"
                aria-label="Siguiente imagen">&gt;</button>
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
    <script>
        const carrusel = document.getElementById('car-carousel');
        const tarjetas = carrusel.querySelectorAll('#car-card');
        const botonAnterior = document.getElementById('botonAnterior');
        const botonSiguiente = document.getElementById('botonSiguiente');
        let currentIndex = 0;
        const totalTarjetas = tarjetas.length;

        const carrusel2 = document.getElementById('car-carousel2');
        const tarjetas2 = carrusel2.querySelectorAll('#car-card2');
        const botonAnterior2 = document.getElementById('botonAnterior2');
        const botonSiguiente2 = document.getElementById('botonSiguiente2');
        let currentIndex2 = 0;
        const totalTarjetas2 = tarjetas2.length;

        function moverCarrusel(direccion) {
            currentIndex = (currentIndex + direccion + totalTarjetas) % totalTarjetas;
            actualizarCarrusel();
        }
        function moverCarrusel2(direccion2) {
            currentIndex2 = (currentIndex2 + direccion2 + totalTarjetas2) % totalTarjetas2;
            actualizarCarrusel2();
        }

        function actualizarCarrusel() {
            const desplazamiento = -currentIndex * 320; // 300px de ancho + 20px de margen
            carrusel.style.transform = `translateX(${desplazamiento}px)`;
        }
        function actualizarCarrusel2() {
            const desplazamiento2 = -currentIndex2 * 320; // 300px de ancho + 20px de margen
            carrusel2.style.transform = `translateX(${desplazamiento2}px)`;
        }

        botonAnterior.addEventListener('click', () => moverCarrusel(-1));
        botonSiguiente.addEventListener('click', () => moverCarrusel(1));
        botonAnterior2.addEventListener('click', () => moverCarrusel2(-1));
        botonSiguiente2.addEventListener('click', () => moverCarrusel2(1));

        // Manejar teclas de flecha izquierda y derecha
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                moverCarrusel(-1);
            } else if (e.key === 'ArrowRight') {
                moverCarrusel(1);
            }
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                moverCarrusel2(-1);
            } else if (e.key === 'ArrowRight') {
                moverCarrusel2(1);
            }
        });

        // Ajustar el carrusel al cambiar el tamaño de la ventana
        window.addEventListener('resize', actualizarCarrusel);
        window.addEventListener('resize', actualizarCarrusel2);

        // Inicializar el carrusel
        actualizarCarrusel();
        actualizarCarrusel2();
    </script>
</body>

</html>