<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $username = $_POST["username"];
 $pwd = $_POST["pwd"];
 try {
 require_once "dbh.inc.php";
 require_once "login_model.inc.php";
 require_once "login_contr.inc.php";
 $errors = [];
 if (is_login_input_empty($username, $pwd)) {
 $errors["empty_input"] = "Бүх талбарыг бөглөнө үү!";
 }
 $result = get_user($pdo, $username);
 if (is_username_wrong($result)) {
 $errors["login_incorrect"] = "Нэр эсвэл нууц үг буруу байна!";
 } elseif (is_password_wrong($pwd, $result["pwd"])) {
 $errors["login_incorrect"] = "Нэр эсвэл нууц үг буруу байна!";
 }
 require_once "config_session.inc.php";
 if ($errors) {
 $_SESSION["errors_login"] = $errors;
 header("Location: ../account.php");
 die();
 }
 // Нэвтрэх үед session ID-г заавал шинэчилнэ
 session_regenerate_id(true);
 $_SESSION["user_id"] = $result["id"];
 $_SESSION["user_username"] = htmlspecialchars($result["username"]);
 $_SESSION["last_regeneration"] = time();
 $pdo = null;
 header("Location: ../account.php");
 die();
 } catch (PDOException $e) {
 die("Query амжилтгүй: " . $e->getMessage());
 }
} else {
 header("Location: ../account.php");
 die();
}
