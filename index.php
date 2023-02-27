<!DOCTYPE html>
<html lang="hu">
<head>
  <title>TuneYourA3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <style>
    
    

    img {
      width: 70%;
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

    .content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: 1;
}

.condition-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 50px;
  opacity: 0.85;
}


    .condition-text a {
  font-size: 20px;
  line-height: 25px;
  margin-bottom: 10px;
  color: white;
  text-decoration: none;

}

.user-info {
  position: absolute;
  top: 10px;
  right: 10px;
  color: white;
}
.user-info a {
  color: #DC3545;
  margin-left: 10px;
}

  </style>
</head>
<body>
  <video autoplay loop muted plays-inline class="indexvideo">
    <source src="indexvideo.mp4" type="video/mp4">
  </video>

  <div class="content">
    <img src="logo.png" alt="logo"><br><br>

    <div class="condition-text">
      <a href="ujalkatreszek.php" class="btn btn-danger">Új alkatrészek</a>
      <a href="piac.php" class="btn btn-danger">Használt alkatrészek</a>
    </div>
  </div>

 <div class="d-flex justify-content-end align-items-center p-3">
    
    <a href="Belepes.php" class="btn btn-outline-light login-btn">Belépés</a>
    <a href="regisztracio.php" class="btn btn-primary btn-danger">Regisztráció</a>

  </div>
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php
session_start()
if (isset($_SESSION["felhasznalo"])) {

 
}
else {
  if(!isset($_post['login']))}
{
require_once("Belepes.php")

else
{
require_once("kapcsolat.php");
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT FROM felhasznalo WHERE (email = '$email' AND jelszo ='$password')"; 

}
}



  

?>

</body>
</html>
