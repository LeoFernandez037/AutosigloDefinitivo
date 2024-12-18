<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autosiglo</title>
    <link rel="stylesheet" href="./cssPrincipal/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
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
            <div class="title-car-section">
                <div class="car-title">
                    <h2>AUTOS "O KM"</h2>
                </div>
                <div class="marca1">
                    <img src="./imagenes/AudiLogo.png" alt="AudiLogo">
                </div>
                <div class="marca2">
                    <img src="./imagenes/BenzLogo.png" alt="BenzLogo">
                </div>
                <div class="marca3">
                    <img src="./imagenes/BMWLogo.png" alt="BWMLogo">
                </div>
                <div class="marca4">
                    <img src="./imagenes/VolswoganLogo.png" alt="VolswoganLogo">
                </div>
                <div class="marca5">
                    <img src="./imagenes/HyundaiLogo.png" alt="HyundayLogo">
                </div>
                <div class="marca6">
                    <img src="./imagenes/SuzukiLogo.png" alt="Suzuki">
                </div>
            </div>
            <div class="car-carousel" id="car-carousel">
                <form action=""></form>
                <?php
                $query = "SELECT auto.ID_AUTO, auto.NOMBRE, auto.PRECIO, foto_auto.FOTOGRAFIA FROM auto JOIN foto_auto WHERE auto.ID_AUTO = foto_auto.ID_AUTO";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="car-card" id="car-card">
                        <a href="cotizacion.php?id=<?php echo $row['ID_AUTO'] ?>" class="webada">
                           <div class="car-info">
                                <h3><?php echo $row['NOMBRE'] ?></h3>
                            </div>
                            <div class="autofot">
                                <img src="<?php echo $row['FOTOGRAFIA'] ?>" alt="Suzuki Alto">
                            </div>
                            <div class="car-info">
                                <p>Precio: <?php echo $row['PRECIO'] ?>$</p>
                            </div>
                            <div class="car-info">
                                <button type="submit" class="boton-informacion">Más Información</button>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <button class="boton-carrusel boton-anterior" id="botonAnterior" aria-label="Anterior imagen">&lt;</button>
            <button class="boton-carrusel boton-siguiente" id="botonSiguiente"
                aria-label="Siguiente imagen">&gt;</button>
        </section>

        <!-- <section class="features">
            <div class="feature">   
                <h3>Calidad</h3>
                <p>Nuestro compromiso con la excelencia garantiza que cada vehículo y servicio que ofrecemos cumpla con los más altos estándares de calidad.</p>
            </div>
            <div class="feature">
                <h3>Centrado en el cliente</h3>
                <p>Ponemos a nuestros clientes en primer lugar, esforzándonos por superar las expectativas y brindar un servicio incomparable en cada punto de contacto.</p>
            </div>
        </section> -->

        <section class="car-section2">
            <div class="title-car-section">
                <div class="car-title">
                    <h2>AUTOS "USADOS"</h2>
                </div>
                <div class="marca1">
                    <img src="./imagenes/AudiLogo.png" alt="AudiLogo">
                </div>
                <div class="marca2">
                    <img src="./imagenes/BenzLogo.png" alt="BenzLogo">
                </div>
                <div class="marca3">
                    <img src="./imagenes/BMWLogo.png" alt="BWMLogo">
                </div>
                <div class="marca4">
                    <img src="./imagenes/VolswoganLogo.png" alt="VolswoganLogo">
                </div>
                <div class="marca5">
                    <img src="./imagenes/HyundaiLogo.png" alt="HyundayLogo">
                </div>
                <div class="marca6">
                    <img src="./imagenes/SuzukiLogo.png" alt="Suzuki">
                </div>
            </div>
            <div class="car-carousel2" id="car-carousel2">
                <?php
                $query = "SELECT auto.ID_AUTO, auto.NOMBRE, auto.PRECIO, foto_auto.FOTOGRAFIA FROM auto JOIN foto_auto WHERE auto.ID_AUTO = foto_auto.ID_AUTO";
                $resultado = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <div class="car-card" id="car-card2">
                        <a href="cotizacion.php?id=<?php echo $row['ID_AUTO'] ?>" class="webada">
                           <div class="car-info">
                                <h3><?php echo $row['NOMBRE'] ?></h3>
                            </div>
                            <div class="autofot">
                                <img src="<?php echo $row['FOTOGRAFIA'] ?>" alt="Suzuki Alto">
                            </div>
                            <div class="car-info">
                                <p>Precio: <?php echo $row['PRECIO'] ?>$</p>
                            </div>
                            <div class="car-info">
                                <button type="submit" class="boton-informacion">Más Información</button>
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
            <div class="title-payment">
                <h2>TIPOS DE PAGO</h2>
                <img src="./imagenes/FondoDinero.png" alt="Fondo" class="fondo-pagos1">
                <img src="./imagenes/FondoDinero.png" alt="Fondo" class="fondo-pagos2">
                <img src="./imagenes/FondoDinero.png" alt="Fondo" class="fondo-pagos3">
            </div>
            <div class="payment-tarjets">
                <p>LA EMPRESA AUTOSIGLO SE PREOCUPA POR TU BOLSILLO POR ESA RAZÓN TENEMOS LAS SIGUIENTES FORMAS DE PAGO
                </p>
                <div class="payment-grid">
                    <div class="payment-card">
                        <div class="titulo-pag">
                            <h3>AL CONTADO</h3>
                            <img src="./imagenes/dinero-en-efectivo.png" alt="Pago en efectivo">
                        </div>
                        <p>Con nuestra opción de pago al contado te permite adquirir tu vehículo de forma rápida, con
                            entrega inmediata y descuentos exclusivos. Una opción ágil para quienes prefieren una compra
                            directa.</p>
                    </div>
                    <div class="payment-card">
                        <div class="titulo-pag">
                            <h3>FINANCIAMIENTO</h3>
                            <img src="./imagenes/financiamiento.png" alt="Pago con tarjeta de crédito">
                        </div>
                        <p>Con nuestra opción de financiamiento, puedes adquirir tu auto y pagarlo en cómodas cuotas a
                            través del banco. Disfruta de un proceso simple y asesoría personalizada para elegir el plan
                            ideal.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="nosotros">
            <div class="nosotros-titulo">
                <h2>QUIENES SOMOS</h2>
            </div>
            <div class="nosotros-cuerpo">
                <div class="nosotros-card">
                    <p>En AutoSiglo, somos una concesionaria de autos comprometida con ofrecerte las mejores opciones en
                        vehículos nuevos y usados, adaptados a tus necesidades y estilo de vida. Con años de experiencia
                        en el mercado automotriz, nos destacamos por brindar un servicio personalizado, confiable y
                        transparente, asegurando que cada uno de nuestros clientes encuentre el automóvil perfecto.</p>
                    <img src="./imagenes/QuienesSomos.jpg" alt="Imagen.png">
                </div>
            </div>
            <div class="nosotros-titulo">
                <h2>¿QUÉ OFRECEMOS</h2>
            </div>
            <div class="nosotros-cuerpo">
                <div class="nosotros-card2">
                    <img src="./imagenes/QOfrecemos.png" alt="Imagen.png">
                    <p>Nos enorgullece ofrecer una amplia variedad de productos y servicios, que van desde vehículos
                        nuevos y usados, hasta servicios y mantenimiento asequibles. Además de ofrecer una variedad de
                        servicios, creemos brindar una experiencia personalizada quele brinde flexibilidad, por lo que
                        también ofrecemos una variedad de opciones de pagos, asi como garantías de los vehículos.</p>
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