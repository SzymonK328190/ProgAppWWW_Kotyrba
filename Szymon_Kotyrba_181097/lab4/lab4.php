<?php 
require_once __DIR__ . '/includes/produkty.php';
$tytulStrony = 'Katalog produktów PHP';
$idGrupy = "lab4"
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $tytulStrony; ?></title>
</head>
<body>
    <?php
    include __DIR__ . '/includes/naglowek.php'
    ?>
    <main>
<main>
        <h2><?php echo $tytulStrony; ?></h2>
        <p>Identyfikator grupy: <strong><?php echo $idGrupy; ?></strong></p>

        <h3>Katalog produktów</h3>

        <?php
        $i = 0;
        $liczbaProduktow = count($produkty);

        while ($i < $liczbaProduktow) {
            $p = $produkty[$i];
            if ($p['stan'] == 0) {
                $statusDostepnosci = "Niedostępny";
            } elseif ($p['stan'] >= 1 && $p['stan'] <= 5) {
                $statusDostepnosci = "Niski stan";
            } else {
                $statusDostepnosci = "Dostępny";
            }
            switch ($p['kategoria']) {
                case 'ksiazki':
                    $etykietaKategorii = "Książki";
                    break;
                case 'akcesoria':
                    $etykietaKategorii = "Akcesoria komputerowe";
                    break;
                default:
                    $etykietaKategorii = "Inne";
                    break;
            }
        ?>
            <div>
                <h4><?php echo $p['nazwa']; ?></h4>
                <p>Kategoria: <?php echo $etykietaKategorii; ?></p>
                <p>Status: <?php echo $statusDostepnosci; ?>(Stan: <?php echo $p['stan']; ?> szt.)</p>
                <form method="post" action="lab4.php">
                    <input type="hidden" name="produkt" value="<?php echo $p['id']; ?>">
                    
                    <label for="ilosc-<?php echo $p['id']; ?>">Wybierz ilość:</label>
                    <select name="ilosc" id="ilosc-<?php echo $p['id']; ?>">
                        <?php
                        for ($j = 1; $j <= 5; $j++) {
                            echo "<option value='$j'>$j</option>";
                        }
                        ?>
                    </select>

                    <button type="submit">Wybierz</button>
                </form>
            </div>

        <?php
            $i++;
        }
        ?>
    </main>
    </main>
</body>
</html>