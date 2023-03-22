<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
  header('Location: Belepes.php');
  exit();
}

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

$user_id = $_GET['id'];

$stmt = $conn->prepare('SELECT * FROM felhasznalo WHERE ID = ?');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    header('Location: admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $felhasznalonev = $_POST['felhasznalonev'];
    $email = $_POST['email'];
    $telefonszam = $_POST['telefonszam'];
    $admin = $_POST['admin'];

    $stmt = $conn->prepare('UPDATE felhasznalo SET felhasznalonev = ?, email = ?, telefonszam = ?, admin = ? WHERE ID = ?');
    $stmt->bind_param('sssii', $felhasznalonev, $email, $telefonszam, $admin, $user_id);

    if ($stmt->execute()) {
        header('Location: admin.php');
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
    <title>Felhasználó Szerkesztése</title>
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
    <h1 class="text-center mb-2">Felhasználó: <span style="color: #DC3545;"><?php echo $user['felhasznalonev']; ?></h1>
    <img src="uploads/<?php echo $user['profilkep']; ?>"  class="rounded mx-auto d-block mb-2" style="max-width: 200px; max-height: 200px;">
    <a href="admin.php" class="btn btn-danger btn-primary mb-3">Vissza az Admin Panelhez</a>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="felhasznalonev" class="form-label">Felhasználónév</label>
                <input type="text" class="form-control" id="felhasznalonev" name="felhasznalonev" value="<?php echo $user['felhasznalonev']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
</div>
<div class="mb-3">
<label for="telefonszam" class="form-label">Telefonszám</label>
<input type="text" class="form-control" id="telefonszam" name="telefonszam" value="<?php echo $user['telefonszam']; ?>" required>
</div>
<div class="mb-3">
<label for="admin" class="form-label">Admin jogosultság</label>
<select class="form-select" id="admin" name="admin" required>
<option value="0" <?php echo $user['admin'] == 0 ? 'selected' : ''; ?>>Nem</option>
<option value="1" <?php echo $user['admin'] == 1 ? 'selected' : ''; ?>>Igen</option>
</select>
</div>
<button type="submit" class="btn btn-primary btn-danger">Mentés</button>
</form>
</div>

</body>
</html>
