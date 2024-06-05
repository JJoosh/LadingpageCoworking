<?php
include '../controllers/conn.php';

// Eliminar usuario
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Usuario eliminado correctamente');</script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario');</script>";
    }
    $stmt->close();
}

// Editar usuario
if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $user = $_POST['edit_user'];
    $password = $_POST['edit_password'];
    $sql = "UPDATE users SET user = ?, password = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssi", $user, $password, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Usuario actualizado correctamente');</script>";
    } else {
        echo "<script>alert('Error al actualizar el usuario');</script>";
    }
    $stmt->close();
}

// Agregar usuario
if (isset($_POST['add_user'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (user, password) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $user, $password);
    if ($stmt->execute()) {
        echo "<script>alert('Usuario agregado correctamente');</script>";
    } else {
        echo "<script>alert('Error al agregar el usuario');</script>";
    }
    $stmt->close();
}

$sql = "SELECT * FROM users";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
                <h1><i class="fas fa-user-cog"></i> Usuarios</h1>
            </header>
            <div class="content">
                <h2>Tabla de Usuarios</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['user']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </button>
                                        </form>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <input type="text" name="edit_user" value="<?php echo $row['user']; ?>" required>
                                            <input type="password" name="edit_password" value="<?php echo $row['password']; ?>" required>
                                            <button type="submit">
                                                <i class="fas fa-edit"></i> Editar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No hay registros</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <h2>Agregar Usuario</h2>
                <form method="POST">
                    <input type="text" name="user" placeholder="Usuario" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <button type="submit" name="add_user">Agregar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$con->close();
?>
