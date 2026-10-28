const theme_toggle = document.getElementById("theme-button");

function loadTheme() {
    if(localStorage.getItem("saved-theme") == null) {
        setTheme('dark');
    }
    setTheme(localStorage.getItem("saved-theme"));
}

function setTheme(new_theme) {
    document.documentElement.setAttribute("data-theme", new_theme);
    localStorage.setItem("saved-theme", new_theme);
}

function toggleTheme() {
    const current_theme = document.documentElement.getAttribute("data-theme");
    const new_theme = current_theme === 'dark' ? 'light' : 'dark';
    setTheme(new_theme);
    return new_theme;
}

theme_toggle.addEventListener('click', () => {
    const is_dark = toggleTheme() === 'dark' ? true : false;
    theme_toggle.setAttribute('aria-pressed', is_dark);
});

loadTheme();
