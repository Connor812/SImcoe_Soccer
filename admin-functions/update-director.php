<?php 

require_once("../config-url.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request method.";
    exit;
}

$id = $_GET["id"];
$name = $_POST["new_name"];
$position = $_POST["new_position"];

if (empty($id) || empty($name) || empty($position)) {
    header("Location: " . BASE_URL . "admin-info.php?error=empty_input");
    exit;
}

require_once("../db/db_config.php");

$sql = "UPDATE `current_presidents` SET `name` = ?, `position` = ? WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin-info.php?error=failed_update_director");
    exit;
}

$stmt->bind_param("ssi", $name, $position, $id);

// Execute the statement
if ($stmt->execute()) {
    // Successful update
    header("Location: " . BASE_URL . "admin-info.php?success=update_director");
    exit;
} else {
    // Failed update
    header("Location: " . BASE_URL . "admin-info.php?error=failed_update_director");
    exit;
}