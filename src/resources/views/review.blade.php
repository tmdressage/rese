@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('content')
<div class="review__content">
    <div class="review__shop">
        <div class="review__shop-name">
            <button class="back-button" type="button" onclick="history.back()">＜
            </button>
            <div class="shop-name">
                {{ $shop->shop_name }}
            </div>
        </div>
        <div class="review__shop-img">
            <img class="shop-img" src="{{ asset($shop->shop_img) }}" alt="shop">
        </div>
        <div class="review__shop-tag">
            <p class="shop-area">#{{ $shop->shop_area }}</p>
            <p class="shop-genre">#{{ $shop->shop_genre }}</p>
        </div>
        <h3 class="review__shop-text">#{{ $shop->shop_text }}</h3>
    </div>
    <div class="review__reservation">
        <div class="review__reservation--content">
            <div class="title">
                <p>レビュー投稿</P>
            </div>
            <form class="reservation" action="{{ route('reviewed', ['shop_id' => $reservation->shop_id])}} }}" method="post">
                @csrf
                <div class="reservation-history">
                    <table class="reservation-table">
                        <tr>
                            <td class="column-space">★予約情報★</td>
                        </tr>
                        <tr>
                            <td class="column-space">Shop</td>
                            <td class="column-space">{{ $shop->shop_name }}</td>
                        </tr>
                        <tr>
                            <td class="column-space">Date</td>
                            <td class="column-space">{{ substr($reservation->reserve_datetime, 0, 10) }}</td>
                        </tr>
                        <tr>
                            <td class="column-space">Time</td>
                            <td class="column-space">{{ substr($reservation->reserve_datetime, 11, 5) }}</td>
                        </tr>
                        <tr>
                            <td class="column-space">Number</td>
                            <td class="column-space">{{ $reservation->reserve_number }}人</td>
                        </tr>
                    </table>
                </div>
                <div class="review-rate">
                    <p class="review-text">★レビュー(5段階評価)★　※必須</p>
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
                <div class="review-comment">
                    <p class="review-text">★コメント★　※任意</p>
                    <textarea class="comment" name="comment" cols="56" rows="8"></textarea>
                    <div class="form__error">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="review__reservation-button">
                    <button class="review-button" type="submit">レビューを投稿する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection