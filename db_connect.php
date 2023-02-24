<?php

$servername = "localhost";
$username = "Admin";
$password = "nSH0Ia-.0p7r0*Bh";
$dbname = "szakdolgozat";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Kapcsolódási hiba: " . $conn->connect_error);
}

?>