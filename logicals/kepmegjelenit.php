
<?php
require_once '../includes/db.php';

$id = $_GET['id'] ?? 0;

try {
    $stmt = $pdo->prepare("SELECT mimetype, image FROM kepek WHERE id = ?");
    $stmt->execute([$id]);
    $kep = $stmt->fetch();

    if ($kep) {
        header("Content-Type: " . $kep['mimetype']);
        echo $kep['image'];
    } else {
        http_response_code(404);
        echo "Kép nem található.";
    }
} catch (PDOException $e) {
    echo "Hiba a kép megjelenítésekor: " . $e->getMessage();
}
?>
