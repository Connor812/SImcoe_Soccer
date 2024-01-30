<?php 

require_once("../config-url.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request method.";
    exit;
}

$name =  $_POST["name"];
$position = $_POST["position"];

// Checks to see if the values are empty
if (empty($name) || empty($position)) {
    header("Location: " . BASE_URL . "admin-info.php?error=empty_input");
    exit;
}

require_once("../db/db_config.php");

$sql = "INSERT INTO `current_presidents`(`name`, `position`) VALUES (?, ?);";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin-info.php?error=failed_insert");
    exit;
}

// Bind parameters to the prepared statement
$stmt->bind_param("ss", $name, $position);

// Execute the statement
if ($stmt->execute()) {
    // Insertion successful
    header("Location: " . BASE_URL . "admin-info.php?success=added_director");
    $stmt->close();
    exit;
} else {
    // Insertion failed
    header("Location: " . BASE_URL . "admin-info.php?error=failed_insert");
    $stmt->close();
    exit;
}