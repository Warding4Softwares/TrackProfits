<?php

    $server = "localhost:3308";
    $username = "root";
    $DB_Name = "trackprofits";
    $password = "";

    $connect = new PDO("mysql:host=$server; dbname=$DB_Name", $username, $password);

?>