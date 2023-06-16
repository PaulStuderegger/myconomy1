<?php
require_once "dbconfig.php";
require_once "transaction.php";
class Savegoal extends Transaction
{
	public $SaveGoalId;
	public $SaveGoalName;
	public $SaveGoalAmount;
	public $SaveGoalRestAmount;

	function __construct($SaveGoalId = null, $SaveGoalName = null, $SaveGoalAmount = null, $SaveGoalRestAmount = null)
	{
		parent::__construct();
		$this->SaveGoalId = $SaveGoalId;
		$this->SaveGoalName = $SaveGoalName;
		$this->SaveGoalAmount = $SaveGoalAmount;
		$this->SaveGoalRestAmount = $SaveGoalRestAmount;
	}
    
	public function InsertSavegoalToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO SaveGoal(SaveGoalId, SaveGoalName, SaveGoalAmount, SaveGoalRestAmount) VALUES (?,?,?,?)");
		$stmt->execute([$this->SaveGoalId, $this->SaveGoalName, $this->SaveGoalAmount, $this->SaveGoalRestAmount]);
		$newtransaction = new Transaction(Utils::nextId("SaveGoal"), -$this->SaveGoalAmount, date('Y-m-d'),null ,null ,null);
		$newtransaction->InsertTransactionToDB();
	}

	public static function GetSavegoalById($id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM SaveGoal WHERE SaveGoalId = ?");
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		if ($res) {
			return new Calender($res["SaveGoalId"], $res["SaveGoalName"], $res["SaveGoalAmount"], $res["SaveGoalRestAmount"]);
		}
		else {
			return false;
		}
	}

	public static function GetSavegoalByName($Name)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM SaveGoal WHERE SaveGoalName = ?");
		$stmt->execute([$Name]);
		$res = $stmt->fetch();

		if ($res) {
			return new Calender($res["SaveGoalId"], $res["SaveGoalName"], $res["SaveGoalAmount"], $res["SaveGoalRestAmount"]);
		}
		else {
			return false;
		}
	}

	public static function GetAllSaveGoalsForUser($Id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM SavingGoal WHERE UserId = ?");
		$stmt->execute([$Id]);
		$res = $stmt->fetchAll();

		if ($res) {
			return $res;
		}
		else {
			return false;
		}
	}
}