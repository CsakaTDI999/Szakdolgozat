<?php
require_once('kapcsolat.php');

if (isset($_GET['kategoria'])) {
    $kategoria = $_GET['kategoria'];
} else {
    die("Nem található a kategória");
}

$sql = "SELECT * FROM 8l WHERE kategoria = '$kategoria'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Név: " . $row["nev"]. " - Kategória: " . $row["kategoria"]. " - Leírás: " . $row["leiras"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>