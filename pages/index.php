<?php
/* DB-Test
  echo Utils::nextId("User");
  session_start();
  session_unset();
  require_once "..\classes\user.php";*/
require_once "..\classes\utils.php";
// Utils::resetDb();
session_start();
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
    <link rel="stylesheet" href="../styles/fonts.css">
    <link rel="stylesheet" href="../styles/functions.css" />
    <link rel="stylesheet" href="../styles/styles.css" />
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
      <?php
        if (isset($_SESSION['logged']))
        {
          include ("../components/sidebar_post_login.php");
        }
        else
        {
          include ("../components/sidebar_pre_login.php");
        }
      ?>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid px-4">
          <?php
             if (isset($_GET["menu"]))
             {
              switch ($_GET["menu"])
              {
                case "dashboard":
                  include ("../components/dashboard.php");
                  break;
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
                  include ("../components/functions.php");
                  break;
              }
             }
             else
             {
              include ("../components/functions.php");
             }
          ?>
        </div>
      </div>
    </div>
  </div>    

  <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
      el.classList.toggle("toggled");
    };
  </script>
</body>
</html>