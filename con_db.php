<?php
$sname = "localhost";
$username = "root";
$password = "";
$db_name = "store_db";

try {
    $conn = new PDO("mysql:host=$sname;dbname=$db_name;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "success";
} catch (PDOException $e) {
    echo $e->getMessage();
}
