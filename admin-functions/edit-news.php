<?php

require_once("../config-url.php");

// Checks if all variables are here
if (empty($_FILES["news-image"]["name"]) && empty($_POST["heading"]) && empty($_POST["text"])) {
    header("Location: " . BASE_URL . "admin-info.php?error=empty_input");
    exit;
}

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: " . BASE_URL . "admin-info.php?error=no_id");
    exit;
}

// Checks if the news-image was uploaded
if (empty($_FILES["news-image"]["name"]) || $_FILES["news-image"]["error"] == "4") {

    // Checks if the old-image exists
    if (!isset($_POST["old-news-image"]) || empty($_POST["old-news-image"])) {
        header("Location: " . BASE_URL . "admin-info.php?error=couldnt_get_old_image");
        exit;
    }
    require_once("../db/db_config.php");
    upload_news($_POST["old-news-image"], $conn);

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
    exit;
}

// Check if the file already exists
if (file_exists($targetFile)) {
    require_once("../db/db_config.php");
    upload_news($_FILES["news-image"]["name"], $conn);
    exit;
}

// Move the file to the target directory
if (!move_uploaded_file($_FILES["news-image"]["tmp_name"], $targetFile)) {
    header("Location: " . BASE_URL . "admin.php?error=moving_file");
    exit;
}
function upload_news($image, $conn)
{

    $id = $_GET["id"];
    $heading = $_POST["heading"];
    $text = $_POST["text"];

    // Insert statement
    $sql = "UPDATE `latest_news` SET `image` = ?, `heading` = ?, `text` = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        header("Location: " . BASE_URL . "admin-info.php?error=failed_edit_news");
        $stmt->close();
        exit;
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssi", $image, $heading, $text, $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Insertion successful
        header("Location: " . BASE_URL . "admin-info.php?success=edited_news");
        $stmt->close();
        exit;
    } else {
        // Insertion failed
        header("Location: " . BASE_URL . "admin-info.php?error=failed_edit_news");
        $stmt->close();
        exit;
    }
}