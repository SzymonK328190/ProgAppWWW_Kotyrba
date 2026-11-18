<?php 
    $sklep_demo = "Sklep-Artystyczny";
    $podstrony = [
        "glowna" => [
            "tytul" => "Strona Główna",
            "plik" => "html/glowna.html"
        ],
        "kontakt" => [
            "tytul" => "Kontakt",
            "plik" => "html/kontakt.html"
        ],
        "produkt" => [
            "tytul" => "Produkt",
            "plik" => "html/produkt.html"
        ],
        "filmy" => [
            "tytul" => "Filmy",
            "plik" => "html/filmy.html"
        ]
    ];

    $komunikatBledu = '';
    $wybraneIdp = '';
    if (!isset($_GET['idp']) || $_GET['idp'] === '') {
        $wybraneIdp = 'glowna';
    } elseif (!is_string($_GET['idp']) || !isset($podstrony[$_GET['idp']])) {
        http_response_code(404);
        $komunikatBledu = "404 - Dana podstrona nie istnieje!";
    } else {
        $wybraneIdp = $_GET['idp'];
    }
    if ($komunikatBledu === '') {
        $sciezkaPliku = __DIR__ . '/' . $podstrony[$wybraneIdp]['plik'];

        if (!is_file($sciezkaPliku) || !is_readable($sciezkaPliku)) {
            http_response_code(500);
            $komunikatBledu = '500 - Wewnętrzny błąd serwera';
        }
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
    <title>Sklep z artykułami artystycznymi - 
        <?php
        if($komunikatBledu === '') {
            ?>
                <?php echo htmlspecialchars($podstrony[$wybraneIdp]['tytul'], ENT_QUOTES, 'UTF-8')?>
            <?php
        } else {
            ?>
                Błąd
            <?php
        } ?>
    </title>
</head>
<body>
<header>
    <?php 
        if($komunikatBledu === '') {
            ?>
                <h1><?php echo htmlspecialchars($podstrony[$wybraneIdp]['tytul'], ENT_QUOTES, 'UTF-8')?></h1>
            <?php
        } else {
            ?>
                <h1 class=error-message>Błąd</h1>
            <?php
        }
    ?>
    <nav>
        <ul>
            <?php 
                foreach($podstrony as $klucz => $dane) {
                    ?>
                        <li><a href="index.php?idp=<?php echo $klucz; ?>"
                        <?php if($klucz === $wybraneIdp): ?>
                            aria-current="page"
                        <?php endif; ?>
                        ><?php echo $dane['tytul']; ?></a></li>
                    <?php
                }
            ?>
            <li><a href='lab4.php'>Katalog PHP</a></li>
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
<?php if($komunikatBledu !== ''){ ?>
    <h3 class="error-message"><?php echo $komunikatBledu?></h3>
    <h5><a href='index.php?idp=glowna'>Powrót do strony głównej</a></h5>
<?php } else {
    include $sciezkaPliku;
}
?>
</main>
<footer><?php echo $sklep_demo?></footer>
</body>
</html>