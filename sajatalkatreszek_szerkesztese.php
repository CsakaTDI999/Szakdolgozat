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

$stmt = $conn->prepare('SELECT * FROM h_alkatresz WHERE alkatresz_id = ? AND ID = ?');
$stmt->bind_param('ii', $alkatresz_id, $_SESSION['ID']);
$stmt->execute();
$result = $stmt->get_result();
$advertisement = $result->fetch_assoc();

if (!$advertisement) {
    header('Location: sajatalkatreszek_szerkesztese.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = $_POST['nev'];
    $leiras = $_POST['leiras'];
    $ar = $_POST['ar'];

    $stmt = $conn->prepare('UPDATE h_alkatresz SET Nev = ?, leiras = ?, ar = ? WHERE alkatresz_id = ?');
    $stmt->bind_param('ssii', $nev, $leiras, $ar, $alkatresz_id);

    if ($stmt->execute()) {
        header('Location: sajatalkatreszek_szerkesztese.php');
        exit();
    } else {
        echo "Hiba!";
    }
}

?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saját Alkatrész Szerkesztése</title>
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
        <h1 class="text-center mb-4">Saját Alkatrész Szerkesztése</h1>
        <a href="sajatalkatreszek_lista.php" class="btn btn-danger btn-primary mb-3">Vissza a saját alkatrészekhez</a>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nev" class="form-label">Név</label>
                <input type="text"class="form-control" id="nev" name="nev" value="<?php echo $advertisement['Nev']; ?>">
</div>
<div class="mb-3">
<label for="leiras" class="form-label">Leírás</label>
<textarea class="form-control" id="leiras" name="leiras" rows="3" required><?php echo $advertisement['leiras']; ?></textarea>
</div>
<div class="mb-3">
<label for="ar" class="form-label">Ár</label>
<input type="number" class="form-control" id="ar" name="ar" value="<?php echo $advertisement['ar']; ?>">
</div>
<button type="submit" class="btn btn-danger">Mentés</button>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/6en8XCp+HHAAK5GSLf2xlYtvJ8U2Q4U+9cuEnJ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybB2On4oge2zNT2r2Rr2Y0r/WW7zw7DyJpLp//7N/oiQf1+co" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></script>
</body>
</html>