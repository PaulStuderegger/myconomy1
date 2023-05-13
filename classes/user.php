<?php
require_once "db.php";
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
    
	public function InsertUserToDB()
	{
		// $this->Password = password_hash($this->Password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO User(UserName, EMail, Password) VALUES (?,?,?)");
		$stmt->execute([$this->UserName, $this->EMail, $this->Password]);
	}

	// Evt. Hashen von Passwörtern
    public static function ValidateUser($EMail, $Password)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM User WHERE EMail = ? AND Password = ?");
		$stmt->execute([$EMail, $Password]);
		$res = $stmt->fetch();

		if ($res) {
			$UserData = new User($res["UserId"], $res["UserName"], $res["EMail"], $res["Password"]);
		
			$_SESSION['logged'] = true;                                                        
			$_SESSION['loggedUser'] = array(
				"UserId"=>$UserData->UserId,
				"UserName"=>$UserData->UserName,
				"EMail"=>$UserData->EMail,
				"Passwors"=>$UserData->Password
			);
			header ('Location: home.php');
		}
		else {
			echo '<br><div class="alert alert-danger" role="alert">Wrong username or password.</div>';
		}
	}
}