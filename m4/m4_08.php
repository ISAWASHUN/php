<?php

$dsn = 'mysql:dbname=tb240011db;host=localhost';
$user = 'tb-240011';
$password = 'U6fhPnAdPV';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$id = 2;
    $sql = 'delete from tbtest where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
?>