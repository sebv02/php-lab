<?php
declare(strict_types=1);
function output_username(): void
{
 if (isset($_SESSION["user_id"])) {
 echo "Та " . $_SESSION["user_username"] . " нэрээр нэвтэрсэн байна";
 } else {
 echo "Та нэвтрээгүй байна";
 }
}
function check_login_errors(): void
{
 if (isset($_SESSION["errors_login"])) {
 foreach ($_SESSION["errors_login"] as $error) {
 echo "<p style='color:red'>$error</p>";
 }
 unset($_SESSION["errors_login"]);
 }
}
