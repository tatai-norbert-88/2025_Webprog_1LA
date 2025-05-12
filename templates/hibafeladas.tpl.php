<h2>Hibafeladás</h2>
<?php if (isset($_SESSION['user'])): ?>
<form action="logicals/hibafeladas.php" method="post" enctype="multipart/form-data">
    <label>Név: <input type="text" name="nev" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Üzenet:<br><textarea name="uzenet" required></textarea></label><br>
    <label>Kép (max 3MB): <input type="file" name="kep"></label><br>
    <button type="submit">Hibajegy beküldése</button>
</form>
<?php else: ?>
<p>A hibabejelentéshez be kell jelentkezned.</p>
<?php endif; ?>