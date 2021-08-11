<?php

 try {
    $pdo = new PDO('mysql:host=localhost;dbname=motoboy;charset=utf8', "root", "");
    return $pdo;
} catch (PDOException $e) {
    echo $e->getMessage();
}