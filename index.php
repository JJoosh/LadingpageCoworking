<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecknys Offices</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="fondo1">
        <?php
        include ("components/nav.php")
            ?>
        <div class="hero" id="home">
            <div class="overlay"></div>
            <div class="hero-content">
                <h1>Oficinas flexibles</h1>
                <br>
                <a href="#contact" class="contact-button">Contáctanos</a>
            </div>
        </div>
    </div>

    <div class="location-section" id="location-section">
        <div class="cuadros">
            <h2>Nuestras ubicaciones</h2>
            <div class="location-card">
                <img src="img/Del-Valle1-scaled-1.jpg" alt="DelValle">

                <div class="location-info">
                    <h3>Tecknys
                        <span>del Valle</span>
                    </h3>
                    <p>Av. Insurgentes Sur 886, Col. Del Valle Centro, Benito Juárez, Merida, C.P. 98453</p>
                    <br>
                    <a class="conoce-mas" href="../interfaces/FlexoValle.php">Conoce más</a>
                </div>
            </div>
            <br>
        </div>
        <br><br><br><br>
        <div class="cuadrosVerticales">
            <div class="cuadro1">
                <img src="img/san-angel-flexo.png" alt="San Angel">
                <div class="contenido">
                    <h3>Tecknys <span>Polanco</span></h3>
                    <p>Blvd. Adolfo López Mateos 2112, Los Alpes, Álvaro Obregón, CDMX, C.P. 01010</p>
                    <a href="../interfaces/Polanco.php" class="boton">Conoce más</a>
                </div>
            </div>
            <div class="cuadro1">
                <img src="img/img-cibeles-0-rounded@2x-min.png" alt="San Angel">
                <div class="contenido">
                    <h3>Tecknys <span>Cibeles</span></h3>
                    <p>Blvd. Adolfo López Mateos 2112, Los Alpes, Álvaro Obregón, CDMX, C.P. 01010</p>
                    <a href="../interfaces/Cibales.php" class="boton">Conoce más</a>
                </div>
            </div>
            <div class="cuadro1">
                <img src="img/flexo-new-min.png" alt="San Angel">
                <div class="contenido">
                    <h3>Tecknys
                        <span>San Angel</span>
                    </h3>
                    <p>Blvd. Adolfo López Mateos 2112, Los Alpes, Álvaro Obregón, CDMX, C.P. 01010</p>
                    <a href="../interfaces/SanAngel.php" class="boton">Conoce más</a>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="spaces-section" id="spaces">
        <div class="fondoverde">
            <div class="history-block">
                <div class="history-content">
                    <h3>Oficina diseñada por ti (Enterprise)</h3>
                    <hr>
                    <p>Trabajamos de la mano contigo para diseñar, desarrollar y administrar tu espacio de trabajo
                        dando como resultado una oficina con tu propia imagen.</p>
                </div>
                <div>
                    <img src="img/img-enterprise-vertical@2x-min.png" alt="Office Design">
                </div>
            </div>
            <div class="history-block">
                <div>
                    <img src="img/img-meeting-room-vertical@2x-min.png" alt="Meeting Room">
                </div>
                <div class="history-content2">
                    <h3>Sala de junta y capacitación</h3>
                    <hr>
                    <p>Espacio acorde para tus reuniones privadas.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="planesdiv" id="planes">
        <h2>Nuestros Planes de Coworking</h2>
    </div>
    <?php
    include ("controllers/planes.php")
        ?>
    <div class="aboutus" id="aboutus">
        <h2>¿Por que Tecknys Soluciones?</h2>
        <div class="content">
            <div class="textous">
                <div>
                    <img src="img/vector.svg" alt="Vector derecho">
                </div>
                <p>
                    Tenemos espacios de trabajo flexibles que en conjunto con su diseño,
                    <br>
                    nuestro servicio y la agradable comunidad, garantizan la comodidad
                    <br>
                    y continuidad de tu empresa.
                </p>
                <div>
                    <img src="img/vector-right.svg" alt="Vector izquierdo">
                </div>
            </div>
        </div>
    </div>
    <br>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/IxRVa1DbSAg?si=V_O2VD5tnKblTbSr"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <br>
    <div class="contact" id="contact">
        <div class="coworking-image">
            <img src="img/coworking-1.png" alt="Espacio de coworking">
        </div>
        <div class="contactanos">
            <h2>¡Contáctanos! Nos encantaría ayudarte.</h2>
            <form id="contactForm" action="controllers/submit_contact.php" method="POST">
                <label for="nombre">Tu nombre</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="correo">Tu correo</label>
                <input type="email" id="correo" name="correo" required>

                <label for="telefono">Tu teléfono</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="direccion">Tu dirección</label>
                <input type="text" id="direccion" name="direccion" required>

                <label for="comentarios">Comentarios (Opcional)</label>
                <textarea id="comentarios" name="comentarios"></textarea>

                <button type="submit" id="submitButton">Enviar mensaje</button>
            </form>
        </div>
        <script src="js/animacionbtn.js"></script>
    </div>
    <br><br>

    <?php
    include ("components/footer.php")
        ?>
</body>

</html>