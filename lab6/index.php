<?php

    session_start();
    $authorized = isset($_SESSION['login']);
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
    <style>
        html, body
        {
            height: unset;
        }
        .mt-6
        {
            margin-top: 4rem !important;
        }
        .mb-6
        {
            margin-bottom: 4rem !important;
        }
    </style>
</head>

<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-6">
        <div class="inner">
            <!--h3 class="masthead-brand"></h3>--->
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="../index.html">Домашняя страница</a>
                <a class="nav-link active" href="../works.html">Работы</a>
                <a class="nav-link" href="../feedback.html">Обратная связь</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h2 onclick="showOrClose($('#sign-in'));" style="cursor: pointer;" class="mt-4">Показать форму входа</h2>
        <div id ="sign-in" style="display: none;">
            <?php
            if (!$authorized)
            {
                echo '<form><div class="form-group"><label for="login-input">Введите логин</label><input type="text" class="form-control" id="login-input" placeholder="Логин"></div><div class="form-group">'.
                    '                    <label for="password-input">Введите пароль</label>' .
                    '                    <input type="password" class="form-control" id="password-input" placeholder="Пароль">'.
                    '                </div>' .
                    '                <button type="button" class="btn btn-primary" onclick="sendLogin()">Войти</button>' .
                    '            </form>';
            }
            else
                echo 'Вы уже вошли!';
            ?>
        </div>

        <h2 onclick="showOrClose($('#sign-up'));" style="cursor: pointer;" class="mt-4">Показать форму регистрации</h2>
        <div id ="sign-up" style="display: none;">
            <?php
            if (!$authorized)
                echo '<form>' .
                    '                <div class="form-group">' .
                    '                    <label for="login-input-register">Введите логин</label>' .
                    '                    <input type="text" class="form-control" id="login-input-register" placeholder="Логин">' .
                    '                </div>' .
                    '                <div class="form-group">' .
                    '                    <label for="name-input-register">Введите имя</label>' .
                    '                    <input type="text" class="form-control" id="name-input-register" placeholder="Имя">' .
                    '                </div>' .
                    '                <div class="form-group">' .
                    '                    <label for="email-input-register">Введите email</label>' .
                    '                    <input type="text" class="form-control" id="email-input-register" placeholder="Почта">' .
                    '                </div>' .
                    '                <div class="form-group">' .
                    '                    <label for="password-input-register">Введите пароль</label>' .
                    '                    <input type="password" class="form-control" id="password-input-register" placeholder="Пароль">' .
                    '                </div>' .
                    '                <div class="form-group">' .
                    '                    <label for="password-again-input-register">Введите пароль еще раз</label>' .
                    '                    <input type="password" class="form-control" id="password-again-input-register" placeholder="Пароль">' .
                    '                </div>' .
                    '                <button type="button" class="btn btn-primary" onclick="sendRegister()">Зарегистрироваться</button>' .
                    '            </form>';
            else
                echo 'Вы уже авторизованы!';
            ?>
        </div>
        <h2 onclick="showOrClose($('#personal-data'));" style="cursor: pointer;" class="mt-4">Показать личные данные</h2>
        <div id ="personal-data" style="display: none;">
            <?php
            if (!$authorized)
            {
                echo 'Вы не авторизовались!';
            }
            else
            {
                echo '<div class="row"><div class="col-6"><strong>Ваше имя:</strong></div><div class="col-6">'.$_SESSION['name'].'</div></div>';
                echo '<div class="row"><div class="col-6"><strong>Ваш логин:</strong></div><div class="col-6">'.$_SESSION['login'].'</div></div>';
                echo '<div class="row"><div class="col-6"><strong>Ваша почта:</strong></div><div class="col-6">'.$_SESSION['email'].'</div></div>';
            }

            ?>
        </div>
    </main>
    <footer class="mastfoot mt-6">
        <div class="inner">
            <p>Сайт сделал: <a href="https://vk.com/nikita1402">Медведев Никита</a>, студент группы ИКБО-01-15.</p>
            <p><a href="../sitemap.html">Карта сайта</a></p>
        </div>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="http://bootstrap-4.ru/docs/4.1/assets/js/vendor/popper.min.js"></script>
<script src="http://bootstrap-4.ru/docs/4.1/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    const authorized = <?php echo $authorized == 1? 'true': 'false';?>;
    function showOrClose(div) {
        const isOpen = div.css("display") !== 'none';
        div.css("display", isOpen? "none": "");
        return false;
    }
    function sendRegister() {
        console.log("Start ajax");
        $.ajax({
            url: 'register.php',
            type: 'POST',
            data: {
                login: $('#login-input-register').val(),
                name: $('#name-input-register').val(),
                password: $('#password-input-register').val(),
                email: $('#email-input-register').val()
            },
            success: function (data) {
                console.log(data);
                onSignUp(data);
            }
        });
    }
    function onSignUp(data) {
        if (data.status === 'ok') {
            alert('Вы успешно зарегистрировались!');
            location.reload();
        }
        else
        {
            alert(data.msg);
        }
    }
    function onSignIn(data) {
        if (data.status === 'ok') {
            alert('Вы успешно вошли!');
            location.reload();
        }
        else
        {
            alert('Произошла ошибка! Повторите попытку');
        }

    }
    function sendLogin() {
        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: {
                login: $('#login-input').val(),
                password: $('#password-input').val()
            },
            success: function (data) {
                console.log(data);
                onSignIn(data);
            }
        });
    }

</script>
</body>
</html>
