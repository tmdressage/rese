@extends('layouts.app_thanks')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
@if (session('result'))
<div class="alert">
    {{ session('result') }}
</div>
@endif
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
            @csrf
        </form>
    </div>
</div>
@endsection