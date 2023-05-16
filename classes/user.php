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
				header ('Location: home.php');
			}
			else {
				echo '<br><div class="alert alert-danger" role="alert">Wrong password</div>';
			}
		}
		else {
			echo '<br><div class="alert alert-danger" role="alert">username does not exist</div>';
		}
	}

	public static function ValidateUserSignUp($UserName, $Email, $Password)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM User WHERE UserName = ?");
		$stmt->execute([$UserName]);
		$res = $stmt->fetch();

		if ($res) {
				echo '<br><div class="alert alert-danger" role="alert">UserName or Email is already taken</div>';
		}
		else {
			$NewUser = new User(Utils::nextId("User"), $UserName, $Email, $Password);
			$NewUser->InsertUserToDB();
			// nachricht erfolgreich registriert
		}
	}
	
	public function ConnectUserToBalance()
	{
		$balance = new Balance(Utils::nextId("Balance"), 0.0, date("d-m-y"), $this->UserId);
		$balance->InsertBalanceToDB();
	}
	
	public function ConnectUserToCalender()
	{
		$calender = new Calender(Utils::nextId("Calender"), "Kalender", $this->UserId);
		$calender->InsertCalenderToDB();
	}
}