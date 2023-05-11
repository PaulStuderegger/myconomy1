<?php
require_once "db.php";
class User extends Database
{
	#region ctor
	public $userId;
	public $SurName;
	public $LastName;
	public $EMail;
	public $Password;

	public function __construct()
	{
		$this->connect();
	}
    
	public function AddUser($userId = null, $SurName = null, $LastName = null, $EMail = null, $Password = null)
	{
		$this->connect();
		$this->userId = $userId;
		$this->SurName = $SurName;
		$this->LastName = $LastName;
		$this->EMail = $EMail;
		$this->Password = $Password;

        $stmt = $this->pdo->prepare("INSERT INTO User(Surname, LastName, EMail, Password) VALUES (?,?,?,?)");
		$stmt->execute([$this->SurName, $this->LastName, $this->EMail, $this->Password]);
	}
	#endregion
#endregion
}