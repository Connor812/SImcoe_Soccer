<?php

require_once("../config-url.php");

// this checks if its the correct post method
if (!$_SERVER["REQUEST_METHOD"] === "POST") {
    header("Location: " . BASE_URL . "admin.php?error=invalid_method");
    exit;
}

$season_start_date = $_POST["season_start_date"];
$u6_start_date = $_POST["u6_start_date"];

// This checks if the input was empty
if (empty($season_start_date) || empty($u6_start_date)) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input");
    exit;
}

require_once("../db/db_config.php");

$sql = "UPDATE `index_page` SET `season_start_date` = ?, `u6_start_date` = ? WHERE id = 1;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin.php?error=uploading_data");
    exit;
}

$stmt->bind_param("ss", $season_start_date, $u6_start_date);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: " . BASE_URL . "admin.php?success=updated_season_date#season_date");
    exit;
} else {
    // Update failed
    header("Location: " . BASE_URL . "admin.php?error=update_failed");
    exit;
}