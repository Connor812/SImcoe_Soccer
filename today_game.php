<?php

$division = $_POST["division"];
$team = $_POST["team"];
// $facility_name = $_POST["facility_name"];

require_once("db/db_config.php");

// escape the input values to prevent SQL injection
$division = mysqli_real_escape_string($conn, $division);
$team = mysqli_real_escape_string($conn, $team);
// $facility_name = mysqli_real_escape_string($conn, $facility_name);

// build the SQL query with the WHERE clause
$sql = "SELECT * FROM  tableone WHERE ";
$whereClause = array();

if (!empty($division)) {
    $whereClause[] = "division_name='$division'";
}

if (!empty($team)) {
    $whereClause[] = "home_team_name='$team'";
}

// if (!empty($facility_name)) {
//     $whereClause[] = "home_team_name LIKE '%$facility_name%'";
// }

// Only add this condition if division name is selected
// if (!empty($women) || !empty($boys) || !empty($co_ed)) {
//     $whereClause[] = "home_team_name LIKE '%$facility_name%'";
// }

$sql .= implode(" AND ", $whereClause);


// execute the query and get the result set
$result = mysqli_query($conn, $sql);

// create an array to hold the results
$data = array();

// loop through the result set and add each row to the data array
if (mysqli_num_rows($result) > 0) 
{
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'date' => $row['event_date'],
            'time' => $row['time_start'],
            'field' => $row['facility_name'],
            'opposition' => $row['away_team_name'],
            'status' => $row['game_status']
        );
    }
}

// close the database connection
mysqli_close($conn);

// return the data array as a JSON-encoded string
echo json_encode($data);
?>