<?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $genre = $_POST['genre'];
        $image = $_POST['image'];

        $stmt = $conn->prepare("SELECT * FROM product WHERE name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();

        if ($result->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'Game with this name already exists in the database.']);
        }
        else{
            if (!empty($name) && !empty($price) && !empty($description) && !empty($genre) && !empty($image)) {
                $stmt = $conn->prepare("INSERT INTO product (name, image, price, details, genre) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssdss", $name, $image, $price, $description, $genre);
        
                if ($stmt->execute()) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error inserting into the database']);
                }
        
                $stmt->close();
            } else {
                echo json_encode(['success' => false, 'message' => 'Please fill in all fields']);
            }
        }
    }
    $conn->close();
?>