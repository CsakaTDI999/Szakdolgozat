<?php
session_start();

if (!isset($_SESSION['ID'])) {
    header('Location: index.php');
    exit();
}

include('felhasznalo_adat.php');

$stmt = $conn->prepare('SELECT * FROM h_alkatresz WHERE ID = ?');
$stmt->bind_param('i', $_SESSION['ID']);
$stmt->execute();
$result = $stmt->get_result();
$advertisements = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Saját hírdetések szerkesztése</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Saját hírdetések szerkesztése</h1>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Év</th>
                            <th>Leírás</th>
                            <th>Hely</th>
                            <th>Ár</th>
                            <th>Művelet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($advertisements as $advertisement): ?>
                        <tr>
                            <td><?php echo $advertisement['Nev']; ?></td>
                            <td><?php echo $advertisement['evjarat']; ?></td>
                            <td><?php echo $advertisement['leiras']; ?></td>
                            <td><?php echo $advertisement['hely']; ?></td>
                            <td><?php echo $advertisement['ar']; ?></td>
                            <td>
                                <a href="sajatalkatreszek_szerkesztese.php?alkatresz_id=<?php echo $advertisement['alkatresz_id']; ?>" class="btn btn-warning">Szerkesztés</a>
                                <a href="sajatalkatreszek_torlese.php?alkatresz_id=<?php echo $advertisement['alkatresz_id']; ?>" class="btn btn-danger">Törlés</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary btn-danger">Vissza</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
