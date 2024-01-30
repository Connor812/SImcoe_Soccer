<?php

require_once("../config-url.php");

// this checks if its the correct post method
if (!$_SERVER["REQUEST_METHOD"] === "POST") {
    header("Location: " . BASE_URL . "admin.php?error=invalid_method");
    exit;
}

$section_1_heading = $_POST["section-1-heading"];
$section_1_text = $_POST["section-1-text"];

// This checks if the input was empty
if (empty($section_1_heading) || empty($section_1_text)) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input#section-1");
}

require_once("../db/db_config.php");

$sql = "UPDATE `index_page` SET `section_1_heading` = ?, `section_1_text` = ? WHERE id = 1;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin.php?error=uploading_data#section-1");
    exit;
}

$stmt->bind_param("ss", $section_1_heading, $section_1_text);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: " . BASE_URL . "admin.php?success=updated_section_1_successfully#section-1");
    exit;
} else {
    // Update failed
    header("Location: " . BASE_URL . "admin.php?error=update_failed#section-1");
    exit;
}