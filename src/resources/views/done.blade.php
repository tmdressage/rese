@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="done__content">
    <div class="done__text">ご予約ありがとうございます</div>
    <div class="done__form">
        <form class="form" action="/done" method="post">
            @csrf
            <div class="form__button">
                <button class="form__button-submit" type="submit">戻る</button>
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection