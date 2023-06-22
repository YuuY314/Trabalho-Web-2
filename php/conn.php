<?php
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
    ];

    $port = "3306";
    $db = "story_maker_studio";
    $dbuser = "root";
    $dbpassword = "";

    try {
        $conn = new PDO("mysql:host=localhost;port=$port;dbname=$db", $dbuser, $dbpassword, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die($e->getMessage());
    }
?>