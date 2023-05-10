<?php
require('connection.php');

//menangkap nilai
$productCode = $_GET["productCode"];

$statusDelete = "";
//query SQL
$query = $connection->prepare("DELETE FROM products WHERE productCode = :productCode");

//binding data
$query->bindParam(':productCode', $productCode);

//ekesekusi
if ($query->execute()) {
    $statusDelete = "ok";
} else {
    $statusDelete = "err";
}

header('Location: index.php?statusDelete=' . $statusDelete);
