<h2>Kép feltöltése</h2>
<?php if (!isset($_SESSION['user'])): ?>
    <p>Csak bejelentkezett felhasználók tölthetnek fel képeket.</p>
<?php else: ?>
<form action="logicals/feltoltes.php" method="post" enctype="multipart/form-data">
    <label>Válassz képet: <input type="file" name="image" accept="image/*" required></label><br>
    <input type="submit" value="Feltöltés">
</form>
<?php endif; ?>

<h2>Galéria</h2>
<div class="gallery">
<?php
$images = glob("images/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
if ($images) {
    foreach ($images as $img) {
        echo "<img src='\$img' alt='kép' style='max-width:200px; margin:10px;'>";
    }
} else {
    echo "<p>Még nincs feltöltött kép.</p>";
}
?>
</div>