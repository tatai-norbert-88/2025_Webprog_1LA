<h2>Kapcsolatfelvételi üzenetek</h2>
<?php
if (!isset($_SESSION['user'])) {
    echo "<p>Az üzenetek megtekintéséhez be kell jelentkezni.</p>";
    return;
}

require_once 'includes/db.php';

$stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll();

if (empty($messages)) {
    echo "<p>Nincs megjeleníthető üzenet.</p>";
} else {
    echo "<table border='1'>
        <tr><th>Név</th><th>Email</th><th>Üzenet</th><th>Időpont</th></tr>";
    foreach ($messages as $msg) {
        echo "<tr>
            <td>" . htmlspecialchars($msg['name']) . "</td>
            <td>" . htmlspecialchars($msg['email']) . "</td>
            <td>" . nl2br(htmlspecialchars($msg['message'])) . "</td>
            <td>" . $msg['created_at'] . "</td>
        </tr>";
    }
    echo "</table>";
}
?>