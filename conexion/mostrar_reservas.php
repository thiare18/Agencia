<?php
include 'db_connection.php';

$sql = "SELECT * FROM RESERVA";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Reservas Registradas</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Reserva</th>
                <th>ID Cliente</th>
                <th>Fecha Reserva</th>
                <th>ID Vuelo</th>
                <th>ID Hotel</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id_reserva']."</td>
                <td>".$row['id_cliente']."</td>
                <td>".$row['fecha_reserva']."</td>
                <td>".$row['id_vuelo']."</td>
                <td>".$row['id_hotel']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay reservas registradas.";
}

$conn->close();
?>
