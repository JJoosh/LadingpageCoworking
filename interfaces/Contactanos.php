<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tecknys del Valle</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/flexovalle.css">
</head>

<body>
  <?php include ("../components/nav2.php"); ?>
  <br><br><br><br>
  <div class="txtcontacnos">
    <h1>Contáctanos</h1>
  </div>
  <div class="contacts" id="contact">
    <div class="coworking-image">
      <img src="../img/coworking-1.png" alt="Espacio de coworking">
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
  </div>

  <?php
  include ("../components/footer.php")
    ?>
</body>

</html>