<?php

require_once("../config-url.php");

$code_of_conduct = $_FILES["code-of-conduct"];
$pdf;

if ($code_of_conduct['error'] == 0 && $code_of_conduct['size'] > 0) {
    // Get the file details
    $file_name = $code_of_conduct['name'];
    $file_tmp = $code_of_conduct['tmp_name'];

    // Extract the base file name and sanitize
    $base_file_name = basename($file_name);
    // Set the destination directory and file name
    $upload_dir = '../files/';
    $upload_path = $upload_dir . $base_file_name;

    // Check if the file already exists in the destination directory
    if (file_exists($upload_path)) {
        update_code_of_conduct($base_file_name);
    } else {
        // Move the uploaded file to the destination directory
        if (move_uploaded_file($file_tmp, $upload_path)) {
            update_code_of_conduct($base_file_name);
        } else {
            header("Location: " . BASE_URL . "admin-parents.php?error=uploading_pdf");
        }
    }
} else {
    header("Location: " . BASE_URL . "admin-parents.php?error=uploading_pdf");
}


function update_code_of_conduct($pdf)
{

    require_once("../db/db_config.php");

    // Assuming there's only one row in the table
    $sql = "UPDATE `code_of_conduct` SET pdf = ? WHERE id = 1;";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        header("Location: " . BASE_URL . "admin-parents.php?error=failed_update_conduct_pdf");
        $conn->close();
        exit;
    }

    $stmt->bind_param("s", $pdf);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        header("Location: " . BASE_URL . "admin-parents.php?success=updated_conduct_pdf");
        $stmt->close();
        $conn->close();
        exit;
    } else {
        header("Location: " . BASE_URL . "admin-parents.php?error=failed_update_conduct_pdf");
        $stmt->close();
        $conn->close();
        exit;
    }
}