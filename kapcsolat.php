<?php

$servername = "localhost";
$username = "c31bujdosdbu";
$password = "ctcs!JRP5W8:";
$dbname = "c31bujdosdb";

$kapcsolat = mysqli_connect($servername,$username,$password,$dbname);


if (!$kapcsolat) {
  die('Kapcsolódási hiba:  '.mysqli_connenct_errno().' '.mysqli_connect_error());
}

mysqli_query($kapcsolat,"SET NAMES 'UTF8'");
mysqli_query($kapcsolat,"SET CHARACTER SET UTF8");
?>