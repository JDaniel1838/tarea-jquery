<?php
require_once 'connection.php';

$response = array(); // Crear un arreglo para la respuesta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $name = $_POST['name-user'];
    $phone_number = $_POST['phone-number-user'];
    $age = $_POST['age-user'];
    

    // Validación y saneamiento de datos aquí si es necesario

    // Consulta para insertar un nuevo registro en la tabla "usuarios"
    $insertQuery = "INSERT INTO usuarios (name_user, phone_number_user, age_user) VALUES ('$name', '$phone_number', '$age')";

    if ($conn->query($insertQuery) === TRUE) {
        // Configurar la respuesta exitosa
        $response["status_code"] = 200;
        $response["message"] = "Registro creado exitosamente". $name. " - ". $phone_number." - ".$age;
    } else {
        // Configurar la respuesta de error
        $response["status_code"] = 500;
        $response["message"] = "Error al crear el registro: " . $conn->error;
    }
} else {
    // Configurar la respuesta para solicitudes incorrectas
    $response["status_code"] = 400;
    $response["message"] = "Solicitud incorrecta.";
}

// Cerrar la conexión
$conn->close();

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
