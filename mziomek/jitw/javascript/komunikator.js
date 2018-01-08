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
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'messages.txt', false);
    xhttp.send();
    document.getElementById('view').innerHTML = xhttp.responseText;
    xhttp.abort();
    window.setTimeout('read()', 10000);
}