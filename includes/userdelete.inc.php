<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $id = (int) $_POST["id"];
 try {
 require_once "dbh.inc.php";
 $query = "DELETE FROM users WHERE id = :id;";
 $stmt = $pdo->prepare($query);
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
