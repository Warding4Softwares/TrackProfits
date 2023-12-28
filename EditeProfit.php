<?php

include("./db_Connection.php");

$id = $_GET['id'];
$item = $_POST['Item'];
$price = $_POST['Price'];

$update = $connect->prepare("UPDATE profits SET Item = ?, Price = ? WHERE id = ?");
$update->execute([$item, $price, $id]);

header("Location: {$_ENV['DOMAIN']}");
exit();
