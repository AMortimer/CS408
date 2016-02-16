/*jslint node: true, browser: true */
"use strict";
var id;

function getOldID(id) {
    var oldId=id;
    return oldId;
}

function generateID(oldId, n) {
    var newId;
    if (oldId===null) {
        newId = 123457;
    }
    else {
        newId = getOldID(oldId)*n;
        console.log(newId);
    }
    return newId;
}



