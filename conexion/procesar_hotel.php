<?php
include 'db_connection.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicacion'];
$habitaciones_disponibles = $_POST['habitaciones_disponibles'];
$tarifa_noche = $_POST['tarifa_noche'];

// Validar datos
if (empty($nombre) || empty($ubicacion) || empty($habitaciones_disponibles) || empty($tarifa_noche) || $habitaciones_disponibles <= 0 || $tarifa_noche <= 0) {
    die("Error en la validación de datos");
}

// Preparar la consulta SQL
$sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Hotel registrado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
