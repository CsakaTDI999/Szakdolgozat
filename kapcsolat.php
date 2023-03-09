<?php
session_start();

$servername = "localhost";
$username = "c31bujdosdbu";
$password = "ctcs!JRP5W8:";
$dbname = "c31bujdosdb";

$conn = mysqli_connect($servername,$username,$password,$dbname);
$uploadPath = 'uploads/';


if (!$conn) {
  die('Kapcsolódási hiba:  '.mysqli_connect_error().' '.mysqli_connect_error());
}

mysqli_query($conn,"SET NAMES 'UTF8'");
mysqli_query($conn,"SET CHARACTER SET UTF8");
?>