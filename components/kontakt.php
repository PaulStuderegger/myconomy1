<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
	<title>Kontakt</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- eigenes CSS -->
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="stylesheet" href="../styles/login.css" />
</head>

<body>
  <div class="container-fluid px-4">
    <div class="row g-3 my-2">
          
      <div class="col-md-4"></div>
            
      <div class="col-md-4">
        <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
          <div>
            <form method="post" action="./index.php">
              <!-- <?php
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
              ?> -->
                    
              <div class="form-group">
                <label class="form-label" for="betreff">Betreff:</label>
                <input class="form-control" name="betreff" type="text" id="betreff" required>
              </div>

              <div class="from-group">
                <label class="form-label" for="signup">Nachricht:</label>
                <textarea name="nachricht" id="nachricht" cols="30" rows="10" required></textarea>
              </div>

              <input type="submit" class="btn btn-success" name="submit" value="Anmelden">
            </form>
              
            <?php
              if (isset($_POST['submit']) && $username != '' && $password != '')
              {
                User::ValidateUserSignIn($username, $password);
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