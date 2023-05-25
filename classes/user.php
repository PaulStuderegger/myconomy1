<?php
require_once "db.php";
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
}