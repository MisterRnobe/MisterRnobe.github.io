<?php
include "counter.php";
include "info.php";
include "time.php";

$info = getInfo();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой сайт</title>
    <link href="../css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css">
    <link href="../css/custom.css" rel="stylesheet" type="text/css">

</head>

<body class="text-center">
<div style="max-width: 60rem;" class="d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead">
        <div class="inner">
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="../index.html">Домашняя страница</a>
                <a class="nav-link active" href="../works.html">Работы</a>
                <a class="nav-link" href="../feedback.html">Обратная связь</a>
            </nav>
        </div>
    </header>
    <div class="mb-auto">
        <h1>Демонстация работы серверных скриптов</h1>
    </div>

    <main role="main" class="inner cover">

        <h2 onclick="showOrClose(viewersDiv);" style="cursor: pointer;" class="mt-4">Показать количество посетителей</h2>
        <div id ="viewers" style="display: none;">
            Эту страницу открыли <?php echo increment();?> раз
        </div>
        <h2 onclick="showOrClose(infoDiv);" style="cursor: pointer;" class="mt-4">Показать мою информацию</h2>
        <div style="display: none;" id ="info">
            <div>
                Ваш IP-адрес: <?=$info['ip']?>
            </div>
            <div>
                Ваш браузер: <?=$info['agent']?>
            </div>
        </div>
        <h2 onclick="showOrClose(timeDiv);" style="cursor: pointer;" class="mt-4">Показать время запроса страницы</h2>
        <div style="display: none;" id ="time">
            Время запроса : <?=getTime()?>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Сайт сделал: <a href="https://vk.com/nikita1402">Медведев Никита</a>, студент группы ИКБО-01-15.</p>
            <p><a href="../sitemap.html">Карта сайта</a></p>
        </div>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://bootstrap-4.ru/docs/4.1/assets/js/vendor/popper.min.js"></script>
<script src="https://bootstrap-4.ru/docs/4.1/dist/js/bootstrap.min.js"></script>
<script>
    const viewersDiv = $('#viewers');
    const infoDiv = $('#info');
    const timeDiv = $('#time');
    function showOrClose(div) {
        const isOpen = div.css("display") !== 'none';
        div.css("display", isOpen? "none": "");
        return false;
    }
</script>
</body>
</html>
