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
    
  <div class="8pcontainer">
    <h3>Audi A3 8P (2003-2012):</h3>
    <p>Kérem válassza ki a keresni kívánt alkatrészeket!</p>
  </div>
 
  <div class="image-row">
  <div class="image-column">
    <a href="alkatreszek.php?kategoria=optika&model=8p"><img src="Képek/optika.png" alt="Kép 1"></a>
    <p>Optika</p>
  </div>
  <div class="image-column">
    <a href="alkatreszek.php?kategoria=motor&model=8p"><img src="Képek/motor.png" alt="Kép 2"></a>
    <p>Motor</p>
  </div>
  <div class="image-column">
    <a href="alkatreszek.php?kategoria=futomu&model=8p"><img src="Képek/futomu.png" alt="Kép 3"></a>
    <p>Futómű</p>
  </div>
  <div class="image-column">
    <a href="alkatreszek.php?kategoria=sportfek&model=8p"><img src="Képek/fek.png" alt="Kép 4"></a>
    <p>Sportfék</p>
  </div>
  <div class="image-column">
  <a href="alkatreszek.php?kategoria=legszuro&model=8p"><img src="Képek/legszuro.png" alt="Kép 5"></a>
    <p>levegőszűrő</p>
  </div>
  <div class="image-column">
  <a href="alkatreszek.php?kategoria=kipufogo&model=8p"><img src="Képek/kipufogo.png" width="100px" height="100px" alt="Kép 6" ></a>
    <p>Sportkipufogó</p>
  </div>
</div>
<style>

body {
  background-color: #343a40;
  color: white;
}

   .image-row {
  display: flex;
  flex-wrap: wrap;
}

.image-column {
  flex: 10%;
  text-align: center;
}

img {
  display: block;
  width: 50%;
  height: auto;
  margin: 0 auto;
}

p {
  text-align: center;
  font-size: 25px;
}

h3 {
    font-size: 40px;
}
    </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  </html>
