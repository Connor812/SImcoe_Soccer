<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $status = $_POST["status"];

    // Error Handling
    if (empty($status) || $status != "open" && $status != "closed") {
        http_response_code(400);
        $errorResponse = array(
            'error' => 'Missing required data'
        );
        $jsonResponse = json_encode($errorResponse);
        header('Content-Type: application/json');
        echo $jsonResponse;
        exit;
    }

    require_once("../db/db_config.php");

    $currentStatus = ($status === "open") ? "closed" : "open";

    $sql = "UPDATE `index_page` SET registration_btn_status = ? WHERE `registration_btn_status` = ?;";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Handle error if preparation fails
        http_response_code(400);
        $errorResponse = array(
            'error' => 'Error during preparation: ' . $conn->error
        );
        $jsonResponse = json_encode($errorResponse);
        header('Content-Type: application/json');
        echo $jsonResponse;
        exit;
    }

    // Bind parameters
    $stmt->bind_param("ss", $status, $currentStatus);

    // Execute the statement
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Update successful
            $successResponse = array(
                'success' => 'Update successful'
            );
            $jsonResponse = json_encode($successResponse);
            header('Content-Type: application/json');
            echo $jsonResponse;
        } else {
            // No changes made
            $noChangesResponse = array(
                'success' => 'No changes made'
            );
            $jsonResponse = json_encode($noChangesResponse);
            header('Content-Type: application/json');
            echo $jsonResponse;
        }
    } else {
        // Handle error if execution fails
        http_response_code(400);
        $errorResponse = array(
            'error' => 'Error updating registration state: ' . $stmt->error
        );
        $jsonResponse = json_encode($errorResponse);
        header('Content-Type: application/json');
        echo $jsonResponse;
        exit;
    }

} else {
    // Handle the case when the request method is not POST
    http_response_code(405);
    $errorResponse = array(
        'error' => 'Invalid request method'
    );
    $jsonResponse = json_encode($errorResponse);
    header('Content-Type: application/json');
    echo $jsonResponse;
}