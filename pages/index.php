<?php
/* DB-Test
  echo Utils::nextId("User");
  session_start();
  session_unset();
  require_once "..\classes\user.php";*/
require_once "..\classes\utils.php";
// Utils::resetDb();
session_start();
session_unset();
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

  <!-- <link rel="stylesheet" href="../styles/styles.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> -->
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
        <i class="fas fa-money-bill-wave me-2"></i>My-Conomy</div>
      
        <div class="list-group list-group-flush my-3">
          <a href="?menu=funktionen" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-gift me-2"></i>Funktionen
          </a>
          <a href="?menu=signin" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-sign-in-alt me-2"></i>Login
          </a>
          <!-- <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
            <i class="fas fa-power-off me-2"></i>Logout
          </a> -->
          <a href="?menu=kontakt" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-envelope me-2"></i>Kontakt
          </a>
          <a href="?menu=datenschutz" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user-secret me-2"></i>Datenschutz
          </a>
          <a href="?menu=impressum" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-industry me-2"></i>Impressum
          </a>
          <a href="?menu=template" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            VORLAGE
          </a>
        </div>
      </div>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
          <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Funktionen</h2>
          </div>
        </nav> -->

        <div class="container-fluid px-4">
          <?php
             if (isset($_GET["menu"]))
             {
              switch ($_GET["menu"])
              {
                case "template":
                  include ("../components/template.php");
                  break;
                case "signin":
                  include ("../components/signin.php");
                  break;
                case "signup":
                  include ("../components/signup.php");
                  break;
                case "datenschutz":
                  include ("../components/datenschutz.php");
                  break;
                case "impressum":
                  include ("../components/impressum.php");
                  break;
                case "kontakt":
                  include ("../components/kontakt.php");
                  break;
                default:
                  include ("funktionen.php");
                  break;
              }
             }
          ?>
        </div>
      </div>
    </div>
  </div>    

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> -->
  <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
      el.classList.toggle("toggled");
    };
  </script>
</body>
</html>