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
    <form action="/product-add.php">
        <button type="submit">ADD</button>
    </form>g
    <?php
    include "./Classes.php";
    $host = 'localhost';
    $user = 'Emiya';
    $password = 'AmerigoVespuchi2@';
    $dbname = 'products';

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM products_list";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['product_name'] == 'DVD') {
                $product = new DVD($row['SKU'], $row['product_name'], $row['product_price'], $row['product_size']);
            } elseif ($row['product_name'] == 'Book') {
                $product = new Book($row['SKU'], $row['product_name'], $row['product_price'], $row['product_mass']);
            } elseif ($row['product_name'] == 'Furniture') {
                $product = new Furniture($row['SKU'], $row['product_name'], $row['product_price'], $row['product_height'], $row['product_width']);
            }

            $products[] = $product;
        }
    }

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    ?>

    <div class="card-grid">
        <?php foreach ($products as $product) { ?>
            <div class="card">
                <div class="card-header">
                    <span class="card-title"><?php echo $product->getName(); ?></span>
                </div>
                <div class="card-body">
                    <span class="card-text"><?php echo $product->getSKU(); ?></span>
                </div>
                <div class="card-footer">
                    <span class="card-price">$<?php echo $product->getPrice(); ?></span>
                </div>
                <div class="card-footer">
                    <span class="card-price"><?php echo $product->getAdditionalProperties(); ?></span>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php
    mysqli_close($conn);
    ?>
</body>

</html>