<?php
require 'conn.php';
session_start();

class PasswordRecovery
{
  private $conexion;

  public function __construct($con)
  {
    $this->conexion = $con;
  }

  public function enviarCorreoRecuperacion($email)
  {
    $stmt = $this->conexion->prepare("SELECT * FROM users WHERE email = ?");
    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $this->conexion->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $usuario = $result->fetch_assoc();
      $token = bin2hex(random_bytes(50)); 
      $stmt = $this->conexion->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
      if ($stmt === false) {
          die('Error al preparar la consulta de actualización: ' . $this->conexion->error);
      }
      $stmt->bind_param("ss", $token, $email);
      $stmt->execute();

      $to = $email;
      $subject = "Recuperación de contraseña";
      $message = "Hola " . $usuario['user'] . ",\n\n";
      $message .= "Hemos recibido una solicitud para restablecer tu contraseña. Haz clic en el siguiente enlace para restablecerla:\n";
      $message .= "http://127.0.0.1/interfaces/recuperar.php?token=" . $token . "\n\n";
      $message .= "Si no solicitaste restablecer tu contraseña, puedes ignorar este correo electrónico.\n\n";
      $message .= "Gracias,\n";
      $message .= "El equipo de soporte de tecknysoluciones.com";

      $headers = "From: tecknysoluciones@gmail.com";

      if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.'); window.location.href = 'ruta_iniciar_sesion';</script>";
      } else {
        echo "<script>alert('Error al enviar el correo electrónico.'); window.history.back();</script>";
      }
    } else {
      echo "<script>alert('No se encontró una cuenta con ese correo electrónico.'); window.history.back();</script>";
    }

    $stmt->close();
  }
}

$passwordRecovery = new PasswordRecovery($con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $passwordRecovery->enviarCorreoRecuperacion($email);
}
?>
