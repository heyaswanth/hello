<?php

// Verify Token - This should match the token you provided when setting up the webhook in your Facebook app settings
$verify_token = "abc123";

// Check if the request is a verification challenge (GET request)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hub_challenge'])) {
    $challenge = isset($_GET['hub_challenge']) ? $_GET['hub_challenge'] : '';

    // Verify the Verify Token
    if ($_GET['hub_verify_token'] === $verify_token) {
        // Respond with the challenge token to confirm the webhook
        echo $challenge;
        exit;
    } else {
        // Invalid verify token
        http_response_code(403);
        echo "Invalid verify token";
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process incoming POST data
    $input = file_get_contents('php://input');
    $data = json_decode($input, true); // Decode JSON data into an associative array

    // Handle the incoming data as needed
    // For example, log the data or perform further processing

    // Send a response indicating that the POST data was received
    http_response_code(200);
    echo "POST data received successfully";
    exit;
} else {
    // Invalid request method
    http_response_code(400);
    echo "Bad request";
    exit;
}

?>
