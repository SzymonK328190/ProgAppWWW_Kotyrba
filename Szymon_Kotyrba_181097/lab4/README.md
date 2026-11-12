# ProgAppWWW_Kotyrba

## Zależności

- jQuery 4.0.0

## Instrukcja

Wymagania
- XAMPP
- przeglądarka

Przenieść zawartość katalogu `lab4` do folderu `htdocs\lab4` w lokalizacji instalacji XAMPP'a

W przeglądarce otworzyć `localhost/lab4`

## Wyniki testów LAB4

| Próba | Kroki | Wynik oczekiwany | Wynik rzeczywisty |
|---|---|---|---|
| Filtr GET | Zmiana parametru w URL na `?kategoria=ksiazki`, nieznaną wartość oraz `?kategoria[]=ksiazki`. | `?kategoria=ksiazki` pokazuje tylko książki. Nieznana kategoria lub `?kategoria[]=ksiazki` pokazuje pełną listę i komunikat. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Poprawny POST i odświeżenie | Wybór dostępnego produktu, podgląd w Network, odświeżenie (F5) i zmiana filtra. | W Network widać POST 303, potem GET 200. Po odświeżeniu i zmianie filtra zapisany wybór pozostaje widoczny. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Błędne wartości POST | Edycja formularza w Inspektorze na wartości: `0`, `6`, `2.5`, `2abc`, brak pola, tablicę `[]` i nieznane ID. | Każda próba daje HTTP 400 i pozostawia poprzedni wybór. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Stan magazynowy | Próba wyboru 2 sztuk dla produktu ze stanem równym 1. | Serwer odrzuca wybór, mimo że 2 mieści się w przedziale 1–5. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Odrębna sesja i tekst HTML | Otwarcie strony w oknie prywatnym oraz tymczasowa zmiana nazwy produktu na `<b>Test</b>`. | W nowej sesji nie ma wyboru. Nazwa testowa `<b>Test</b>` wyświetla się jako tekst; przywrócono zwykłą nazwę. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |
| Strona po zmianie ścieżek | Otwarcie strony głównej i podstron, test stylów, animacji oraz `status.php`. | Działają style, obrazy, linki i funkcje z lab3, w tym animacje i żądanie do `status.php`. | Wynik rzeczywisty zgadza się z wynikiem oczekiwanym. |


## Źródła grafik

- farby https://www.stormplastyczny.pl/userdata/public/gfx/68764/Farby-olejne-Van-Gogh-Starter-Box-XL-zestaw-w-drewnianej-skrzynce-12-x-40-ml-akcesoria-01.jpg
- szkicownik https://oxford-sklep.pl/userdata/public/gfx/10770/400152648_1100_print.jpg
- ołówki https://biurowe-szkolne.pl/images/Zestaw-olowkow-12-sztuk-5B-5H-Koh-i-noor-1500-w-metalowej-kasetce.jpg