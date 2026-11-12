<?php
require_once "includes/config_session.inc.php";

// Нэвтрээгүй бол account.php руу шилжүүлнэ
if (!isset($_SESSION["user_id"])) {
    header("Location: account.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Гишүүдийн хуудас</title>
</head>
<body>
    <h2>Нууц хуудас</h2>
    <p>Сайн байна уу, <b><?php echo $_SESSION["user_username"]; ?></b>! Та амжилттай нэвтэрсэн тул энэ хуудсыг үзэх боломжтой байна.</p>
    <a href="account.php">Буцах</a>
</body>
</html>