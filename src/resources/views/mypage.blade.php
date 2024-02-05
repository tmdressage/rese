@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage__login_name">
    <p class="login_name">{{ Auth::user()->name }}さん</p>
</div>
@if (session('result'))
<div class="alert">
    {{ session('result') }}
</div>
@endif
<div class="mypage__content">
    <div class="mypage__reservation">
        <div class="mypage__reservation_text">予約状況</div>
        @if($reservations->isEmpty())
        <div class="empty_alert">! 予約状況の登録がありません</div>
        @endif
        <div class="mypage__reservation_card">
            @foreach($reservations as $reservation)
            @if($reservation->reserve_datetime < $now) <div class="reservation_card_past">
                <div class="reservation_content">
                    <img class="icon_clock" src="img/clock.png" alt="clock">
                    <p class="reservation_content-ttl">予約{{ $loop->iteration }}</p>
                    <form class="review" action="{{ route('review',['id' => $reservation->id, 'shop_id' => $reservation->shop_id])}}" method="get">
                        @csrf
                        <button class="review_button" type="submit" name="review">★</button>
                        <p class="tooltip">レビュー投稿</p>
                    </form>
                    <form class="cancel" action="{{ route('cancel', ['id' => $reservation->id]) }}" method="post">
                        @csrf
                        <button type="submit"><img class="cancel_button" src="img/cancel.png" alt="cancel"></button>
                        <p class="tooltip">予約削除</p>
                    </form>
                </div>
                <div class="reservation_detail">
                    <table class="reservation_table">
                        <tr>
                            <td>Shop</td>
                            <td>{{ $reservation->shop_name }}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>{{ substr($reservation->reserve_datetime, 0, 10) }}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{ substr($reservation->reserve_datetime, 11, 5) }}</td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>{{ $reservation->reserve_number }}人</td>
                        </tr>
                    </table>
                </div>
        </div>
        @else
        <div class="reservation_card">
            <div class="reservation_content">
                <img class="icon_clock" src="img/clock.png" alt="clock">
                <p class="reservation_content-ttl">予約{{ $loop->iteration }}</p>
                <form class="change" action="{{ route('change',['id' => $reservation->id, 'shop_id' => $reservation->shop_id])}}" method="get">
                    @csrf
                    <button type="submit"><img class="change_button" src="img/change.png" alt="change"></button>
                    <p class="tooltip">予約変更</p>
                </form>
                <form class="cancel" action="{{ route('cancel', ['id' => $reservation->id]) }}" method="post">
                    @csrf
                    <button type="submit"><img class="cancel_button" src="img/cancel.png" alt="cancel"></button>
                    <p class="tooltip">予約削除</p>
                </form>
            </div>
            <div class="reservation_detail">
                <table class="reservation_table">
                    <tr>
                        <td>Shop</td>
                        <td>{{ $reservation->shop_name }}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{ substr($reservation->reserve_datetime, 0, 10) }}</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>{{ substr($reservation->reserve_datetime, 11, 5) }}</td>
                    </tr>
                    <tr>
                        <td>Number</td>
                        <td>{{ $reservation->reserve_number }}人</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
<div class="mypage__favorite">
    <div class="mypage__favorite_text">お気に入り店舗</div>
    @if($favorites->isEmpty())
    <div class="empty_alert">! お気に入り店舗の登録がありません</div>
    @endif
    <div class="mypage__favorite_card">
        @foreach($shops as $shop)
        @if($shop->already_favorite())
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
            <div class="card__content_button">
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
                <div class="card__content_favorite">
                    <button class="favorite_button isActive" type="submit" name="favorite" data-shop-id="{{ $shop->id }}">❤</button>
                    <p class="tooltip">お気に入り</p>
                </div>                
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection