<?php
include '../controllers/conn.php'; 

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM Servicios WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Registro eliminado correctamente');</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro');</script>";
    }
    $stmt->close();
}

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $nombre = $_POST['edit_nombre'];
    $sql = "UPDATE Servicios SET nombre = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $nombre, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Registro actualizado correctamente');</script>";
    } else {
        echo "<script>alert('Error al actualizar el registro');</script>";
    }
    $stmt->close();
}

if (isset($_POST['add_nombre'])) {
    $nombre = $_POST['add_nombre'];
    $sql = "INSERT INTO Servicios (nombre) VALUES (?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $nombre);
    if ($stmt->execute()) {
        echo "<script>alert('Registro agregado correctamente');</script>";
    } else {
        echo "<script>alert('Error al agregar el registro');</script>";
    }
    $stmt->close();
}

$sql = "SELECT * FROM Servicios";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h3><i class="fas fa-bars"></i> Menú</h3>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="Clientes.php"><i class="fas fa-users"></i> Clientes</a></li>
                <li><a href="Servicios.php"><i class="fas fa-concierge-bell"></i> Servicios</a></li>
                <li><a href="ventas.php"><i class="fas fa-dollar-sign"></i> Ventas</a></li>
                <li><a href="Plan.php"><i class="fas fa-th-list"></i> Planes</a></li>
                <li><a href="users.php"><i class="fas fa-user-cog"></i> Usuarios</a></li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1><i class="fas fa-concierge-bell"></i> Servicios</h1>
            </header>
            <div class="content">
                <h2>Tabla de Servicios</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <form method="POST" style="display:inline;">
                                        <td><?php echo $row['id']; ?></td>
                                        <td><input type="text" name="edit_nombre" value="<?php echo $row['nombre']; ?>"></td>
                                        <td>
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit"><i class="fas fa-edit"></i> Editar</button>
                                        </td>
                                    </form>
                                    <td>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No hay registros</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <h2>Agregar Nuevo Servicio</h2>
                <form method="POST">
                    <label for="add_nombre">Nombre del Servicio:</label>
                    <input type="text" id="add_nombre" name="add_nombre" required>
                    <button type="submit"><i class="fas fa-plus"></i> Agregar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$con->close();
?>
