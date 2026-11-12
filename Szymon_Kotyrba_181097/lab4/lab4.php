<?php 
session_start();
require_once __DIR__ . '/includes/produkty.php';
$tytulStrony = 'Katalog produktów PHP';
$idGrupy = "lab4";

$wybranaKategoria = '';
$komunikatGet = '';



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

        <?php 
            $i = 0;
            $iloscProduktow = count($produkty);
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
            <div class="catalog-product">
                <p>Nazwa: <?php echo htmlspecialchars($produkty[$i]['nazwa'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Kategoria: <?php echo htmlspecialchars($etykietaKategori, ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Stan: <?php echo $produkty[$i]['stan']; ?> (<?php echo $stanDostepnosci; ?>)</p>
                <select>
                    <?php 
                        for($j = 1; $j <= 5; $j++) {
                            ?>
                                <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        <?php    
            $i++;
            }
        ?>
        </div>
    </main>
</body>
</html>