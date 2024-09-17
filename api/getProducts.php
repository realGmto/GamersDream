<?php
include 'db.php';

// Set headers to allow cross-origin requests and return JSON data
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['genre']) && !empty($input['genre'])) {
        $genre = $input['genre'];
        $stmt = $conn->prepare("SELECT * FROM product WHERE genre = ?");
        $stmt->bind_param('s', $genre); // Bind genre parameter to prevent SQL injection
    } else {
        $stmt = $conn->prepare("SELECT * FROM product");
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode($products);

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['message' => 'Invalid request method.']);
}
?>
