<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");


$user = "root";
$pass = "";

$dbh = new PDO('mysql:host=localhost;dbname=fridge', $user, $pass);

$stmt = $dbh->query('SELECT product_name FROM products');
print mb_strtolower(implode("$", $stmt->fetchAll(PDO::FETCH_COLUMN)));
