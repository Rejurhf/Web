/* eslint-env browser */
/* eslint no-unused-vars: ["error", { "vars": "local" }] */
function checkBox() {
    'use strict';
	if (document.getElementById('check').checked) {
        document.getElementById('kontr').innerHTML = 'Działa';
    } else {
        document.getElementById('kontr').innerHTML = 'Wyłączony';
    }
}

function read() {
    'use strict';
    if (document.getElementById('check').checked) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 3 && xmlhttp.status === 200) {
                if (document.getElementById('check').checked) {
                    document.getElementById('view').innerHTML = xmlhttp.responseText;
                }
            }
            if (xmlhttp.readyState === 4) {
                xmlhttp.open("GET", "messages.php", true);
                xmlhttp.send();
            }
        };
        xmlhttp.open("GET", "messages.php", true);
        xmlhttp.send();
    } else {
        document.getElementById('view').innerHTML = 'Wyłączony...\nAby włączyć naciśnij checkbox, jeżeli wyświetli się napis \"Działa\" to znaczy że się powiodło.';
    }
}

function send() {
    'use strict';
    if (document.getElementById('check').checked) {
        var nameV = encodeURIComponent(document.getElementById('nazwa').value),
            messageV = encodeURIComponent(document.getElementById('message').value),
            xhttp = new XMLHttpRequest();
        if (nameV !== '' && messageV !== '') {
            xhttp.open('GET', 'send.php?nick=' + nameV + '&message=' + messageV, true);
            xhttp.send();
            document.getElementById('message').value = '';
        }
    }
}

function ifEnter(e) {
    'use strict';
    var enterKey = 13;
    if (e.which === enterKey) {
        send();
    }
}