<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flexo del Valle</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/flexovalle.css">
</head>

<body>
  <?php include ("../components/nav2.php"); ?>
  <br><br><br><br>
  <div class="info">
    <div class="info-section">
      <div class="text-content">
        <h1>Flexo <span>del Valle</span></h1>
        <p>Av. Insurgentes Sur 866, Col. Del Valle Centro, Benito Juárez, CDMX, C.P. 03100</p>
        <p>Ubicado en una de las zonas más tranquilas de nuestra ciudad y alejado del caos de la zona centro, Flexo Del
          Valle es nuestra nueva sede en un edificio LEED rodeado de parques y recintos culturales, convirtiéndolo en un
          lugar para trabajar con tranquilidad y comodidad.</p>
      </div>
      <div class="carousel">
        <img src="../img/Del-Valle1-scaled.jpg" alt="Flexo del Valle - Image 1" class="carousel-image visible">
        <img src="../img/Del-Valle3-scaled.jpg" alt="Flexo del Valle - Image 2" class="carousel-image">
        <img src="../img/Del-Valle4-scaled.jpg" alt="Flexo del Valle - Image 3" class="carousel-image">
        <button class="prev">❮</button>
        <button class="next">❯</button>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="location">
      <h2>Ubicación</h2>
      <p>Flexo del Valle</p>
      <p>Av. Insurgentes Sur 866, Col del Valle Centro, Benito Juárez, 03100 Ciudad de México, CDMX</p>
      <div id="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d963475.055997949!2d-99.17420200000001!3d19.387571!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff10b1ca5937%3A0xf734b8d6cbd3af86!2sFlexoffices%20Del%20Valle!5e0!3m2!1ses!2smx!4v1717047426318!5m2!1ses!2smx"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="contactanos">
      <h2>¡Contáctanos! Nos encantaría ayudarte.</h2>
      <form action="#" method="POST">
        <label for="nombre">Tu nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Tu correo</label>
        <input type="email" id="correo" name="correo" required>

        <label for="telefono">Tu teléfono</label>
        <input type="tel" id="telefono" name="telefono" required>

        <label for="servicio">Servicio de Interés*</label>
        <select id="servicio" name="servicio" required>
          <option disabled selected>Elige una opción</option>
          <option value="opcion1">Opción 1</option>
          <option value="opcion2">Opción 2</option>
        </select>

        <label for="sede">Sede de Interés*</label>
        <select id="sede" name="sede" required>
          <option disabled selected>Elige una opción</option>
          <option value="opcion1">Opción 1</option>
          <option value="opcion2">Opción 2</option>
        </select>

        <label for="empresa">Empresa (Opcional)</label>
        <input type="text" id="empresa" name="empresa">

        <label for="posiciones">Número de posiciones (Opcional)</label>
        <input type="number" id="posiciones" name="posiciones">

        <label for="comentarios">Comentarios (Opcional)</label>
        <textarea id="comentarios" name="comentarios"></textarea>

        <button type="submit">Enviar mensaje</button>
      </form>
    </div>
  </div>
  <br><br>

  <?php
  include ("../components/footer.php")
    ?>
</body>

</html>