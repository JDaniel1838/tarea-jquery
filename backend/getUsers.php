<?php

require_once 'connection.php';

// Consulta para obtener todos los registros de la tabla "usuarios"
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);

$response = array(); // Crear un arreglo para la respuesta

if ($result->num_rows > 0) {
    $data = array(); // Crear un arreglo para los datos

    // Iterar a través de los resultados y agregarlos al arreglo de datos
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            "id" => $row["id_users"],
            "name" => $row["name_user"],
            "phone_number" => $row["phone_number_user"],
            "age" => $row["age_user"]
        );
    }

    // Configurar la respuesta exitosa
    $response["status_code"] = 200;
    $response["data"] = $data;
} else {
    // Configurar la respuesta sin registros
    $response["status_code"] = 404;
    $response["message"] = "No se encontraron registros.";
}

// Cerrar la conexión
$conn->close();

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
