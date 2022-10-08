<?php

$username = 'root';
$password = 'root';
$host = 'localhost';
$database = 'todo';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
   "mysql:host=$host;dbname=$database",$username,$password,$options
);


?>