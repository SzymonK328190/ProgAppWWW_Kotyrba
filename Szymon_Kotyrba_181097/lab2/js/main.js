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
    };
    const date_options = {
        year: "numeric",
        month: "numeric",
        day: "numeric",
    };
    const time = new Intl.DateTimeFormat('pl-PL', hour_options).format(now);
    const date = new Intl.DateTimeFormat('pl-PL', date_options).format(now);
    clock.innerHTML = date + " " + time;
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
    catalog_counter.innerHTML = "Liczba produktów: " + product_count;
    catalog_no_products_info.hidden = product_count > 0;
}

theme_toggle.addEventListener('click', toggleTheme);
if(start_button != null) start_button.addEventListener('click', startClock);
if(stop_button != null) stop_button.addEventListener('click', stopClock);
if(catalog_search != null) catalog_search.addEventListener('input', searchCatalog);

searchCatalog("");
startClock();
loadTheme();
