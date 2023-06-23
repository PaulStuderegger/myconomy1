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
        <h2 class="fs-2 m-0">Bilanz</h2>
    </div>
</nav>

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        
        <div class="col-md-6">
            <h1 class="fs-4 mb-3">Finanzielle Informationen:</h1>
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-1 font-monospace text-primary" id="balanceamount">
                        <?php 
                            $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                            echo "aktuelle Bilanz: " . $BalanceOfCurrentUser->BalanceAmount;
                        ?>
                        <i class='fas fa-euro-sign' aria-hidden='true'></i>
                    </h3>
                    <br>
                    <h3 class="fs-1 font-monospace text-success" id="Fixeinnahmen">
                        <?php
                            $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                            echo "Fixeinnahmen: " . $BalanceOfCurrentUser->GetReoccuringTransactionsByBalanceId(6);
                        ?>
                        <i class='fas fa-euro-sign' aria-hidden='true'></i>
                    </h3>
                    <br>
                    <h3 class="fs-1 font-monospace text-danger" id="Fixausgaben">
                        <?php
                            $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                            echo "Fixausgaben: " . $BalanceOfCurrentUser->GetReoccuringTransactionsByBalanceId(7);
                        ?>
                        <i class='fas fa-euro-sign' aria-hidden='true'></i>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col col-md-3">
            <h1 class="fs-4 mb-3">Letzte Transaktionen:</h1>
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <table class="table table-striped rounded shadow-sm">
                    <thead>
                        <tr>
                            <th scope="col">Transaktionstyp</th>
                            <th scope="col">Betrag</th>
                        </tr>
                    </thead>
                    <tbody>
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
</div>

<!-- <div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex align-items-center rounded">
                <h3 class="fs-1 font-monospace text-success" id="Fixeinnahmen">
                <?php
                        // $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                        // echo "Fixeinnahmen: " . $BalanceOfCurrentUser->GetReoccuringTransactionsByBalanceId(6);
                    ?>
                    <i class='fas fa-euro-sign' aria-hidden='true'></i>
                </h3>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex align-items-center rounded">
                <h3 class="fs-1 font-monospace text-danger" id="Fixausgaben">
                <?php
                        // $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                        // echo "Fixausgaben: " . $BalanceOfCurrentUser->GetReoccuringTransactionsByBalanceId(7);
                    ?>
                    <i class='fas fa-euro-sign' aria-hidden='true'></i>
                </h3>
            </div>
        </div>
    </div>
</div> -->
<?php User::BuildColumnDiagram($_SESSION["loggedUser"]["UserId"]);