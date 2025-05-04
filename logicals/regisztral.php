<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once '../includes/db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';

if ($username && $password && $firstname && $lastname) {
    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, firstname, lastname) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $hash, $firstname, $lastname]);
    } catch (PDOException $e) {
        echo "Adatbázis hiba: " . $e->getMessage();
        exit;
    }
}

header('Location: ../index.php?page=belepes');
exit;
