<?php
    session_start();
    $json = file_get_contents('php://input');

    $data = json_decode($json, true);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
            $_SESSION['cart'] = $data;
            echo json_encode(['success' => 'You have successfully stored your cart']);
        }
    }
    else 
        echo json_encode(['error' => 'Error storing your cart']);
?>