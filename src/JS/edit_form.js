const specialCharacterPattern = /[!@#$%^&*(),.?":{}|<>]/;
let actualEmail = document.getElementById('email').value;
let actualPseudo = document.getElementById('pseudo').value;
document.getElementById('email').addEventListener('input', function () {
    const email = this.value;
    if (email.length > 0) {
        document.getElementById('message').style.opacity = "1";
        document.getElementById('message').style.animation = "none";
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../elements/check_email.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);


                if ((response.exists && document.getElementById('email').value !== actualEmail)) {
                    document.getElementById('message').innerHTML = "L'adresse email est déjà utilisée";
                    document.getElementById('email').style.boxShadow = "inset 0px 0px 0px 5px #f00";
                }

                else if ((response.exists && document.getElementById('email').value !== actualEmail) || !email.includes('@') || !email.includes('.')) {
                    document.getElementById('email').style.boxShadow = "inset 0px 0px 0px 5px #f00";

                }
                else if (!response.exists && email.includes('@') || email.includes('.')) {
                    document.getElementById('email').style.boxShadow = "inset 0px 0px 0px 5px #008000";
                    document.getElementById('message').innerHTML = "";
                    document.getElementById('message').style.animation = "message 4s forwards";
                }

            }
        };
        xhr.send('email=' + encodeURIComponent(email));
    }
});

document.getElementById('pseudo').addEventListener('input', function () {
    const pseudo = this.value;
    if (pseudo.length > 0) {
        document.getElementById('message').style.opacity = "1";
        document.getElementById('message').style.animation = "none";
        const xhr2 = new XMLHttpRequest();
        xhr2.open('POST', '../elements/check_pseudo.php', true);
        xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr2.onload = function () {
            if (xhr2.status === 200) {
                const response2 = JSON.parse(xhr2.responseText);
                if ((response2.exists && document.getElementById('pseudo').value !== actualPseudo)) {
                    document.getElementById('message').innerHTML = "Ce pseudo est déjà utilisé";
                    document.getElementById('pseudo').style.boxShadow = "inset 0px 0px 0px 5px #f00";
                }
                else if (specialCharacterPattern.test(pseudo)) {
                    document.getElementById('message').innerHTML = "Le pseudo ne doit pas contenir de caractères spéciaux";
                    document.getElementById('pseudo').style.boxShadow = "inset 0px 0px 0px 5px #f00";
                }
                else if (pseudo.length < 3) {
                    document.getElementById('message').innerHTML = "Le pseudo doit contenir au moins 3 caractères";
                    document.getElementById('pseudo').style.boxShadow = "inset 0px 0px 0px 5px #f00";
                }
                else if ((!response2.exists && document.getElementById('pseudo').value !== actualPseudo) && pseudo.length >= 3 && !specialCharacterPattern.test(pseudo)) {
                    document.getElementById('message').innerHTML = "";
                    document.getElementById('pseudo').style.boxShadow = "inset 0px 0px 0px 5px #008000";
                    document.getElementById('message').style.animation = "message 4s forwards";
                }
            }
        };
        xhr2.send('pseudo=' + encodeURIComponent(pseudo));
    }
});



