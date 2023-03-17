<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>TuneYourA3.hu</title>
</head>
<body>

<video autoplay loop muted plays-inline class="indexvideo">
  <source src="indexvideo.mp4" type="video/mp4">
</video>

<?php

require_once 'kapcsolat.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $jelszo = $_POST['password'];

    $sql = "SELECT * FROM felhasznalo WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($jelszo, $row['jelszo'])) {
        $_SESSION['ID'] = $row['ID'];
        $_SESSION['felhasznalonev'] = $row['felhasznalonev'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['admin'] = $row['admin'];
        $success = "Sikeres bejelentkezés!";
        header("Location: index.php"); 
        exit(); 
    } else {
      echo "<script>alert('Hibás email vagy jelszó!');</script>";
    }
}
}

?>

<form method="post" action="Belepes.php" name="loginform" class="registration-form">
  <h2>Bejelentkezés:</h2>

  <div class="form-group">
  <label for="email">Email:</label>
<input type="email" id="email" name="email" required>

  </div>

  <div class="form-group">
  <label for="password">Jelszó:</label>
<input type="password" id="password" name="password" required>
  </div>

  <button type="submit" name="login" class="btn btn-primary btn-danger">Belépés</button>
  
  <a class="btn btn-primary btn-danger" href="index.php">Vissza</a>
  
<style>
  
  .content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: 1;
}


  h2{
    color: #DC3545;
  }

  .form-group{
  color: #DC3545;
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

@media (max-aspect-ratio:16/9){
      .indexvideo{
        width: auto;
        height: 100%;
      }
    
    }
    
    .registration-form{
      background: rgba(36, 34, 34, 0.5);
      border: 5px;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #DC3545;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    #success-message {
  color: #DC3545;
  font-size: 150%;
    }

    </style>


</form>
</body>
</html>