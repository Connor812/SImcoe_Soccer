<?php

require_once("../config-url.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request method.";
    exit;
}

if (!isset($_FILES["hero-img"]) || $_FILES["hero-img"]["error"] !== UPLOAD_ERR_OK) {
    // echo "Error Uploading File";
    header("Location: " . BASE_URL . "admin.php?error=uploading_file.");
    exit;
}

// Process the uploaded file
$targetDir = "../images/"; // Directory to store images
$targetFile = $targetDir . basename($_FILES["hero-img"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file is an image
if (!getimagesize($_FILES["hero-img"]["tmp_name"])) {
    header("Location: " . BASE_URL . "admin.php?error=invalid_format");
    // echo "Invalid file format. Please upload an image.";
    exit;
}

// Check if the file already exists
if (file_exists($targetFile)) {
    // echo "File already exists.";
    require_once("../db/db_config.php");
    updateHeroImg(basename($_FILES["hero-img"]["name"]), $conn);
    exit;
}

// Move the file to the target directory
if (!move_uploaded_file($_FILES["hero-img"]["tmp_name"], $targetFile)) {
    // echo "Error moving file.";
    header("Location: " . BASE_URL . "admin.php?error=moving_file");
    exit;
}

require_once("../db/db_config.php");

// Insert the file name into the database
updateHeroImg(basename($_FILES["hero-img"]["name"]), $conn);

function updateHeroImg($fileName, $conn)
{
    // Assuming there's only one row in the table
    $sql = "UPDATE index_page SET hero_image = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement.";
        $conn->close();
        exit;
    }

    $stmt->bind_param("s", $fileName);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        header("Location: " . BASE_URL . "admin.php?success=updated_hero_img");
        $stmt->close();
        $conn->close();
        exit;
    } else {
        header("Location: " . BASE_URL . "admin.php?error=failed_update_hero_img");
        $stmt->close();
        $conn->close();
        exit;
    }
}