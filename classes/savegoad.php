<?php
require_once "dbconfig.php";
require_once "transaction.php";
class Savegoal extends Transaction
{
	public $SaveGoalId;
	public $SaveGoalName;
	public $SaveGoalAmount;
	public $SaveGoalRestAmount;
	public $UserId;

	function __construct($SaveGoalId = null, $SaveGoalName = null, $SaveGoalAmount = null, $SaveGoalRestAmount = null, $UserId = null)
	{
		parent::__construct();
		$this->SaveGoalId = $SaveGoalId;
		$this->SaveGoalName = $SaveGoalName;
		$this->SaveGoalAmount = $SaveGoalAmount;
		$this->SaveGoalRestAmount = $SaveGoalRestAmount;
		$this->UserId = $UserId;
	}
    
	public function InsertSavegoalToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO SavingGoal(savingGoalId, savingGoalName, savingGoalAmount, savingGoalRestAmount, userid) VALUES (?,?,?,?,?)");
		$stmt->execute([Utils::nextId("savinggoal"), $this->SaveGoalName, $this->SaveGoalAmount, $this->SaveGoalAmount, $this->UserId]);
	}

	public static function GetSavegoalById($id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM SaveGoal WHERE SaveGoalId = ?");
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		if ($res) {
			return new SaveGoal($res["SaveGoalId"], $res["SaveGoalName"], $res["SaveGoalAmount"], $res["SaveGoalRestAmount"]);
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
			return new SaveGoal($res["SaveGoalId"], $res["SaveGoalName"], $res["SaveGoalAmount"], $res["SaveGoalRestAmount"]);
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

	public static function DeleteSaveGoal($Id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("DELETE FROM SavingGoal WHERE SavingGoalId = ?");
		return $stmt->execute([$Id]);
	}
	public static function UpdateSaveGoal($Id, $SavingAmount)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("UPDATE SavingGoal SET SavingGoalRestAmount = SavingGoalRestAmount - ? WHERE SavingGoalId = ?");
		$res = $stmt->execute([$SavingAmount, $Id]);

		if ($res) {
			$newTransaction = new Transaction(Utils::nextId("Transaction"), -$SavingAmount, date("y-m-d"), 8, Balance::GetBalanceByUserId($_SESSION["loggedUser"]["UserId"])->BalanceId, null);
			$newTransaction->InsertTransactionToDB();
			return true;
		}
		return false;
	}
}