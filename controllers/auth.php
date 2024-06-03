<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../interfaces/login.php");
    exit();
}
?>
