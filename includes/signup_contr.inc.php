<?php
declare(strict_types=1);
function is_input_empty(string $username, string $pwd, string $email): bool
{
 return empty($username) || empty($pwd) || empty($email);
}
function is_email_invalid(string $email): bool
{
 return !filter_var($email, FILTER_VALIDATE_EMAIL);
}
function is_username_taken(PDO $pdo, string $username): bool
{
 return get_username($pdo, $username) !== false;
}
function is_email_registered(PDO $pdo, string $email): bool
{
 return get_email($pdo, $email) !== false;
}
function is_password_short(string $pwd): bool
{
    return strlen($pwd) < 8; // Нууц үг 8-аас цөөн тэмдэгттэй бол true буцаана
}
function create_user(
 PDO $pdo, string $pwd, string $username, string $email
): void {
 set_user($pdo, $pwd, $username, $email);
}