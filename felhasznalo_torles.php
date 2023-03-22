<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header('Location: Belepes.php');
    exit();
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = $conn->prepare('DELETE FROM felhasznalo WHERE ID = ?');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();

    header('Location: admin.php');
} else {
    header('Location: admin.php');
}
?>
