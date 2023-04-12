<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
  header('Location: Belepes.php');
  exit();
}

$selected_table = isset($_POST['table_select']) ? $_POST['table_select'] : '8l';

$stmt = $conn->prepare("SELECT * FROM $selected_table");
$stmt->execute();
$result = $stmt->get_result();
$hirdetesek = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hírdetések Szerkesztése</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
        }
        
        .table {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Hírdetések szerkesztése</h1>
        <form method="POST" action="ujhirdetesek_szerkesztese.php">
          <label for="table_select">Válasszon táblát:</label>
          <select name="table_select" id="table_select" onchange="this.form.submit()">
            <option value="8l" <?= $selected_table === '8l' ? 'selected' : '' ?>>8l</option>
            <option value="8p" <?= $selected_table === '8p' ? 'selected' : '' ?>>8p</option>
            <option value="8v" <?= $selected_table === '8v' ? 'selected' : '' ?>>8v</option>
          </select>
        </form>
        <a href="profil.php" class="btn btn-danger btn-primary mb-3">Vissza a profilhoz</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Kategória</th>
                    <th>Leírás</th>
                    <th>Kép</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hirdetesek as $hirdetes): ?>
                    <tr>
                        <td><?php echo $hirdetes['id']; ?></td>
                        <td><?php echo $hirdetes['nev']; ?></td>
<td><?php echo $hirdetes['kategoria']; ?></td>
<td><?php echo $hirdetes['leiras']; ?></td>
<td><?php echo $hirdetes['kep']; ?></td>
<td>
<a href="ujalkatreszek_szerkesztese.php?table=<?= $selected_table ?>&id=<?php echo $hirdetes['id']; ?>" class="btn btn-warning">Szerkesztés</a>
<a href="uj_torles.php?table=<?= $selected_table ?>&id=<?php echo $hirdetes['id']; ?>" class="btn btn-danger">Törlés</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

</body>
</html>