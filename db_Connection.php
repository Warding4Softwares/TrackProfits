<?php

    require_once __DIR__.'/vendor/autoload.php';
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();   

    $server = $_ENV['SERVER'];
    $username = $_ENV['USER'];
    $DB_Name = $_ENV['DB_NAME'];
    $password = $_ENV['PASSWORD'];

    $connect = new PDO("mysql:host=$server; dbname=$DB_Name", $username, $password);

?>