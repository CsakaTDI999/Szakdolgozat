<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TuneYourA3.hu</title>
</head>
<body>
    
<form method="post" action="register.php" class="registration-form">
  <h2>Regisztráció</h2>

  <div class="form-group">
    <label for="name">Név:</label>
    <input type="text" name="name" required>
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
  </div>

  <div class="form-group">
    <label for="phone">Telefonszám:</label>
    <input type="phone" name="phone" required>
  </div>

  <div class="form-group">
    <label for="password">Jelszó:</label>
    <input type="password" name="password" required>
  </div>

  <button type="submit" name="submit">Regisztráció</button>

  <button onclick="Back()" name="back">Vissza</button>
  <script>
function Back() {
  window.history.back();
}
</script>
</form>
</body>
</html>