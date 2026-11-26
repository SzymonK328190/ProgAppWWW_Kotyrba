INSERT INTO page_list (alias, page_title, page_content, status) VALUES
(
    'glowna',
    'Strona Główna',
    '<section>
    <button type="button" class="animated-button" id="button-1">Animacja 1</button>
    <button type="button" class="animated-button" id="button-2">Animacja 2</button>
    <button type="button" class="animated-button" id="button-3">Animacja 3</button>
    <button type="button" id="reset-button">Reset</button>
    <div id="button-3-counter" role="status">0</div>
</section>
<section>
    <button type="button" id="button-check-server">Sprawdź serwer</button>
    <div id="server-status" role="status"></div>
</section>
<section>
    <h2>Katalog produktów</h2>
    <input type="search" id="catalog-search" placeholder="Wyszukaj produkt po nazwie">
    <ul aria-live="polite" id="catalog-products-info">
        <li id="catalog-counter">Liczba produktów: 10</li>
        <li id="catalog-no-products-info" hidden>Brak produktów o danej nazwie!</li>
    </ul>
    <div class="catalog-grid">
        <article class="catalog-product">
            <a href="index.php?idp=produkt">
                <h2>Zestaw farb olejnych</h2>
                <img src="img/farby_olejne.webp" width="400" height="400" alt="Zestaw 12 farb olejnych w drewnianym pudełku">
                <p>Zestaw 12 farb olejnych</p>
                <p>Cena: 441,90 zł</p>
            </a>
        </article>

        <article class="catalog-product">
            <a>
                <h2>Szkicownik</h2>
                <img src="img/szkicownik.webp" width="353" height="512" alt="Szkicownik artystyczny A4 w twardej oprawie">
                <p>Szkicownik A4 50 kartkowy</p>
                <p>Cena: 44,90 zł</p>
            </a>
        </article>

        <article class="catalog-product">
            <a>
                <h2>Zestaw Ołówków</h2>
                <img src="img/zestaw_olowkow.webp" width="400" height="400" alt="Zestaw ołówków do szkicowania o różnej twardości">
                <p>Podstawowy zestaw ołówków do szkicowania</p>
                <p>Cena: 27,90 zł</p>
            </a>
        </article>
    </div>
</section>',
    1
),
(
    'kontakt',
    'Kontakt',
    '<section>
    <h2>Formularz kontaktowy</h2>
    <p>
        Formularz demonstracyjny. Dane pojawią się w adresie strony; zapytanie nie zostanie zapisane ani wysłane e-mailem.
    </p>
    <form method="get" action="kontakt.html" id="contact-form">
        <div>
            <label for="form-email">Adres e-mail (Pole obowiązkowe)</label>
            <input
                type="email"
                id="form-email"
                name="email"
                required
                autocomplete="email">
        </div>
        <div>
            <label for="form-product">Produkt którego dotyczy pytanie (Pole obowiązkowe)</label>
            <select id="form-product" name="produkt" required>
                <option value="">Wybierz produkt</option>
                <option value="1">Farby olejne</option>
                <option value="2">Szkicownik</option>
                <option value="3">Zestaw Ołówków</option>
            </select>
        </div>
        <div>
            <label for="form-quantity">Liczba sztuk (Od 1 do 5 sztuk) (Pole obowiązkowe)</label>
            <input
                type="number"
                name="ilosc"
                id="form-quantity"
                required
                min="1"
                max="5"
                step="1">
        </div>
        <div>
            <label for="form-message">Wiadomość (Od 10 do 500 znaków) (Pole obowiązkowe)</label>
            <textarea
                name="wiadomosc"
                id="form-message"
                required
                minlength="10"
                maxlength="500"></textarea>
                <p id="form-message-error" hidden>Błąd: wiadomość powinna mieć od 10 do 500 znaków!</p>
        </div>
        <div id="price-info">
            Cena
        </div>
        <button id="submit-button" type="submit">Sprawdź zapytanie</button>
    </form>
    <summary id="summary">
        <p>Podgląd lokalny. Formularz nie wysyła wiadomości</p>
        <div id="summary-content"></div>
    </summary>
</section>',
    1
),
(
    'produkt',
    'Produkt',
    '<section>
    <h2>Zestaw farb olejnych</h2>
    <img src="img/farby_olejne.webp" width="400" height="400" alt="Zestaw 12 farb olejnych w drewnianym pudełku">
    <p>
        Standardowy zestaw 12 farb olejnych z <strong>z najwyższej półki</strong>
        dla malarzy potrzebujących <em>wysokiej</em> jakości
    </p>
    <p>Cena: 441,90 zł</p>
    <ul>
        <li>Opakowanie wykonane z drewna</li>
        <li>Farby olejne najwyżej jakości</li>
        <li>Zawiera dodatkowo pędzle</li>
    </ul>
    <table>
        <caption>Specyfikacje</caption>
        <thead>
            <tr>
                <th scope="col">Cecha</th>
                <th scope="col">Wartość</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ilość farb</td>
                <td>12</td>
            </tr>
            <tr>
                <td>Typ farb</td>
                <td>Olejne</td>
            </tr>
            <tr>
                <td>Pojemność jednej tubki</td>
                <td>40 ml</td>
            </tr>
        </tbody>
    </table>
    <a href="index.php?idp=kontakt">Zapytaj o produkt</a>
</section>',
    1
),
(
    'filmy',
    'Filmy',
    '<section>
    <div class="box container">
        <iframe class="video-frame" src="https://www.youtube.com/embed/1s58rW0_LN4" title="Bob Ross, Towering Peaks" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div>
            <h3>Bob Ross - Towering Peaks (Season 10 Episode 1)</h3>
            <a target="_blank" href="https://www.youtube.com/watch?v=1s58rW0_LN4">Obejrzyj w youtube</a>
        </div>
    </div>
    <div class="box container">
        <iframe class="video-frame" src="https://www.youtube.com/embed/vXTAeJ4CIrk" title="Speed Painting Oswego High School Talent Show Winner" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div>
            <h3>Speed Painting - Oswego High School Talent Show Winner</h3>
            <a target="_blank" href="https://www.youtube.com/watch?v=vXTAeJ4CIrk">Obejrzyj w youtube</a>
        </div>
    </div>
    <div class="box container">
        <iframe class="video-frame" src="https://www.youtube.com/embed/dRtyYwdgJJk" title="CYBER MAID MIKU Timelapse" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div>
            <h3>CYBER MAID MIKU Timelapse</h3>
            <a target="_blank" href="https://www.youtube.com/watch?v=dRtyYwdgJJk">Obejrzyj w youtube</a>
        </div>
    </div>
</section>',
    1
),
(
    'szkic-testowy',
    'Szkic strony',
    '<section>
    <h2>Strona w przygotowaniu</h2>
    <p>Ta podstrona jest szkicem (status = 0) i nie powinna być widoczna dla użytkowników.</p>
</section>',
    0
);
