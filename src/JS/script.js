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
        mainPositionAdjust();
    }
}

function closeMenu() {
    if (lateralMenu.classList.contains("lateralMenuOpen")) {
        lateralMenu.classList.replace("lateralMenuOpen", "lateralMenuClosed");
        menuButtonOpen.classList.replace("buttonMenuOpenHide", "buttonMenuOpenDisplay")
        mainPositionAdjust();
    }
}
function mainPositionAdjust() {
    if (windowWidth >= 1600 && lateralMenu.classList.contains("lateralMenuOpen")) {
        document.getElementsByTagName("main")[0].style.left = "384px";
        document.getElementById("message").style.left = "384px";
    }
    else if (windowWidth >= 1000 && lateralMenu.classList.contains("lateralMenuClosed")) {
        document.getElementsByTagName("main")[0].style.left = "0";
        document.getElementById("message").style.left = "0";
    }
}

// LATERAL MENU CLOSE ON OUTSIDE CLICK
let windowWidth = window.innerWidth;
let menuWidth = 384;
let headerWidth = 80;

function refreshWindowWidth() {
    windowWidth = window.innerWidth;
}

setInterval(refreshWindowWidth, 100);

document.addEventListener('click', function (event) {
    if (event.clientX > menuWidth && event.clientY > headerWidth && windowWidth >= 768 && windowWidth < 1600 && lateralMenu.classList.contains("lateralMenuOpen")) {
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


// INSCRIPTION BORDER RED IF EMAIL OR PSEUDO ALREADY USED

let message = document.getElementById('message');
let pseudoInputBorder = document.getElementById('pseudo');
let emailInputBorder = document.getElementById('email');

if (message) {
    if (message.innerHTML === "Ce pseudo est déjà utilisé !") {
        pseudoInputBorder.style.boxShadow = "inset 0px 0px 0px 3px #f00";
    }
    else if (message.innerHTML === "Cette adresse email est déjà utilisée !") {
        emailInputBorder.style.boxShadow = "inset 0px 0px 0px 3px #f00";
    }
}

// PASSWORD SHOW/HIDE
let logoShowPassword = document.getElementById('showPasswordImage');
let passwordInput = document.getElementById('password');
if (logoShowPassword) {
    logoShowPassword.addEventListener("click", showOrHidePassword)
}
function showOrHidePassword() {
    if (passwordInput.type == "text") {
        passwordInput.type = "password";
        logoShowPassword.src = "../images/showPassword.png";
    }
    else {
        passwordInput.type = "text";
        logoShowPassword.src = "../images/hidePassword.png";
    }
}

let logoShowPasswordRetyped = document.getElementById('showPasswordImageRetyped');
let passwordInput2 = document.getElementById('passwordRetyped');
if (logoShowPasswordRetyped) {
    logoShowPasswordRetyped.addEventListener("click", showOrHidePasswordRetyped)
}
function showOrHidePasswordRetyped() {
    if (passwordInput2.type == "text") {
        passwordInput2.type = "password";
        logoShowPasswordRetyped.src = "../images/showPassword.png";
    }
    else {
        passwordInput2.type = "text";
        logoShowPasswordRetyped.src = "../images/hidePassword.png";
    }
}

let logoShowPasswordActual = document.getElementById('showPasswordImageActual');
let passwordInputActual = document.getElementById('actualPassword');
if (logoShowPasswordActual) {
    logoShowPasswordActual.addEventListener("click", showOrHidePasswordActual)
}
function showOrHidePasswordActual() {
    if (passwordInputActual.type == "text") {
        passwordInputActual.type = "password";
        logoShowPasswordActual.src = "../images/showPassword.png";
    }
    else {
        passwordInputActual.type = "text";
        logoShowPasswordActual.src = "../images/hidePassword.png";
    }
}



