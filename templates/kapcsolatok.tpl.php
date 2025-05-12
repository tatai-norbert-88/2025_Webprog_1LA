<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<h2>Kapcsolatok</h2>
<h4>Itt üzenetet tüd küldeni akár vendég felhasználóként is.</h4>

<?php

if (isset($_SESSION['success_message'])) {
    echo '<div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 15px;">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
    unset($_SESSION['success_message']); 
}
if (isset($_SESSION['error_message'])) {
    echo '<div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
    unset($_SESSION['error_message']); 
}


$form_data = $_SESSION['form_data'] ?? [];
unset($_SESSION['form_data']); 
?>

<form method="POST" action="logicals/kapcsolatkuldes.php">
    <label for="kapcs_name">Név:</label><br>
    <input type="text" id="kapcs_name" name="name" placeholder="Vendég (minimum 5 karakter)" value="<?= htmlspecialchars($form_data['name'] ?? '') ?>" required minlength="5"><br><br>
    
    <label for="kapcs_email">E-mail cím:</label><br>
    <input type="email" id="kapcs_email" name="email" placeholder="nev@example.com" value="<?= htmlspecialchars($form_data['email'] ?? '') ?>" required><br><br>
    
    <label for="kapcs_message">Üzenet:</label><br>
    <textarea id="kapcs_message" name="message" rows="5" cols="50" placeholder="Írja ide az üzenetét..." required><?= htmlspecialchars($form_data['message'] ?? '') ?></textarea><br><br>
    
    <button type="submit">Küldés</button>
</form>
