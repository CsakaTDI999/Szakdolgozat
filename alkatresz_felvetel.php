<?php

$servername = "localhost";
$username = "c31bujdosdbu";
$password = "ctcs!JRP5W8:";
$dbname = "c31bujdosdb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Kapcsolódási hiba: " . $conn->connect_error);
}


$nev = $_POST["nev"];
$evjarat = $_POST["evjarat"];
$leiras = $_POST["leiras"];
$hely = $_POST["hely"];
$kep = $_FILES['kep']['tmp_name'];
if ($kep != "") {
    $imgContent = addslashes(file_get_contents($kep));
    $sql = "INSERT INTO h_alkatresz (nev, evjarat, leiras, hely, kep) VALUES ('$nev', '$evjarat', '$leiras', '$hely', '$imgContent')";
} else {
    $sql = "INSERT INTO h_alkatresz (nev, evjarat, leiras, hely) VALUES ('$nev', '$evjarat', '$leiras', '$hely')";
}

if ($conn->query($sql) === TRUE) {
  echo "Sikeres feltöltés!";
} else {
  echo "Hiba!: " . $conn->error;
}


$conn->close();
?>
