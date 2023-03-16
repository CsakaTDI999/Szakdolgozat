<?php

$servername = "localhost";
$username = "c31bujdosdbu";
$password = "ctcs!JRP5W8:";
$dbname = "c31bujdosdb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Kapcsolódási hiba: " . $conn->connect_error);
}

$felhasznalonev = $_POST["name"];
$email = $_POST["email"];
$telefonszam = $_POST["phone"];
$jelszo = $_POST["password"];

$hashed_password = password_hash($jelszo, PASSWORD_DEFAULT);
//password_verify() t kell majd használni a login-nál

$email_check_query = "SELECT * FROM felhasznalo WHERE email='$email' LIMIT 1";
$name_check_query = "SELECT * FROM felhasznalo WHERE felhasznalonev='$felhasznalonev' LIMIT 1";
$phone_check_query = "SELECT * FROM felhasznalo WHERE telefonszam='$telefonszam' LIMIT 1";

$email_check_result = mysqli_query($conn, $email_check_query);
$name_check_result = mysqli_query($conn, $name_check_query);
$phone_check_result = mysqli_query($conn, $phone_check_query);

$email_check = mysqli_num_rows($email_check_result);
$name_check = mysqli_num_rows($name_check_result);
$phone_check = mysqli_num_rows($phone_check_result);



$sql = "INSERT INTO felhasznalo (felhasznalonev, email, telefonszam, jelszo)
VALUES ('$felhasznalonev', '$email', '$telefonszam', '$hashed_password')";

if ($email_check > 0 || $name_check > 0 || $phone_check > 0) {
  echo "Hiba: ez az email, név vagy telefonszám már foglalt!";
} else {
  if (mysqli_query($conn, $sql)) {
    echo "Sikeres regisztráció!";
  } else {
    echo "Hiba: " . $sql . "<br>" . mysqli_error($conn);
  }
}

