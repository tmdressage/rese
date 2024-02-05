@extends('layouts.app_home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
@if($shops->isEmpty())
<div class="alert">検索結果はありませんでした</div>
@endif
@if (session('result'))
<div class="alert">{{ session('result') }}</div>
@endif
<div class="shop__content">
    @foreach($shops as $shop)
    <div class="shop__card">
        <div class="card__img">
            <img class="card_img" src="{{ $shop->shop_img }}" alt="shop">
        </div>
        <div class="card__content_text">
            <h3 class="card__content-ttl">{{ $shop->shop_name }}</h3>
            <div class="card__content-tag">
                <p class="card__content-tag-area">#{{ $shop->shop_area }}</p>
                <p class="card__content-tag-genre">#{{ $shop->shop_genre }}</p>
            </div>
        </div>
        <div class="card__content-button">
            <div class="card__content_detail">
                <form class="button" action="{{ route('detail', ['id' => $shop->id]) }}" method="get">
                    @csrf
                    <button class="detail_button" type="submit">詳しくみる</button>
                </form>
            </div>
            <form class="button" action="{{ route('review_read', ['id' => $shop->id]) }}" method="get">
                <div class="card__content_review_read">
                    <button class="review_read_button" type="submit" name="review">★</button>
                    <p class="tooltip">レビュー閲覧</p>
                </div>
            </form>
            @if($shop->already_favorite())
            <div class="card__content_favorite">
                <button class="favorite_button isActive" type="submit" name="favorite" data-shop-id="{{ $shop->id }}">❤</button>
                <p class="tooltip">お気に入り</p>
            </div>
            @else
            <div class="card__content_favorite">
                <button class="favorite_button notActive" type="submit" name="favorite" data-shop-id="{{ $shop->id }}">❤</button>
                <p class="tooltip">お気に入り</p>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection