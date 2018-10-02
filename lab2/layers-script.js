const path = d3.select('#my_path');//.attr("d",getLines());

function getLines(offset) {
    const xOffset = 10;
    let str = "M "+xOffset+" "+getY(offset)+" ";
    for (let i = 1; i < 200; i++) {
        str += "L "+(i+xOffset)+" "+getY(i+offset)+" ";
    }
    return str;
}
function getY(x) {
    return 30*Math.cos(Math.PI*x/100) + 50;
}
function f() {
    let i = 0;
    setInterval(function () {
        path.attr("d",getLines(i));
        i++;
    }, 20);
}
f();
function moveLayer(id, direction) {
    const element = $('#'+id);
    const zIndex = parseInt(element.css('z-index'));
    element.css('z-index', (zIndex + direction));
}