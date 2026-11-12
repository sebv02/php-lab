<?php
// URL-ээс утга авна, байхгүй бол анхны утга
$score = (int) ($_GET["score"] ?? 85);
$attendance = (int) ($_GET["attendance"] ?? 90);
// Арифметик оператор
$bonus = 5;
$total = $score + $bonus;
if($total %2==0){
    echo "<p>Нийт оноо $total нь тэгш тоо байна.</p>";
}else{
    echo "<p>Нийт оноо $total нь сондгой тоо байна.</p>";
}

if ($total >= 90 && $attendance >= 80) {
 $grade = "A";
} elseif ($total >= 80) {
 $grade = "B";
} elseif ($total >= 70) {
 $grade = "C";
} elseif ($total >= 60) {
 $grade = "D";
} else {
 $grade = "F";
}


$grade = match (true){
    $total >= 90 => "Маш сайн",
    $total >= 80 => "Маш сайн",
    $total >= 70 => "Дунд",
    $total >= 60 => "Дунд",
    default =>"Дахин суралцана",
};




$status = match (true) {
 $attendance >= 80 => "Ирц хангалттай",
 $attendance >= 60 => "Ирц дутуу",
 default => "Шалгалтад орох эрхгүй",
};
?>
<!DOCTYPE html>
<html lang="mn">
<head>
 <meta charset="UTF-8">
 <title>Үнэлгээ</title>
</head>
<body>
 <p>Нийт оноо: <?php echo $total; ?></p>
 <p>Үнэлгээ: <?php echo $grade; ?> </p>
 <p>Ирц: <?php echo $status; ?></p>
 <h3>== ба === ялгаа</h3>
 <pre><?php
 var_dump(5 == "5");
var_dump(5 === "5");
?></pre>
</body>
</html>