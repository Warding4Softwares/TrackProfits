<?php

include("./db_Connection.php");

$id = $_GET['id'];

$delete = $connect->prepare("DELETE FROM profits WHERE id = ?");
$delete->execute([$id]);

header("Location: {$_ENV['DOMAIN']}");
exit();
