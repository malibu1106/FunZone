// LATERAL MENU
let menuButtonOpen = document.querySelector('.menuButtonOpen');
let menuButtonClose = document.querySelector('.menuButtonClose');

let lateralMenu = document.getElementById('lateralMenu');



menuButtonOpen.addEventListener("click", openMenu);
menuButtonClose.addEventListener("click", closeMenu);
function openMenu() {
    if (lateralMenu.classList.contains("lateralMenuClosed")) {
        lateralMenu.classList.replace("lateralMenuClosed", "lateralMenuOpen");
        menuButtonOpen.classList.replace("buttonMenuOpenDisplay", "buttonMenuOpenHide");
    }
}

function closeMenu() {
    if (lateralMenu.classList.contains("lateralMenuOpen")) {
        lateralMenu.classList.replace("lateralMenuOpen", "lateralMenuClosed");
        menuButtonOpen.classList.replace("buttonMenuOpenHide", "buttonMenuOpenDisplay")
    }
}

// LATERAL MENU CLOSE ON OUTSIDE CLICK
let windowWidth = window.innerWidth;
let menuWidth = 384;
let headerWidth = 80;

function refreshWindowWidth() {
    windowWidth = window.innerWidth;
}

setInterval(refreshWindowWidth, 2500);

document.addEventListener('click', function (event) {
    if (event.clientX > menuWidth && event.clientY > headerWidth && windowWidth >= 768 && lateralMenu.classList.contains("lateralMenuOpen")) {
        closeMenu();
    }
});


// DARK OR LIGHT MODE
let themeToggle = document.getElementById('themeToggle');

themeToggle.addEventListener("click", toggleTheme);

function toggleTheme() {
    if (themeToggle.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
    } else {
        document.documentElement.removeAttribute('data-theme');
    }
}
// AUTO DARK OR LIGHT
// if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
//     document.documentElement.setAttribute('data-theme', 'dark');
// }