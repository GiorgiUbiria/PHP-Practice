<?php

$mysqli = new mysqli('localhost', 'Emiya', 'AmerigoVespuchi2@', 'products');

$sku = $_POST['sku'];

$stmt = $mysqli->prepare('SELECT COUNT(*) FROM products_list WHERE SKU = ?');
$stmt->bind_param('s', $sku);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();

$response = array(
    'skuExists' => $count > 0
);

echo json_encode($response);
