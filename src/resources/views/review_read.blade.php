@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review_read.css') }}">
@endsection

@section('content')
<div class="review-read__title">
    <button class="back_button" type="button" onclick="history.back()">＜
    </button>
    <p class="title">【{{ $shop->shop_name }}】のレビュー</p>
</div>
<div class="review-read__content">
    <div class="review-read__content--average">
        レビュー平均点：<p class="average"> {{ $roundAverage_rate}}
        </p> （5段階評価）
    </div>
    <div class="review-read__content--title">
        <table class="review-read-title">
            <tr>
                <td class="date">投稿日</td>
                <td class="name">投稿者</td>
                <td class="rate">レビュー</td>
                <td class="comment">コメント</td>
            </tr>
        </table>
    </div>
    <div class="review-read__content--review">
        <table class="review-read-table">
            @foreach($reviews as $review)
            <tr>
                <td class="date"> {{ substr($review->created_at, 0, 10) }}</td>
                <td class="name">{{ $review->name }}さん</td>
                <td class="rate-form">{{ $review->review }}</td>
                <td class="comment">{{ $review->comment }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection