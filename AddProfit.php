<?php

    include("./db_Connection.php");

    $Item = $_POST['Item'];
    $Price = $_POST['Price'];

    $add = $connect -> prepare("INSERT INTO profits(Item, Price, Date) VALUE(?, ?, ?)");
    $add -> execute([$Item, $Price, date("Y-m-d")]);

    header("Location: http://localhost/TrackProfits/pages");
    exit();

?>