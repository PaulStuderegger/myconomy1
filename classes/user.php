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
        $stmt = $this->pdo->prepare("INSERT INTO User(UserName, EMail, Password) VALUES (?,?,?)");
		$stmt->execute([$this->UserName, $this->EMail, $this->Password]);
	}
}