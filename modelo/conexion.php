<?php
$host = "localhost";
$user = "root";
$pass = "Jorgebustillo123";
$db = "empresa";

// Crear la conexión
$conexion = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
