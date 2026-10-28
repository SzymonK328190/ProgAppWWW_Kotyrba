# Warunki testów

## Wersja przeglądarki
Brave 1.97.59
(Chromium 155.0.8059.85)

# Struktura

## Oczekiwany wynik
Żadnych błędów
Kolejność nagłówków i treści prawidłowa

## Zaobserwowany wynik
Nu HTML nie pokazał żadnych błędów, w index.html wyświetlił
warning o tym że \<section> nie zawiera heading'u a wypadałoby żeby go zawierał. 

## Poprawka
Poprawiono strukture w tym miejscu katalogu żeby \<section> miał headera, katalog przeniesiono do \<div>

# Widoki

## Oczekiwany wynik
Strona jest responsywna i poprawnie wyświetla się na różnych urządzeniach, kolumny na ekranach większych niż 768 pikseli powinny być 3 a w innym przypadku ilość kolumn powinna wynosić 1.

## Zaobserwowany wynik
Zaobserowawy wynik zgadza się z oczekiwanym wynikiem, dodatkowo formularz nie jest ucięty. Jeden z obrazków był za wysoki.

## Poprawka
Dodano regułe css która rozwiązuje ten problem. Po dodaniu tej reguły ponownie sprawdzono responsywność strony przy różnych rozmiarach. Wszystko po tym się zgadza

# Walidacja

## Oczekiwany wynik
Formularz na poziomie przeglądarki nie pozwala użytkownikowi wysłać niepoprawnie wpisanych danych

## Zaobserwowany wynik
Pole wiadomości samo wypełniało się spacjami w ilości takiej jak podana minimalna długość wiadomości.

## Poprawka
Naprawiono błąd przez usunięcie znaku nowej lini po zamknięciu \<textarea>

# Eksperyment

Po usunięciu pola name z pola e-mail nie wyśle się on w zapytaniu

Po usunięciu name:

http://localhost:8000/kontakt.html?produkt=farby-olejne&ilosc=3&wiadomosc=dsadsfdsfdsfds

Po przywróceniu name:

http://localhost:8000/kontakt.html?email=dsa%40gmailc.com&produkt=farby-olejne&ilosc=2&wiadomosc=dsadsadasdasdas