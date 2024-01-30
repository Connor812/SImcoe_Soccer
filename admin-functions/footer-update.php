<?php

require_once("../config-url.php");

$president_name = $_POST["president_name"];
$president_email = $_POST["president_email"];
$manager_name = $_POST["manager_name"];
$manager_email = $_POST["manager_email"];
$referees_name = $_POST["referees_name"];
$referees_email = $_POST["referees_email"];
$e_transfer_email = $_POST["e_transfer_email"];


echo $president_name . "<br>";
echo $president_email . "<br>";
echo $manager_name . "<br>";
echo $manager_email . "<br>";
echo $referees_name . "<br>";
echo $referees_email . "<br>";
echo $e_transfer_email . "<br>";


if (empty($president_name) || empty($president_email) || empty($manager_name) || empty($manager_email) || empty($referees_name) || empty($referees_email) || empty($e_transfer_email)) {
    echo "empty";
    header("Location: " . BASE_URL . "admin.php?error=empty_input#footer");
    exit;
}

require_once("../db/db_config.php");

$sql = "UPDATE index_page 
        SET president_name = ?, 
            president_email = ?, 
            manager_name = ?, 
            manager_email = ?, 
            referees_name = ?, 
            referees_email = ?, 
            e_transfer_email = ?";

$stmt = $conn->prepare($sql);

// Check for errors in preparing the statement
if (!$stmt) {
    die("Error in preparing the statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param('sssssss', $president_name, $president_email, $manager_name, $manager_email, $referees_name, $referees_email, $e_transfer_email);

// Execute the query
$result = $stmt->execute();

// Check for errors in executing the statement
if (!$result) {
    header("Location: " . BASE_URL . "admin.php?error=failed_update#footer");
    exit;
}

// Redirect to a success page or handle as needed
header("Location: " . BASE_URL . "admin.php?success=update_footer#footer");
exit();