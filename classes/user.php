<?php
require_once "db.php";
class User extends Database
{
	#region ctor
	public $userId;
	public $UserName;
	public $EMail;
	public $Password;

	public function __construct()
	{
		parent::__construct();
	}
    
	public function AddUser($userId = null, $UserName = null, $EMail = null, $Password = null)
	{
		$this->userId = $userId;
		$this->UserName = $UserName;
		$this->EMail = $EMail;
		$this->Password = $Password;

        $stmt = $this->pdo->prepare("INSERT INTO User(UserName, EMail, Password) VALUES (?,?,?)");
		$stmt->execute([$this->UserName, $this->EMail, $this->Password]);
	}
	#endregion
#endregion
}