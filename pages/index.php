<?php
/* DB-Test
require_once "..\classes\utils.php";
  $dbcontent = Utils::executeAnything("select EMail, Password from User");
  echo Utils::nextId("User");
  session_start();
  session_unset();
  require_once "..\classes\user.php";*/
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

  <style>
    form {
      font-size: 16px;
    }

    form .form-group {
      margin-bottom: 12px;
    }

    form input[type="submit"] {
      font-size: 16px;
      margin-top: 15px;
    }
  </style>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
        <i class="fas fa-money-bill-wave me-2"></i>My-Conomy</div>
      
        <div class="list-group list-group-flush my-3">
          <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-gift me-2"></i>Funktionen
          </a>
          <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-sign-in-alt me-2"></i>Login
          </a>
          <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
            <i class="fas fa-power-off me-2"></i>Logout
          </a>
        </div>
      </div>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
          <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Funktionen</h2>
          </div>
        </nav>

        <div class="container-fluid px-4">
          <div class="row g-3 my-2">
          
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
                <div>
                  <!-- <h3 class="fs-2">4920</h3>
                  <p class="fs-5">Sales</p> -->

                  <form method="post" action="./index.php">
                    <?php
                      $username = isset($_POST['email']) ? $_POST['email'] : '';
                      $password = isset($_POST['password']) ? $_POST['password'] : '';
                    ?>
                    <div class="form-group">
                      <label class="form-label" for="email">Email:</label>
                      <input class="form-control" name="email" type="email" id="email">
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="password">Passwort:</label>
                      <input class="form-control" name="password" type="password" id="password">
                    </div>

                    <input type="submit" class="btn btn-success" name="submit" value="Anmelden">
                  </form>
                  <?php
                    if (isset($_POST['submit']) && $username != '' && $password != '') {
                        User::ValidateUser($username, $password);
                    }
                ?>             
                </div>
              </div>
            </div>

            <div class="col-md-4"></div>
          </div>
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

<!-- <div class="wrapper">
  
  <?php include '../components/sidebar_beforeLogin.php' ?>
  
  <div class="main_content">
    <div class="header">Home</div>
      <div class="info">
        <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
        <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
        <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A sed nobis ut exercitationem atque accusamus sit natus officiis totam blanditiis at eum nemo, nulla et quae eius culpa eveniet voluptatibus repellat illum tenetur, facilis porro. Quae fuga odio perferendis itaque alias sint, beatae non maiores magnam ad, veniam tenetur atque ea exercitationem earum eveniet totam ipsam magni tempora aliquid ullam possimus? Tempora nobis facere porro, praesentium magnam provident accusamus temporibus! Repellendus harum veritatis itaque molestias repudiandae ea corporis maiores non obcaecati libero, unde ipsum consequuntur aut consectetur culpa magni omnis vero odio suscipit vitae dolor quod dignissimos perferendis eos? Consequuntur!</div>
      </div>
  </div>
</div> -->

</body>
</html>