@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('content')
<div class="review__content">
    <div class="review__shop">
        <div class="review__shop_name">
            <button class="back_button" type="button" onclick="history.back()">＜
            </button>
            <div class="shop_name">
                {{ $shop->shop_name }}
            </div>
        </div>
        <div class="card__img">
            <img class="card_img" src="{{ $shop->shop_img }}" alt="shop">
        </div>
        <div class="card__content-tag">
            <p class="card__content-tag-area">#{{ $shop->shop_area }}</p>
            <p class="card__content-tag-genre">#{{ $shop->shop_genre }}</p>
        </div>
        <h3 class="card__content-text">#{{ $shop->shop_text }}</h3>
    </div>
    <div class="review__reservation">
        <div class="reservation_content">
            <div class="reservation_content_ttl">
                <p>レビュー投稿</P>
            </div>
            <form class="reservation" action="{{ route('reviewed', ['shop_id' => $reservation->shop_id])}} }}" method="post">
                @csrf
                <div class="reservation_content_history">
                    <table class="reservation_table">
                        <tr>
                            <td>★予約情報★</td>
                        </tr>
                        <tr>
                            <td>Shop</td>
                            <td>{{ $shop->shop_name }}</td>
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
                <div class="reservation_content_review">
                    <p class="review_text">★レビュー(5段階評価)★　※必須</p>
                    <div class="rate-form">
                        <input id="star5" type="radio" name="review" value="5">
                        <label for="star5">★</label>
                        <input id="star4" type="radio" name="review" value="4">
                        <label for="star4">★</label>
                        <input id="star3" type="radio" name="review" value="3">
                        <label for="star3">★</label>
                        <input id="star2" type="radio" name="review" value="2">
                        <label for="star2">★</label>
                        <input id="star1" type="radio" name="review" value="1">
                        <label for="star1">★</label>
                    </div>
                    <div class="form__error">
                        @error('review')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="reservation_content_comment">
                    <p class="review_text">★コメント★　※任意</p>
                    <textarea class="comment" name="comment" cols="56" rows="8"></textarea>
                    <div class="form__error">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="reservation__content-button">
                    <button class="reservation_button" type="submit">レビューを投稿する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection