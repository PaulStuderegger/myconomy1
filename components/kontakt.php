<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
  <div class="d-flex align-items-center">
    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
    <h2 class="fs-2 m-0">Kontakt</h2>
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
          <form method="post" action="./index.php">
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
        </div>
      </div>
    </div>

    <div class="col-md-4"></div>

  </div>
</div>