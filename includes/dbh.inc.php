<?php
$dsn = "mysql:host=localhost;dbname=phplab;charset=utf8mb4";
$dbusername = "root";
$dbpassword = "";
try {
 $pdo = new PDO($dsn, $dbusername, $dbpassword);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Холболт амжилтгүй: " . $e->getMessage());
}
