<?php
require_once "includes/dbh.inc.php";
$query = "SELECT id, username, email, created_at FROM users ORDER BY id;";
$stmt = $pdo->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="mn">
<head>
 <meta charset="UTF-8">
 <title>Хэрэглэгчид</title>
</head>
<body>
 <h2>Хэрэглэгчийн жагсаалт (<?php echo count($users); ?>)</h2>
 <table border="1" cellpadding="6">
 <tr><th>ID</th><th>Нэр</th><th>Имэйл</th><th>Огноо</th></tr>
 <?php foreach ($users as $user): ?>
 <tr>
 <td><?php echo $user["id"]; ?></td>
<td><?php echo htmlspecialchars($user["username"]); ?></td>
 <td><?php echo htmlspecialchars($user["email"]); ?></td>
<td><?php echo $user["created_at"]; ?></td>
 </tr>
 <?php endforeach; ?>
 </table>
 <h2>Шинэ хэрэглэгч нэмэх</h2>
 <form action="includes/userinsert.inc.php" method="post">
 <input type="text" name="username" placeholder="Нэр">
 <input type="password" name="pwd" placeholder="Нууц үг">
 <input type="email" name="email" placeholder="Имэйл">
 <button type="submit">Нэмэх</button>
 </form>
 <h2>Хэрэглэгч засах</h2>
 <form action="includes/userupdate.inc.php" method="post">
 <input type="number" name="id" placeholder="ID">
 <input type="text" name="username" placeholder="Шинэ нэр">
 <input type="email" name="email" placeholder="Шинэ имэйл">
 <button type="submit">Засах</button>
 </form>
 <h2>Хэрэглэгч устгах</h2>
 <form action="includes/userdelete.inc.php" method="post">
 <input type="number" name="id" placeholder="ID">
 <button type="submit">Устгах</button>
 </form>
</body>
</html>
