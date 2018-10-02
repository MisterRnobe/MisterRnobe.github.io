let idInterval = 0;
$('#center-picture').mouseenter(function () {
    idInterval = setTimeout(function tick(value, element) {
        doInvert(value, element);
        idInterval = setTimeout(tick, 50, value+1, element);
    }, 50, 0, $(this));
}).mouseleave(function () {
    reset($(this));
});
$('#left-picture').mouseenter(
    function () {
        idInterval = setTimeout(function tick(value, element) {
            doBlur(value, element);
            idInterval = setTimeout(tick, 20, value+1, element);
        }, 20, 0, $(this));
    }).mouseleave(function () {
    reset($(this));
});
$('#right-picture').mouseenter(
    function () {
        idInterval = setTimeout(function tick(value, element) {
            doHueRotate(value, element);
            idInterval = setTimeout(tick, 20, value+10, element);
        }, 20, 0, $(this));
    }).mouseleave(function () {
    reset($(this));
});
function reset(element) {
    clearInterval(idInterval);
    element.css('filter','none');
}

function doInvert(value, element) {
    element.css("filter", "invert("+(-0.5*Math.cos(value*Math.PI/20)+0.5)+")");
}
function doBlur(value, element) {
    element.css("filter", "blur("+(-2*Math.cos(value*Math.PI/20)+2)+"px)");
}
function doHueRotate(value, element) {
    element.css("filter", "hue-rotate("+(value%361)+"deg)");
}