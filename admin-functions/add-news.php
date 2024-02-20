<?php

require_once("../config-url.php");

// Checks if all variables are here
if (empty($_FILES["news-image"]["name"]) && empty($_POST["heading"]) && empty($_POST["text"]) && empty($_POST["link"])) {
    header("Location: " . BASE_URL . "admin-info.php?error=empty_input");
    exit;
}

// Checks if the file was uploaded correctly
if (!isset($_FILES["news-image"]) || $_FILES["news-image"]["error"] !== UPLOAD_ERR_OK) {
    header("Location: " . BASE_URL . "admin-info.php?error=uploading_file");
    exit;
}

// Process the uploaded file
$targetDir = "../images/"; // Directory to store images
$targetFile = $targetDir . basename($_FILES["news-image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file is an image
if (!getimagesize($_FILES["news-image"]["tmp_name"])) {
    
    header("Location: " . BASE_URL . "admin.php?error=invalid_format");
    // echo "Invalid file format. Please upload an image.";
    exit;
}

// Check if the file already exists
if (file_exists($targetFile)) {
    // echo "File already exists.";
    require_once("../db/db_config.php");
    upload_news($_FILES["news-image"]["name"], $conn);
    exit;
}

// Move the file to the target directory
if (!move_uploaded_file($_FILES["news-image"]["tmp_name"], $targetFile)) {
    // echo "Error moving file.";
    header("Location: " . BASE_URL . "admin.php?error=moving_file");
    exit;
}

function upload_news($image, $conn)
{

    $heading = $_POST["heading"];
    $text = $_POST["text"];

    // Insert statement
    $sql = "INSERT INTO `latest_news` (`image`, `heading`, `text`) VALUES (?, ?, ?);";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        header("Location: " . BASE_URL . "admin-info.php?error=failed_add_news");
        $stmt->close();
        exit;
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("sss", $image, $heading, $text);

    // Execute the statement
    if ($stmt->execute()) {
        // Insertion successful
        header("Location: " . BASE_URL . "admin-info.php?success=added_news");
        $stmt->close();
        exit;
    } else {
        // Insertion failed
        header("Location: " . BASE_URL . "admin-info.php?error=failed_add_news");
        $stmt->close();
        exit;
    }
}