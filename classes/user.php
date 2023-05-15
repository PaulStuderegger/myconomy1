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
	public $BalanceId;
	public $CalenderId;

	function __construct($UserId = null, $UserName = null, $EMail = null, $Password = null, $BalanceId = null, $CalenderId = null)
	{
		parent::__construct();
		$this->UserId = $UserId;
		$this->UserName = $UserName;
		$this->EMail = $EMail;
		$this->Password = $Password;
		$this->BalanceId = $BalanceId;
		$this->CalenderId = $CalenderId;
	}
    
	public function InsertUserToDB()
	{
		// $this->Password = password_hash($this->Password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO User(UserName, EMail, Password, BalanceId, CalenderId) VALUES (?,?,?,?,?)");
		$stmt->execute([$this->UserName, $this->EMail, $this->Password, $this->BalanceId, $this->CalenderId]);
	}

	// Evt. Hashen von Passwörtern
    public static function ValidateUser($EMail, $Password)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM User WHERE EMail = ? AND Password = ?");
		$stmt->execute([$EMail, $Password]);
		$res = $stmt->fetch();

		if ($res) {
			$UserData = new User($res["UserId"], $res["UserName"], $res["EMail"], $res["Password"], $res["BalanceId"]);
		
			$_SESSION['logged'] = true;                                                        
			$_SESSION['loggedUser'] = array(
				"UserId"=>$UserData->UserId,
				"UserName"=>$UserData->UserName,
				"EMail"=>$UserData->EMail,
				"Password"=>$UserData->Password,
				"BalanceId"=>$UserData->BalanceId
			);
			header ('Location: home.php');
		}
		else {
			echo '<br><div class="alert alert-danger" role="alert">Wrong username or password.</div>';
		}
	}
	
	public function ConnectUserToBalance()
	{
		$balance = new Balance(Utils::nextId("Balance"), 0.0, date("d-m-y"));
		$balance->InsertBalanceToDB();
		
        $stmt = $this->pdo->prepare("UPDATE User SET BalanceId = ? WHERE UserId = ?");
		$stmt->execute([$balance->BalanceId, $this->UserId]);
	}
	
	public function ConnectUserToCalender()
	{
		$calender = new Calender(Utils::nextId("Calender"), "Kalender");
		$calender->InsertCalenderToDB();
		
        $stmt = $this->pdo->prepare("UPDATE User SET CalenderId = ? WHERE UserId = ?");
		$stmt->execute([$calender->CalenderId, $this->UserId]);
	}
}