<?php

$dsn = 'mysql:dbname=tb240011db;host=localhost';
$user = 'tb-240011';
$password = 'U6fhPnAdPV';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = "CREATE TABLE IF NOT EXISTS mission"
            ." ("
            . "id INT AUTO_INCREMENT PRIMARY KEY,"
            . "name char(32),"
            . "comment TEXT,"
            . "pass TEXT"
            .");";
            $stmt = $pdo->query($sql);
?>