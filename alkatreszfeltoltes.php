<!DOCTYPE html>
<html lang="hu">
<head>
  <title>TuneYourA3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
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
              <li class="nav-item">
              <a class="nav-link" aria-current="page" href="regisztracio.php">Regisztráció</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="Belepes.php">Belépés</a>
              </li>
          </ul>
      </div>
    </div>
  </nav>
  <div class="container">
		<h2>Alkatrész felvétele</h2>
		<form action="alkatresz_felvetel.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="nev">Alkatrész neve:</label>
				<input type="text" class="form-control" id="nev" name="nev" required>
			</div>
			<div class="form-group">
				<label for="evjarat">Alkatrész évjárata:</label>
				<input type="number" class="form-control" id="evjarat" name="evjarat" required>
			</div>
			<div class="form-group">
				<label for="tipus">Alkatrész típusa:</label>
				<input type="text" class="form-control" id="tipus" name="tipus" required>
			</div>

            <div class="form-group">
				<label for="tmarka">Alkatrész márkája:</label>
				<input type="text" class="form-control" id="marka" name="marka" required>
			</div>
			
			<div class="form-group">
				<label for="kep">Fénykép:</label>
				<input type="file" class="form-control-file" id="kep" name="kep" required>
			</div>
			<button type="submit" class="btn btn-primary">Felvétel</button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  </html>