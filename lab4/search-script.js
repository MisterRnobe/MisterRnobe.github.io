const search = [
    {
        name: 'Яндекс',
        url: 'http://www.yandex.ru/yandsearch?rpt=rad&text='
    },
    {
        name: 'Google',
        url: 'http://www.google.ru/search?hl=ru&newwindow=1&q='
    },
    {
        name: 'Mail.ru',
        url: 'http://go.mail.ru/search?fm=1&rf=e.mail.ru&q='
    }
];
function setList() {
    const select = $('#search-select');
    search.forEach(function (obj) {
       select.append('<option>'+obj.name+'</option>');
    });
}
function onSearch() {
    const val = $('#search-select').val();
    const url = search.find(function (element) {
        return val === element.name;
    }).url;
    location.href = url + $('#search-input').val();
}
setList();