<?php
date_default_timezone_set("Asia/Ulaanbaatar");

$courses=["Web","Database", "AI"];
$courses[]="Mobile";
array_push($courses, "Security");

$lang="HTML,PHP,CSS";

$student =[
    "name"=>"Bold",
    "age" =>20,
    "course"=>"Web"
];

$students=[
    ["name"=>"Bold","age"=>20,"scores"=>[85,90,78]],
    ["name"=>"Saraa","age"=>21,"scores"=>[92,88,95]],
    ["name"=>"Temuujin","age"=>19,"scores"=>[60,65,70]],
    ["name"=>"Sebu","age"=>18,"scores"=>[80,90,100]],
];
?>
<DOCTYPE html>
<html lang="mn">
<head>
 <meta charset="UTF-8">
 <title>Массив ба функц</title>
 </head>
<body>
    <h2>Массив</h2>
 <p>Эхний хичээл: <?php echo $courses[0]; ?></p>
 <p>Хичээлийн тоо: <?php echo count($courses); ?></p>
 <p><?php echo $student["name"] . " " . $student["age"] . " настай"; ?></p>
 <p>4 дахь оюутан: <?php echo $students[3]["name"]; ?></p>
 <h2>Built-in функц</h2>
 <?php
 $text = "php is fun";
 echo "<p>" . strtoupper($text) . "</p>";
 echo "<p>" . ucwords($text) . "</p>";
 echo "<p>" . str_replace("fun", "easy", $text) . "</p>";
 echo "<p>strlen: " . strlen($text) . "</p>";
 echo "<p>mb_strlen: " . mb_strlen("Сараа") . "</p>";
 echo "<p>" . implode(", ", $courses) . "</p>";
 $lang_array= explode(",", $lang);
 $hasAI = in_array("AI", $courses) ? "Тийм" : "Үгүй";
 echo "<p>AI байгаа юу: " . $hasAI . "</p>";
 echo "<p>Дундаж: " . round(array_sum([85, 90, 78]) / 3, 1) . "</p>";
 echo "<p>Өнөөдөр: " . date("Y-m-d H:i") . "</p>";
 sort($courses);
 echo "<pre>";
 print_r($courses);
 echo "</pre>";
echo "<pre>";
 print_r($lang_array);
echo "</pre>";
?>
<?php
 // ---------- Алхам 7 ----------
 define("PASS_SCORE", 70);
 const SCHOOL = "Шинэ Монгол Технологийн Коллеж";
 function calculateAverage(array $scores): float
 {
 return round(array_sum($scores) / count($scores), 1);
 }
 function getStatus(float $average): string
 {
 return $average >= PASS_SCORE ? "Тэнцсэн" : "Тэнцээгүй";
 }
 function getLetter(float $avg): string {
    if ($avg >= 90) {
        return "A";
    } elseif ($avg >= 80) {
        return "B";
    } elseif ($avg >= 70) {
        return "C";
    } elseif ($avg >= 60) {
        return "D";
    } else {
        return "F";
    }
}
 // Хувьсагчийн хүрээ (scope)
 $counter = 0;
 function addVisit(): void
 {
 global $counter;
 $counter++;
 }
 function countCalls(): int
 {
 static $calls = 0;
 $calls++;
 return $calls;
 }
 addVisit();
 addVisit();
 echo "<p>counter = $counter</p>";
 countCalls();
 countCalls();
 echo "<p>countCalls() дуудсан тоо: " . countCalls() . "</p>";
 // for давталт
 echo "<p>for: ";
 for ($i = 1; $i <= 5; $i++) {
 echo $i . " ";
 }
echo "</p>";
 // while давталт
 $n = 3;
 while ($n > 0) {
 echo "<p>while: $n</p>";
 $n--;
 }

echo "<p>do...while: ";
 $count = 10;
do {
    echo $count . " ";
    $count--; 
} while ($count >= 1); 
 ?>
 <h2><?php echo SCHOOL; ?>: оюутны дүн</h2>
 <table border="1" cellpadding="6">
 <tr>
 <th>#</th><th>Нэр</th><th>Дундаж</th><th>Төлөв</th><th>Дүн</th>
 </tr>
 <?php foreach ($students as $index => $s): ?>
 <?php $avg = calculateAverage($s["scores"]); ?>
 <tr>
 <td><?php echo $index + 1; ?></td>
 <td><?php echo $s["name"]; ?></td>
<td><?php echo $avg; ?></td>
 <td><?php echo getStatus($avg); ?></td>
 <td><?php echo getLetter($avg); ?></td>
 </tr>
 <?php endforeach; ?>
 </table>
</body>
</html>