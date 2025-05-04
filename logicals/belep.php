<?php
session_start();
require_once '../includes/db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username && $password) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'username' => $user['username'],
            'name' => $user['lastname'] . ' ' . $user['firstname']
        ];
    }
}

header('Location: ../index.php?page=tablazat');
exit;