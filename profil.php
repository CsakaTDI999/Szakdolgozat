<?php
session_start();
require_once('kapcsolat.php');

if (!isset($_SESSION['ID'])) {
  header('Location: Belepes.php');
  exit();
}

$stmt = $conn->prepare('SELECT * FROM felhasznalo WHERE ID = ?');
$stmt->bind_param('i', $_SESSION['ID']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
  $newUsername = $_POST['username'];
  $newProfilePicture = $_FILES['profile_picture']['name'];

  if ($newProfilePicture) {
    $targetDirectory = 'uploads/';
    $targetFile = $targetDirectory . basename($_FILES['profile_picture']['name']);

    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFile)) {
      $stmt = $conn->prepare('UPDATE felhasznalo SET felhasznalonev = ?, profilkep = ? WHERE ID = ?');
      $stmt->bind_param('ssi', $newUsername, $newProfilePicture, $_SESSION['ID']);
      $stmt->execute();
      $row['felhasznalonev'] = $newUsername;
      $row['profilkep'] = $newProfilePicture;
    }
  } else {
    $stmt = $conn->prepare('UPDATE felhasznalo SET felhasznalonev = ? WHERE ID = ?');
    $stmt->bind_param('si', $newUsername, $_SESSION['ID']);
    $stmt->execute();
    $row['felhasznalonev'] = $newUsername;
  }
}

?>
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
  
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-center mb-4">Profilom</h1>
            <form method="POST" action="profil.php" enctype="multipart/form-data">
              <div class="form-group mb-3">
  <label for="username">Felhasználónév</label>
  <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['felhasznalonev']; ?>">
</div>
<div class="form-group mb-3">
  <label for="profile_picture">Profilkép</label>
  <input type="file" class="form-control" id="profile_picture" name="profile_picture">
  <?php if ($row['profilkep']): ?>
    <img src="uploads/<?php echo $row['profilkep']; ?>" class="img-fluid mt-3" alt="Profilkep">
  <?php endif; ?>
</div>
              <button type="submit" class="btn btn-primary">Mentés</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
