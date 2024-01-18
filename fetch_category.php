<?php
$select1 = $_POST["select1"];
// create a database connection
require_once("db/db_config.php");

// build the SQL query with the WHERE clause
$sql = "SELECT DISTINCT(division_name) FROM  tableone WHERE category_name='$select1'";
// execute the query and get the result set
$result = mysqli_query($conn, $sql);

// create an array to hold the results
$data = array();

// loop through the result set and add each row to the data array
if (mysqli_num_rows($result) > 0) 
{
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            'division_name' => $row['division_name']
        );
    }
}

// close the database connection
mysqli_close($conn);

// return the data array as a JSON-encoded string
echo json_encode($data);
?>