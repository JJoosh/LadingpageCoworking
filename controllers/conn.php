<?php 

$host="localhost";
$user="root";

$password="1234";

$db="Coworking";

$con=mysqli_connect($host,$user,$password,$db);

if (mysqli_connect_errno()) {
    die("Error al conectar a MySQL: " . mysqli_connect_error());
}
