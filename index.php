<!DOCTYPE html>
<html lang="hu">
<head>
  <title>TuneYourA3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <style>
    .content{
      position: absolute;
      top: calc(50% - 120px);
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 1;
    }

    img {
      width: 55%;
    }

    .content h1{
      font-size: 90px;
      color: white;
      font-weight: 600;
    }
    
    .indexvideo{
  position: absolute;
  right: 0;
  bottom: 0;
  z-index: -1;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

    .login-btn {
      margin-right: 10px;
      margin-right: 10px;
      border-color: red;
    }

    @media (max-aspect-ratio:16/9){
      .indexvideo{
        width: auto;
        height: 100%;
      }
    }

  </style>
</head>
<body>
  <video autoplay loop muted plays-inline class="indexvideo">
    <source src="indexvideo.mp4" type="video/mp4">
  </video>

  <div class="content">
    <img src="logo.png" alt="Your Image"><br><br>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        Termék állapota
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="ujalkatreszek.php">Új</a></li>
        <li><a class="dropdown-item" href="piac.php">Használt</a></li>
      </ul>
    </div>
  </div>

  <div class="d-flex justify-content-end align-items-center p-3">
    <a href="Belepes.php" class="btn btn-outline-light login-btn">Belépés</a>
    <a href="regisztracio.php" class="btn btn-primary btn-danger">Regisztráció</a>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
