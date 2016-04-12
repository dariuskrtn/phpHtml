<?php
function Connect() {
    $dsn = 'localhost';
    $username = 'root1';
    $password = '';
    $db = "akademija";
    $conn=null;
    try {
       $conn = new mysqli($dsn, $username, $password, $db);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $conn;
}