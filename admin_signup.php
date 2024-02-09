<?php

require_once("db/db_config.php");

$username = "Connor";
$pwd = "123456";

// Your SQL query to insert the admin into the 'admin' table
// Hashing the password
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

$sql = "INSERT INTO `admin`(`username`, `pwd`) VALUES (?, ?);";

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $username, $hashedPwd);
    if ($stmt->execute()) {
        // Query executed successfully
       echo "worked";
    } else {
        echo "didnt work";
    }
    $stmt->close();
} else {
    echo "Prepare failed: " . $conn->error;
    return;
}
