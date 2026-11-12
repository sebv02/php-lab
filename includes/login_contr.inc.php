<?php
declare(strict_types=1);
function is_login_input_empty(string $username, string $pwd): bool
{
 return empty($username) || empty($pwd);
}
function is_username_wrong(array|false $result): bool
{
 return $result === false;
}
function is_password_wrong(string $pwd, string $hashedPwd): bool
{
 return !password_verify($pwd, $hashedPwd);
}