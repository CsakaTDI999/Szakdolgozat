<?php

require_once('kapcsolat.php');

session_start();
$ID = $_SESSION["ID"];
$nev = $_POST["nev"];
$evjarat = $_POST["evjarat"];
$leiras = $_POST["leiras"];
$hely = $_POST["hely"];
$kep = $_FILES['kep']['tmp_name'];
$ar = $_POST["ar"];
$maxFileSize = 20 * 1024 * 1024; // 20 MB
$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

if ($kep != "" && $_FILES['kep']['size'] > $maxFileSize) {
    echo "<script>alert('A kép mérete túl nagy! Maximum 20MB lehet.'); window.location.href='alkatreszfeltoltes.php';</script>";
    exit();
}

if ($kep != "" && !in_array($_FILES['kep']['type'], $allowedMimeTypes)) {
    echo "<script>alert('A feltöltött fájl nem kép! Kérjük, töltsön fel képfájlt.'); window.location.href='alkatreszfeltoltes.php';</script>";
    exit();
}
if ($kep != "") {
    $imgContent = addslashes(file_get_contents($kep));
    $sql = "INSERT INTO h_alkatresz (nev, evjarat, leiras, hely, kep, ID, ar) VALUES ('$nev', '$evjarat', '$leiras', '$hely', '$imgContent', '$ID', '$ar')";
} else {
    $sql = "INSERT INTO h_alkatresz (nev, evjarat, leiras, hely, ID, ar) VALUES ('$nev', '$evjarat', '$leiras', '$hely', '$ID', '$ar')";
}

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Sikeres feltöltés!'); window.location.href='piac.php';</script>";
} else {
  echo "<script>alert('Hiba!: " . $conn->error . "'); window.location.href='alkatreszfeltoltes.php';</script>";
}

$conn->close();
?>
