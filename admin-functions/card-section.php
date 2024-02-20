<?php

require_once("../config-url.php");

$card_num = $_GET["card_num"];
$card_heading = $_POST["card_heading"];
$card_text = $_POST["card_text"];
$card_link = $_POST["card_link"];
$card_image = $_FILES["card_image"];
$old_image = $_POST["old_image"];

if (empty($card_heading) && empty($card_text) && empty($card_link) && empty($card_image["name"])) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input#card-section");
    exit;
}

// Validate card_image
if ($card_image['error'] != UPLOAD_ERR_NO_FILE) {
    // Check if the uploaded file is an image
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($card_image['type'], $allowed_types)) {
        header("Location: " . BASE_URL . "admin.php?error=failed_to_upload_image#card-section");
    }

    // Check if the uploaded file size is within a reasonable limit (adjust as needed)
    $max_size_in_bytes = 5 * 1024 * 1024; // 5 MB
    if ($card_image['size'] > $max_size_in_bytes) {
        header("Location: " . BASE_URL . "admin.php?error=failed_to_upload_image#card-section");
    }

    // The file was uploaded successfully, handle it as needed
    $image_name = $card_image['name'];
    $image_path = 'path/to/uploaded/images/' . $image_name;
    move_uploaded_file($card_image['tmp_name'], $image_path);
} else {
    // No new image uploaded, use the old image name
    $image_name = $old_image;
}

require_once("../db/db_config.php");

// Prepare and execute the SQL query
// Prepare and execute the SQL query
$sql = "UPDATE index_page SET 
        card_heading_" . $card_num . " = ?,
        card_text_" . $card_num . " = ?,
        card_image_" . $card_num . " = ?,
        card_link_" . $card_num . " = ?
        WHERE id = 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $card_heading, $card_text, $image_name, $card_link);

// Execute the statement and check for errors
if ($stmt->execute()) {
    // Execution was successful

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect or perform any other actions as needed
    header("Location: " . BASE_URL . "admin.php?success=updated_card#card-section");
    exit();
} else {
    // Execution failed, handle the error (e.g., log, display an error message, etc.)

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    header("Location: " . BASE_URL . "admin.php?error=failed_update_card#card-section");
    exit();
}