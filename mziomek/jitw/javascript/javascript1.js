/* eslint-env browser */
/* eslint no-unused-vars: ["error", { "vars": "local" }] */
var stopFlag = false;
var iloscZal = 1;

function odliczaj() {
    'use strict';
	var data = new Date();
	window.document.getElementById('czas').value = ('0' + data.getHours()).slice(-2) + ':' + ('0' + data.getMinutes()).slice(-2) + ':' + ('0' + data.getSeconds()).slice(-2);
	
	if (!stopFlag) {
        window.setTimeout('odliczaj()', 1000);
    }
}

function dataiczas() {
    'use strict';
	var data = new Date();
	window.document.getElementById('data').value = data.getFullYear() + '-' + ('0' + data.getMonth() + 1).slice(-2) + '-' + ('0' + data.getDate()).slice(-2);
	odliczaj();
}

function zmienCzas() {
    'use strict';
    var data = new Date(),
        zmiana = document.getElementById('czas').value,
        splited = zmiana.split(':');
    if ((zmiana.match(/:/g)).length === 2 && splited[0] < 24 && splited[1] < 60 && splited[2] < 60 && splited[0] >= 0 && splited[1] >= 0 && splited[2] >= 0) {
        document.getElementById('czas').value = ('0' + splited[0]).slice(-2) + ':' + ('0' + splited[1]).slice(-2) + ':' + ('0' + splited[2]).slice(-2);
    } else {
        document.getElementById('czas').value = ('0' + data.getHours()).slice(-2) + ':' + ('0' + data.getMinutes()).slice(-2) + ':' + ('0' + data.getSeconds()).slice(-2);
    }
}
    
function zmienDate() {
    'use strict';
    var data = new Date(), zmiana = document.getElementById('data').value,
        splited = zmiana.split('-'),
        tab = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if ((zmiana.match(/-/g)).length === 2 && splited[0] > 0 && splited[1] > 0 && splited[2] > 0 && splited[1] <= 12  && (splited[2] <= tab[splited[1] - 1])) {
        document.getElementById('data').value = splited[0] + '-' + ('0' + splited[1]).slice(-2) + '-' + ('0' + splited[2]).slice(-2);
    } else {
        document.getElementById('data').value = splited[0] + '-' + ('0' + splited[1]).slice(-2) + '-' + ('0' + splited[2]).slice(-2) + 'źle' + data.getFullYear() + '-' + ('0' + data.getMonth() + 1).slice(-2) + '-' + ('0' + data.getDay()).slice(-2);
    }
}

function czekaj() {
    'use strict';
	stopFlag = true;
}

function nowyZalacznik() {
    'use strict';
    var conteiner = document.getElementById('conteiner'),
        number = conteiner.children.length,
        files = number / 2,
        i = 0,
        input = document.createElement('input');
    
    for (i; i < number; i += 2) {
        if (conteiner.children[i].value === '') {
            return;
        }
    }
    
    input.type = 'file';
    input.name = 'file' + files;
    input.onchange = function () { nowyZalacznik(); };
    conteiner.appendChild(input);
    conteiner.appendChild(document.createElement('br'));
    
//	var nowyZal = document.createElement('INPUT');
//    var enter = document.createElement('div');
//    var form = document.getElementById('form');
//    var tmp = document.getElementById('wyslij');
//    var name = 'plik' + iloscZal;
//    iloscZal += 1;
//    nowyZal.setAttribute('type', 'file');
//    nowyZal.setAttribute('name', name);
////    document.body.appendChild(nowyZal);
//    nowyZal.onclick = nowyZalacznik;
//
//    form.insertBefore(nowyZal, tmp);
//    form.insertBefore(enter, tmp);
}