# ProgAppWWW_Kotyrba

## Zależności

- jQuery 4.0.0

## Instrukcja

Wymagania
- XAMPP
- przeglądarka

Przenieść zawartość katalogu `lab5` do folderu `htdocs\lab4` w lokalizacji instalacji XAMPP'a

W przeglądarce otworzyć `localhost/lab5`

## Wyniki testów LAB5

| Próba | Kroki | Wynik oczekiwany | Wynik rzeczywisty |
|---|---|---|---|
| Adres domyślny i menu | Otwarcie `index.php`, `index.php?idp=` oraz kliknięcie kolejnych linków w menu. | `index.php` i `index.php?idp=` pokazują stronę główną. Odnośniki otwierają właściwe treści ze wspólnym szablonem i poprawnym tytułem. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Nieznany lub tablicowy klucz | Otwarcie `?idp=nieznana` oraz `?idp[]=filmy`, sprawdzenie kodu w Network. | `?idp=nieznana` i `?idp[]=filmy` dają HTTP 404 i odnośnik powrotny, bez ostrzeżeń PHP. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Próba podania ścieżki | Otwarcie adresu `?idp=..%2Fstatus.php` i sprawdzenie odpowiedzi w Network. | `?idp=..%2Fstatus.php` daje HTTP 404. Zawartość `status.php` nie zostaje dołączona. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Brak pliku widoku | Tymczasowa zmiana nazwy `html/filmy.html`, otwarcie `?idp=filmy`, następnie przywrócenie nazwy pliku. | Adres `?idp=filmy` zwraca HTTP 500 bez ujawnienia ścieżki systemowej. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Strona główna i AJAX | Otwarcie strony głównej, test stylów, grafik, animacji i podgląd żądania do `status.php` w Network. | Na stronie głównej działają style, grafiki i animacje. W panelu Sieć widać udane żądanie do `status.php`, a na stronie jego wynik. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Katalog i sesja po migracji | Wejście do katalogu z menu, filtr GET, zapis POST, przejście na Główną i Filmy, powrót do katalogu. | Zapis wyboru daje POST 303, potem GET 200. Po przejściu przez inne podstrony zapisany wybór nadal jest widoczny. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Filmy i układ mobilny | Uruchomienie 3 filmów, test linków i sprawdzenie widoku przy szerokości 360 px oraz nawigacji Tab. | Trzy filmy można uruchomić, odnośniki działają, a przy szerokości 360 px strona nie przewija się w poziomie. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |


## Źródła grafik

- farby https://www.stormplastyczny.pl/userdata/public/gfx/68764/Farby-olejne-Van-Gogh-Starter-Box-XL-zestaw-w-drewnianej-skrzynce-12-x-40-ml-akcesoria-01.jpg
- szkicownik https://oxford-sklep.pl/userdata/public/gfx/10770/400152648_1100_print.jpg
- ołówki https://biurowe-szkolne.pl/images/Zestaw-olowkow-12-sztuk-5B-5H-Koh-i-noor-1500-w-metalowej-kasetce.jpg