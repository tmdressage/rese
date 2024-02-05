<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function getDetail($id)
    {
        $shop = Shop::find($id);

        if (!$shop) {
            return Redirect('/')->with('result', '選択した飲食店の詳細情報が登録されていません');
            // もしDB上で飲食店のレコードが見つからない場合はホーム画面でエラーメッセージを表示
        } else {
            return view('detail', compact('shop'));
        }
    }

    public function postReservation($id, ReservationRequest $request)
    {
        $user = Auth::user();
        $shop = Shop::find($id);

        $date = $request->input('reserve_date');
        $time = $request->input('reserve_time');
        // dateとtimeを合成してdatetimeに変換
        $dateTime = $date . ' ' . $time;

        try {
            Reservation::create([
                'user_id' => $user->id,
                'shop_id' => $shop->id,
                'reserve_shop' => $shop->shop_name,
                'reserve_datetime' => $dateTime,
                'reserve_number' => $request->reserve_number
            ]);
            return redirect('done');
        } catch (\Throwable $th) {
            return redirect('/')->with('result', '予期せぬエラーが発生しました');
        }
    }

}
