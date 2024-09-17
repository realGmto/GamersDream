<?php
session_start();

// Set headers for JSON response
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Check if the session is already active and logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Destroy the session and log the user out
    session_unset();    // Unset session variables
    session_destroy();  // Destroy the session
    
    echo json_encode(["success" => true, "message" => "Logged out successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "No active session found"]);
}
?>
