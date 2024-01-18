<?php
require_once 'vendor/autoload.php';

use Kigkonsult\Icalcreator\Vcalendar;
use Kigkonsult\Icalcreator\Vevent;
use Kigkonsult\Icalcreator\IcalTimeZone;

$women = $_POST["women"];
$boys = $_POST["boys"];
$co_ed = $_POST["co_ed"];
$facility_name = $_POST["facility_name"];

// create a database connection
require_once("db/db_config.php");

// escape the input values to prevent SQL injection
$women = mysqli_real_escape_string($conn, $women);
$boys = mysqli_real_escape_string($conn, $boys);
$co_ed = mysqli_real_escape_string($conn, $co_ed);
$facility_name = mysqli_real_escape_string($conn, $facility_name);

// build the SQL query with the WHERE clause
$sql = "SELECT * FROM  tableone WHERE ";
$whereClause = array();

if (!empty($women)) {
    $whereClause[] = "division_name='$women'";
}

if (!empty($boys)) {
    $whereClause[] = "division_name='$boys'";
}

if (!empty($co_ed)) {
    $whereClause[] = "division_name='$co_ed'";
}

if (!empty($facility_name)) {
    $whereClause[] = "facility_name LIKE '%$facility_name%'";
}

// Only add this condition if division name is selected
if (!empty($women) || !empty($boys) || !empty($co_ed)) {
    $whereClause[] = "facility_name LIKE '%$facility_name%'";
}

$sql .= implode(" AND ", $whereClause);


// execute the query and get the result set
$result = mysqli_query($conn, $sql);

// create an array to hold the events
$events = array();
$event_start = "2020-01-01 12:00:00";
$event_end = "2020-01-01 13:00:00";
// loop through the result set and add each row as an event
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $event = new vevent();
        $event->setProperty('summary', $row['game_status']);
        $event->setProperty('location', $row['facility_name']);
        $event->setProperty('description', $row['away_team_name']);
        $event->setProperty('dtstart',$event_start);
        $event->setProperty('dtend', $event_end);
        $events[] = $event;
    }
}

// create a calendar
$calendar = new vcalendar();
$calendar->setConfig('unique_id', 'soccer_games');
$calendar->setProperty('method', 'PUBLISH');
$calendar->setProperty('X-WR-CALNAME', 'Soccer Games');

// add the events to the calendar
foreach ($events as $event) {
    $calendar->addComponent($event);
}

// generate the .ics file
$calendar->returnCalendar();

// close the database connection
mysqli_close($conn);

// function to convert date/time strings to iCal format
function ical_date_convert($date, $time) {
    $timestamp = strtotime("$date $time");
    return date('Ymd\THis', $timestamp);
}
?>