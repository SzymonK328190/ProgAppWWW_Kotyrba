<?php 
session_start();
require_once __DIR__ . '/includes/produkty.php';
$tytulStrony = 'Katalog produktów PHP';
$idGrupy = "lab4";

$wybranaKategoria = 'wszystkie';
$komunikatGet = '';

$iloscProduktow = count($produkty);

if(isset($_GET['kategoria'])) {
    if(is_string($_GET['kategoria']) && in_array($_GET['kategoria'], ['wszystkie', 'ksiazki', 'akcesoria'], true)) {
        $wybranaKategoria = $_GET['kategoria'];
    } else {
        $wybranaKategoria = 'wszystkie';
        $komunikatGet = 'Nieznana kategoria';
    }
}

$komunikatPost = '';
$bladPost = false;
$faktycznyWybranyProduktPost = false;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['produkt']) && isset($_POST['ilosc']) && is_string($_POST['produkt']) && is_string($_POST['ilosc'])) {
        $idAktualnegoProduktuPost = filter_var($_POST['produkt'], FILTER_VALIDATE_INT);
        $wybranaIloscPost = filter_var($_POST['ilosc'], FILTER_VALIDATE_INT);
    } else {
        $bladPost = true;
        $komunikatPost = "Błąd: Błędne dane formularza!";
    }
    if($bladPost == false && $idAktualnegoProduktuPost !== false && $wybranaIloscPost !== false) {
        for($i = 0; $i < $iloscProduktow; $i++) {
            if($idAktualnegoProduktuPost == $produkty[$i]['id']) {
                $faktycznyWybranyProduktPost = $produkty[$i];
                break;
            }
        }
    }
    else {
        $bladPost = true;
        $komunikatPost = "Błąd: Błędne dane formularza!";
    }
    if($bladPost == false && $faktycznyWybranyProduktPost !== false) {
        if($wybranaIloscPost > 0 && $wybranaIloscPost <= 5) {
            if($wybranaIloscPost > filter_var($faktycznyWybranyProduktPost['stan'], FILTER_VALIDATE_INT)) {
                $bladPost = true;
                $komunikatPost = "Błąd: Wybrano większą ilość niż jest na stanie!";
            }
        } else {
            $bladPost = true;
            $komunikatPost = 'Błąd: Wybrano nieprawidłową ilość!';
        }
    } else {
            $bladPost = true;
            $komunikatPost = 'Błąd: Brak takiego produktu!';  
    }

    if($bladPost == true) {
        http_response_code(400);
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
    <title>Sklep z artykułami artystycznymi - <?php echo $tytulStrony ?></title>
</head>
<body>
    <?php 
        include __DIR__ . "/includes/naglowek.php";
    ?>
    <main>
        <h3><?php echo $tytulStrony; ?></h3>
        <p>ID: <?php echo $idGrupy; ?></p>

        <div class="box">
            <form method="get" action="lab4.php">
                <label for='filtr-kat'>Filtr kategori</label>
                <select name='kategoria' id='filtr-kat'>
                    <option value='wszystkie'>Wszystkie</option>
                    <option value='ksiazki'>Ksiazki</option>
                    <option value='akcesoria'>Akcesoria</option>
                </select>
                <button type='submit'>Potwierdź</button>
            </form>
            <?php if ($komunikatGet !== ''): ?>
                <p class='error-message'>Błąd: <?php echo $komunikatGet; ?></p>
            <?php endif; ?>
        </div>

        <?php 
            $i = 0;
            ?>
            <div class="catalog-grid"> <?php
            while($i < $iloscProduktow) {
                $stanDostepnosci = '';
                $etykietaKategori = '';
                if($produkty[$i]['stan'] <= 0) {
                    $stanDostepnosci = 'Niedostępny';
                } elseif ($produkty[$i]['stan'] > 0 && $produkty[$i]['stan'] <= 5) {
                    $stanDostepnosci = 'Niski stan';
                }
                else {
                    $stanDostepnosci = 'Dostępny';
                }

                switch($produkty[$i]['kategoria']) {
                    case 'ksiazki':
                        $etykietaKategori = 'Książki';
                        break;
                    case 'akcesoria':
                        $etykietaKategori = 'Akcesoria';
                        break;
                    default:
                        $etykietaKategori = 'Inne';
                }

                ?>  
            <?php if($wybranaKategoria == 'wszystkie' || $wybranaKategoria == $produkty[$i]['kategoria']): ?>
                <div class="catalog-product">
                    <p>Nazwa: <?php echo htmlspecialchars($produkty[$i]['nazwa'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Kategoria: <?php echo htmlspecialchars($etykietaKategori, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Stan: <?php echo $produkty[$i]['stan']; ?> (<?php echo $stanDostepnosci; ?>)</p>
                </div>
            <?php endif; ?>
        <?php    
            $i++;
            }
        ?>
        </div>
        <div class="box">
            <form method="post" action='lab4.php'>
                <label for="wybor-produktu">Produkt:</label>
                    <select name='produkt' id='wybor-produktu'>
                        <?php 
                            for($i = 0; $i < $iloscProduktow; $i++) {
                                ?><option value="<?php echo $produkty[$i]['id']; ?>"><?php echo htmlspecialchars($produkty[$i]['nazwa'], ENT_QUOTES, 'UTF-8')?></option>
                                <?php
                            }
                        ?>
                    </select>
                <label for="ilosc-produktow">Ilość:</label>
                    <select name='ilosc' id='ilosc-produktow'>
                        <?php 
                            for($j = 1; $j <= 5; $j++) {
                                ?>
                                    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                <button type="submit">Zapisz wybór</button>
            </form>
            <?php if($bladPost == true): ?>
                <p class="error-message"><?php echo $komunikatPost; ?></p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>