<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="contactanos">
    <h2>Iniciar Sesión</h2>
    <form action="../controllers/submit_login.php" method="POST" onsubmit="return validarCampos()">
      <div class="logo">
        <img src="../img/logo.png" alt="Logo de la Empresa" style="max-width: 100%; height: auto; display: block; margin: 20px auto;">
      </div>
      <label for="usuario">Usuario</label>
      <input type="text" id="usuario" name="usuario" required>

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Entrar</button>
      <a href="recuperar.php" class="forgot-password">¿Olvidó su contraseña?</a>
    </form>
  </div>
  <script src="../js/fieldsempty.js"></script>
</body>
</html>
