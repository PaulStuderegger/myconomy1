<?php
require_once "..\classes\user.php";
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
	<title>Startseite</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Icons - Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    
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
            <form method="post" action="./signup.php">
              <?php
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                $username = isset($_POST['username']) ? $_POST['username'] : '';
              ?>
                    
              <div class="form-group">
                <label class="form-label" for="username">Benutzername:</label>
                <input class="form-control" name="username" type="username" id="username">
              </div>

              <div class="form-group">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" name="email" type="email" id="email">
              </div>

              <div class="form-group">
                <label class="form-label" for="password">Passwort:</label>
                <input class="form-control" name="password" type="password" id="password">
              </div>

              <input type="submit" class="btn btn-success" name="submit" value="Registrieren">
            </form>
            
            <?php
              if (isset($_POST['submit']) && $username != '' && $password != '')
              {
                User::ValidateUserSignUp($username, $email, $password);
              }
            ?>             
          </div>
        </div>
      </div>

      <div class="col-md-4"></div>
    </div>
  </div>
</body>
</html>