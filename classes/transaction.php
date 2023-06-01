<?php
require_once "db.php";
require_once "user.php";
require_once "balance.php";
class Transaction extends Database
{
	public $TransactionId;
	public $TransactionAmount;
	public $TransactionDate;
	public $TransactionTypeId;
	public $BalanceId;
	public $CalenderEventId;

	function __construct($TransactionId = null, $TransactionAmount = null, $TransactionDate = null, $TransactionTypeId = null, $BalanceId = null, $CalenderEventId = null)
	{
		parent::__construct();
		$this->TransactionId = $TransactionId;
		$this->TransactionAmount = $TransactionAmount;
		$this->TransactionDate = $TransactionDate;
		$this->TransactionTypeId = $TransactionTypeId;
		$this->BalanceId = $BalanceId;
		$this->CalenderEventId = $CalenderEventId;
	}
    
    public static function GetTransactionsByUserId($id, $Amount)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("
			SELECT TransactionId, 
				   TransactionAmount, 
				   TransactionDate, 
				   TransactionTypeId, 
				   BalanceId, 
				   CalenderEventId
			FROM transaction 
				JOIN balance USING (BalanceId)
				JOIN user USING (UserId)
			WHERE User.UserId = ?
			LIMIT ?;
		");
		$stmt->execute([$id, $Amount]);
		$res = $stmt->fetchAll();
		
		if ($res) {
			return $res;
		}
		else {
			return false;
		}
	}
    
    public static function GetTransactionType($TransactionId)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("
		SELECT TransactionType
		FROM transaction
		   JOIN transactiontype USING (TransactionTypeId)
		WHERE transactionId = ?;
		");
		$stmt->execute([$TransactionId]);
		$res = $stmt->fetch();

		if ($res) {
			return $res["TransactionType"];
		}
		else {
			return false;
		}
	}

	public function InsertTransactionToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO transaction(TransactionId, TransactionAmount, TransactionDate, BalanceId, TransactionTypeId, CalenderEventId) VALUES (?,?,?,?,?,?)");
		$stmt->execute([$this->TransactionId, $this->TransactionAmount, $this->TransactionDate, $this->BalanceId, $this->TransactionTypeId, $this->CalenderEventId]);
	}

	public function UpdateBalanceWithTransaction($Transaction)
	{
        $stmt = $this->pdo->prepare("UPDATE Balance SET BalanceAmount = BalanceAmount + TransactionAmount  WHERE BalanceId = ?");
		$stmt->execute([Balance::GetBalanceByUserId($_SESSION["UserId"]["BalanceId"]), $Transaction->TransactionAmount]);
	}
}