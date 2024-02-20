<?php

require_once("../config-url.php");

$old_pdf = $_POST["old_pdf"];
$rules_regulations_pdf = $_FILES["rules_regulations_pdf"];
$link_rules_text = $_POST["link_rules_text"];

if (empty($link_rules_text)) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input#link-pdf-btn");
    exit;
}

if (!empty($rules_regulations_pdf["name"])) {

    if ($rules_regulations_pdf['error'] == 0 && $rules_regulations_pdf['size'] > 0) {
        // Get the file details
        $file_name = $rules_regulations_pdf['name'];
        $file_tmp = $rules_regulations_pdf['tmp_name'];
        
        // Extract the base file name and sanitize
        $base_file_name = basename($file_name);
        // Set the destination directory and file name
        $upload_dir = '../files/';
        $upload_path = $upload_dir . $base_file_name;
        
        // Check if the file already exists in the destination directory
        if (file_exists($upload_path)) {
            echo "exists <br>";
            $pdf = $base_file_name;
        } else {
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($file_tmp, $upload_path)) {
                echo "doesnt exists <br>";
                $pdf = $base_file_name;
            } else {
                header("Location: " . BASE_URL . "admin.php?error=uploading_pdf#rules_regulations-section");
            }
        }
    } else {
        header("Location: " . BASE_URL . "admin.php?error=uploading_pdf#rules_regulations-section");
    }
} else {
    $pdf = $old_pdf;
}

require_once("../db/db_config.php");

// Assuming there's only one row in the table
$sql = "UPDATE rules_regulations SET link_rules_pdf = ?, link_rules_text = ?;";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin.php?error=failed_update_pdf#rules_regulations-section");
    $conn->close();
    exit;
}

$stmt->bind_param("ss", $pdf, $link_rules_text);
$stmt->execute();

// Check if the update was successful
if ($stmt->affected_rows > 0) {
    header("Location: " . BASE_URL . "admin.php?success=updated_pdf#rules_regulations-section");
    $stmt->close();
    $conn->close();
    exit;
} else {
    header("Location: " . BASE_URL . "admin.php?error=failed_update_pdf#rules_regulations-section");
    $stmt->close();
    $conn->close();
    exit;
}