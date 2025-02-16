document.addEventListener("DOMContentLoaded", function () {
    let screenWidth = window.innerWidth;
    let screenHeight = window.innerHeight;

    let { x, y, color } = blockData;

    if (x >= 0 && x <= screenWidth - 50 && y >= 0 && y <= screenHeight - 50) {
        let div = document.createElement("div");
        div.style.position = "absolute";
        div.style.left = x + "px";
        div.style.top = y + "px";
        div.style.width = "50px";
        div.style.height = "50px";
        div.style.backgroundColor = color;
        div.style.border = "1px solid black";
        document.body.appendChild(div);
    } else {
        document.body.innerHTML += "<p style='color:red;'>Coordinates over the screen</p>";
    }
});
