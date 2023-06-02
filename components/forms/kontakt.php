<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
  <div class="d-flex align-items-center">
    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
    <h2 class="fs-2 m-0">Kontakt</h2>
  </div>

  <?php
    include ("../components/other/user_logout.php");
  ?>
</nav>

<!-- main content -->
<div class="container-fluid px-4">
  <div class="row g-3 my-2">
          
    <div class="col-md-4"></div>
            
    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
        <div>
          <form method="post" action="">

            <div class="form-group">
              <label class="form-label" for="email">Email:</label>
              <input class="form-control" name="email" type="email" id="email" required>
            </div>
          
            <div class="form-group">
              <label class="form-label" for="betreff">Betreff:</label>
              <input class="form-control" name="betreff" type="text" id="betreff" required>
            </div>

            <div class="from-group">
              <label class="form-label" for="signup">Nachricht:</label>
              <textarea class="form-control" name="nachricht" id="nachricht" cols="30" rows="10" required></textarea>
            </div>

            <input type="submit" class="btn btn-success" name="submit" value="Absenden">

          </form>           
        </div>
      </div>
    </div>

    <div class="col-md-4"></div>

  </div>
</div>