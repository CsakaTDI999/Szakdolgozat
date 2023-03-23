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

$hirdetes_id = $_GET['id'];

$stmt = $conn->prepare('SELECT * FROM h_alkatresz WHERE alkatresz_id = ?');
$stmt->bind_param('i', $hirdetes_id);
$stmt->execute();
$result = $stmt->get_result();
$hirdetes = $result->fetch_assoc();

if (!$hirdetes) {
    header('Location: hirdetesek_szerkesztese.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = $_POST['nev'];
    $leiras = $_POST['leiras'];
    $ar = $_POST['ar'];

    $stmt = $conn->prepare('UPDATE h_alkatresz SET Nev = ?, leiras = ?, ar = ? WHERE alkatresz_id = ?');
    $stmt->bind_param('ssii', $nev, $leiras, $ar, $hirdetes_id);

    if ($stmt->execute()) {
        header('Location: hirdetesek_szerkesztese.php');
        exit();
    } else {
        alert("Hiba!");
    }
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
        <h1 class="text-center mb-4">Hírdetés Szerkesztése</h1>
        <a href="hirdetesek_szerkesztese.php" class="btn btn-danger btn-primary mb-3">Vissza a hírdetésekhez</a>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nev" class="form-label">Név</label>
                <input type="text" class="form-control" id="nev" name="nev" value="<?php echo $hirdetes['Nev']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="leiras" class="form-label">Leírás</label>
                <textarea class="form-control" id="leiras" name="leiras" rows="3" required><?php echo $hirdetes['leiras']; ?></textarea>
            </div>
            <div class="mb-3">
            <label for="ar" class="form-label">Ár</label>
<input type="number" class="form-control" id="ar" name="ar" value="<?php echo $hirdetes['ar']; ?>" required>
</div>
<button type="submit" class="btn btn-primary btn-danger">Mentés</button>
</form>
</div>

</body>
</html>