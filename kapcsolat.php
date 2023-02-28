<?php

$servername = "localhost";
$username = "Admin";
$password = "ILw3dA93(yhGs*GG";
$dbname = "szakdolgozat";

$kapcsolat = mysqli_connect($servername,$username,$password,$dbname);


if (!$kapcsolat) {
  die('Kapcsolódási hiba:  '.mysqli_connenct_errno().' '.mysqli_connect_error());
}

mysqli_query($kapcsolat,"SET NAMES 'UTF8'");
mysqli_query($kapcsolat,"SET CHARACTER SET UTF8");
?>