<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('css')
</head>

<body class="container">
    <header class="header">
        <div class="header__inner">
            <div class="header__menu">
                <button class="header__menu--button menu_button" type="button">
                    <span class="header__menu--button-line"></span>
                </button>
                <nav>
                    <ul class="menu">
                        <li class="menu-list"><a class="menu-text" href="/logout_getHome">Home</a></li>
                        <li class="menu-list"><a class="menu-text" href="/logout_getRegister">Registration</a></li>
                        <li class="menu-list"><a class="menu-text" href="/logout">Login</a></li>
                    </ul>
                </nav>
            </div>
            <h1 class="header__logo">
                Rese
            </h1>
        </div>
    </header>
    <main>
        <div class="thanks__content">
            <p class="thanks__text">会員登録ありがとうございます</P>
            <div class="thanks__form">
                <form class="form" action="/mypage" method="get">
                    @csrf
                    <div class="form__button">
                        <button class="form__button--submit" type="submit">
                            <p class="form__button--text">ログインする
                            </p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>