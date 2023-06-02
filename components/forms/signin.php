<?php
require_once "..\classes\user.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Validate the login credentials
  User::ValidateUserSignIn($username, $password);
}
?>

<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
  <div class="d-flex align-items-center">
    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
    <h2 class="fs-2 m-0">Anmelden</h2>
  </div>

  <?php
    include ("../components/user_logout.php");
  ?>
</nav>

<!-- main content -->
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