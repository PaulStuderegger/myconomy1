<?php
require_once "dbconfig.php";
require_once "calender.php";
require_once "transaction.php";
class CalenderEvent extends Calender
{
	public $CalenderEventId;
	public $CalenderEventName;
	public $CalenderEventDate;
	public $CalenderEventValue;
	public $CalenderId;
	public $CalenderColourId;

	function __construct($CalenderEventId = null, $CalenderEventName = null, $CalenderEventDate = null, $CalenderEventValue = null, $CalenderId = null, $CalenderColourId = null)
	{
		parent::__construct();
		$this->CalenderEventId = $CalenderEventId;
		$this->CalenderEventName = $CalenderEventName;
		$this->CalenderEventDate = $CalenderEventDate;
		$this->CalenderEventValue = $CalenderEventValue;
		$this->CalenderId = $CalenderId;
		$this->CalenderColourId = $CalenderColourId;
	}
    
	public function InsertCalenderEventToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO CalenderEvent(CalenderEventId, CalenderEventName, CalenderEventDate, CalenderId, CalenderColourId) VALUES (DEFAULT,?,?,?,?)");
		$stmt->execute([$this->CalenderEventName, $this->CalenderEventDate, $this->CalenderId, $this->CalenderColourId]);

		$newTransaction = new Transaction(Utils::nextId("Transaction"), -$this->CalenderEventValue, $this->CalenderEventDate, 9, Balance::GetBalanceByUserId($_SESSION["loggedUser"]["UserId"])->BalanceId, $this->CalenderEventId);
		$newTransaction->InsertTransactionToDB();
	}	
    
	public function ConnectCalenderEventToCalender($CalenderId)
	{
		$calenderData = $this->GetCalenderById($CalenderId);
		
        $stmt = $this->pdo->prepare("UPDATE CalenderEvent SET CalenderId = ? WHERE CalenderEventId = ?");
		$stmt->execute([$calenderData["CalenderId"], $this->CalenderEventId]);
	}
    
    public static function GetCalenderEventById($id)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM CalenderEvent WHERE CalenderEventId = ?");
		$stmt->execute([$id]);
		$res = $stmt->fetch();

		if ($res) {
			return new CalenderEvent($res["CalenderEventId"], $res["CalenderEventName"], $res["CalenderEventDate"], $res["CalenderId"], $res["ColourId"]);
		}
		else {
			return false;
		}
	}
    
    public static function GetCalenderEventsForCalender($CalenderId)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("select * from calenderevent where calenderid = ?;");
		$stmt->execute([$CalenderId]);
		return $stmt->fetchAll();
	}
}