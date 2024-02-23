<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/verify_email.css') }}">
    @yield('css')
</head>

<body class="container">
    <div class="verify-email__content">
        @if (session('result') == 'verification-link-sent')
        <div class="verify-email__text">
            <h3>下記メールアドレス宛に本人確認メールを送信しました</h3>
            <p>{{ Auth::user()->email }}</p>
        </div>
        <div class="verify-email__message">
            <p>メールを開いて認証ボタンをクリックし、Reseにログインしてください</p>
            <form class="verify-email__form" method="get" action="{{ route('verification.notice') }}">
                @csrf
                <p>メールが届いていない方はこちら</p>
                <div class="verify-email__button">
                    <button class="verify-email__button--submit" type="submit">
                        <p class="verify-email__button--text">メール送信画面へ戻る</p>
                    </button>
                </div>
            </form>
        </div>
        @else
        <div class="verify-email__text">
            <h3>本人確認の為、メールアドレス認証にご協力をお願いします</h3>
        </div>
        <div class="verify-email__message">
            <p>以下のボタンをクリックしてメールを送信してください</p>
            <form class="verify-email__form" method="post" action="{{ route('verification.send') }}">
                @csrf
                <div class="verify-email__button">
                    <button class="verify-email__button--submit" type="submit">
                        <p class="verify-email__button--text">本人確認メール送信</p>
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</body>
</html>