<!DOCTYPE html>
<html lang="hu">
<head>
  <title>TuneYourA3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <?php include('felhasznalo_adat.php'); ?>
  <div class="container">
    <h2>Alkatrész hozzáadása</h2>
   
    <form action="#.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="tipus">Típus:</label>
        <select class="form-control" id="tipus" name="tipus">
          <option value="8l">8L</option>
          <option value="8p">8P</option>
          <option value="8v">8V</option>
        </select>
     
    </div>
      <div class="form-group">
        <label for="kategoria">Kategória:</label>
        <select class="form-control" id="kategoria" name="kategoria">
          <option value="optika">Optika</option>
          <option value="motor">Motor</option>
          <option value="futomu">Futómű</option>
          <option value="sportfek">Sportfék</option>
          <option value="levegoszuro">Levegőszűrő</option>
          <option value="sportkipufogo">Sportkipufogó</option>
        </select>
      </div>
     
      <div class="form-group">
        <label for="nev">Név:</label>
        <input type="text" class="form-control" id="nev" name="nev" required>
      </div>
      
      <div class="form-group">
        <label for="kep">Kép:</label>
        <input type="file" class="form-control" id="kep" name="kep">
      </div>
     
      <div class="form-group">
        <label for="leiras">Leírás:</label>
        <textarea class="form-control" id="leiras" name="leiras" rows="4" required></textarea>
      </div>
      <div class="form-group">
  <label for="ar">Ár:</label>
  <input type="number" class="form-control" id="ar" name="ar" step="0.01" min="0" required>
</div>
      <button type="submit" class="btn btn-danger">Hozzáadás</button>
      <a class="btn btn-primary btn-danger" href="ujalkatreszek.php">Vissza</a>
    </form>
 </div>
 
 <?php
  include('felhasznalo_adat.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipus = $_POST["tipus"];
    $kategoria = $_POST["kategoria"];
    $nev = $_POST["nev"];
    $ar = $_POST["ar"];
    $leiras = $_POST["leiras"];
    
    $kep = $_FILES["kep"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["kep"]["name"]);
    move_uploaded_file($_FILES["kep"]["tmp_name"], $target_file);

    
    $sql = "INSERT INTO `$tipus` (nev, kategoria, leiras, kep, ar) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssd", $nev, $kategoria, $leiras, $kep, $ar);
    $stmt->execute();

    echo "Az alkatrész sikeresen hozzáadva!";
  }
?>

<style>
    body{
      background-color: #343a40;
      color: white;
    }
    </style>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

