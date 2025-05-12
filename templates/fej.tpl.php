<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing rendszer</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<header>
    <nav>
        <button class="menu-toggle" aria-label="Menü megjelenítése/elrejtése" aria-expanded="false">&#9776;</button>
        <ul>
            <?php foreach ($menu as $kulcs => $szoveg): ?>
                <li>
                    <?php if ($kulcs === 'kilepes'): ?>
                        <a href="logicals/kilepes.php"><?= htmlspecialchars($szoveg) ?></a>
                    <?php else: ?>
                        <a href="index.php?page=<?= urlencode($kulcs)  ?>"><?= htmlspecialchars($szoveg) ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <?php if (isset($_SESSION['user'])): ?>
        <p class="login-info">
            Bejelentkezett: <?= htmlspecialchars($_SESSION['user']['name']) ?> (<?= htmlspecialchars($_SESSION['user']['username']) ?>)
        </p>
    <?php endif; ?>
</header>
<main>
