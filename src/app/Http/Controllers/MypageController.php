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
        //reservationsテーブルとshopsテーブルを結合。reservationsテーブルのidがshopsテーブルのidに
        //上書きされないように、selectで'reservations.id'と明示。
        $reservations = Reservation::join('shops', 'shops.id', '=', 'shop_id')->where('user_id', $user->id)->orderBy('reserve_datetime', 'ASC')->select('reservations.id',  'user_id', 'shop_id','shop_name','reserve_datetime', 'reserve_number')->get();
       
        $favorites = Favorite::where('user_id', $user->id)->get();

        return view('mypage', compact( 'user', 'shops', 'now','reservations', 'favorites'));
    }

    public function postCancel($id)
    {
        $reservation = Reservation::find($id);

        if ($reservation) {
            Reservation::where('id', $id)->delete();
            return redirect('mypage');
            //キャンセルボタンを押したらDBから予約を削除する
        } else {
            return redirect('mypage')->with('result', '予期せぬエラーが発生しました');
            // DBに該当の予約が見つからなかった場合の処理
        }
    }
    
}
