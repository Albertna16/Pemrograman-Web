<?php
require('connection.php');

$customerNumber = $_GET["customerNumber"];

$statusDelete = "";
//query SQL
$query = $connection->prepare("DELETE FROM customers WHERE customerNumber = :customerNumber");

//binding data
$query->bindParam(':customerNumber', $customerNumber);

//ekesekusi
if ($query->execute()) {
    $statusDelete = "ok";
} else {
    $statusDelete = "err";
}

header('Location: customers.php?statusDelete=' . $statusDelete);
