<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID'])) {
  header('Location: Belepes.php');
  exit();
}

$stmt = $conn->prepare('SELECT * FROM felhasznalo WHERE ID = ?');
$stmt->bind_param('i', $_SESSION['ID']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
