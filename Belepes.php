<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>TuneYourA3.hu</title>
</head>
<body>

<video autoplay loop muted plays-inline class="indexvideo">
  <source src="indexvideo.mp4" type="video/mp4">
</video>

<?php


// adatbázis kapcsolódás
$servername = "localhost";
$username = "Admin";
$password = "ILw3dA93(yhGs*GG";
$dbname = "szakdolgozat";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// ellenőrizzük a kapcsolatot
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// form elküldésekor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // email és jelszó ellenőrzése
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ellenőrizzük, hogy a felhasználói email és jelszó helyes-e
    $sql = "SELECT * FROM felhasznalo WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // sikeres bejelentkezés, tároljuk a felhasználói adatokat a session-ban
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header('Location: index.php');
            exit;
        } else {
            $error = "Hibás email vagy jelszó!";
        }
    } else {
        $error = "Hibás email vagy jelszó!";
    }
}

 ?>


<form method="post" action="index.php" name="loginform" class="registration-form">
  <h2>Bejelentkezés:</h2>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
  </div>

  <div class="form-group">
    <label for="password">Jelszó:</label>
    <input type="password" name="password" required>
  </div>

  <button type="submit" name="login" class="btn btn-primary btn-danger">Belépés</button>
  
  <button onclick="Back()" name="back" class="btn btn-primary btn-danger">Vissza</button>
  <script>
function Back() {
  window.history.back();
}
</script>
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