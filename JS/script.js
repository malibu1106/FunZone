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


// DEBUG BORDER COLORS

// Add colored borders to all elements
// An array of color values to be used for the borders
// let colorsList = ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'hotpink', 'black'];
// // Select all HTML elements on the page
// let elements = document.getElementsByTagName("*");
// // Define the border size with a space at the end for concatenation
// let borderSize = "2px ";
// // Define the border style with a space at the end for concatenation
// let borderStyle = "solid ";
// // Initialize the index to 0, used to cycle through the colorsList array
// let index = 0;
// // Loop through each element in the elements collection
// for (let i = 0; i < elements.length; i++) {
//     // Set the border style of the current element using the current border style, size, and color
//     elements[i].style.border = borderStyle + borderSize + colorsList[index];
//     // Increment the index to move to the next color
//     index++;
//     // Reset the index to 0 if it reaches the end of the colorsList array
//     if (index == colorsList.length) {
//         index = 0;
//     }
// }