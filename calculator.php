<!DOCTYPE html>
<html lang="mn">
<head>
 <meta charset="UTF-8">
 <title>Тооны машин</title>
</head>
<body>
 <h2>Тооны машин</h2>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
 method="post">
 <input type="number" name="num01" step="any" placeholder="Тоо 1">
 <select name="operator">
 <option value="add">+</option>
 <option value="subtract">-</option>
 <option value="multiply">*</option>
 <option value="divide">/</option>
  <option value="mod">%</option>
   <option value="expo">**</option>


 </select>
 <input type="number" name="num02" step="any" placeholder="Тоо 2">
 <button type="submit">Бодох</button>
 </form>
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // 1. Өгөгдөл авах, цэвэрлэх
 $num01 = filter_input(INPUT_POST, "num01",
 FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 $num02 = filter_input(INPUT_POST, "num02",
 FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 $operator = htmlspecialchars($_POST["operator"]);
 // 2. Алдаа шалгах
 $errors = false;
 if ($num01 == "" || $num02 == "" || $operator == "") {
 echo "<p>Бүх талбарыг бөглөнө үү!</p>";
 $errors = true;
 } elseif (!is_numeric($num01) || !is_numeric($num02)) {
 echo "<p>Зөвхөн тоо оруулна уу!</p>";
 $errors = true;
 } elseif ($operator == "divide" && $num02 == 0) {
 echo "<p>0-д хуваах боломжгүй!</p>";
 $errors = true;
 }if (!$errors) {
 switch ($operator) {
 case "add":
 $value = $num01 + $num02;
break;
 case "subtract":
 $value = $num01 - $num02;
 break;
 case "multiply":
 $value = $num01 * $num02;
break;
 case "divide":
 $value = $num01 / $num02;
break;
case "mod":
$value=$num01 %$num02;
break;
case "expo":
$value = $num01 ** $num02;
break;
 default:
 $value = "Алдаа гарлаа";
 }
 $formatted_value = number_format($value, 2);
 echo "<p>Хариу = " . $formatted_value . "</p>";
 }
 }
 ?>
</body>
</html>
