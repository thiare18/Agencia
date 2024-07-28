<?php
include 'db_connection.php';

$sql = "SELECT * FROM VUELO";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Vuelos Registrados</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Plazas Disponibles</th>
                <th>Precio</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id_vuelo']."</td>
                <td>".$row['origen']."</td>
                <td>".$row['destino']."</td>
                <td>".$row['fecha']."</td>
                <td>".$row['plazas_disponibles']."</td>
                <td>".$row['precio']."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay vuelos registrados.";
}

$conn->close();
?>
