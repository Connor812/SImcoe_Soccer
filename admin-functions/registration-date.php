<?php

require_once("../config-url.php");

$registration_year = $_POST["registration_year"];
$registration_start_date = $_POST["registration_start_date"];

if (empty($registration_year) || empty($registration_start_date)) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input#registration");
    exit;
}

require_once("../db/db_config.php");

$sql = "UPDATE `index_page` SET `registration_year` = ?, `registration_start_date` = ? WHERE id = 1;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin.php?error=uploading_data");
    exit;
}

$stmt->bind_param("ss", $registration_year, $registration_start_date);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: " . BASE_URL . "admin.php?success=updated_registration_date#registration");
    exit;
} else {
    // Update failed
    header("Location: " . BASE_URL . "admin.php?error=update_failed#registration");
    exit;
}