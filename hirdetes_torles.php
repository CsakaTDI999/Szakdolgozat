<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
  header('Location: Belepes.php');
  exit();
}

if (!isset($_GET['id'])) {
  header('Location: hirdetesek_szerkesztese.php');
  exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare('DELETE FROM h_alkatresz WHERE alkatresz_id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();

header('Location: hirdetesek_szerkesztese.php');
exit();
