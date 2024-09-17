<?php
session_start(); // Start the session
include 'db.php'; // Database connection

// Set headers for JSON response
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Ensure that the request method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["error" => "Invalid request method"]);
    exit;
}

// Retrieve and decode the input
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['email'], $input['password'])) {
    $email = trim($input['email']);
    $password = trim($input['password']);

    // Check if the user exists
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["error" => "User not found"]);
    } else {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables after successful login
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $user['role'];

            // Return a success message
            echo json_encode(["success" => "Login successful", "username" => $user['username']]);
        } else {
            echo json_encode(["error" => "Invalid password"]);
        }
    }
    $stmt->close();
} else {
    echo json_encode(["error" => "Incomplete login data"]);
}

$conn->close();
?>
