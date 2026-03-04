 <?php
$conn = new mysqli("localhost", "root", "", "db_mehmonxona");

if ($conn->connect_error) {
    die("Xatolik: " . $conn->connect_error);
}

$sql = "SELECT 
            mijozlar.ism,
            xonalar.xona_raqam,
            xonalar.turi,
            bronlar.sana
        FROM bronlar
        INNER JOIN mijozlar ON bronlar.mijoz_id = mijozlar.id
        INNER JOIN xonalar ON bronlar.xona_id = xonalar.id";

$result = $conn->query($sql);

echo "<h2>Bronlar ro'yxati</h2>";
echo "<table border='1'>
        <tr>
            <th>Mijoz</th>
            <th>Xona raqami</th>
            <th>Xona turi</th>
            <th>Sana</th>
        </tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row['ism']."</td>
            <td>".$row['xona_raqam']."</td>
            <td>".$row['turi']."</td>
            <td>".$row['sana']."</td>
          </tr>";
}

echo "</table>";

$conn->close();
?>