<!DOCTYPE html>
<html lang="hu">
<head>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>TuneYourA3.hu</title>
</head>
<body>

<video autoplay loop muted plays-inline class="indexvideo">
  <source src="indexvideo.mp4" type="video/mp4">
</video>

<form method="post" id="reg-form" class="registration-form">
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

  <div id="success-message" style="display:none;">Sikeres regisztráció!</div>


  <button type="button" name="submit" class="btn btn-primary btn-danger" onclick="submitForm()">Regisztráció</button>


  <button onclick="Back()" name="back" class="btn btn-primary btn-danger">Vissza</button>
  
<style>

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
    
  </style>

<script>

function Back() {
  window.history.back();
}

function submitForm() {
  var form_data = $("#reg-form").serialize();
  $.ajax({
    type: "POST",
    url: "db_connect.php",
    data: form_data,
    success: function(response) {
      $("#success-message").show();
    }
  });
}


</script>
</form>
</body>
</html>