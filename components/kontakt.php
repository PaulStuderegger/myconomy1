<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
  <div class="d-flex align-items-center">
    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
    <h2 class="fs-2 m-0">Kontakt</h2>
  </div>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
          role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user me-2"></i>John Doe
        </a>
                
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#"><i class="fas fa-power-off me-2"></i>Abmelden</a></li>
        </ul>
      </li>
    </ul>
  </div>
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