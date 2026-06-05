<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn(): bool
{
    return isset($_SESSION['user_id'], $_SESSION['role']);
}

function requireRole(string $role): void
{
    if (!isLoggedIn() || $_SESSION['role'] !== $role) {
        header('Location: index.php');
        exit;
    }
}

function h(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
