<?php

require_once("../config-url.php");

if (!isset($_GET["card_num"]) || empty($_GET["card_num"])) {
    header("Location: " . BASE_URL . "admin.php?error=couldnt_get_card_num");
    exit;
}

require_once("../db_config.php");

$card_num = $_GET["card_num"];

$sql = "UPDATE `index_page.php`
SET
    `card_image_$card_num` = NULL,
    `card_text_$card_num` = NULL,
    `card_link_$card_num` = NULL,
    `card_heading_$card_num` = NULL
WHERE
    `id` = 1;";

$stmt = $conn->prepare($sql);

