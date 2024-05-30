<?php
include '../controllers/conn.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $servicio_id = $_POST['servicio_id'];
    $comentarios = $_POST['comentarios'];
    $archivo = $_POST['archivo'];

    $sql = "UPDATE Clientes SET nombre = ?, correo = ?, telefono = ?, direccion = ?, servicio_id = ?, comentarios = ?, archivo = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        echo json_encode(['error' => 'Error al preparar la consulta: ' . $con->error]);
        exit;
    }

    $stmt->bind_param("ssssissi", $nombre, $correo, $telefono, $direccion, $servicio_id, $comentarios, $archivo, $id);
    if ($stmt->execute()) {
        echo json_encode(['success' => 'Cliente actualizado correctamente']);
    } else {
        echo json_encode(['error' => 'Error al actualizar el cliente: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'No se recibieron todos los datos necesarios.']);
}

$con->close();
?>
