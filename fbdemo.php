<?php

// Verify Token - This should match the token you provided when setting up the webhook in your Facebook app settings
$verify_token = "abc123";

// Receive the challenge parameter to verify the webhook
$challenge = $_REQUEST['hub_challenge'];

// Verify the Verify Token
if ($_REQUEST['hub_verify_token'] === $verify_token) {
    // Respond with the challenge token to confirm the webhook
    echo $challenge;
    exit;
}

?>