<?php
require_once "includes/config_session.inc.php";
if (isset($_GET["set"])) {
 $_SESSION["username"] = "Болд";
 $_SESSION["visits"] = 0;
}
if (isset($_GET["clear"])) {
 session_unset();
 session_destroy();
 header("Location: session_test.php");
 exit();
}
if (isset($_SESSION["visits"])) {
 $_SESSION["visits"]++;
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
 <meta charset="UTF-8">
 <title>Session</title>
</head>
<body>
 <p>username: <?php echo $_SESSION["username"] ?? "байхгүй"; ?></p>
 <p>Нээсэн тоо: <?php echo $_SESSION["visits"] ?? 0; ?></p>
 <p>Session ID: <?php echo session_id(); ?></p>
 <a href="session_test.php?set=1">Session үүсгэх</a> |
 <a href="session_test.php">Дахин ачаалах</a> |
 <a href="session_test.php?clear=1">Session устгах</a>
</body>
</html>
