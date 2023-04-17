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
  <?php require_once('kapcsolat.php'); ?>
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
  session_start();

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
  <div class="container">
    <div class="row">
      <div class="col-12 text-end mt-3">
        <a href="ujalkatreszek.php" class="btn btn-danger">Vissza</a>
      </div>
    </div>
  </div>
  <?php
    $model = $_GET['model'] ?? '8l';

    if (isset($_GET['kategoria'])) {
        $kategoria = $_GET['kategoria'];
    } else {
        die("Nem található a kategória");
    }

    $sql = "SELECT * FROM $model WHERE kategoria = '$kategoria'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="' . ($row['kep'] ? 'uploads/' . $row['kep'] : 'nincsprofilkep.png') . '" class="card-img-top" alt="' . $row['nev'] . '">
                        </div>
                        <div class="col-md-7 d-flex align-items-center">
                        <div class="card-body">
                        <div class="row">
                        <div class="col-8">
                            <h5 class="card-title">' . $row['nev'] . '</h5>
                            <p class="card-text">' . $row['leiras'] . '</p>
                        </div>
                        <div class="col-4">
                            <p class="card-text"><small class="text-muted">Kategória: ' . $row['kategoria'] . '</small></p>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-1 d-flex align-items-center">
                            <div class="card-body">
                            <p class="card-text"><small class="text-muted">ID: ' . $row['id'] . '</small></p>
                            <p class="card-text"><small class="text-muted">Ár: ' . number_format($row['ar'], 2, ',', ' ') . ' Ft</small></p>
                            
                        </div>
                        </div>
                    </div>
                </div>';
        }
    } else {
      echo '<div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3 class="mt-5">Ops... Itt még nincs semmi :/</h3>
        </div>
      </div>
    </div>';
    }

    $conn->close();
  ?>

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