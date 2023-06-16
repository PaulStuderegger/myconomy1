<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
  <div class="d-flex align-items-center">
    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
    <h2 class="fs-2 m-0">Sparziele</h2>
  </div>
</nav>

<!-- main content -->
<div class="container-fluid px-4">
  <!-- Form für Produkteingabe -->
  <div class="row g-3 my-2">

    <div class="col-md-2"></div>
    
    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
        <div>
          <form action="" method="post">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="form-label" for="email">Produktname:</label>
                  <input class="form-control" type="text" name="productname" required>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label" for="email">Preis:</label>
                  <input class="form-control" type="number" name="price" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <input class="form-control btn btn-danger" type="submit" name="delete-product" value="Löschen">
              </div>
              <div class="col">
                <input class="form-control btn btn-success" type="submit" name="save-product" value="Speichern">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-3 my-2">

    <div class="col-md-2"></div>
    
    <!-- Tabelle für Anzeige der Produkte -->
    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Produkt</th>
              <th>Preis</th>
              <th>Restbetrag</th>
            </tr>
          </thead>
          <tbody>
            <?php
                  $SaveGoals = Savegoal::GetAllSaveGoalsForUser($_SESSION['loggedUser']["UserId"]);
                  if ($SaveGoals) 
                  {
                      foreach ($SaveGoals as $SaveGoalsDS) {
                          echo "<tr>";
                          echo "<td>" . $SaveGoalsDS["SavingGoalName"] . "</td>";
                          echo "<td>" . $SaveGoalsDS["SavingGoalAmount"] . "</td>";
                          echo "<td>" . "<div class='progress'>
                          <div class='progress-bar  bg-success' role='progressbar' style='width:" . 100 - ($SaveGoalsDS["SavingGoalRestAmount"] / $SaveGoalsDS["SavingGoalAmount"]) * 100 . "%;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>" . $SaveGoalsDS["SavingGoalAmount"] - $SaveGoalsDS["SavingGoalRestAmount"] . "</div>
                        </div></td>";
                          echo '</tr>';
                      }
                  }
              ?>
            </tbody>
        </table>
      </div>
    </div>

    <!-- Form für Sparbetrag Eingabe -->
    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-label" for="email">Produkt per Klick auswählen:</label>
                <select class="form-control" name="savinggoalname">
                  <option value="savinggoal">Fernseher</option>
                  <option value="savinggoal">PC</option>
                  <option value="savinggoal">Auto</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="form-label" for="email">Sparbetrag:</label>
                <input class="form-control" type="number" max="" name="savingamount" required>
              </div>
            </div>
          </div>

          <br>

          <div class="form-group">
            <input class="form-control btn btn-success" type="submit" name="save-savingamount" value="Speichern">
          </div>
        </form>
      </div>
    </div>

  </div>
</div>