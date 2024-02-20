<?php

require_once("../config-url.php");

if (isset($_POST["u4"])) {

    if (empty($_POST["u4"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u4", $_POST["u4"]);

} elseif (isset($_POST["u5"])) {
    if (empty($_POST["u5"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u5", $_POST["u5"]);

} elseif (isset($_POST["u7"])) {
    if (empty($_POST["u7"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u7", $_POST["u7"]);

} elseif (isset($_POST["u8"])) {
    if (empty($_POST["u8"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u8", $_POST["u8"]);

} elseif (isset($_POST["u9"])) {
    if (empty($_POST["u9"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u9", $_POST["u9"]);

} elseif (isset($_POST["u11"])) {
    if (empty($_POST["u11"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u11", $_POST["u11"]);

} elseif (isset($_POST["u13"])) {
    if (empty($_POST["u13"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u13", $_POST["u13"]);

} elseif (isset($_POST["u18"])) {
    if (empty($_POST["u18"])) {
        header("Location: " . BASE_URL . "admin-officials.php?error=empty_input");
        exit;
    }

    update_division("u18", $_POST["u18"]);

}

function update_division($division, $text)
{

    require_once("../db/db_config.php");

    // ? Update statement
    $sql = "UPDATE `divisions` SET `$division` = ? WHERE `id` = 1;";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        header("Location: " . BASE_URL . "admin-officials.php?error=failed_update_division");
        $stmt->close();
        exit;
    }

    $stmt->bind_param("s", $text);

    // ? This checks the execute statement
    if ($stmt->execute()) {
        // ? Check the number of affected rows
        if ($stmt->affected_rows > 0) {
            // * Successful update
            header("Location: " . BASE_URL . "admin-officials.php?success=update_division");
            $stmt->close();
            exit;
        } else {
            // ! No rows were updated
            header("Location: " . BASE_URL . "admin-officials.php?error=failed_update_division");
            $stmt->close();
            exit;
        }
    } else {
        // ! Failed update
        header("Location: " . BASE_URL . "admin-officials.php?error=failed_update_division");
        $stmt->close();
        exit;
    }

}

