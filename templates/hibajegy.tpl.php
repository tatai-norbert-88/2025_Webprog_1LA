<h2>Bejelentett hibajegyek</h2>
<?php
if (!isset($_SESSION['user'])) {
    echo "<p>Jelentkezz be a hibajegyek megtekintéséhez.</p>";
    return;
}

require_once 'includes/db.php';

$stmt = $pdo->query("SELECT * FROM hibak ORDER BY created_at DESC");
foreach ($stmt as $row) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
    echo "<strong>" . htmlspecialchars($row['nev']) . "</strong> (" . htmlspecialchars($row['email']) . ")<br>";
    echo "<em>" . $row['created_at'] . "</em><br>";
    echo "<p>" . nl2br(htmlspecialchars($row['uzenet'])) . "</p>";
    if (!empty($row['kep'])) {
        echo "<img src='uploads/" . htmlspecialchars($row['kep']) . "' style='max-width:200px;'><br>";
    }
    echo "</div>";
}
?>