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
    echo '<li class="nav-item dropdown">';
    echo '<a class="nav-link dropdown-toggle profilom-button" href="#" id="userProfileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profilom</a>';
    echo '<ul class="dropdown-menu" aria-labelledby="userProfileDropdown">';

    $profilePicture = 'nincsprofilkep.png';

    if (isset($_SESSION['profilkep']) && !empty($_SESSION['profilkep']) && file_exists('uploads/' . $_SESSION['profilkep'])) {
        $profilePicture = 'uploads/' . $_SESSION['profilkep'];
    }

    echo '<li class="dropdown-item">
            <img src="' . $profilePicture . '" class="img-fluid rounded-circle" style="width: 50px; height: auto;">
            <p>' . $_SESSION['felhasznalonev'] . '</p>
        </li>';

    echo '<li><hr class="dropdown-divider"></li>';
    echo '<li><a class="dropdown-item" href="kijelentkezes.php">Kijelentkezés</a></li>';
    echo '</ul>';
    echo '</li>';
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
     </div>
</div>
</nav>
  
  
<div class="image-container" style="text-align: center;">
  <div>
    <a href="8l.php"><img src="Képek/audi8l.png" alt="8l" /></a>
    <p>A3 8L (1996-2003)</p>
  </div>
  <div>
    <a href="8p.php"><img src="Képek/audi8p.png" alt="8p" /></a>
    <p>A3 8P(2003-2012)</p>
  </div>
  <div>
    <a href="8v.php"><img src="Képek/audi8v.png" alt="8v" /></a>
    <p>A3 8V(2012-)</p>
  </div>
</div>


  <style>
     body {
    background-color: #343a40;
  }
   .image-container div {
    display: inline-block;
  text-align: center;
  vertical-align: top;
  width: 33%;
  margin: 10px;
  }

  .image-container img {
    width: 50%;
  height: auto;
  }
  
  .image-container p {
  color: white;
  font-size: 1.8em;
  }

  .profile-dropdown-container {
  position: relative;
}

.nav-item.dropdown {
  position: relative;
}

  .dropdown-menu {
  position: absolute;
  left: 0;
  top: 100%; 
  background-color: #343a40;
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  max-width: 250px;
}



.dropdown-item {
  position: relative;
  color: white;
  white-space: nowrap;
}

.dropdown-item:hover {
  background-color: #5a6268;
  color: white; 
}



  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  </html>
