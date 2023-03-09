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

 $sql = "SELECT h.ID, h.Nev, h.leiras, h.hely, h.kep, h.evjarat, f.felhasznalonev, f.telefonszam
FROM h_alkatresz h, felhasznalo f
WHERE h.felhasznalo_id=f.ID";
 $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="' . ($row['kep'] ? $row['kep'] : 'nincsprofilkep.png') . '" class="card-img-top" alt="' . $row['Nev'] . '">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">' . $row['Nev'] . '</h5>
                  <p class="card-text">' . $row['leiras'] . '</p>
                  <p class="card-text"><small class="text-muted">' . $row['hely'] . ' - ' . $row['evjarat'] . '</small></p>
                  <p class="card-text"><small class="text-muted">' . $row['felhasznalonev'] . ' - ' . $row['telefonszam'] . '</small></p>
                </div>
              </div>
            </div>
          </div>';
  }
} else {
  echo "Nincs találat.";
}

mysqli_close($conn);
?>

<div class="container">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?php echo $row['kep'] ? $row['kep'] : 'nincsprofilkep.png'; ?>" class="card-img-top" alt="<?php echo $row['Nev']; ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['Nev']; ?></h5>
            <p class="card-text"><?php echo $row['leiras']; ?></p>
            <p class="card-text"><small class="text-muted"><?php echo $row['hely']; ?> - <?php echo $row['evjarat']; ?></small></p>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<style>
  .card {
  margin-bottom: 30px;
}

.card-img-top {
  width: 170px;
  height: 170px;
  
}

.card-body {
  height: 150px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
  </style>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
