window.onload = function (params) {
    var audio = document.getElementById("audio");
    audio.play();
};

var buttons = document.getElementsByTagName("button");
var BtM = document.getElementById("BtM");

for (const button of buttons) {
    button.addEventListener("mouseover", function (event) {
        BtM.play();
    });
}