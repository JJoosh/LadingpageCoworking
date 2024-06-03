<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Contraseña</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="contactanos">
    <h2>Recuperar Contraseña</h2>
    <form action="../controllers/recovery.php" method="POST" onsubmit="return validarCampos()">
      <div class="logo">
        <img src="../img/logo.png" alt="Logo de la Empresa" style="max-width: 100%; height: auto; display: block; margin: 20px auto;">
      </div>
      <label for="email">Correo Electrónico</label>
      <input type="email" id="email" name="email" required>

      <button type="submit">Enviar</button>
      <a href="login.php" class="back-to-login">Volver a Iniciar Sesión</a>
    </form>
  </div>
  <script src="../js/fieldsempty.js"></script>
</body>
</html>
