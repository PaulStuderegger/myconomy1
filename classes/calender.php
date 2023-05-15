<?php
require_once "db.php";
class Calender extends Database
{
	public $CalenderId;
	public $CalenderName;

	function __construct($CalenderId = null, $CalenderName = null)
	{
		parent::__construct();
		$this->CalenderId = $CalenderId;
		$this->CalenderName = $CalenderName;
	}
    
	public function InsertCalenderToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO Calender(BalanceDate) VALUES (?)");
		$stmt->execute([$this->CalenderName]);
	}
}