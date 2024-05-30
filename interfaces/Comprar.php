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
    <h1>Ingresa tus datos y tu comprobante</h1>
  </div>

  <div class="info-bancaria">
    <h2>Información Bancaria</h2>
    <p>Por favor, realiza un depósito a la siguiente cuenta bancaria antes de enviar tus datos:</p>
    <p><strong>Banco:</strong> Nombre del Banco</p>
    <p><strong>Cuenta:</strong> 1234567890</p>
    <p><strong>CLABE:</strong> 123456789012345678</p>
    <p><strong>Nombre del Beneficiario:</strong> Tecknys Soluciones</p>
  </div>
  <div class="contacts" id="contact">
    <div class="coworking-image">
      <img src="../img/coworking-1.png" alt="Espacio de coworking">
    </div>
    <div class="contactanos">
      <h2>¡Contáctanos!</h2>
      <form id="contactForm" action="../controllers/submit_comprar.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Tu nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Tu correo</label>
        <input type="email" id="correo" name="correo" required>

        <label for="telefono">Tu teléfono</label>
        <input type="tel" id="telefono" name="telefono" required>

        <label for="direccion">Tu dirección</label>
        <input type="text" id="direccion" name="direccion" required>

        <label for="servicio">Servicio de Interés*</label>
        <select id="servicio" name="servicio" required>
          <option disabled selected>Elige una opción</option>
          <?php
          include ("../controllers/conn.php"); 
          
          $sql = "SELECT id, nombre FROM Servicios";
          $result = $con->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
            }
          } else {
            echo '<option disabled>No hay servicios disponibles</option>';
          }
          $con->close();
          ?>
        </select>

        <label for="comentarios">Comentarios (Opcional)</label>
        <textarea id="comentarios" name="comentarios"></textarea>

        <label for="archivo">Sube tu archivo (Opcional)</label>
        <input type="file" id="archivo" name="archivo">

        <button type="submit" id="submitButton">Enviar mensaje</button>
      </form>
    </div>
  </div>

  <?php
  include ("../components/footer.php")
    ?>
</body>

</html>