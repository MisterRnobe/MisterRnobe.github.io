$('#msc-div').css({"left":"50px", "top":"183px"}).mouseenter(onMouseEnterCity).mouseleave(onMouseLeaveCity);
$('#spb-div').css({"left":"47px", "top":"143px"}).mouseenter(onMouseEnterCity).mouseleave(onMouseLeaveCity);
$('#kzn-div').css({"left":"100px", "top":"194px"}).mouseenter(onMouseEnterCity).mouseleave(onMouseLeaveCity);
$('#prm-div').css({"left":"134px", "top":"180px"}).mouseenter(onMouseEnterCity).mouseleave(onMouseLeaveCity);
$('#vvt-div').css({"left":"495px", "top":"256px"}).mouseenter(onMouseEnterCity).mouseleave(onMouseLeaveCity);
$('#knd-div').css({"left":"19px", "top":"260px"}).mouseenter(onMouseEnterCity).mouseleave(onMouseLeaveCity);
const desc =
    {
      'msc-div':
          {
              name: 'Москва',
              population: '11,92'
          },
        'spb-div':
            {
                name: 'Санкт-Петербург',
                population: '5'
            },
        'kzn-div':
            {
                name: 'Казань',
                population: '1,2'
            },
        'prm-div':
            {
                name: 'Пермь',
                population: '1'
            },
        'vvt-div':
            {
                name: 'Владивосток',
                population: '0,6'
            },
        'knd-div':
            {
                name: 'Краснодар',
                population: '0,7'
            }
    };
function onMouseEnterCity() {
    const me = $(this);
    me.css("background","var(--mouse-color)");
    makeDescription(me);
}
function onMouseLeaveCity() {
    $(this).css("background","var(--no-mouse-color)");
    $('#description').remove();
}
function makeDescription(me) {
    const id = me.attr('id');
    const text = '<p class="m-0">Название: '+desc[id].name+'</p><p class="m-0">Население: '+desc[id].population+' млн</p>';
    let str = me.css('top');
    const top = parseInt(str.substr(0, str.length-2)) + 10;
    str = me.css('left');
    const left = parseInt(str.substr(0, str.length-2)) + 10;
    $('<div class="description-div p-1" style="top: '+top+'px; left: '+left+'px" id="description">'+text+'</div>').appendTo(me.parent());
}
function doOnStart() {
    const descField = $('#cities');
    const text = descField.text();
    const str = "Доступны: "+ Object.keys(desc).map(function (val) {
        return desc[val].name;
    }).join(", ") + ".";
    descField.text(text + str);
}
doOnStart();
