<?php
require_once "db.php";
class Calender extends Database
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
		$stmt->execute([$this->CalenderName, $this->CalenderEventDate, $this->CalenderId, $this->CalenderColourId]);
	}
    
	public function ConnectCalenderEventToCalender($CalenderId)
	{
		$calenderData = $this->GetCalenderById($CalenderId);
		
        $stmt = $this->pdo->prepare("UPDATE CalenderEvent SET CalenderId = ? WHERE CalenderEventId = ?");
		$stmt->execute([$calenderData["CalenderId"], $this->CalenderEventId]);
	}
}