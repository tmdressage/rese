<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function getReview($id, $shop_id)
    {
        $reservation = Reservation::find($id);
        $shop = Shop::find($shop_id);

        if (!$reservation) {
            return Redirect('/mypage')->with('result', '選択した飲食店の予約情報が登録されていません');
            // もしDB上で飲食店の予約レコードが見つからない場合はマイページでエラーメッセージを表示
        } else {

            return view('review', compact('reservation', 'shop'));
        }
    }


    public function postReviewed(ReviewRequest $request, $shop_id)
    {
        $user = Auth::User();
        $shop = Shop::find($shop_id);
        $review = $request->input('review');
        $comment = $request->input('comment');

        try {
            Review::create([
                'user_id' => $user->id,
                'shop_id' => $shop->id,
                'review' => $review,
                'comment' => $comment,
            ]);
            return redirect('mypage')->with('result', 'レビューの投稿が完了しました');
        } catch (\Throwable $th) {
            return redirect('/mypage')->with('result', '予期せぬエラーが発生しました');
        }
    }
}
