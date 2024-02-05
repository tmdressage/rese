@extends('layouts.app_thanks')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks__content">
    <div class="thanks__text">
        <p>会員登録ありがとうございます</P>
    </div>
    <div class="thanks__form">
        <form class="form" action="/mypage" method="get">
            @csrf
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログインする</button>
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection