<?php

require_once("../config-url.php");

if (!isset($_GET["card_num"]) || empty($_GET["card_num"])) {
    header("Location: " . BASE_URL . "admin.php?error=couldnt_get_card_num");
    exit;
}

require_once("../db/db_config.php");

$card_num = $_GET["card_num"];

$sql = "UPDATE `index_page`
SET
    `card_image_$card_num` = NULL,
    `card_text_$card_num` = NULL,
    `card_link_$card_num` = NULL,
    `card_heading_$card_num` = NULL
WHERE
    `id` = 1;";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Location: " . BASE_URL . "admin.php?error=failed_reset_card#edit-card-section");
    $stmt->close();
    exit;
}

// Execute the statement
$result = $stmt->execute();

if ($result === false) {
    header("Location: " . BASE_URL . "admin.php?error=failed_reset_card#edit-card-section");
    $stmt->close();
    exit;
}

// Check if any rows were affected
if ($stmt->affected_rows > 0) {
    header("Location: " . BASE_URL . "admin.php?success=reset_card#edit-card-section");
    $stmt->close();
    exit;
} else {
    header("Location: " . BASE_URL . "admin.php?error=failed_reset_card#edit-card-section");
    $stmt->close();
    exit;
}
