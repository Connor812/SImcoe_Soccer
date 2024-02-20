<?php

require_once("../config-url.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request method.";
    exit;
}

$ad_image = $_FILES["ad_image_1"];
$ad_text = $_POST["ad_text_1"];
$ad_link = $_POST["ad_link_1"];
$old_image = $_POST["old_img"];

// Checks to see if there was an image uploaded
if (empty($ad_image["name"])) {
    require_once("../db/db_config.php");
    updateAd1($ad_text, $ad_link, $old_image, $conn);
}

// This checks to see if there are any errors with the upload
if ($ad_image["error"] !== UPLOAD_ERR_OK) {
    header("Location: " . BASE_URL . "admin.php?error=uploading_file#ad-section");
    exit;
}

// Process the uploaded file
$targetDir = "../images/"; // Directory to store images
$targetFile = $targetDir . basename($ad_image["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file is an image
if (!getimagesize($_FILES["ad_image_1"]["tmp_name"])) {
    header("Location: " . BASE_URL . "admin.php?error=invalid_format#ad-section");
    // echo "Invalid file format. Please upload an image.";
    exit;
}

// Check if the file already exists
if (file_exists($targetFile)) {
    // echo "File already exists.";
    require_once("../db/db_config.php");
    updateAd1($ad_text, $ad_link, basename($_FILES["ad_image_1"]["name"]), $conn);
    exit;
}

// Move the file to the target directory
if (!move_uploaded_file($_FILES["ad_image_1"]["tmp_name"], $targetFile)) {
    // echo "Error moving file.";
    header("Location: " . BASE_URL . "admin.php?error=moving_file#ad-section");
    exit;
}

function updateAd1($ad_text, $ad_link, $ad_image, $conn)
{
    // Assuming there's only one row in the table
    $sql = "UPDATE `index_page` SET `ad_text_1` = ?, `ad_link_1` = ?, `ad_image_1` = ?;";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement.";
        $conn->close();
        exit;
    }

    $stmt->bind_param("sss", $ad_text, $ad_link, $ad_image);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        header("Location: " . BASE_URL . "admin.php?success=updated_field_img#ad-section");
        $stmt->close();
        $conn->close();
        exit;
    } else {
        header("Location: " . BASE_URL . "admin.php?success=no_changes_made#ad-section");
        $stmt->close();
        $conn->close();
        exit;
    }
}