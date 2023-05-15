<?php
require_once "db.php";
class Calender extends Database
{
	public $CalenderId;
	public $CalenderName;
	public $UserId;

	function __construct($CalenderId = null, $CalenderName = null, $UserId = null)
	{
		parent::__construct();
		$this->CalenderId = $CalenderId;
		$this->CalenderName = $CalenderName;
		$this->UserId = $UserId;
	}
    
	public function InsertCalenderToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO Calender(BalanceDate, UserId) VALUES (?,?)");
		$stmt->execute([$this->CalenderName, $this->UserId]);
	}

	public static function GetCalenderById($id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM Calender WHERE CalenderId = ?");
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		if ($res) {
			return new Calender($res["CalenderId"], $res["CalenderName"], $res["UserId"]);
		}
		else {
			return false;
		}
	}
}