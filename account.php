<?php
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
?>
<!DOCTYPE html>
<html lang="mn">
<head>
 <meta charset="UTF-8">
 <title>Бүртгэл ба нэвтрэх</title>
</head>
<body>
 <h3><?php output_username(); ?></h3>
 <?php if (!isset($_SESSION["user_id"])): ?>
 <h2>Нэвтрэх</h2>
 <form action="includes/login.inc.php" method="post">
 <input type="text" name="username" placeholder="Нэр">
 <input type="password" name="pwd" placeholder="Нууц үг">
 <button type="submit">Нэвтрэх</button>
 </form>
 <?php check_login_errors(); ?>
 <h2>Бүртгүүлэх</h2>
 <form action="includes/signup.inc.php" method="post">
 <?php signup_inputs(); ?>
 <button type="submit">Бүртгүүлэх</button>
 </form>
 <?php check_signup_errors(); ?>
 <?php else: ?>
 <form action="includes/logout.inc.php" method="post">
 <button type="submit">Гарах</button>
 </form>
 <?php endif; ?>
</body>
</html>