<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Ticketing rendszer</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <?php foreach ($menu as $kulcs => $szoveg): ?>
                <li>
                    <?php if ($kulcs === 'kilepes'): ?>
                        <a href="logicals/kilepes.php"><?= $szoveg ?></a>
                    <?php else: ?>
                        <a href="index.php?page=<?= $kulcs ?>"><?= $szoveg ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <?php if (isset($_SESSION['user'])): ?>
        <p class="login-info">
            Bejelentkezett: <?= $_SESSION['user']['name'] ?> (<?= $_SESSION['user']['username'] ?>)
        </p>
    <?php endif; ?>
</header>
<main>