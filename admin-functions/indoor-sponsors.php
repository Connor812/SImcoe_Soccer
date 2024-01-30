<?php

require_once("../config-url.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request method.";
    exit;
}

$image = $_FILES["indoor_sponsor_image"];
$name = $_POST["indoor_sponsor_name"];


// This checks if the input is empty
if (empty($name)) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input#sponsors");
    exit;
}

// Checks to see if there was an image uploaded
if (empty($image["name"])) {
    header("Location: " . BASE_URL . "admin.php?error=empty_input#sponsors");
    exit;
}

// This checks to see if there are any errors with the upload
if ($image["error"] !== UPLOAD_ERR_OK) {
    header("Location: " . BASE_URL . "admin.php?error=uploading_file#sponsors");
    exit;
}

// Process the uploaded file
$targetDir = "../sponsors/"; // Directory to store images
$targetFile = $targetDir . basename($image["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file is an image
if (!getimagesize($_FILES["indoor_sponsor_image"]["tmp_name"])) {
    header("Location: " . BASE_URL . "admin.php?error=invalid_format#sponsors");
    // echo "Invalid file format. Please upload an image.";
    exit;
}

// Check if the file already exists
if (file_exists($targetFile)) {
    require_once("../db/db_config.php");
    addSponsor($name, $image["name"], $conn);
    exit;
}

// Move the file to the target directory
if (!move_uploaded_file($_FILES["indoor_sponsor_image"]["tmp_name"], $targetFile)) {
    // echo "Error moving file.";
    header("Location: " . BASE_URL . "admin.php?error=moving_file#ad-section#sponsors");
    exit;
}

require_once("../db/db_config.php");
addSponsor($name, $image["name"], $conn);

function addSponsor($name, $image, $conn)
{

echo $name . "<----<br>";
echo $image;

    $sql = "INSERT INTO `indoor_sponsors` (`name`, `image`) VALUES (?, ?);";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement.";
        $conn->close();
        exit;
    }

    $stmt->bind_param("ss", $name, $image);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        header("Location: " . BASE_URL . "admin.php?success=added_sponsor#sponsors");
        $stmt->close();
        $conn->close();
        exit;
    } else {
        header("Location: " . BASE_URL . "admin.php?error=no_sponsors_added#sponsors");
        $stmt->close();
        $conn->close();
        exit;
    }
}