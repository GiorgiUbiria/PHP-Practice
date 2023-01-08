<?php

declare(strict_types=1);

include "./Classes.php";

$database = new ProductDatabase('localhost', 'Emiya', 'AmerigoVespuchi2@', 'products');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = (float) $_POST['price'];
    $type = $_POST['product-type'];

    print_r($_POST);

    switch ($type) {
        case 'Book':
            $weight = (int) $_POST['weight'];
            // Set the properties of the Product object
            $product = new Book($sku, $name, $price, $weight);
            break;
        case 'DVD':
            $size = (int) $_POST['size'];
            // Set the properties of the Product object
            $product = new DVD($sku, $name, $price, $size);
            break;
        case 'Furniture':
            $height = (int) $_POST['height'];
            $width = (int) $_POST['width'];
            $length = (int) $_POST['length'];
            // Set the properties of the Product object
            $product = new Furniture($sku, $name, $price, $height, $width, $length);
            break;
        default:
            $product = null;
            break;
    }


    // Add the Product object to the database
    $database->addProduct($product);
    header('Location: /');
}

$database->destruct();
