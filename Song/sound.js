let buttons = document.getElementsByTagName("button");
let BtM = document.getElementById("BtM");

for (const button of buttons) {
    button.addEventListener("mouseover", function (event) {
        BtM.play();
    });
}