<?php
include '../controllers/conn.php'; 

if (isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];
  $sql = "DELETE FROM Clientes WHERE id = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("i", $id);
  if ($stmt->execute()) {
    echo "<script>alert('Cliente eliminado correctamente');</script>";
  } else {
    echo "<script>alert('Error al eliminar el cliente');</script>";
  }
  $stmt->close();
}


if (isset($_POST['edit_id'])) {
  $id = $_POST['edit_id'];
  $nombre = $_POST['edit_nombre'];
  $correo = $_POST['edit_correo'];
  $telefono = $_POST['edit_telefono'];
  $direccion = $_POST['edit_direccion'];
  $servicio_id = $_POST['edit_servicio_id'];
  $comentarios = $_POST['edit_comentarios'];
  $archivo = $_POST['edit_archivo'];
  $sql = "UPDATE Clientes SET nombre = ?, correo = ?, telefono = ?, direccion = ?, servicio_id = ?, comentarios = ?, archivo = ? WHERE id = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ssssissi", $nombre, $correo, $telefono, $direccion, $servicio_id, $comentarios, $archivo, $id);
  if ($stmt->execute()) {
    echo "<script>alert('Cliente actualizado correctamente');</script>";
  } else {
    echo "<script>alert('Error al actualizar el cliente');</script>";
  }
  $stmt->close();
}

$sql = "SELECT * FROM Clientes";
$result = $con->query($sql);

// Obtener servicios para el desplegable
$sql_servicios = "SELECT * FROM Servicios";
$result_servicios = $con->query($sql_servicios);
$servicios = [];
while ($row_servicio = $result_servicios->fetch_assoc()) {
  $servicios[] = $row_servicio;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ventas</title>
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
        <h1><i class="fas fa-dollar-sign"></i> Ventas</h1>
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
              <th>Servicio</th>
              <th>Comentarios</th>
              <th>Archivo</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['nombre']; ?></td>
                  <td><?php echo $row['correo']; ?></td>
                  <td><?php echo $row['telefono']; ?></td>
                  <td><?php echo $row['direccion']; ?></td>
                  <td><?php echo $row['servicio_id']; ?></td>
                  <td><?php echo $row['comentarios']; ?></td>
                  <td><a href="/controllers/uploads/<?php echo basename($row['archivo']); ?>" target="_blank">Ver
                      archivo</a></td>
                  <td>
                    <button
                      onclick="editForm(<?php echo $row['id']; ?>, '<?php echo $row['nombre']; ?>', '<?php echo $row['correo']; ?>', '<?php echo $row['telefono']; ?>', '<?php echo $row['direccion']; ?>', '<?php echo $row['servicio_id']; ?>', '<?php echo $row['comentarios']; ?>', '<?php echo $row['archivo']; ?>')">Editar</button>
                    <form method="POST" style="display:inline;">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="9">No hay registros</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal de Edición -->
  <div id="editModal"
    style="display:none; position:fixed; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:1000;">
    <div style="background-color:#fff; margin:50px auto; padding:20px; width:90%; max-width:600px;">
      <h2>Editar Cliente</h2>
      <form id="editForm">
        <input type="hidden" name="id" id="edit_id">
        <label for="edit_nombre">Nombre:</label>
        <input type="text" name="nombre" id="edit_nombre" required>
        <label for="edit_correo">Correo:</label>
        <input type="email" name="correo" id="edit_correo" required>
        <label for="edit_telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="edit_telefono" required>
        <label for="edit_direccion">Dirección:</label>
        <input type="text" name="direccion" id="edit_direccion" required>
        <label for="edit_servicio_id">Servicio:</label>
        <select name="servicio_id" id="edit_servicio_id">
          <?php foreach ($servicios as $servicio): ?>
            <option value="<?php echo $servicio['id']; ?>">
              <?php echo htmlspecialchars($servicio['nombre']); ?>
            </option>
          <?php endforeach; ?>

        </select>
        <label for="edit_comentarios">Comentarios:</label>
        <input type="text" name="comentarios" id="edit_comentarios">
        <label for="edit_archivo">Archivo:</label>
        <input type="text" name="archivo" id="edit_archivo">
        <button type="button" onclick="submitEditForm()">Guardar Cambios</button>
        <button type="button" onclick="closeEditModal()">Cerrar</button>
      </form>
    </div>
  </div>

  <script>
    function editForm(id, nombre, correo, telefono, direccion, servicio_id, comentarios, archivo) {
      // Llenar los datos en el formulario
      document.getElementById('edit_id').value = id;
      document.getElementById('edit_nombre').value = nombre;
      document.getElementById('edit_correo').value = correo;
      document.getElementById('edit_telefono').value = telefono;
      document.getElementById('edit_direccion').value = direccion;
      document.getElementById('edit_servicio_id').value = servicio_id;
      document.getElementById('edit_comentarios').value = comentarios;
      document.getElementById('edit_archivo').value = archivo;

      // Mostrar el modal
      document.getElementById('editModal').style.display = 'block';
    }

    function closeEditModal() {
      document.getElementById('editModal').style.display = 'none';
    }


    function submitEditForm() {
      var form = document.getElementById('editForm');
      var formData = new FormData(form);
      fetch('../controllers/actualizar.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          alert('Cliente actualizado correctamente');
          closeEditModal();
          location.reload(); 
        })
        .catch(error => {
          alert('Error al actualizar el cliente');
          console.error('Error:', error);
        });
    }


  </script>


</body>

</html>


<?php
$con->close();
?>