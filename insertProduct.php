<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/insertProduct.css">
</head>
<body>
    <?php
        include "header.php";

        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] !== "admin"){
            header("Location: ./index.php");
            exit();
        }
    ?>


<div class="container mt-5">
    <div class="row g-4 justify-content-center">
        <div id="alertPlaceholder"></div> 
        <div class="col-lg-10">
            <div class="form-container mb-4">
                <h2>Add New Game</h2>
                <form id="gameForm" method="POST" onsubmit="Validate(event)">
                    <div class="mb-3">
                        <label for="name" class="form-label">Game Name</label>
                        <input type="text" class="form-control text-white" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Game Image</label>
                        <input type="text" class="form-control text-white" id="image" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control text-white" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control text-white" id="description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select name="genre" class="form-select text-white" id="genre">
                            <option selected value="">Select Genre</option>
                            <option value="FPS">FPS</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Strategy">Strategy</option>
                            <option value="Survival">Survival</option>
                            <option value="RPG">RPG</option>
                            <option value="Horror">Horror</option>
                            <option value="Racing">Racing</option>
                            <option value="MMO">MMO</option>
                            <option value="Co-op">Co-op</option>
                            <option value="Fighting">Fighting</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Game</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="scripts/insertProduct.js"></script>
</body>
</html>