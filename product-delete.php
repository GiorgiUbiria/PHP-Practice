<?php

declare(strict_types=1);

include "./Classes.php";

$database = new ProductDatabase('localhost', 'Emiya', 'AmerigoVespuchi2@', 'products');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $skus = $data['skus'];
    foreach ($skus as $sku) {
        $database->deleteProduct($sku);
    }
}

$database->destruct();
