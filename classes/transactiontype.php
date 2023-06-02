<?php
require_once "dbconfig.php";
require_once "user.php";
require_once "balance.php";
class TransactionType extends Database
{
	public $TransactionTypeId;
	public $TransactionType;

	function __construct($TransactionTypeId = null, $TransactionType = null)
	{
		parent::__construct();
		$this->TransactionTypeId = $TransactionTypeId;
		$this->TransactionType = $TransactionType;
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

	public function InsertTransactionTypeToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO transactiontype(TransactionId, TransactionType) VALUES (?,?)");
		$stmt->execute([$this->TransactionTypeId, $this->TransactionType]);
	}
}