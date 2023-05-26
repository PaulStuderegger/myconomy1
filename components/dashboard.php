<?php
/*$_SESSION['loggedUser'] = array(
    "UserId"=>1,
    "UserName"=>"Test",
    "EMail"=>"test@test.at",
    "Password"=>"Password"
);*/
require_once "..\classes\balance.php";
require_once "..\classes\user.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Dashboard</h2>
    </div>

    <?php
        include ("../components/user_logout.php");
    ?>
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
                        <th scope="col">Product</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <h3 class="fs-4 mb-3">Recent Transactions</h3>
                    <?php
                        $Balance = Balance::GetBalanceByUserId($_SESSION['loggedUser']["UserId"]);

                        for ($i=0; $i < 5; $i++) { 
                            echo "<tr>";
                            echo "<td>Transaktiosart</td>";
                            echo "<td>Anmerkungen</td>";
                            echo "<td>$Balance->BalanceAmount</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>