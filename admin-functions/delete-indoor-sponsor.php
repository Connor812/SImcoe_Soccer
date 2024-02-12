<?php

require_once("../config-url.php");

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: " . BASE_URL . "admin.php?error=no_sponsor_id#sponsors");
    exit;
}

require_once("../db/db_config.php");

$id = $_GET["id"];

$sql = "DELETE FROM `indoor_sponsors` WHERE `id` = ?;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin.php?error=deleting_sponsor#sponsors");
    $stmt->close();
    exit;
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // * Successful update
    header("Location: " . BASE_URL . "admin.php?success=deleted_sponsor#sponsors");
    $stmt->close();
    exit;
} else {
    // ! Failed update
    header("Location: " . BASE_URL . "admin.php?error=deleting_sponsor#sponsors");
    $stmt->close();
    exit;
}