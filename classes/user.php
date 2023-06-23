<?php
require_once "dbconfig.php";
require_once "balance.php";
require_once "utils.php";
class User extends Database
{
	public $UserId;
	public $UserName;
	public $EMail;
	public $Password;

	function __construct($UserId = null, $UserName = null, $EMail = null, $Password = null)
	{
		parent::__construct();
		$this->UserId = $UserId;
		$this->UserName = $UserName;
		$this->EMail = $EMail;
		$this->Password = $Password;
	}
    
	private function InsertUserToDB()
	{
		$hashedPassword = password_hash($this->Password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO User(UserName, EMail, Password) VALUES (?,?,?)");
		$stmt->execute([$this->UserName, $this->EMail, $hashedPassword]);

		$this->ConnectUserToBalance();
		$this->ConnectUserToCalender();
	}

    public static function ValidateUserSignIn($UserName, $Password)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM User WHERE UserName = ?");
		$stmt->execute([$UserName]);
		$res = $stmt->fetch();

		if ($res) {
			$UserData = new User($res["UserId"], $res["UserName"], $res["EMail"], $res["Password"]);

			if (password_verify($Password, $res["Password"])) {
				$_SESSION['logged'] = true;                                                        
				$_SESSION['loggedUser'] = array(
					"UserId"=>$UserData->UserId,
					"UserName"=>$UserData->UserName,
					"EMail"=>$UserData->EMail,
					"Password"=>$UserData->Password
				);
				header ('Location: index.php');
				exit;
			}
			else {
				echo '<br><div class="alert alert-danger" role="alert">Falsches Passwort!</div>';
			}
		}
		else {
			echo '<br><div class="alert alert-danger" role="alert">Der Benutzername existiert nicht!</div>';
		}
	}

	public static function ValidateUserSignUp($UserName, $Email, $Password)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM User WHERE UserName = ? OR EMail = ?");
		$stmt->execute([$UserName, $Email]);
		$res = $stmt->fetch();

		if ($res) {
				echo '<br><div class="alert alert-danger" role="alert">Benutzername oder Mail-Adresse ist bereits vergeben!</div>';
		}
		else {
			$NewUser = new User(Utils::nextId("User"), $UserName, $Email, $Password);
			$NewUser->InsertUserToDB();
			$NewBalance = new Balance(Utils::nextId("Balance"), 1000.50, "2023-05-25", $NewUser->UserId);
			$NewBalance->InsertBalanceToDB();
			$NewUser->ValidateUserSignIn($UserName, $Password);
		}
	}
	
	public function ConnectUserToBalance()
	{
		$balance = new Balance(Utils::nextId("Balance"), 0.0, date("y-m-d"), $this->UserId);
		$balance->InsertBalanceToDB();
	}
	
	public function ConnectUserToCalender()
	{
		$calender = new Calender(Utils::nextId("Calender"), "Kalender", $this->UserId);
		$calender->InsertCalenderToDB();
	}
	
	public static function GetUserById($id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM User WHERE UserId = ?");
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		if ($res) {
			return new Balance($res["UserId"], $res["UserName"], $res["EMail"], $res["Password"]);
		}
		else {
			return false;
		}
	}

	public static function BuildColumnDiagram($UserId) { ?>
		<div class="container-fluid px-4">
			<div class="row g-3 my-2">
				<div class="col-md-6">
			
			<?php
				$result = Transaction::GetTransactionsByUserIdPerMonth(1);
				
			// Create an associative array to store the monthly transaction data
			$jsonData = array();foreach ($result as $transaction) {
				$year = $transaction['Year'];
				$month = $transaction['Month'];
				$positiveAmount = floatval($transaction['PositiveAmount']);
				$negativeAmount = floatval($transaction['NegativeAmount']);

				if (!isset($jsonData[$year])) {
					$jsonData[$year] = array_fill(1, 12, array('PositiveAmount' => 0, 'NegativeAmount' => 0));
				}

				$jsonData[$year][$month] = array('PositiveAmount' => $positiveAmount, 'NegativeAmount' => $negativeAmount);
			}

			// Fill missing months with zero values
			$currentYear = date('Y');
			for ($y = $currentYear; $y > $currentYear - 1; $y--) {
				if (!isset($jsonData[$y])) {
					$jsonData[$y] = array_fill(1, 12, array('PositiveAmount' => 0, 'NegativeAmount' => 0));
				} else {
					$missingMonths = array_diff(range(1, 12), array_keys($jsonData[$y]));
					foreach ($missingMonths as $month) {
						$jsonData[$y][$month] = array('PositiveAmount' => 0, 'NegativeAmount' => 0);
					}
				}
			}

			$jsonData = json_encode($jsonData);
			?>

			<html>
			<head>
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				<script type="text/javascript">
					google.charts.load('current', {'packages': ['corechart']});
					google.charts.setOnLoadCallback(drawChart);

					function drawChart() {
						var jsonData = <?php echo $jsonData; ?>;

						var data = new google.visualization.DataTable();
						data.addColumn('string', 'Monat');
						data.addColumn('number', 'Einnahmen');
						data.addColumn('number', 'Ausgaben');

						Object.keys(jsonData).forEach(function (year) {
							Object.keys(jsonData[year]).forEach(function (month) {
								var positiveAmount = jsonData[year][month].PositiveAmount;
								var negativeAmount = jsonData[year][month].NegativeAmount;

								data.addRow([month, positiveAmount, negativeAmount]);
							});
						});

						var options = {
							title: 'Einnahmen/Ausgaben pro Monat',
							hAxis: {title: 'Monat'},
							vAxis: {title: 'Menge'},
							width: 1600, // Adjust the width as desired
							height: 400 // Adjust the height as desired
						};

						var chart = new google.visualization.ColumnChart(document.getElementById('chartContainer'));
						chart.draw(data, options);
					}
				</script>
			</head>
			<body>
				<div id="chartContainer" style="width: 800px; height: 400px;"></div>
			</body>
			</div>
			</div>
		</div>
	<?php }
}