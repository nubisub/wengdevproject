<?php
require "connect.php";
// foreach
$sql = "SELECT * FROM recipe";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

echo "<table>";
echo "<tr>";
echo "<th>Nama</th>";
echo "<th>Deskripsi</th>";
echo "<th>Asal</th>";
echo "<th>Porsi</th>";
echo "<th>Lama</th>";
echo "<th>Bahan</th>";
echo "<th>Langkah</th>";
echo "<th>Foto</th>";
echo "</tr>";


foreach ($result as $row) {
  echo "<tr>";
  echo "<td>" . $row['nama'] . "</td>";
  echo "<td>" . $row['deskripsi'] . "</td>";
  echo "<td>" . $row['asal'] . "</td>";
  echo "<td>" . $row['porsi'] . "</td>";
  echo "<td>" . $row['lama'] . "</td>";
    echo "<td>" . $row['foto'] . "</td>";
  echo "</tr>";
}
echo "</table>";

?>