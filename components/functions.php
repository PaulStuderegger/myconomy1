<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Funktionen</h2>
    </div>

    <?php
        include ("../components/user_logout.php");
    ?>
</nav>

<!-- main content -->
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
         
        <div class="col-md-1"></div>

        <div class="col-md-4">
            <div class="info-container p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
                <div>
                    <img src="../assets/img/func_dashboard.png" alt="Dashboard">
                </div>
                <div class="overlay">
                    <h3>Bilanz</h3>
                    <p>Lorem ipsum dolor sit met, ...</p>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>
        
        <div class="col-md-4">
            <div class="info-container p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
                <div>
                    <img src="../assets/img/func_calendar.png" alt="Kalender">
                </div>
                <div class="overlay">
                    <h3>Kalender</h3>
                    <p>Lorem ipsum dolor sit met, ...</p>
                </div>
            </div>
        </div>

    </div>
    <div class="row g-3 my-2">
         
        <div class="col-md-1"></div>

        <div class="col-md-4">
            <div class="info-container p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
                <div>
                    <img src="../assets/img/func_forecast.png" alt="Dashboard">
                </div>
                <div class="overlay">
                    <h3>Prognose</h3>
                    <p>Lorem ipsum dolor sit met, ...</p>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>

        <div class="col-md-4">
            <div class="info-container p-3 bg-white shadow-sm justify-content-around align-items-center rounded">
                <div>
                    <img src="../assets/img/func_savings.png" alt="Sparen">
                </div>
                <div class="overlay">
                    <h3>Sparen</h3>
                    <p>Lorem ipsum dolor sit met, ...</p>
                </div>
            </div>
        </div>

    </div>
</div>