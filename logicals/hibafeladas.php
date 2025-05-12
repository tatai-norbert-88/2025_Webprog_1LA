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
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Kapcsolódási hiba: ' . $e->getMessage();
}


try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS hibak (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nev VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        uzenet TEXT,
        kep VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );");
} catch (PDOException $e) {
    echo "Hiba a hibak tábla létrehozásakor: " . $e->getMessage();
}


try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS uzenetek (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) DEFAULT 'Vendég',
        email VARCHAR(100) NOT NULL,
        message TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );");
} catch (PDOException $e) {
    echo "Hiba az üzenetek tábla létrehozásakor: " . $e->getMessage();
}

k
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS kepek (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        mimetype VARCHAR(100) NOT NULL,
        image LONGBLOB NOT NULL,
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );");
} catch (PDOException $e) {
    echo "Hiba a kepek tábla létrehozásakor: " . $e->getMessage();
}
?>
