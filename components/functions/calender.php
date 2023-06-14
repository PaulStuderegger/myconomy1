<?php
/*$_SESSION['loggedUser'] = array(
    "UserId"=>1,
    "UserName"=>"Test",
    "EMail"=>"test@test.at",
    "Password"=>"Password"
);*/
require_once "..\classes\balance.php";
require_once "..\classes\user.php";
require_once "..\classes" . DIRECTORY_SEPARATOR . "transaction.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Dashboard</h2>
    </div>
</nav>

<div class="row g-3 my-3">
    <div class="col-md-12">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center rounded">
            <h3 class="fs-1 font-monospace Amount" id="Fixausgaben">
            <?php echo "kalender"?>
            </h3>
        </div>
    </div>
</div>