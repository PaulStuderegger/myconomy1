<?php
require_once "db.php";
class CalenderEvent extends Calender
{
	public $CalenderEventId;
	public $CalenderEventName;
	public $CalenderEventDate;
	public $CalenderId;
	public $CalenderColourId;

	function __construct($CalenderEventId = null, $CalenderEventName = null, $CalenderEventDate = null, $CalenderId = null, $CalenderColourId = null)
	{
		parent::__construct();
		$this->CalenderEventId = $CalenderEventId;
		$this->CalenderEventName = $CalenderEventName;
		$this->CalenderEventDate = $CalenderEventDate;
		$this->CalenderId = $CalenderId;
		$this->CalenderColourId = $CalenderColourId;
	}
    
	public function InsertCalenderEventToDB()
	{
        $stmt = $this->pdo->prepare("INSERT INTO CalenderEvent(CalenderEventName, CalenderEventDate, CalenderId, CalenderColourId) VALUES (?,?,?,?)");
		$stmt->execute([$this->CalenderEventName, $this->CalenderEventDate, $this->CalenderId, $this->CalenderColourId]);
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
}