<?php
session_start();
require_once('kapcsolat.php');

if (!isset($_SESSION['ID'])) {
    header('Location: index.php');
    exit();
}

if (!isset($_GET['alkatresz_id'])) {
    header('Location: sajatalkatreszek_lista.php');
    exit();
}

$alkatresz_id = $_GET['alkatresz_id'];

$stmt = $conn->prepare('DELETE FROM h_alkatresz WHERE alkatresz_id = ? AND ID = ?');
$stmt->bind_param('ii', $alkatresz_id, $_SESSION['ID']);
$stmt->execute();

header('Location: sajatalkatreszek_lista.php');
exit();
?>
