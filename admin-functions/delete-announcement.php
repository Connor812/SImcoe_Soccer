<?php 

require_once("../config-url.php");

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: " . BASE_URL . "admin-info.php?error=no_id");
    exit;
}

$id = $_GET["id"];

require_once("../db/db_config.php");

$sql = "DELETE FROM `announcements` WHERE `id` = ?;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin-info.php?error=delete_announcement");
    $stmt->close();
    exit;
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // * Successful update
    header("Location: " . BASE_URL . "admin-info.php?success=delete_announcement");
    $stmt->close();
    exit;
} else {
    // ! Failed update
    header("Location: " . BASE_URL . "admin-info.php?error=delete_announcement");
    $stmt->close();
    exit;
}
