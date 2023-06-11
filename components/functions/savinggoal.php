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
            <thead>
              <tr>
                <th>Produkt</th>
                <th>Preis</th>
                <th>Restbetrag</th>
              </tr>
            </thead>
          </thead>
        </table>
      </div>
    </div>

    <!-- Tabelle für Eingabe von Sparziel/Monat -->
    <div class="col-md-4">
      <div class="p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
        <form action="" method="post">
          <!-- Speichern Button-->
          <div class="row">
            <div class="col"></div>
            <div class="col">
              <div class="form-group">
                <input class="form-control btn btn-success" type="submit" name="save-savingamount" value="Speichern">
              </div>
            </div>
          </div>

          <!-- Monatstabelle -->
          <div class="form-group">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Monat</th>
                  <th>Sparbetrag</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Jänner</td>
                  <td><input class="form-control" type="number" name="savingamount-january" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>Februar</td>
                  <td><input class="form-control" type="number" name="savingamount-february" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>März</td>
                  <td><input class="form-control" type="number" name="savingamount-march" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>April</td>
                  <td><input class="form-control" type="number" name="savingamount-april" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>Mai</td>
                  <td><input class="form-control" type="number" name="savingamount-may" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>Juni</td>
                  <td><input class="form-control" type="number" name="savingamount-june" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>Juli</td>
                  <td><input class="form-control" type="number" name="savingamount-july" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>August</td>
                  <td><input class="form-control" type="number" name="savingamount-august" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>September</td>
                  <td><input class="form-control" type="number" name="savingamount-september" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>Oktober</td>
                  <td><input class="form-control" type="number" name="savingamount-october" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>November</td>
                  <td><input class="form-control" type="number" name="savingamount-november" placeholder="Betrag" required></td>
                </tr>
                <tr>
                  <td>Dezember</td>
                  <td><input class="form-control" type="number" name="savingamount-december" placeholder="Betrag" required></td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>

        <label class="fw-bold" for="total-savingamount">Gesamt: </label>
        <label for="">...</label>

      </div>
    </div>

  </div>
</div>