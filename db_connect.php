<?php

$servername = "localhost";
$username = "Admin";
$password = "ILw3dA93(yhGs*GG";
$dbname = "szakdolgozat";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Kapcsolódási hiba: " . $conn->connect_error);
}

$name = $_POST["felhasznalonev"];
$email = $_POST["email"];
$phone = $_POST["telefonszam"];
$password = $_POST["jelszo"];

$sql = "INSERT INTO felhasznalo (felhasznalonev, email, telefonszam, jelszo)
VALUES ('$name', '$email', '$phone', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "Sikeres regisztráció";
} else {
  echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
}

?>