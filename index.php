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
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
        }

        .buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin: 0 1rem 1rem 0;
        }

        .button {
            border: 1px solid black;
            border-radius: 2px;
            outline: none;
            background-color: white;
            width: 120px;
            height: 50px;
            color: black;
        }

        .card-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: white;
            padding: 20px;
        }

        .card {
            width: calc(25% - 150px);
            height: 200px;
            margin: 10px;
            background-color: white;
            border: 1px solid black;
            box-sizing: border-box;
            padding: 20px;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
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

        .delete-checkbox {
            align-self: flex-end;
        }
    </style>
</head>

<body>
    <h1> Products List </h1>

    
    <div class="buttons">
        <form action="/add-product.php">
            <button class="button" type="submit">ADD</button>
        </form>
        <button type="button" id="delete-product-btn" class="button">MASS DELETE</button>
    </div>
    
    <hr style="background-color: black; height: 3px; width: 100%; outline: none; border: none; margin-bottom: 1rem;">

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