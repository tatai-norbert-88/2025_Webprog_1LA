<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['user'])) {
    echo "A képfeltöltés csak bejelentkezett felhasználók számára elérhető.";
    exit;
}

if (!isset($_FILES['fajl']) || $_FILES['fajl']['error'] === UPLOAD_ERR_NO_FILE) {
    echo "Nem érkezett fájl.";
    exit;
}

$fajl = $_FILES['fajl'];
$max_meret = 3 * 1024 * 1024; // 3 MB

if ($fajl['error'] !== UPLOAD_ERR_OK) {
    echo "Feltöltési hiba: " . $fajl['error'];
    exit;
}

if ($fajl['size'] > $max_meret) {
    echo "A fájl túl nagy (maximum 3 MB engedélyezett).";
    exit;
}

$cel_mappa = "../images/";
$cel_utvonal = $cel_mappa . basename($fajl['name']);

$kiterjesztes = strtolower(pathinfo($cel_utvonal, PATHINFO_EXTENSION));
$engedelyezett = ['jpg', 'jpeg', 'png', 'gif'];

if (!in_array($kiterjesztes, $engedelyezett)) {
    echo "Csak JPG, PNG vagy GIF fájlok tölthetők fel.";
    exit;
}

if (move_uploaded_file($fajl['tmp_name'], $cel_utvonal)) {
    echo "Sikeres feltöltés: " . htmlspecialchars($fajl['name']);
} else {
    echo "Nem sikerült a fájl mentése.";
}
?>