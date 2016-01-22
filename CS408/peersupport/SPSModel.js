/*jslint node: true, browser: true */
"use strict";

function SPSModel() {
    

            function init() {
                if (localStorage) {
                    if (localStorage.username) {
                        var uName = localStorage.username;
                        document.getElementById("nameBox").value = "hi, " + uName + "!";
                    }
                }
                if (localStorage) {
                    if (localStorage.userID) {
                        document.getElementById("userID").value = localStorage.userID;
                        var uId = document.getElementById("userID").value;
                        console.log(uId);
                        getFavourites(uId);
                    }
                }
            }

            function getFavourites(uId) {
                if (uId === "") {
                    document.getElementById("placesDiv").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            console.log(xmlhttp.responseText);
                            document.getElementById("placesDiv").innerHTML = xmlhttp.responseText;
                        }
                    };
                    xmlhttp.open("GET", "getFavourites.php?id=" + uId, true);
                    xmlhttp.send();
                }
            }
            function signUp() {
                var div1 = document.getElementById("SignUp"),
                        div2 = document.getElementById("LB2");

                div1.style.display = "block";
                div2.style.display = "block";
            }

            function login() {
                var div1 = document.getElementById("Login"),
                        div2 = document.getElementById("LB");

                div1.style.display = "block";
                div2.style.display = "block";
            }

            function noSignIn() {
                var div1 = document.getElementById("SignUp"),
                        div2 = document.getElementById("LB2");

                div1.style.display = "none";
                div2.style.display = "none";
            }

            function noLogin() {
                var div1 = document.getElementById("Login"),
                        div2 = document.getElementById("LB");

                div1.style.display = "none";
                div2.style.display = "none";
            }

            function addNewUser() {
                var name = document.getElementById("name2").value,
                        password = document.getElementById("password2").value;

                console.log(name + "    " + password);

                if (name.length === 0) {
                    console.log("noname");
                    window.alert("must supply a username!")
                } else if (password.length < 7) {
                    console.log("password too short, minimum 7 characters");
                    window.alert("password too short, minimum 7 characters")
                } else if (password !== document.getElementById("password3").value) {
                    console.log("notsamepass");
                    window.alert("passwords do not match!")
                } else {
                    window.location.href = "registration.php?w1=" + name + "&w2=" + password;
                }

            }

            function loginUser() {

                var name = document.getElementById("name").value;
                var password = document.getElementById("password").value;


                if (localStorage) {
                    localStorage.username = name;
                }

                window.location.href = "loginVal.php?y1=" + name + "&y2=" + password;


            }




        
    
    
    
    
    
}
/*    var number = 0,
        bankCut = 0,
        homeCur = "GBP",
        newCur = "EUR",
        rates = '{"GBP" : 0.73790, "EUR" : 1, "USD" : 1.1387}',
        currencies = JSON.parse(rates);

    
    if (localStorage) {
        if (localStorage.homeCur) {
            homeCur = localStorage.homeCur;
        }
        if (localStorage.newCur) {
            newCur = localStorage.newCur;
        }
        if (localStorage.bankCut) {
            bankCut = localStorage.bankCut;
        }
    }

    this.getValue = function () {
        return number;
    };

    this.addValue = function (newValue) {
        if (number === 0) {
            number = newValue;
        } else {
            number = number + newValue;
        }
    };

    this.setHomeCur = function (newCurrency) {
        homeCur = newCurrency;
        console.log(homeCur);
        if (localStorage) {
            localStorage.homeCur = newCurrency;
        }
    };
    
    this.getHomeCur = function() {
        return homeCur;
    };

    this.setNewCur = function (newCurrency) {
        newCur = newCurrency;
        console.log(newCur);
        if (localStorage) {
            localStorage.newCur = newCurrency;
        }
    };
    
    this.setBankCut = function (newCut) {
            bankCut = newCut;
            console.log(bankCut);
            if (localStorage) {
                localStorage.bankCut = newCut;
        }
    };

    this.convert = function () {
       var percentCut;
       var homeRate = currencies[homeCur];
       var newRate = currencies[newCur];
       
            number = number / homeRate;
            number = number * newRate;
            number = Math.round(number); 
            if (bankCut !== 0) {
                percentCut = ((number / 100) * bankCut);
                number = number - percentCut;
                number = Math.round(number);
            }
    };

    this.clearDisplay = function () {
        number = 0;
    };
} */