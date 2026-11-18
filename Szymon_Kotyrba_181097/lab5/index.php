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
    if(isset($_GET['idp'])) {
        if(is_string($_GET['idp']) && isset($podstrony['idp'])) {
            $wybraneIdp = $_GET['idp'];
        }
        elseif ($_GET['idp'] == '') {
            $wybraneIdp = 'glowna';
        }
        else {
            http_response_code(404);
            $komunikatBledu = "404 - Dana strona nie istnieje!";
        }
    } else {
        $wybraneIdp = 'glowna';
        if(!is_file($sciezkaPliku) || !is_readable($sciezkaPliku)) {
            http_response_code(500);
        }    
    }
    $sciezkaPliku = __DIR__ . '/' . $podstrony[$wybraneIdp]['plik'];



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
    <title>Sklep z artykułami artystycznymi - Strona główna</title>
</head>
<body>
<header>
    <h1>Strona główna</h1>
    <nav>
        <ul>
            <li><a href="index.html" aria-current="page">Główna</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
            <li><a href="produkt.html">Produkt</a></li>
            <li><a href="lab4.php">Katalog PHP</a></li>
            <li id="theme-button-style"><button id="theme-button" aria-pressed="true">Tryb ciemny</button></li>
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
<?php if($komunikatBledu != ''): ?>
    <p class="error-message"><?php echo $komunikatBledu?></p>
<?php endif ?>
</main>
<footer><?php echo $sklep_demo?></footer>
</body>
</html>