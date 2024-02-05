@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review_read.css') }}">
@endsection

@section('content')
<div class="review_read__title">
    <button class="back_button" type="button" onclick="history.back()">＜
    </button>
    <p class="title">【{{ $shop->shop_name }}】のレビュー</p>
</div>
<div class="review_read__content">
    <div class="review_read__content_average">
        レビュー平均点：<p class="average"> {{ $roundAverage_rate}}
        </p> （5段階評価）
    </div>
    <div class="review_read__content_title">
        <table class="review_read_title">
            <tr>
                <td class="date">投稿日</td>
                <td class="name">投稿者</td>
                <td class="rate">レビュー</td>
                <td class="comment">コメント</td>
            </tr>
        </table>
    </div>
    <div class="review_read__content_review">
        <table class="review_read_table">
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