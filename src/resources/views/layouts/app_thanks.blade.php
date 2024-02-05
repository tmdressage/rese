<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body class="container">
  <header class="header">
    <div class="header__inner">
      <div class="header__menu">
        <button type="button" class="btn js-btn">
          <span class="btn-line"></span>
        </button>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="js/script.js"></script>
        <nav>
          <ul class="menu">
            <li class="menu-list"><a href="/logout_getHome">Home</a></li>
            <li class="menu-list"><a href="/logout_getRegister">Registration</a></li>
            <li class="menu-list"><a href="/logout">Login</a></li>
          </ul>
        </nav>
      </div>
      <h1 class="header__logo">
        Rese
      </h1>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

</body>

</html>