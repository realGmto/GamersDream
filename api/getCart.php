<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_SESSION['cart']))
            echo json_encode($_SESSION['cart']);
        else{
            $_SESSION['cart'] = [];
            echo json_encode([]);
        }
    }
    else 
        echo json_encode(['error' => 'Error getting your cart']);
?>