# ProgAppWWW_Kotyrba

## Zależności

- jQuery 4.0.0

## Instrukcja

Wymagania
- XAMPP (Apache + MySQL/MariaDB)
- przeglądarka

1. Przenieść zawartość katalogu `lab6` do folderu `htdocs\lab6` w lokalizacji instalacji XAMPP'a.
2. Uruchomić Apache i MySQL w XAMPP.
3. W phpMyAdmin utworzyć bazę `moja_strona` z kodowaniem `utf8mb4` (`utf8mb4_unicode_ci`) i zaimportować kolejno `sql/schema.sql` oraz `sql/seed.sql`.
4. Utworzyć lokalnego użytkownika bazy z prawem `SELECT` wyłącznie do `moja_strona.page_list`:
```sql
CREATE USER 'cms_reader'@'127.0.0.1' IDENTIFIED BY 'TWOJE_HASLO';
GRANT SELECT ON moja_strona.page_list TO 'cms_reader'@'127.0.0.1';
FLUSH PRIVILEGES;
```
5. Skopiować `cfg.example.php` jako `cfg.php` i uzupełnić dane dostępowe do bazy.
6. W przeglądarce otworzyć `localhost/lab6/index.php`.

## Wyniki testów LAB6

| Próba | Kroki | Wynik oczekiwany | Wynik rzeczywisty |
|---|---|---|---|
| Odczyt i aktualizacja treści | Otwarcie `index.php` oraz `?idp=`, edycja treści `glowna` w phpMyAdmin i odświeżenie strony. | `index.php` i `?idp=` otwierają `glowna` z HTTP 200. Po odświeżeniu widać zmianę bez edycji plików PHP i HTML. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym |
| Nowa strona i menu | Dodanie opublikowanego rekordu (`status = 1`) z nowym aliasem i otwarcie nowego linku z menu. | Link pojawia się w menu i otwiera stronę bez zmiany kodu PHP. Aktywny link jest oznaczony. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym |
| Szkic i publikacja | Sprawdzenie rekordu ze `status = 0` w menu i pod bezpośrednim adresem, zmiana na `1`, próba dodania duplikatu aliasu. | Szkic znika z menu i daje 404. Po zmianie na `1` jest widoczny. Duplikat aliasu jest odrzucany przez bazę. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym |
| Błędne dane w adresie | Otwarcie `?idp=nieznana`, `?idp[]=filmy`, `?idp=../cfg.php` oraz `?idp=' OR 1=1--` i sprawdzenie w Network. | Każda próba daje HTTP 404 bez ostrzeżeń PHP. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym |
| Awaria bazy | Tymczasowe ustawienie błędnego portu w `cfg.php`, sprawdzenie strony i lokalnego logu, przywrócenie portu. | Strona zwraca HTTP 500 bez szczegółów technicznych, a lokalny log pozwala ustalić przyczynę. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym |
| Funkcje po migracji | Sprawdzenie stylów, obrazów, animacji, AJAX (`status.php`), trzech filmów oraz katalogu `lab4.php` (POST 303 -> GET 200). | Wszystko działa jak przed migracją, wybór pozostaje w sesji po przejściu między podstronami. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym |
| Odtworzenie środowiska | Utworzenie pustej bazy testowej, import `sql/schema.sql` i `sql/seed.sql`, ustawienie jej w `cfg.php` i sprawdzenie strony. | Projekt uruchamia się zgodnie z README, także z polskimi znakami. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym |


## Źródła grafik

- farby https://www.stormplastyczny.pl/userdata/public/gfx/68764/Farby-olejne-Van-Gogh-Starter-Box-XL-zestaw-w-drewnianej-skrzynce-12-x-40-ml-akcesoria-01.jpg
- szkicownik https://oxford-sklep.pl/userdata/public/gfx/10770/400152648_1100_print.jpg
- ołówki https://biurowe-szkolne.pl/images/Zestaw-olowkow-12-sztuk-5B-5H-Koh-i-noor-1500-w-metalowej-kasetce.jpg