<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tecknys Cibles</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/flexovalle.css">
</head>

<body>
  <?php include ("../components/nav2.php"); ?>
  <br><br><br><br>
  <div class="info">
    <div class="info-section">
      <div class="text-content">
        <h1>Tecknys <span>Cibeles</span></h1>
        <p>Plaza Villa Madrid No. 1, Roma Norte, Cuauhtémoc, 06700 Ciudad de México, CDMX</p>
        <p>Ubicado en el centro artístico y culinario de la CDMX. Tecknys Cibeles es un edificio LEED de arquitectura
          moderna, con varios premios internacionales que motivará a tu empresa desarrollar la creatividad que buscas.
        </p>
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
      <p>Tecknys Cibeles</p>
      <p>
        Plaza Villa Madrid No. 1, Roma Norte, Cuauhtémoc, 06700 Ciudad de México, CDMX</p>
      <div id="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7524.989847828916!2d-99.181973!3d19.434217!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f8ac51538add%3A0xdf3b96c3258b9952!2sCalz.%20Gral.%20Mariano%20Escobedo%20438%2C%20Chapultepec%20Morales%2C%20Anzures%2C%20Miguel%20Hidalgo%2C%2011590%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1717080006059!5m2!1ses!2smx"
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