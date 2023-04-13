<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header('Location: Belepes.php');
    exit();
}

if (isset($_GET['table']) && isset($_GET['id'])) {
    $selected_table = $_GET['table'];
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM $selected_table WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

   
} else {
    header("Location: profil.php");
    exit();
}
?>