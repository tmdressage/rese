<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;

class ChangeController extends Controller
{
    public function getChange($reservation_id, $shop_id)
    {
        $reservation = Reservation::find($reservation_id);
        $shop = Shop::find($shop_id);

        if (!$reservation) {
            return Redirect('/mypage')->with('result', '選択した飲食店の予約情報が登録されていません');
        } else {

            return view('change', compact('reservation', 'shop'));
        }
    }

    public function postChange($reservation_id, ReservationRequest $request)
    {

        $date = $request->input('reserve_date');
        $time = $request->input('reserve_time');
        // dateとtimeを合成してdatetimeに変換
        $dateTime = $date . ' ' . $time;

        try {
            Reservation::where('id', $reservation_id)->update(
                [
                    'reserve_datetime' => $dateTime,
                    'reserve_number' => $request->reserve_number
                ]
            );
            return redirect('done');
        } catch (\Throwable $th) {
            return redirect('mypage')->with('result', '予期せぬエラーが発生しました');
        }
    }
}
