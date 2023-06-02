<?php
require_once "dbconfig.php";
require_once "user.php";
class Balance extends Database
{
	public $BalanceId;
	public $BalanceAmount;
	public $BalanceDate;
	public $UserId;

	function __construct($BalanceId = null, $BalanceAmount = null, $BalanceDate = null, $UserId = null)
	{
		parent::__construct();
		$this->BalanceId = $BalanceId;
		$this->BalanceAmount = $BalanceAmount;
		$this->BalanceDate = $BalanceDate;
		$this->UserId = $UserId;
	}
    
    public static function GetBalanceByUserId($id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM Balance WHERE UserId = ?");
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		if ($res) {
			return new Balance($res["BalanceId"], $res["BalanceAmount"], $res["BalanceDate"], $res["UserId"]);
		}
		else {
			return false;
		}
	}
    
	public function InsertBalanceToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO Balance(BalanceAmount, BalanceDate, UserId) VALUES (?,?,?)");
		$stmt->execute([$this->BalanceAmount, $this->BalanceDate, $this->UserId]);
	}
    
	public function UpdateBalance($TransactionAmount)
	{
        $NewBalance = $this->GetBalanceByUserId($this->UserId)["BalanceAmount"] += $TransactionAmount;
        $stmt = $this->pdo->prepare("UPDATE Balance SET BalanceAmount = ? WHERE BalanceId = ?");
		$stmt->execute([$NewBalance, $this->BalanceId]);
	}
	
	public function GetReoccuringTransactionsByBalanceId($InOrOutgoing)
	{
        $stmt = $this->pdo->prepare("SELECT sum(TransactionAmount) as 'Amount' FROM Transaction JOIN TransactionType USING(TransactionTypeId) JOIN Balance USING(BalanceId) WHERE TransactionTypeId = ? AND BalanceId = ?");
		$stmt->execute([$InOrOutgoing, $this->BalanceId]);
		
		$res = $stmt->fetch();

		if ($res) {
			return $res["Amount"];
		}
		else {
			return false;
		}
	}
}