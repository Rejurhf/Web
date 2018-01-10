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
        var xhttp = new XMLHttpRequest();
        xhttp.open('GET', 'messages.txt', false);
        xhttp.send();
        document.getElementById('view').innerHTML = xhttp.responseText;
        xhttp.abort();
        window.setTimeout('read()', 5000);
    } else {
        document.getElementById('view').innerHTML = '';
        window.setTimeout('read()', 5000);
    }
}

function send() {
    'use strict';
    if (document.getElementById('check').checked) {
        var nameV = document.getElementById('nazwa').value,
            messageV = document.getElementById('message').innerHTML,
            xhttp = new XMLHttpRequest();
        if (nameV !== '' && messageV !== '') {
            xhttp.open('GET', 'send.php?nick=' + nameV + '&message=' + messageV, true);
            xhttp.send();
            document.getElementById('message').innerHTML = '';
        }
    }
}