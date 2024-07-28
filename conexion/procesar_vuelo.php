<?php
include 'db_connection.php';

// Obtener los datos del formulario
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$plazas_disponibles = $_POST['plazas_disponibles'];
$precio = $_POST['precio'];

// Validar datos
if (empty($origen) || empty($destino) || empty($fecha) || empty($plazas_disponibles) || empty($precio) || $plazas_disponibles <= 0 || $precio <= 0) {
    die("Error en la validación de datos");
}

// Preparar la consulta SQL
$sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $origen, $destino, $fecha, $plazas_disponibles, $precio);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Vuelo registrado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
