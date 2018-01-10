/* eslint-env browser */
/* eslint no-unused-vars: ["error", { "vars": "local" }] */
function listStyles() {
    'use strict';
    var list = '',
        i = 0,
        styl,
        title;
    
    for (i; (styl = document.getElementsByTagName('link')[i]); i += 1) {
        if (styl.getAttribute('title')) {
            title = styl.getAttribute('title');
            list += "<a href=\"#\" onclick=\"setStyle(\'" + title + "\'); return false;\">Styl " + title + ".</a><br/>";
        }
    }
    document.getElementById('styleList').innerHTML = list;
}

function setStyle(name) {
    'use strict';
    var styl,
        i = 0;
    
    for (i; (styl = document.getElementsByTagName('link')[i]); i += 1) {
        if (styl.getAttribute('title')) {
            styl.disabled = true;
            if (styl.getAttribute('title') === name) {
                styl.disabled = false;
            }
        }
    }
}

function getStyle() {
    'use strict';
    var styl,
        i = 0;
    
    for (i; (styl = document.getElementsByTagName('link')[i]); i += 1) {
        if (styl.getAttribute('title') && !styl.disabled) {
            return styl.getAttribute('title');
        }
    }
    return null;
}

function createCookie(name, styl, days) {
    'use strict';
    var date = new Date(),
        expires;
    
    if (days) {
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = '';
    }
    document.cookie = name + '=' + styl + expires + ';path=/';
}

function readCookie(name) {
    'use strict';
    var nameE = name + '=',
        cookieArray = document.cookie.split(';'),
        i = 0,
        c;
    
    for (i; i < cookieArray.length; i += 1) {
        c = cookieArray[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameE) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

window.onload = function (e) {
    'use strict';
    var styleCookie = readCookie('style'),
        styleTitle = styleCookie ? styleCookie : getStyle();
    setStyle(styleTitle);
};

window.onunload = function (e) {
    var styleTitle = getStyle();
    createCookie('style', styleTitle, 7);
}

var styleCookie = readCookie("style");
var styleTitle = styleCookie ? styleCookie : getStyle();
setStyle(styleTitle);