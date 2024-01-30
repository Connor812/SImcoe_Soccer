<?php 

require_once("../config-url.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "Invalid request method.";
    exit;
}

$id = $_GET["id"];

if (empty($id)) {
    header("Location: " . BASE_URL . "admin-info.php?error=empty_input");
    exit;
}

require_once("../db/db_config.php");

$sql = "DELETE FROM `past_presidents` WHERE id = ?;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin-info.php?error=deleting_past_president");
    exit;
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Successful update
    header("Location: " . BASE_URL . "admin-info.php?success=delete_past_president");
    exit;
} else {
    // Failed update
    header("Location: " . BASE_URL . "admin-info.php?error=deleting_past_president");
    exit;
}