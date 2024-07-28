<?php
include 'db_connection.php';

// Obtener los datos del formulario
$id_cliente = $_POST['id_cliente'];
$fecha_reserva = $_POST['fecha_reserva'];
$id_vuelo = isset($_POST['id_vuelo']) ? $_POST['id_vuelo'] : NULL;
$id_hotel = isset($_POST['id_hotel']) ? $_POST['id_hotel'] : NULL;

// Preparar la consulta SQL
$sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isii", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Reserva realizada con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
