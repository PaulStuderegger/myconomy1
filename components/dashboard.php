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
                    <i class="fas fa-user me-2"></i><?php echo $_SESSION['loggedUser']["UserName"] ?>
                </a>
                
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        
        <div class="col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h3 class="fs-1 font-monospace Amount">
                        <?php 
                            $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                            echo $BalanceOfCurrentUser->BalanceAmount;
                        ?>
                        <i class='fas fa-euro-sign' aria-hidden='true'></i>
                    </h3>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <div class="col col-md-3">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col">Transaktionstyp</th>
                        <th scope="col">Betrag</th>
                    </tr>
                </thead>
                <tbody>
                    <h3 class="fs-4 mb-3">Recent Transactions</h3>
                    <?php
                        $Transactions = Transaction::GetTransactionsByUserId($_SESSION['loggedUser']["UserId"], 5);
                        if ($Transactions) 
                        {
                            foreach ($Transactions as $TransactionDS) {
                                echo "<tr>";
                                echo "<td>" . Transaction::GetTransactionType($TransactionDS["TransactionId"]) . "</td>";
                                echo "<td>" . $TransactionDS["TransactionAmount"] . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>