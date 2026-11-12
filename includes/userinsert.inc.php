<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $username = $_POST["username"];
 $pwd = $_POST["pwd"];
 $email = $_POST["email"];
 if (empty($username) || empty($pwd) || empty($email)) {
 header("Location: ../users.php");
 die();
 }
 try {
 require_once "dbh.inc.php";
 $options = ["cost" => 12];
$hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
 $query = "INSERT INTO users (username, pwd, email)
 VALUES (:username, :pwd, :email);";
 $stmt = $pdo->prepare($query);
 $stmt->bindParam(":username", $username);
$stmt->bindParam(":pwd", $hashedPwd);
 $stmt->bindParam(":email", $email);
 $stmt->execute();
 $pdo = null;
 $stmt = null;
 header("Location: ../users.php");
 die();
 } catch (PDOException $e) {
 die("Query амжилтгүй: " . $e->getMessage());
 }
} else {
 header("Location: ../users.php");
 die();
}
