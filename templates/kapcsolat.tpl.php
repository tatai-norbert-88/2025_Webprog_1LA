<h2>Kapcsolat</h2>
<form action="logicals/kapcsolatkuldes.php" method="post" onsubmit="return validateForm()">
    <label>Név: <input type="text" name="name" id="name" required></label><br>
    <label>Email: <input type="email" name="email" id="email" required></label><br>
    <label>Üzenet: <textarea name="message" id="message" required></textarea></label><br>
    <input type="submit" value="Küldés">
</form>
<script src="styles/validation.js"></script>