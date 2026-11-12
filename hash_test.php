<?php
$pwdSignup = "Bold@2025";
$options = ["cost" => 12];
$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);
$pwdLogin = "Bold@2025";
echo "<p>Hash: $hashedPwd</p>";
echo "<p>Урт: " . strlen($hashedPwd) . "</p>";
if (password_verify($pwdLogin, $hashedPwd)) {
 echo "<p>Нууц үг зөв</p>";
} else {
 echo "<p>Нууц үг буруу</p>";
}
