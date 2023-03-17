
<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
  header('Location: Belepes.php');
  exit();
}

$stmt = $conn->prepare('SELECT * FROM felhasznalo');
$stmt->execute();
$result = $stmt->get_result();
$users = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
        }
        table.table-striped {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Panel</h1>
        <a href="profil.php" class="btn btn-danger btn-primary mb-3">Vissza a profilhoz</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Felhasználónév</th>
                    <th>Email</th>
                    <th>Telefonszám</th>
                    <th>Admin</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['ID']; ?></td>
                    <td><?php echo $user['felhasznalonev']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['telefonszam']; ?></td>
                    <td><?php echo $user['admin'] ? 'Igen' : 'Nem'; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $user['ID']; ?>" class="btn btn-warning">Szerkesztés</a>
                        <a href="delete_user.php?id=<?php echo $user['ID']; ?>" class="btn btn-danger">Törlés</a>
                    </td>
                    <?php endforeach; ?>    
                </tr>
               
</body>
</html>