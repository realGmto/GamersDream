<?php
include __DIR__ .'/db.php';

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

if (isset($input['username'], $input['email'], $input['password'])) {
    $username = trim($input['username']);
    $email = trim($input['email']);
    $password = trim($input['password']);
    $role = trim("user");

    // Check if the user already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // After each querry this needs to be closed
    $stmt->close();

    if ($result->num_rows > 0) {
        echo json_encode(["error" => "User with this email already exists"]);
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertQuery = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);
        if ($stmt->execute()) {
            echo json_encode(["success" => "User registered successfully"]);
        } else {
            echo json_encode(["error" => "Registration failed"]);
        }
    }
    $stmt->close();
} else {
    echo json_encode(["error" => "Incomplete registration data"]);
}

$conn->close();
?>
