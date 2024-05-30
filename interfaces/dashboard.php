<?php
include '../controllers/conn.php'; 

$sqlNuevosClientes = "SELECT COUNT(*) as count FROM Contactanos"; 
$resultNuevosClientes = $con->query($sqlNuevosClientes);
$rowNuevosClientes = $resultNuevosClientes->fetch_assoc();
$nuevosClientes = $rowNuevosClientes['count'];

$sqlServiciosContratados = "SELECT COUNT(*) as count FROM Clientes"; 
$resultServiciosContratados = $con->query($sqlServiciosContratados);
$rowServiciosContratados = $resultServiciosContratados->fetch_assoc();
$serviciosContratados = $rowServiciosContratados['count'];

$con->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <h3><i class="fas fa-bars"></i> Menú</h3>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
                <li><a href="Clientes.php"><i class="fas fa-user-friends"></i> Clientes</a></li>
                <li><a href="Servicios.php"><i class="fas fa-briefcase"></i> Servicios</a></li>
                <li><a href="ventas.php"><i class="fas fa-dollar-sign"></i> Ventas</a></li>
                <li><a href="Plan.php"><i class="fas fa-th-list"></i> Planes</a></li>
                <li><a href="users.php"><i class="fas fa-user-cog"></i> Usuarios</a></li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1><i class="fas fa-chart-line"></i> Panel Administrativo</h1>
            </header>
            <div class="content">
                <h2>Visión General</h2>
                <div class="stats">
                    <div class="box">
                        <i class="fas fa-user-plus"></i>
                        <span><?php echo $nuevosClientes; ?></span>
                        <p>Nuevos Clientes</p>
                    </div>
                    <div class="box">
                        <i class="fas fa-handshake"></i>
                        <span><?php echo $serviciosContratados; ?></span>
                        <p>Servicios Contratados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
