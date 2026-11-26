<?php
$sklep_demo = "Sklep-Artystyczny";
$komunikatBledu = '';
$wybraneIdp = '';
$strona = null;
$menuStron = [];

if (!isset($_GET['idp']) || $_GET['idp'] === '') {
    $wybraneIdp = 'glowna';
} elseif (!is_string($_GET['idp']) || !preg_match('/\A[a-z0-9-]{1,20}\z/', $_GET['idp'])) {
    http_response_code(404);
    $komunikatBledu = '404 - Dana podstrona nie istnieje!';
} else {
    $wybraneIdp = $_GET['idp'];
}

try {
    require_once __DIR__ . '/cfg.php';
    require_once __DIR__ . '/showpage.php';

    $menuStron = PobierzMenu($pdo);

    if ($komunikatBledu === '') {
        $strona = PokazPodstrone($pdo, $wybraneIdp);
        if ($strona === null) {
            http_response_code(404);
            $komunikatBledu = '404 - Dana podstrona nie istnieje!';
        }
    }
} catch (PDOException $e) {
    http_response_code(500);
    $komunikatBledu = '500 - Wewnętrzny błąd serwera.';
    $strona = null;
    $menuStron = [];
    error_log('[lab6 DB] ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/main.js" defer></script>
    <script src="vendor/jquery-4.0.0.min.js" defer></script>
    <script src="js/lab3.js" defer></script>
    <title>Sklep z artykułami artystycznymi - <?php
        if ($strona !== null) {
            echo htmlspecialchars($strona['page_title'], ENT_QUOTES, 'UTF-8');
        } else {
            echo 'Błąd';
        }
    ?></title>
</head>
<body>
<header>
    <?php if ($strona !== null): ?>
        <h1><?php echo htmlspecialchars($strona['page_title'], ENT_QUOTES, 'UTF-8'); ?></h1>
    <?php else: ?>
        <h1 class="error-message">Błąd</h1>
    <?php endif; ?>
    <nav>
        <ul>
            <?php foreach ($menuStron as $pozycja): ?>
                <li><a href="index.php?idp=<?php echo htmlspecialchars($pozycja['alias'], ENT_QUOTES, 'UTF-8'); ?>"<?php if ($strona !== null && $pozycja['alias'] === $wybraneIdp): ?> aria-current="page"<?php endif; ?>><?php echo htmlspecialchars($pozycja['page_title'], ENT_QUOTES, 'UTF-8'); ?></a></li>
            <?php endforeach; ?>
            <li><a href="lab4.php">Katalog PHP</a></li>
        </ul>
    </nav>
    <div id="time-date">
        Godzina: Data:
    </div>
    <ul>
        <li><button id="start-button">Start zegar</button></li>
        <li><button id="stop-button">Stop zegar</button></li>
    </ul>
</header>
<main>
<?php if ($komunikatBledu !== ''): ?>
    <h3 class="error-message"><?php echo htmlspecialchars($komunikatBledu, ENT_QUOTES, 'UTF-8'); ?></h3>
    <h5><a href="index.php?idp=glowna">Powrót do strony głównej</a></h5>
<?php else: ?>
    <?php echo $strona['page_content']; ?>
<?php endif; ?>
</main>
<footer><?php echo htmlspecialchars($sklep_demo, ENT_QUOTES, 'UTF-8'); ?> | v1.5</footer>
</body>
</html>