<?php
require_once "..\classes\user.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Validate the login credentials
  User::ValidateUserSignIn($username, $password);
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
	<title>Startseite</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- eigenes CSS -->
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="stylesheet" href="../styles/login.css" />

  <!-- <link rel="stylesheet" href="../styles/styles.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> -->
</head>

<body>
  <div class="container-fluid px-4">
    <div class="row g-3 my-2">
          
      <div class="col-md-4"></div>
            
      <div class="col-md-4">
        <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
          <div>
            <form method="post" action="./index.php?menu=signin">
              <?php
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
              ?>
                    
              <div class="form-group">
                <label class="form-label" for="username">Benutzername:</label>
                <input class="form-control" name="username" type="text" id="username" required>
              </div>

              <div class="form-group">
                <label class="form-label" for="password">Passwort:</label>
                <input class="form-control" name="password" type="password" id="password" required>
              </div>

              <div class="from-group">
                <label for="signup">Noch kein Konto?</label>
                <a href="?menu=signup">Hier Registrieren</a>
              </div>

              <input type="submit" class="btn btn-success" name="submit" value="Anmelden">
            </form>          
          </div>
        </div>
      </div>

      <div class="col-md-4"></div>
    </div>
  </div>
</body>
</html>