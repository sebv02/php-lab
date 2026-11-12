<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $username = $_POST["username"];
 $pwd = $_POST["pwd"];
 $email = $_POST["email"];
 try {
 require_once "dbh.inc.php";
 require_once "signup_model.inc.php";
 require_once "signup_contr.inc.php";
 // Алдаа шалгах
 $errors = [];
 if (is_input_empty($username, $pwd, $email)) {
 $errors["empty_input"] = "Бүх талбарыг бөглөнө үү!";
 }
 if (is_email_invalid($email)) {
 $errors["invalid_email"] = "Имэйл хаяг буруу байна!";
 }
 if (is_username_taken($pdo, $username)) {
 $errors["username_taken"] = "Энэ нэр бүртгэлтэй байна!";
 }
 if (is_email_registered($pdo, $email)) {
 $errors["email_used"] = "Энэ имэйл бүртгэлтэй байна!";
 }
 if (is_password_short($pwd)) {
 $errors["short_password"] = "Нууц үг богино байна!";
 }  
 require_once "config_session.inc.php";
 if ($errors) {
 $_SESSION["errors_signup"] = $errors;
 $_SESSION["signup_data"] = [
 "username" => $username,
"email" => $email
 ];
 header("Location: ../account.php");
 die();
 }
 create_user($pdo, $pwd, $username, $email);
 $pdo = null;
 header("Location: ../account.php?signup=success");
 die();
 } catch (PDOException $e) {
 die("Query амжилтгүй: " . $e->getMessage());
 }
} else {
 header("Location: ../account.php");
 die();
}