<?php

$servername = "localhost";
$username = "Admin";
$password = "ILw3dA93(yhGs*GG";
$dbname = "szakdolgozat";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Kapcsolódási hiba: " . $conn->connect_error);
}


$nev = $_POST["nev"];
$evjarat = $_POST["evjarat"];
$leiras = $_POST["leiras"];
$hely = $_POST["hely"];
$kep = $_FILES['kep']['tmp_name'];
$imgContent = addslashes(file_get_contents($kep));

$sql = "INSERT INTO h_alkatresz (nev, evjarat, leiras, hely, kep)
VALUES ('$nev', '$evjarat', '$leiras', '$hely', '$imgContent')";

if ($conn->query($sql) === TRUE) {
  echo "Az alkatrész sikeresen fel lett véve az adatbázisba.";
} else {
  echo "Hiba történt az adatbázisba való feltöltéskor: " . $conn->error;
}


$conn->close();
?>
