<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Review;

class ReviewReadController extends Controller
{
    public function getReviewRead($shop_id)
    {
        $shop = Shop::find($shop_id);
        $reviews = Review::join('users', 'users.id', '=', 'user_id')->where('shop_id', $shop_id)->orderby('reviews.created_at', 'DESC')->select('reviews.created_at', 'name', 'review', 'comment')->get();

        $average_rate = Review::where('shop_id', $shop_id)->avg('review');
        $roundAverage_rate = ceil($average_rate * 100) / 100;

        if (!$average_rate) {
            $average_rate = "--";
        }

        return view('review_read', compact('shop', 'reviews', 'roundAverage_rate'));
    }
}
