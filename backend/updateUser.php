<?php
require_once 'connection.php';

$response = array(); // Crear un arreglo para la respuesta

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id = $_POST['id-user']; // Nuevo campo: ID a actualizar
    $name = $_POST['name-user'];
    $phone_number = $_POST['phone-number-user'];
    $age = $_POST['age-user'];

    // Validación y saneamiento de datos aquí si es necesario

    // Consulta para actualizar el registro en la tabla "usuarios" usando el ID
    $updateQuery = "UPDATE usuarios SET name_user = '$name', phone_number_user = '$phone_number', age_user = '$age' WHERE id_users = $id";

    if ($conn->query($updateQuery) === TRUE) {
        // Configurar la respuesta exitosa
        $response["status_code"] = 200;
        $response["message"] = "Registro actualizado exitosamente: ID $name";
    } else {
        // Configurar la respuesta de error
        $response["status_code"] = 500;
        $response["message"] = "Error al actualizar el registro: " . $conn->error;
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
