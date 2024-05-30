<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tecknys San Angel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/flexovalle.css">
</head>

<body>
  <?php include ("../components/nav2.php"); ?>
  <br><br><br><br>
  <div class="info">
    <div class="info-section">
      <div class="text-content">
        <h1>Tecknys <span>San Angel</span></h1>
        <p>Av. Insurgentes Sur 866, Col. Del Valle Centro, Benito Juárez, CDMX, C.P. 03100</p>
        <p>Ubicado en una de las zonas más tranquilas de nuestra ciudad y alejado del caos de la zona centro, Tecknys
          Del
          Valle es nuestra nueva sede en un edificio LEED rodeado de parques y recintos culturales, convirtiéndolo en un
          lugar para trabajar con tranquilidad y comodidad.</p>
      </div>
      <div class="carousel">
        <img src="../img/DSC6274-min.jpg" alt="Flexo del Valle - Image 1" class="carousel-image visible">
        <img src="../img/DSC6387-Editar-min-1.jpg" alt="Flexo del Valle - Image 2" class="carousel-image">
        <img src="../img/DSC6422-HDR-min.jpg" alt="Flexo del Valle - Image 3" class="carousel-image">
        <button class="prev">❮</button>
        <button class="next">❯</button>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="location">
      <h2>Ubicación</h2>
      <p>Tecknys San Angel</p>
      <p>Blvd. Adolfo López Mateos 2112, Los Alpes, Álvaro Obregón, CDMX, C.P. 01010</p>
      <div id="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7528.5604200785665!2d-99.196209!3d19.357016!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20018da1258d3%3A0x76cec86607187de0!2sBlvd.%20Adolfo%20L%C3%B3pez%20Mateos%202112%2C%20Los%20Alpes%2C%20%C3%81lvaro%20Obreg%C3%B3n%2C%2001010%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses-419!2smx!4v1717079460283!5m2!1ses-419!2smx"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="contactanos">
      <h2>¡Contáctanos! Nos encantaría ayudarte.</h2>
      <form id="contactForm" action="../controllers/submit_contact.php" method="POST">
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
  </div>
  <br><br>

  <?php
  include ("../components/footer.php")
    ?>
</body>

</html>