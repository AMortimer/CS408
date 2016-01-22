/*jslint node: true, browser: true */
"use strict";

function SPSView() {
    var Helper = document.getElementById("Helper"),
        Helpee = document.getElementById("Helpee"),
        Register = document.getElementById("Register"),
     /*   fourBtn = document.getElementById("four"),
        fiveBtn = document.getElementById("five"),
        sixBtn = document.getElementById("six"),
        sevenBtn = document.getElementById("seven"),
        eightBtn = document.getElementById("eight"),
        nineBtn = document.getElementById("nine"),
        zeroBtn = document.getElementById("zero"),
        clearBtn = document.getElementById("clear"),
        convertBtn = document.getElementById("convert"),
        displayForm = document.getElementById("input"),
        homeCur = document.getElementById("homeCur"),
        newCur = document.getElementById("newCur"),
        bankCut = document.getElementById("bankCut"),
        openNav = true,
        clicker = "click",
        addMouseAndTouchUp = function (elementID, handler) {
            var element = document.getElementById(elementID),
                f = function (e) {
                    e.preventDefault();
                    handler(e);
                    return false;
                };
            element.addEventListener("mouseup", f, false);
            element.addEventListener("touchend", f, false);
        }, */
        openCloseNav = function () {

            if (openNav) {
                openNav = false;
                document.getElementById("nav").className = "closedmenu";
                document.getElementById("mainsection").className = "closedmenu";
                document.getElementById("navelem").style.display = "none";
            } else {
                openNav = true;
                document.getElementById("nav").className = "";
                document.getElementById("mainsection").className = "";
                document.getElementById("navelem").style.display = "block";
            }
        },
        showAbout = function () {

            document.getElementById("popupAbout").style.display = "block";
            history.pushState(null, null, "#about");
        },
        hideAbout = function () {

            document.getElementById("popupAbout").style.display = "none";
            if (openNav) { openCloseNav(); }
        };

    this.setEventTesterCallBack = function (callback) {
        addMouseAndTouchUp("eventTester", callback);
    };

    this.init = function () {
        if (navigator.userAgent.match(/Android/i)) {
            clicker = "touchstart";
        } 
        else if (navigator.userAgent.match(/iPhone|iPad|iPod/i)){
            clicker = "touchstart";
        }
        openCloseNav();
        addMouseAndTouchUp("navmenu", openCloseNav);
        addMouseAndTouchUp("navMenuAbout", showAbout);
        addMouseAndTouchUp("popupAbout", function () {window.history.back(); });
        window.addEventListener("popstate", function () {
            hideAbout();
        });
    };
    
    document.addEventListener('touchmove', function(e) {
	e.preventDefault();
    }, false);

    this.setButtonClick = function (callback) {
        oneBtn.addEventListener(clicker, callback);
        twoBtn.addEventListener(clicker, callback);
        threeBtn.addEventListener(clicker, callback);
        fourBtn.addEventListener(clicker, callback);
        fiveBtn.addEventListener(clicker, callback);
        sixBtn.addEventListener(clicker, callback);
        sevenBtn.addEventListener(clicker, callback);
        eightBtn.addEventListener(clicker, callback);
        nineBtn.addEventListener(clicker, callback);
        zeroBtn.addEventListener(clicker, callback);
        clearBtn.addEventListener(clicker, callback);
        convertBtn.addEventListener(clicker, callback);
    };

    this.setSelectListener = function (callback) {
        homeCur.addEventListener("change", callback);
        newCur.addEventListener("change", callback);
        bankCut.addEventListener("change", callback);
    };

/*    this.updateDisplay = function (number, homeCurNumber) {
        displayForm.value = number;
        homeCur.value = homeCurNumber;
    }; */
}