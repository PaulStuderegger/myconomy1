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

<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        
        <div class="col-md-6">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <br>
                    <br>
                    <br>
                    <h3 class="fs-1 font-monospace Amount" id="balanceamount">
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
            <div class="p-3 bg-white shadow-sm d-flex align-items-center rounded">
                <h3 class="fs-1 font-monospace Amount" id="Fixeinnahmen">
                <?php
                        $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                        echo $BalanceOfCurrentUser->GetReoccuringTransactionsByBalanceId(6);
                    ?>
                    <i class='fas fa-euro-sign' aria-hidden='true'></i>
                </h3>
                <h3 class="fs-1 font-monospace Amount" id="Fixausgaben">
                <?php
                        $BalanceOfCurrentUser = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);
                        echo $BalanceOfCurrentUser->GetReoccuringTransactionsByBalanceId(7);
                    ?>
                    <i class='fas fa-euro-sign' aria-hidden='true'></i>
                </h3>
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
                    <h1 class="fs-4 mb-3">Recent Transactions</h1>
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