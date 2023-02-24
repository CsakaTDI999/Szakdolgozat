<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>TuneYourA3.hu</title>
</head>
<body>
<form method="post" action="register.php" class="registration-form">
  <h2>Bejelentkezés:</h2>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
  </div>

  <div class="form-group">
    <label for="password">Jelszó:</label>
    <input type="password" name="password" required>
  </div>

  <button type="submit" name="submit" class="btn btn-primary btn-danger">Belépés</button>
  
  <button onclick="Back()" name="back" class="btn btn-primary btn-danger">Vissza</button>
  <script>
function Back() {
  window.history.back();
}
</script>

</form>
</body>
</html>