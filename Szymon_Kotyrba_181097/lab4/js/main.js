const theme_toggle = document.getElementById("theme-button");
const clock = document.getElementById("time-date")

let clock_interval_id = 0;
let clock_ticking = false;

const start_button = document.getElementById("start-button");
const stop_button = document.getElementById('stop-button');

const catalog_search = document.getElementById("catalog-search");

let product_count = 0;

const catalog_counter = document.getElementById("catalog-counter");
const catalog_no_products_info = document.getElementById("catalog-no-products-info");

const form_email = document.getElementById("form-email");
const form_product = document.getElementById("form-product");
const form_quantity = document.getElementById("form-quantity");
const form_message = document.getElementById("form-message");

const form_message_error = document.getElementById("form-message-error");

const price_info = document.getElementById("price-info");

const contact_form = document.getElementById("contact-form");
const submit_button = document.getElementById("submit-button");
const summary_content = document.getElementById("summary-content");
const summary = document.getElementById("summary");

const catalog_products = [
    {
        id: 1,
        nazwa: "Zestaw Farb Olejnych",
        cenaGrosze: 44190
    },
    {
        id: 2,
        nazwa: "Szkicownik",
        cenaGrosze: 4490
    },
    {
        id: 3,
        nazwa: "Zestaw Ołówków",
        cenaGrosze: 2790
    }
]

function loadTheme() {
    if(localStorage.getItem("saved-theme") == null) {
        setTheme('light');
    }
    else {
        setTheme(localStorage.getItem("saved-theme"));
    }
}

function setTheme(new_theme) {
    document.documentElement.setAttribute("data-theme", new_theme);
    localStorage.setItem("saved-theme", new_theme)
    const is_dark = new_theme === 'dark' ? true : false;
    theme_toggle.setAttribute('aria-pressed', is_dark);
}

function toggleTheme() {
    const current_theme = document.documentElement.getAttribute("data-theme");
    const new_theme = current_theme === 'dark' ? 'light' : 'dark';
    setTheme(new_theme);
    return new_theme;
}

function updateClock() {
    if(clock === null) return;
    const now = new Date();
    const hour_options = {
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        hourCycle: "h23"
    };
    const date_options = {
        year: "numeric",
        month: "numeric",
        day: "numeric",
    };
    const time = new Intl.DateTimeFormat('pl-PL', hour_options).format(now);
    const date = new Intl.DateTimeFormat('pl-PL', date_options).format(now);
    clock.textContent = `${date} ${time}`;
}

function startClock() {
    if(clock_ticking) return;
    updateClock();
    clock_interval_id = setInterval(updateClock, 1000);
    clock_ticking = true;
}

function stopClock() {
    clearInterval(clock_interval_id);
    clock_ticking = false;
}

function searchCatalog() {
    if(catalog_search == null) return;
    product_count = 0;
    const phrase = catalog_search.value.trim().toLowerCase();
    const products = document.querySelectorAll(".catalog-product");

    products.forEach((product) => {
        const name = product.querySelector("h2").innerText.toLowerCase();
        if(!name.includes(phrase)) {
            product.hidden = true;
        } else {
            product.hidden = false;
            product_count++;
        }
    });
    catalog_counter.textContent = `Liczba produktów: ${product_count}`;
    catalog_no_products_info.hidden = product_count > 0;
}

function calculatePrice(cena, ilosc) {
    return cena * ilosc;
}

function priceFormatPLN(cenaGrosze) {
    const opcje = {
        style: "currency",
        currency: "PLN"
    }
    return new Intl.NumberFormat("pl-PL", opcje).format(cenaGrosze / 100);
}

function updatePrice() {
    if(price_info == null || form_product == null || form_quantity == null) return;

    const product_id = Number(form_product.value);
    const quantity = Number(form_quantity.value.trim());
    const is_quantity_valid = form_quantity.value.trim() != "" && Number.isInteger(quantity) && quantity >= 1 && quantity <= 5;
    const selected_product = catalog_products.find(p => p.id === product_id);
    if(product_id === "" || !is_quantity_valid || !selected_product) {
        price_info.textContent = "Wybierz produkt i poprawną ilość sztuk (od 1 do 5)";
        return;
    }
    const price_in_grosze = calculatePrice(selected_product.cenaGrosze, quantity);
    price_info.textContent = `Cena: ${priceFormatPLN(price_in_grosze)}`
}

function formSubmit(event) {
    event.preventDefault();
    if (form_message == null || form_quantity == null || form_product == null) return;

    const message_text = form_message.value.trim();
    if(message_text.length < 10) {
        form_message_error.hidden = false;
        form_message.focus();
        return;
    }
    const quantity = Number(form_quantity.value.trim());
    const product_id = Number(form_product.value);
    const selected_product = catalog_products.find(p => p.id === product_id);
    const formated_price = priceFormatPLN(calculatePrice(selected_product.cenaGrosze, quantity));
    const is_quantity_valid = form_quantity.value.trim() != "" && Number.isInteger(quantity) && quantity >= 1 && quantity <= 5;
    if(product_id === "" || !is_quantity_valid || !selected_product) {
        return;
    } 

    if (summary == null || summary_content == null) return;
    
    summary.hidden = false;
    summary_content.innerHTML = "";

    const title = document.createElement("h3");
    title.textContent = "Podsumowanie"
    const product_info = document.createElement("p");
    product_info.textContent = `Produkt: ${selected_product.nazwa}`
    const quantity_info = document.createElement("p");
    quantity_info.textContent = `Ilość: ${quantity}`;
    const products_value = document.createElement("p"); 
    products_value.textContent = `Łączna cena: ${formated_price}`;
    const message_in_summary = document.createElement("p");
    message_in_summary.textContent = `Wiadomość: ${message_text}`;

    summary_content.appendChild(title);
    summary_content.appendChild(product_info);
    summary_content.appendChild(quantity_info);
    summary_content.appendChild(products_value);
    summary_content.appendChild(message_in_summary);
    
    summary_content.hidden = false;
}

function validateMessageLength() {
    const message_text = form_message.value.trim();
    if(message_text.length >= 10) {
        form_message_error.hidden = true;
    }
}

function clearSummary() {
    if(summary == null || summary_content == null) return
    summary.hidden = true;
    summary_content.innerHTML = "";
}

if(theme_toggle != null) theme_toggle.addEventListener('click', toggleTheme);
if(start_button != null) start_button.addEventListener('click', startClock);
if(stop_button != null) stop_button.addEventListener('click', stopClock);
if(catalog_search != null) catalog_search.addEventListener('input', searchCatalog);

if (form_product != null) form_product.addEventListener('change', updatePrice);
if (form_quantity != null) form_quantity.addEventListener('input', updatePrice);

if(contact_form != null) contact_form.addEventListener('submit', formSubmit);
if(form_message != null) form_message.addEventListener('input', validateMessageLength);

if (form_message != null) form_message.addEventListener('input', clearSummary);
if (form_email != null) form_email.addEventListener('input', clearSummary);
if (form_product != null) form_product.addEventListener('input', clearSummary);
if (form_quantity != null) form_quantity.addEventListener('input', clearSummary);

updatePrice();
searchCatalog("");
startClock();
loadTheme();
clearSummary()
