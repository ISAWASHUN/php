<?php

$dsn = 'mysql:dbname=tb240011db;host=localhost';
$user = 'tb-240011';
$password = 'U6fhPnAdPV';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$id = 1; 
    $name = "pokemon";
    $comment = "pokemonに変更"; 
    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
?>