<?php
require 'conn.php';

class Login
{
  private $conexion;

  public function __construct($con)
  {
    $this->conexion = $con;
  }

  public function verificarCredenciales($usuario, $contrasena)
  {
    // Preparar la consulta para evitar inyecciones SQL
    $stmt = $this->conexion->prepare("SELECT * FROM users WHERE user = ? AND password = ?");
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      header("Location: ../interfaces/dashboard.php");
      exit();
    } else {
      echo "<script>alert('Usuario o contraseña incorrectos.'); window.history.back();</script>";
    }

    $stmt->close();
  }
}


$login = new Login($con);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['password'];
  $login->verificarCredenciales($usuario, $contrasena);
}
?>