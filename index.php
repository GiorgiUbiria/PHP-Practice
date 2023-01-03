<?php

declare(strict_types=1);

include "./Classes.php";

// Create an instance of the ProductDatabase class
$database = new ProductDatabase('localhost', 'Emiya', 'AmerigoVespuchi2@', 'products');

// Retrieve the list of products
$products = $database->getProducts();

?>

<html>

<head>
    <title>Product List</title>
    <style>
        .card-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: lightgray;
            padding: 20px;
        }

        .card {
            width: calc(25% - 20px);
            height: 300px;
            margin: 10px;
            background-color: white;
            border: 1px solid black;
            box-sizing: border-box;
            padding: 20px;
            font-size: 16px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            font-size: 16px;
            margin: 10px 0;
        }

        .card-price {
            font-size: 18px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>

<body>
    <form action="/add-product.php">
        <button type="submit">ADD</button>
    </form>
    <button type="button" id="delete-product-btn">MASS DELETE</button>
    <div class="card-grid">
        <?php foreach ($products as $product) : ?>
            <div class="card">
                <input type="checkbox" class="delete-checkbox" value="<?= htmlspecialchars($product->getSKU()) ?>">
                <div class="card-header"><span class="card-title"><?= htmlspecialchars($product->getName()) ?></span></div>
                <div class="card-body"><span class="card-text"><?= htmlspecialchars($product->getSKU()) ?></span></div>
                <div class="card-footer"><span class="card-price">$<?= htmlspecialchars(number_format($product->getPrice(), 2)) ?></span></div>
                <div class="card-footer"><span class="card-price"><?= htmlspecialchars($product->getAdditionalProperties()) ?></span></div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php $database->destruct(); ?>

    <script>
        document.getElementById("delete-product-btn").addEventListener("click", function() {
            let checkboxes = document.querySelectorAll(".delete-checkbox:checked");
            let skus = [];
            for (let i = 0; i < checkboxes.length; i++) {
                skus.push(checkboxes[i].value);
            }
            fetch("/product-delete.php", {
                method: "DELETE",
                body: JSON.stringify({
                    skus: skus
                }),
                headers: {
                    "Content-Type": "application/json"
                }
            }).then(function(response) {
                if (response.ok) {
                    location.reload();
                }
            });
        });
    </script>

</body>

</html>