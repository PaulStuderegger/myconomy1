<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom">
        <i class="fas fa-money-bill-wave me-2"></i>MyConomy
    </div>
    
    <div class="list-group list-group-flush my-3 text-center">
        <span class="fw-bold">
            <?php echo $_SESSION['loggedUser']["UserName"]; ?>
        </span>
        
        <form method="post" id="logoutform">
            <button class="logout-button fw-bold" type="submit" name="logoutbtn">
                <i class="fas fa-power-off me-2"></i>
                Abmelden
            </button>
        </form>
        <?php
            if (array_key_exists('logoutbtn', $_POST))
            {
                // Destroy all session data
                session_unset();
                session_destroy();
                
                header("Location: index.php");
                exit;
            }
        ?>
    </div>

    <div class="list-group list-group-flush my-3 border-top">
        <a href="?menu=funktionen" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-list me-2"></i>
            Funktionen
        </a>
        <a href="?menu=dashboard" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-balance-scale me-2"></i>
            Bilanz
        </a>
        <a href="?menu=dashboard" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-calendar-alt me-2"></i>
            Kalender
        </a>
        <a href="?menu=dashboard" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-chart-area me-2"></i>
            Prognose
        </a>
        <a href="?menu=savinggoal" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-piggy-bank me-2"></i>
            Sparziele
        </a>
        <a href="?menu=kontakt" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-envelope me-2"></i>
            Kontakt
        </a>
        <a href="?menu=datenschutz" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user-secret me-2"></i>
            Datenschutz
        </a>
        <a href="?menu=impressum" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-industry me-2"></i>
            Impressum
        </a>
    </div>
</div>