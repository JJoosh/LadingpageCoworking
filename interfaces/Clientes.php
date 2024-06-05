<?php
include '../controllers/conn.php'; // Incluir archivo de conexión

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM Contactanos WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Registro eliminado correctamente');</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro');</script>";
    }
    $stmt->close();
}

$sql = "SELECT * FROM Contactanos";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
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
                <li><a class="CerrarSesion" href="../controllers/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1><i class="fas fa-users"></i> Clientes</h1>
            </header>
            <div class="content">
                <h2>Tabla de Clientes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Comentarios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['correo']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>
                                    <td><?php echo $row['direccion']; ?></td>
                                    <td><?php echo $row['comentarios']; ?></td>
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
                                <td colspan="7">No hay registros</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$con->close();
?>
