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
    },{name: 'DuckDuckGo', url : 'https://duckduckgo.com/?q='},
    { name : 'Yahoo', url :'https://search.yahoo.com/search?p='},
    { name :
            'Bing', url :'http://www.bing.com/search?q='},
    { name :
            'Yahoo', url :'https://search.yahoo.com/search?p='},
    { name :
            'Rambler', url :'https://nova.rambler.ru/search?query='},
    { name :
            'Wikipedia', url :'https://ru.wikipedia.org/w/index.php?search='},{ name :
            'Aport', url :'https://www.aport.ru/search/?q='},{ name :
            'Search', url :'https://www.search.com/web?q='},{ name :
            'Clarivate', url :'https://clarivate.com/?s='},{ name :
            'Webcrawler', url :'http://www.webcrawler.com/serp?q='},{ name :
            'IRR', url :'https://irr.ru/searchads/search/keywords='},{ name :
            'Price', url :'https://price.ru/search/?query='},{ name :
            'Ask', url :'https://www.ask.com/web?q='}

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