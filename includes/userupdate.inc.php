<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $id = (int) $_POST["id"];
 $username = $_POST["username"];
 $email = $_POST["email"];
 if (empty($id) || empty($username) || empty($email)) {
 header("Location: ../users.php");
 die();
 }
 try {
 require_once "dbh.inc.php";
 $query = "UPDATE users SET username = :username, email = :email
 WHERE id = :id;";
 $stmt = $pdo->prepare($query);
 $stmt->bindParam(":username", $username);
 $stmt->bindParam(":email", $email);
 $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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