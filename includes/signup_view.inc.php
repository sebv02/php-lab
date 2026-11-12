<?php
declare(strict_types=1);
function signup_inputs(): void
{
 $data = $_SESSION["signup_data"] ?? [];
 $errors = $_SESSION["errors_signup"] ?? [];
 // Алдаагүй талбарын утгыг дахин бөглөнө
 $username = "";
 if (isset($data["username"]) && !isset($errors["username_taken"])) {
 $username = htmlspecialchars($data["username"]);
 }
 $email = "";
 if (isset($data["email"]) && !isset($errors["email_used"])
 && !isset($errors["invalid_email"])) {
 $email = htmlspecialchars($data["email"]);
 }
 echo "<input type='text' name='username' placeholder='Нэр'"
 . " value='$username'>";
 echo "<input type='password' name='pwd' placeholder='Нууц үг'>";
 echo "<input type='text' name='email' placeholder='Имэйл'"
 . " value='$email'>";
}
function check_signup_errors(): void
{
 if (isset($_SESSION["errors_signup"])) {
 foreach ($_SESSION["errors_signup"] as $error) {
 echo "<p style='color:red'>$error</p>";
 }
 unset($_SESSION["errors_signup"]);
 unset($_SESSION["signup_data"]);
 } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
 echo "<p style='color:green'>Бүртгэл амжилттай!</p>";
 }
}