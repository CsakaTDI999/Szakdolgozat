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



  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="logo.png" class="img-fluid"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"> 
              <a class="nav-link" aria-current="page" href="index.php">Rólunk</a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Alkatrészek
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ujalkatreszek.php">Új</a></li>
                  <li><a class="dropdown-item" href="piac.php">Használt</a></li>
              </ul>
              </li>
          </ul>
          <ul class="navbar-nav me-0 mb-2 mb-lg-0">
          <?php
 require_once('kapcsolat.php');

  if (isset($_SESSION['felhasznalonev'])) {
    echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="alkatreszfeltoltes.php">Hirdetésfeladás</a></li>';
  } else {
    echo '<li class="nav-item">
            <a class="nav-link" aria-current="page" href="regisztracio.php">Regisztráció</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Belepes.php">Belépés</a>
          </li>';
  }
?> 
          </ul>
      </div>
    </div>
  </nav>
  
  <?php
 require_once('kapcsolat.php');

$sql = "SELECT ID, nev, leiras, hely, evjarat, kep FROM h_alkatresz";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $ID = $row["ID"];
  $nev = $row["nev"];
  $leiras = $row["leiras"];
  $hely = $row["hely"];
  $evjarat = $row["evjarat"];
  $kep = $row["kep"];
} else {
  echo "Nincs találat.";
}


mysqli_close($conn);
?>

<div class="container">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="card mb-3">
      <img src="<?php echo $row['kep']; ?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['nev']; ?></h5>
        <p class="card-text"><?php echo $row['leiras']; ?></p>
        <p class="card-text"><small class="text-muted"><?php echo $row['hely']; ?> - <?php echo $row['evjarat']; ?></small></p>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<style>
  .card {
  margin-bottom: 20px;
}


  </style>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
