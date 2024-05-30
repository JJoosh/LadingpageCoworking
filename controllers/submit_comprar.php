<?php
include 'conn.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $servicio = $_POST['servicio'];
    $comentarios = $_POST['comentarios'];

    $archivo = $_FILES['archivo']['name'];
    $archivo_tmp = $_FILES['archivo']['tmp_name'];
    $archivo_destino = __DIR__ . '/uploads/' . $archivo;

    if (move_uploaded_file($archivo_tmp, $archivo_destino)) {
        $archivo_url = $archivo_destino; 
    } else {
        $archivo_url = null; 
    }

    $sql = "INSERT INTO Clientes (nombre, correo, telefono, direccion, servicio_id, comentarios, archivo) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("ssssiss", $nombre, $correo, $telefono, $direccion, $servicio, $comentarios, $archivo_url);

        if ($stmt->execute()) {
            echo "<script>alert('Datos enviados correctamente.'); window.location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Error: No se pudo enviar la información. " . $stmt->error . "'); window.location.href='../index.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error: No se pudo preparar la declaración. " . $con->error . "'); window.location.href='../index.php';</script>";
    }

    $con->close();
}
?>
