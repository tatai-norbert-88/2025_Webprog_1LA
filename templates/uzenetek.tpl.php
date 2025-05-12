
<h2>Üzenetek</h2>
<?php
if (!isset($_SESSION['user'])) {
    echo "<p>Az üzenetek megtekintéséhez be kell jelentkezni.</p>";
    return;
}

require_once 'includes/db.php';
try {
    $stmt = $pdo->query("SELECT * FROM uzenetek ORDER BY created_at DESC");
    $messages = $stmt->fetchAll();

    if (empty($messages)) {
        echo "<p>Nincs megjeleníthető üzenet.</p>";
    } else {
        echo "<table border='1'>
            <tr><th>ID</th><th>Név</th><th>Email</th><th>Üzenet</th><th>Dátum</th></tr>";
        foreach ($messages as $msg) {
            echo "<tr>
                <td>" . htmlspecialchars($msg['id']) . "</td>
                <td>" . htmlspecialchars($msg['name']) . "</td>
                <td>" . htmlspecialchars($msg['email']) . "</td>
                <td>" . nl2br(htmlspecialchars($msg['message'])) . "</td>
                <td>" . $msg['created_at'] . "</td>
            </tr>";
        }
        echo "</table>";
    }
} catch (PDOException $e) {
    echo "Hiba az üzenetek lekérdezésekor: " . $e->getMessage();
}
?>
