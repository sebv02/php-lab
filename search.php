<?php
$results = [];
$search = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $search = $_POST["usersearch"];
 try {
 require_once "includes/dbh.inc.php";
 $query = "SELECT * FROM comments WHERE username = :usersearch
 ORDER BY created_at DESC;";
 $stmt = $pdo->prepare($query);
 $stmt->bindParam(":usersearch", $search);
 $stmt->execute();
 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $pdo = null;
 $stmt = null;
 } catch (PDOException $e) {
 die("Query амжилтгүй: " . $e->getMessage());
 }
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
 <meta charset="UTF-8">
 <title>Хайлт</title>
</head>
<body>
 <h2>Сэтгэгдэл хайх</h2>
 <form action="search.php" method="post">
 <input type="text" name="usersearch" placeholder="Хэрэглэгчийн нэр">
 <button type="submit">Хайх</button>
 </form>
 <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
 <h3>"<?php echo htmlspecialchars($search); ?>" хайлтын үр дүн</h3>
 <?php if (empty($results)): ?>
 <p>Сэтгэгдэл олдсонгүй.</p>
 <?php else: ?>
 <?php foreach ($results as $row): ?>
 <p>
 <b><?php echo htmlspecialchars($row["username"]); ?>:</b>
<?php echo htmlspecialchars($row["comment_text"]); ?>
(<?php echo $row["created_at"]; ?>)
 </p>
 <?php endforeach; ?>
 <?php endif; ?>
 <?php endif; ?>
</body>
</html>
