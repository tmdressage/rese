<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common_home.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="{{ asset('js/script_home.js') }}"></script>
  @yield('css')
</head>

<body class="container">
  <header class="header">
    <div class="header__inner">
      <div class="header__menu">
        <button class="header__menu--button menu-button" type="button">
          <span class="header__menu--button-line"></span>
        </button>
        <nav>
          <ul class="menu">
            @if (Auth::check())
            <li class="menu-list"><a class="menu-text" href="/">Home</a></li>
            <li class="menu-list"><a class="menu-text" href="/logout">Logout</a></li>
            <li class="menu-list"><a class="menu-text" href="/mypage">Mypage</a></li>
            @else
            <li class="menu-list"><a class="menu-text" href="/">Home</a></li>
            <li class="menu-list"><a class="menu-text" href="/register">Registration</a></li>
            <li class="menu-list"><a class="menu-text" href="/login">Login</a></li>
            @endif
          </ul>
        </nav>
      </div>
      <h1 class="header__logo">
        Rese
      </h1>
      <div class="header__search">
        <form class="header__search--box" action="/select" method="get">
          <?php
          $select = isset($_GET['area']) ? $_GET['area'] : '';
          ?>
          @csrf
          <div class="search-area">
            <select class="select-area" name="area" onchange="this.form.submit()">
              <option value="" disabled selected style="display:none;">All area</option>
              <option value="">All area</option>
              <option value="東京都" <?= $select === '東京都' ? ' selected' : ''; ?>>東京都</option>
              <option value="大阪府" <?= $select === '大阪府' ? ' selected' : ''; ?>>大阪府</option>
              <option value="福岡県" <?= $select === '福岡県' ? ' selected' : ''; ?>>福岡県</option>
            </select>
          </div>
          <?php
          $select = isset($_GET['genre']) ? $_GET['genre'] : '';
          ?>
          @csrf
          <div class="search-genre">
            <select class="select-genre" name="genre" onchange="this.form.submit()">
              <option value="" disabled selected style="display:none;">All genre</option>
              <option value="">All genre</option>
              <option value="寿司" <?= $select === '寿司' ? ' selected' : ''; ?>>寿司</option>
              <option value="焼肉" <?= $select === '焼肉' ? ' selected' : ''; ?>>焼肉</option>
              <option value="居酒屋" <?= $select === '居酒屋' ? ' selected' : ''; ?>>居酒屋</option>
              <option value="イタリアン" <?= $select === 'イタリアン' ? ' selected' : ''; ?>>イタリアン</option>
              <option value="ラーメン" <?= $select === 'ラーメン' ? ' selected' : ''; ?>>ラーメン</option>
            </select>
          </div>
          <div class="search-button">
            <input class="search" type="submit" value="">
            <img class="icon-search" src="img/search.png" alt="Search">
          </div>
          <input class="search-text" type="text" name="keyword" value="{{$keyword}}" placeholder="Search ...">
        </form>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

</body>

</html>