# ProgAppWWW_Kotyrba

## Zależności

- jQuery 4.0.0

## Instrukcja

Wymagania
- XAMPP
- przeglądarka

Przenieść zawartość katalogu `lab3` do folderu `htdocs\lab3` w lokalizacji instalacji XAMPP'a

W przeglądarce otworzyć `localhost/lab3`

## Wyniki testów LAB3

|Kroki|Wynik oczekiwany|Wynik rzeczywisty|
|---|---|---|
|Szybkie klikanie pierwszego przycisku|Po resecie i 10 kliknięciach ustawiony jest stan bazowy. Po zakończeniu klikania animacje nie odtwarzają zaległej kolejki|Wynik rzeczywisty zgadza się z wynikiem oczekiwanym|
|Najechanie kursorem na drugi przycisk, klikniecie przycisku żeby ustawić na nim focus i zjechanie z niego kursorem|Przycisk powiększa się i maleje dopiero wtedy kiedy stracimy na nim focus i zjedziemy kursorem|Wynik rzeczywisty zgadza się z wynikiem oczekiwanym|
|Klikanie trzeciego przycisku więcej niż 5 razy i kliknięcie przycisku reset|Przycisk powiększa się maksymalnie do 260px x 140px. Dalsze kliknięcia nie powiększają przycisku. Reset zeruje stan|Wynik rzeczywisty zgadza się z wynikiem oczekiwanym|
|Użyto klawiatury do nawigowania po stronie używając przycisków TAB i ENTER| Tab dociera do przycisków; Enter i Spacja obsługują A, C i reset. Ograniczenie ruchu wyłącza przejścia, zachowując funkcje.| Wynik rzeczywisty zgadza się z wynikiem oczekiwanym|

### Odpowiedź po kliknięciu przycisku "Sprawdź serwer"
`HTTP/1.1 200 OK
Date: Thu, 05 Nov 2026 09:54:39 GMT
Server: Apache/2.4.65 (Win64) OpenSSL/3.5.1 PHP/8.3.36
X-Powered-By: PHP/8.3.36
Content-Length: 11
Keep-Alive: timeout=5, max=100
Connection: Keep-Alive
Content-Type: text/plain; charset=UTF-8`

### Odpowiedź po zmianie nazwy pliku php
`HTTP/1.1 404 Not Found
Date: Thu, 05 Nov 2026 09:55:39 GMT
Server: Apache/2.4.65 (Win64) OpenSSL/3.5.1 PHP/8.3.36
Content-Length: 295
Keep-Alive: timeout=5, max=98
Connection: Keep-Alive
Content-Type: text/html; charset=iso-8859-1`

## Źródła grafik

- farby https://www.stormplastyczny.pl/userdata/public/gfx/68764/Farby-olejne-Van-Gogh-Starter-Box-XL-zestaw-w-drewnianej-skrzynce-12-x-40-ml-akcesoria-01.jpg
- szkicownik https://oxford-sklep.pl/userdata/public/gfx/10770/400152648_1100_print.jpg
- ołówki https://biurowe-szkolne.pl/images/Zestaw-olowkow-12-sztuk-5B-5H-Koh-i-noor-1500-w-metalowej-kasetce.jpg