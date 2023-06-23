<?php
require_once "..\classes\balance.php";
require_once "..\classes\user.php";
require_once "..\classes" . DIRECTORY_SEPARATOR . "transaction.php";
require_once "..\classes/calenderlogic.php";
require_once "..\classes/calenderevent.php";

/* if (!isset($_SESSION["currentmonth"])) {
    $_SESSION["currentmonth"] = date("m");
}
else {
    if (isset($_POST["lastmonth"])) {
        $_SESSION["currentmonth"] = date("m", strtotime ( '-1 month' , strtotime ( $_SESSION["currentmonth"] ) ));
    }
    else if (isset($_POST["nextmonth"])) {
        $_SESSION["currentmonth"] = date("m", strtotime ( '+1 month' , strtotime ( $_SESSION["currentmonth"] ) ));
    }
} */

$allevents = CalenderEvent::GetCalenderEventsForCalender(Calender::GetCalenderByUserId($_SESSION["loggedUser"]["UserId"])->CalenderId);

// $calendar = new CalendarLogic(date("y-" . $_SESSION["currentMonth"] . "-d"));
$calendar = new CalendarLogic(date("y-m-d"));
foreach ($allevents as $CalData) {
    $calendar->add_event($CalData["Text"], $CalData["Date"], 1, $CalData["Colour"], 150);
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Kalender</h2>
    </div>
</nav>

<div class="row g-3 my-3">
    <div class="col-md-8">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center rounded">
            <?=$calendar?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center rounded">
            <form method="post" action="">
                <div class='form-group'>
                <input class='form-control btn btn-success btn-block' type='submit' name='lastmonth' value='Letzter Monat'>
                </div>
                <br>
                <div class='form-group'>
                <input class='form-control btn btn-success btn-block' type='submit' name='nextmonth' value='nächster Monat'>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2">
        <div class="p-3 bg-white shadow-sm d-flex align-items-center rounded">
        <form method="post" action="">
            <div class="form-group">
                <label for="datum">Datum:</label>
                <input type="date" class="form-control" id="datum" name="datum">
            </div>
            <div class="form-group">
                <label for="text">Text:</label>
                <input type="text" class="form-control" id="text" name="text">
            </div>
            <div class="form-group">
                <label for="betrag">Betrag:</label>
                <input type="number" class="form-control" id="betrag" name="betrag">
            </div>
            <div class="form-group">
                <label for="farbe">Farbe:</label>
                <select class="form-control" id="farbe" name="farbe">
                <option value="grün">Grün</option>
                <option value="rot">Rot</option>
                <option value="blau">Blau</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Speichern</button>
            </form>
        </div>
    </div>
</div>