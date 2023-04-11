<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header('Location: Belepes.php');
    exit();
}

if (!isset($_GET['tabla'])) {
    header('HTTP/1.1 400 Bad Request');
    exit();
}

$tabla = $_GET['tabla'];

$stmt = $conn->prepare("SELECT * FROM ${tabla}");
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($data);
?>
