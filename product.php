<?php
include __DIR__.'/api/db.php';


if (isset($_GET['id'])) {
    $productId = intval($_GET['id']); // Cast to integer to prevent SQL injection

    $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No product ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/product.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 product-page d-flex align-items-center justify-content-center">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid mb-3" alt="Product Cover">
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-4 product-page">
                <h1 class="fs-1 my-3"><?php echo htmlspecialchars($product['name']); ?></h1>

                <p class="product-price fs-2">€<?php echo htmlspecialchars($product['price']); ?></p>

                <p class="product-description"><?php echo htmlspecialchars($product['details']); ?></p>

                <button type="button" class="btn product-button btn-lg" file-json='<?php echo json_encode($product)?>' <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) echo "disabled" ?> onclick='AddProductToCart(event)'>ADD TO CART</button>

                <div class="my-4">
                    <span>Genre: </span>
                    <span class="tag"><?php echo htmlspecialchars($product['genre']); ?></span>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/product.js"></script>
    <script src="scripts/global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body