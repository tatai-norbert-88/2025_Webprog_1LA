<?php
$host = 'localhost';
$db   = 'vh4fxa_adatb';
$user = 'vh4fxa_adatb';
$pass = 'hikrer-hUcsa-88';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]; // ← FONTOS: ez zárja le a [ ]-t

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Kapcsolódási hiba: ' . $e->getMessage();
}
