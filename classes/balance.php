<?php
require_once "db.php";
class Balance extends Database
{
	public $BalanceId;
	public $BalanceAmount;
	public $BalanceDate;

	function __construct($BalanceId = null, $BalanceAmount = null, $BalanceDate = null)
	{
		parent::__construct();
		$this->BalanceId = $BalanceId;
		$this->BalanceAmount = $BalanceAmount;
		$this->BalanceDate = $BalanceDate;
	}
    
    public static function GetBalanceById($id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM Balance WHERE BalanceId = ?");
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		if ($res) {
			return new Balance($res["BalanceId"], $res["BalanceAmount"], $res["BalanceDate"]);
		}
		else {
			return false;
		}
	}
    
	public function InsertBalanceToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO Balance(BalanceAmount, BalanceDate) VALUES (?,?)");
		$stmt->execute([$this->BalanceAmount, $this->BalanceDate]);
	}
    
	public function UpdateBalance($TransactionAmount)
	{
        $NewBalance = $this->GetBalanceById($this->BalanceId)["BalanceAmount"] += $TransactionAmount;
        $stmt = $this->pdo->prepare("UPDATE Balance SET BalanceAmount = ? WHERE UserId = ?");
		$stmt->execute([$NewBalance, $this->BalanceId]);
	}
}