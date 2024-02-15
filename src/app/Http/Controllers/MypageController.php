<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function getMypage()
    {
        $user = Auth::User();
        $shops = Shop::all();
        $now = Carbon::now();

        $reservations = Reservation::join('shops', 'shops.id', '=', 'shop_id')->where('user_id', $user->id)->orderBy('reserve_datetime', 'ASC')->select('reservations.id',  'user_id', 'shop_id', 'shop_name', 'reserve_datetime', 'reserve_number')->get();

        $favorites = Favorite::where('user_id', $user->id)->get();

        return view('mypage', compact('user', 'shops', 'now', 'reservations', 'favorites'));
    }

    public function postCancel($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);

        if ($reservation) {
            Reservation::where('id', $reservation_id)->delete();
            return redirect('mypage');
            // 予約キャンセルボタンを押したらDBから予約を削除
        } else {
            return redirect('mypage')->with('result', '予期せぬエラーが発生しました');
            // DBに該当の予約が見つからなかった場合の処理
        }
    }
}
