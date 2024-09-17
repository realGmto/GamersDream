<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/cart.css">
</head>
<body>
    <?php
        include "header.php";
    ?>

<div class="container my-5">
    <div class="row">
        <!-- Cart Section -->
        <div class="col-lg-8">
            <div class="checkout-container mb-4">
                <div class="checkout-header">Check your Cart</div>

                <table class="table table-borderless cart-table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody id="cart-item-container">
                        <!-- Cart items go here -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Summary and Address Form -->
        <div class="col-lg-4">
            <!-- Summary -->
            <div class="checkout-summary mb-4">
                <h4>Order summary</h4>
                <p class="fs-5"><strong>Grand total:</strong> €<span id="cartTotal">190.82</span></p>
                <button type="button submit" class="btn pay-button w-100" form="form-pay">PAY</button>
            </div>

            <!-- Address Form -->
            <div class="checkout-container">
                <div class="checkout-header">Billing Address</div>

                <form id="form-pay" onsubmit="ValidateForm(event)">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control text-white" id="firstName" placeholder="John">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control text-white" id="lastName" placeholder="Doe">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control text-white" id="address" placeholder="123 Main St">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control text-white" id="city" placeholder="New York">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select text-white" id="country">
                            <option selected>Select Country</option>
                            <option value="US">United States</option>
                            <option value="GB">United Kingdom</option>
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="zipcode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control text-white" id="zipcode" placeholder="10001">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Purchase Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Thank you for your purchase! Your order has been successfully placed.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href='index.php'">Continue Shopping</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="scripts/global.js"></script>
<script src="scripts/cart.js"></script>
<script src="elements/cartItem.js"></script>
</body>
</html>
