<?php
require_once('kapcsolat.php');

if (!isset($_SESSION['ID']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
  header('Location: Belepes.php');
  exit();
}


$stmt = $conn->prepare('SELECT h_alkatresz.*, felhasznalo.felhasznalonev FROM h_alkatresz JOIN felhasznalo ON h_alkatresz.ID = felhasznalo.ID');
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
        <a href="profil.php" class="btn btn-danger btn-primary mb-3">Vissza a profilhoz</a>
        <div class="mb-3">
    <label for="tabla-valaszto" class="form-label">Válassz táblát:</label>
    <select class="form-select" id="tabla-valaszto" name="tabla">
        <option value="h_alkatresz">h_alkatresz</option>
        <option value="8l">8l</option>
        <option value="8p">8p</option>
        <option value="8v">8v</option>
    </select>
</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Leírás</th>
                    <th>Ár</th>
                    <th>Hírdető</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hirdetesek as $hirdetes): ?>
                    <tr>
                        <td><?php echo $hirdetes['alkatresz_id']; ?></td>
                        <td><?php echo $hirdetes['Nev']; ?></td>
                        <td><?php echo $hirdetes['leiras']; ?></td>
                        <td><?php echo $hirdetes['ar']; ?></td>
                        <td><?php echo $hirdetes['felhasznalonev']; ?></td>
                        <td>
                            <a href="hirdetes_szerkesztese.php?id=<?php echo $hirdetes['alkatresz_id']; ?>" class="btn btn-warning">Szerkesztés</a>
                            <a href="hirdetes_torles.php?id=<?php echo $hirdetes['alkatresz_id']; ?>" class="btn btn-danger">Törlés</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    
    <script> //forrás: stac koverflow
    document.addEventListener('DOMContentLoaded', () => {
        const tablaValaszto = document.getElementById('tabla-valaszto');
        const tableBody = document.querySelector('.table tbody');

        tablaValaszto.addEventListener('change', async (e) => {
            const selectedTable = e.target.value;
            const response = await fetch(`fetch_table_data.php?tabla=${selectedTable}`);
            const data = await response.json();

            tableBody.innerHTML = '';

            data.forEach((row) => {
                const tr = document.createElement('tr');

                Object.values(row).forEach((cellValue) => {
                    const td = document.createElement('td');
                    td.textContent = cellValue;
                    tr.appendChild(td);
                });

                const actionsTd = document.createElement('td');
                actionsTd.innerHTML = `
                    <a href="hirdetes_szerkesztese.php?id=${row.alkatresz_id}" class="btn btn-warning">Szerkesztés</a>
                    <a href="hirdetes_torles.php?id=${row.alkatresz_id}" class="btn btn-danger">Törlés</a>
                `;
                tr.appendChild(actionsTd);

                tableBody.appendChild(tr);
            });
        });
    });
</script>
</body>
</html>