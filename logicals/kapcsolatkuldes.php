<?php
require_once '../includes/db.php';

$name = $_POST['name'] ?? 'Vendég';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (!empty($message)) {
    $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
}

header('Location: ../index.php?page=tablazat');
exit;