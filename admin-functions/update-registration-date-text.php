<?php

require_once("../config-url.php");

// this checks if its the correct post method
if (!$_SERVER["REQUEST_METHOD"] === "POST") {
    header("Location: " . BASE_URL . "admin.php?error=invalid_method");
    exit;
}

$registration_info_heading = $_POST["registration_info_heading"];
$registration_info_date = $_POST["registration_info_date"];

// This checks if the input was empty
if (empty($registration_info_heading) || empty($registration_info_date)) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input");
    exit;
}

require_once("../db/db_config.php");

$sql = "UPDATE `index_page` SET `registration_info_heading` = ?, `registration_info_date` = ? WHERE id = 1;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin.php?error=uploading_data");
    exit;
}

$stmt->bind_param("ss", $registration_info_heading, $registration_info_date);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: " . BASE_URL . "admin.php?success=updated_registration_info_successfully#registration-info");
    exit;
} else {
    // Update failed
    header("Location: " . BASE_URL . "admin.php?error=update_failed");
    exit;
}