<?php
include 'db_connection.php';

$sql = "SELECT * FROM HOTEL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Hoteles Registrados</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Hotel</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Habitaciones Disponibles</th>
                <th>Tarifa por Noche</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id_hotel']."</td>
                <td>".$row['nombre']."</td>
                <td>".$row['ubicación']."</td>
                <td>".$row['habitaciones_disponibles']."</td>
                <td>".$row['tarifa_noche']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay hoteles registrados.";
}

$conn->close();
?>
