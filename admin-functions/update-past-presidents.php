<?php 

require_once("../config-url.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request method.";
    exit;
}

$id = $_GET["id"];
$name = $_POST["new_name"];
$year = $_POST["new_year"];

if (empty($id) || empty($name) || empty($year)) {
    header("Location: " . BASE_URL . "admin-info.php?error=empty_input");
    exit;
}

require_once("../db/db_config.php");

$sql = "UPDATE `past_presidents` SET `name` = ?, `year` = ? WHERE id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin-info.php?error=failed_update_past_president");
    exit;
}

$stmt->bind_param("ssi", $name, $year, $id);

// Execute the statement
if ($stmt->execute()) {
    // Successful update
    header("Location: " . BASE_URL . "admin-info.php?success=update_past_president");
    exit;
} else {
    // Failed update
    header("Location: " . BASE_URL . "admin-info.php?error=failed_update_past_president");
    exit;
}