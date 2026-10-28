# Testy

## Wersja przeglądarki
Firefox Wersja: 158.0.1

# Próby

## Motyw i nawigacja

### Przewidywany efekt
Zmiana motywu utrzymuje się po odświeżeniu i zmianie
podstrony; aria-pressed odpowiada stanowi.
### Faktyczny efekt
Zgadza się z przewidywanym efektem

## Start trzy razy potem Stop i Start
### Przewidywany efekt
Działa jeden interwał; Stop zatrzymuje aktualizację, a wznowienie
pokazuje aktualny czas
### Faktyczny efekt
Zgadza się z przewidywanym efektem


## Fragment nazwy ze spacjami i inną wielkością liter
### Przewidywany efekt
Pasujące karty pozostają widoczne; licznik zgadza się z widokiem.
### Faktyczny efekt
Jeżeli zbędne spacje znajdują się po lewej bądź prawej stronie wyszukiwanej frazy to efekt faktyczny zgadza się z oczekiwanym

## Cena 1999 gr i ilość 3
### Przewidywant efekt
Wynik wynosi 59,97 zł
### Faktyczny efekt
Zgadza się

## Ilość pusta 0 6 oraz 1,5 
### Przewidywany efekt
Wycena nie pokazuje błędnej wartości; formularz nie przechodzi
do poprawnego podsumowania.
### Faktyczny efekt
Zgadza się z przewidywanym efektem. Przy braku ilości, wartościach 0 i 6 oraz liczbie ułamkowej 1,5 wyświetla się instrukcja zamiast wyceny, a próba zatwierdzenia formularza nie tworzy podsumowania.

## Brak dopasowania i wyczyszczenie pola
### Przewidywany efekt
Pojawia się komunikat o braku wyników; wyczyszczenie przywraca trzy karty.
### Faktyczny efekt
Zgadza się z przewidywanym efektem. Po wpisaniu nieistniejącej frazy karty są ukrywane i pojawia się informacja o braku produktów. Skasowanie tekstu powoduje ponowne wyświetlenie wszystkich trzech produktów.

## Dziesięć spacji oraz tekst <b>Test</b>
### Przewidywany efekt
Same spacje są odrzucone; poprawna wiadomość ze znacznikami jest pokazana jako dosłowny tekst.
### Faktyczny efekt
Zgadza się z przewidywanym efektem.

## Klawiatura widoki i wyłączony JavaScript
### Przewidywany efekt
Kontrolki działają klawiaturą przy 375 i 1280 px; bez JS katalog, treść i menu pozostają dostępne.
### Faktyczny efekt
Zgadza się z przewidywanym efektem. Nawigacja klawiszem Tab oraz aktywacja elementów klawiszem Enter/Spacja działają poprawnie na obu szerokościach ekranu. Po wyłączeniu JavaScriptu w przeglądarce struktura HTML, treść oraz wszystkie karty produktów w katalogu pozostają widoczne.