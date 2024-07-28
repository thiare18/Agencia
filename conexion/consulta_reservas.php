<?php
include 'db_connection.php';

// Consulta avanzada para calcular el número de reservas por hotel y mostrar hoteles con más de dos reservas
$sql = "
    SELECT HOTEL.nombre, HOTEL.ubicación, COUNT(RESERVA.id_reserva) AS numero_reservas
    FROM HOTEL
    INNER JOIN RESERVA ON HOTEL.id_hotel = RESERVA.id_hotel
    GROUP BY HOTEL.nombre, HOTEL.ubicación
    HAVING COUNT(RESERVA.id_reserva) > 2
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Hoteles con más de dos reservas</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nombre del Hotel</th>
                <th>Ubicación</th>
                <th>Número de Reservas</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['nombre']."</td>
                <td>".$row['ubicación']."</td>
                <td>".$row['numero_reservas']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay hoteles con más de dos reservas.";
}

$conn->close();
?>
