/*jslint node: true, browser: true */
"use strict";

function SPSController() {
    var SPSModel = new SPSModel(),
        SPSView = new SPSView(),
        updateDisplay = function () {
            SPSView.updateDisplay(SPSModel.getValue(), SPSModel.getHomeCur());
        };

    this.init = function () {
        SPSView.init();
        updateDisplay();
        SPSView.setButtonClick(function () {
            if (this.value === "c") {
                SPSModel.clearDisplay();
            } else if (this.value === "=") {
                SPSModel.convert();
            } else {
                SPSModel.addValue(this.value);
            }
            updateDisplay();
        });
        SPSView.setSelectListener(function () {
            if (this.id === "homeCur") {
                SPSModel.setHomeCur(this.value);
            } else if (this.id === "newCur") {
                SPSModel.setNewCur(this.value);
            }
            else {
                SPSModel.setBankCut(this.value);
            }
        });
    };
}

var SPSController = new SPSController();
window.addEventListener("load", SPSController.init(), false);