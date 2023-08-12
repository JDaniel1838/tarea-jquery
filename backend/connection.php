<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root"; // Reemplaza con tu nombre de usuario
$password = ""; // Reemplaza con tu contraseña
$database = "cuentas_tarea_db";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
