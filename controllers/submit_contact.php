<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $comentarios = $_POST['comentarios'];


  $sql = "INSERT INTO Contactanos (nombre, correo, telefono, direccion, comentarios) VALUES (?, ?, ?, ?, ?)";


  if ($stmt = $con->prepare($sql)) {
    $stmt->bind_param("sssss", $nombre, $correo, $telefono, $direccion, $comentarios);

    if ($stmt->execute()) {
      echo "<script>alert('Datos enviados correctamente.'); window.location.href='../index.php';</script>";
    } else {
      echo "<script>alert('Error: No se pudo enviar la información. " . $stmt->error . "'); window.location.href='../index.php;</script>";
    }

    $stmt->close();
  } else {
    echo "Error: No se pudo preparar la declaración. " . $con->error;
  }


  $con->close();
}
?>