<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Product Grid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body onload="GetProducts(null)">
    <?php
        include 'header.php';
    ?>


    <div class="container mt-5">
        <div class="row g-4" id="product-card-container"> 
            <!-- Here will Product cards go -->
        </div>
    </div>
    <script src="scripts/index.js"></script>
    <script src="scripts/global.js"></script>
    <script src="elements/productCard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
