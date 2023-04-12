<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header('Location: Belepes.php');
    exit();
}

if (isset($_GET['table']) && isset($_GET['id'])) {
    $selected_table = $_GET['table'];
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM $selected_table WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $hirdetes = $result->fetch_assoc();

    if (!$hirdetes) {
        header("Location: ujalkatreszek_szerkesztese.php");
        exit();
    }
} else {
    header("Location: ujalkatreszek_szerkesztese.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nev = $_POST['nev'];
    $kategoria = $_POST['kategoria'];
    $leiras = $_POST['leiras'];
    $ar = $_POST['ar'];

    $stmt = $conn->prepare("UPDATE $selected_table SET nev = ?, kategoria = ?, leiras = ?, ar = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $nev, $kategoria, $leiras, $ar, $id);
    $stmt->execute();

    header("Location: ujalkatreszek_szerkesztese.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hirdetés Szerkesztése</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Új hírdetések Szerkesztése</h1>
        <a href="profil.php" class="btn btn-danger btn-primary mb-3">Vissza a profilomhoz</a>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nev" class="form-label">Név</label>
                <input type="text" class="form-control" id="nev" name="nev" value="<?php echo $hirdetes['nev']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategoria" class="form-label">Kategória</label>
                <textarea class="form-control" id="kategoria" name="kategoria" rows="3" required><?php echo $hirdetes['kategoria']; ?></textarea>
            </div>
            <div class="mb-3">
            <label for="leiras" class="form-label">leírás</label>
<input type="text" class="form-control" id="leiras" name="leiras" value="<?php echo $hirdetes['leiras']; ?>" required>
</div>
<div class="mb-3">
                <label for="ar" class="form-label">ár</label>
                <input type="number" class="form-control" id="ar" name="ar" value="<?php echo $hirdetes['ar']; ?>" required>
            </div>
<button type="submit" class="btn btn-primary btn-danger">Mentés</button>
</form>
</div>

</body>
</html>