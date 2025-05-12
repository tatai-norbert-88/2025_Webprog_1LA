
<h2>Feltöltött képek</h2>
<div class="container" style="margin: 20px auto; max-width: 800px;">
    <form id="uploadForm" enctype="multipart/form-data">
        <label for="fajl">Válasszon egy képet feltöltésre:</label><br>
        <input type="file" name="fajl" id="fajl" accept="image/*"><br><br>
        <button type="submit">Feltöltés</button>
    </form>
    <div id="uploadStatus"></div>
</div>

<div id="imageGallery" style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center; margin: 20px auto;">
<?php
$uploads_dir = 'images/';
if (is_dir($uploads_dir)) {
    $files = array_diff(scandir($uploads_dir), array('.', '..'));
    if (empty($files)) {
        echo "<p>Nincsenek feltöltött képek.</p>";
    } else {
        foreach ($files as $file) {
            echo "<div style='margin: 10px; text-align: center; border: 1px solid #ddd; padding: 10px;'>";
            echo "<img src='$uploads_dir$file' alt='$file' style='max-width: 200px; max-height: 200px;'><br>";
            echo htmlspecialchars($file);
            echo "</div>";
        }
    }
} else {
    echo "<p class='error'>A képmappa nem található.</p>";
}
?>
</div>

<script>
document.getElementById("uploadForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    fetch("logicals/feltoltes.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        const statusDiv = document.getElementById("uploadStatus");
        if (data.status === "success") {
            statusDiv.innerHTML = "<p style='color: green;'>" + data.message + "</p>";
            const gallery = document.getElementById("imageGallery");
            const newImage = document.createElement("div");
            newImage.style = "margin: 10px; text-align: center; border: 1px solid #ddd; padding: 10px;";
            newImage.innerHTML = "<img src='" + data.image + "' alt='" + data.message + "' style='max-width: 200px; max-height: 200px;'><br>" + data.message;
            gallery.prepend(newImage);
        } else {
            statusDiv.innerHTML = "<p style='color: red;'>" + data.message + "</p>";
        }
    })
    .catch(error => {
        document.getElementById("uploadStatus").innerHTML = "<p style='color: red;'>Hiba a feltöltés során.</p>";
    });
});
</script>

<?php include 'footer.php'; ?>
